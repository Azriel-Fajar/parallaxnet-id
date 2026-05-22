/**
 * Admin Panel UI tour — headed browser.
 * Logs in as admin, visits all 9 pages, screenshots at desktop + mobile.
 */
const { chromium, devices } = require('playwright');
const fs = require('fs');
const path = require('path');

const BASE = 'http://127.0.0.1:8000';
const OUT  = path.join(__dirname, '..', 'screenshots', 'admin-tour');
fs.mkdirSync(OUT, { recursive: true });

const PAGES = [
    { path: '/admin',           slug: '01-dashboard'     },
    { path: '/admin/berita',    slug: '02-berita'        },
    { path: '/admin/slider',    slug: '03-slider'        },
    { path: '/admin/dokumen',   slug: '04-dokumen'       },
    { path: '/admin/mitra',     slug: '05-mitra'         },
    { path: '/admin/video',     slug: '06-video'         },
    { path: '/admin/kursus',    slug: '07-kursus'        },
    { path: '/admin/testimoni', slug: '08-testimoni'     },
    { path: '/admin/faq',       slug: '09-faq'           },
];

async function login(page) {
    await page.goto(`${BASE}/login`, { waitUntil: 'networkidle' });

    // form uses name field (not email). Try common selectors.
    const nameInput = await page.locator('input[name="name"]').first();
    const passInput = await page.locator('input[name="password"]').first();
    await nameInput.fill('admin');
    await passInput.fill('password');

    await Promise.all([
        page.waitForURL(/\/admin/, { timeout: 10000 }),
        page.locator('button[type="submit"], input[type="submit"]').first().click(),
    ]);
}

async function tour(viewportLabel, viewport, isMobile) {
    const browser = await chromium.launch({ headless: false, slowMo: 250 });
    const context = await browser.newContext({
        ...(isMobile ? devices['iPhone 13'] : { viewport }),
    });
    const page = await context.newPage();

    const errors = [];
    page.on('pageerror', err => errors.push(`[${page.url()}] ${err.message}`));
    page.on('console', msg => {
        if (msg.type() === 'error') errors.push(`[${page.url()}] console: ${msg.text()}`);
    });

    console.log(`\n=== ${viewportLabel} tour ===`);
    await login(page);
    console.log(`✓ logged in (${viewportLabel})`);

    for (const p of PAGES) {
        await page.goto(`${BASE}${p.path}`, { waitUntil: 'networkidle' });
        const file = path.join(OUT, `${p.slug}-${viewportLabel}.png`);
        await page.screenshot({ path: file, fullPage: true });
        const title = await page.title();
        console.log(`✓ ${p.path}  →  ${path.basename(file)}  (title: ${title})`);
    }

    if (isMobile) {
        // open drawer test
        await page.goto(`${BASE}/admin`, { waitUntil: 'networkidle' });
        await page.locator('#menuToggle').click();
        await page.waitForTimeout(500);
        await page.screenshot({ path: path.join(OUT, '00-drawer-open-mobile.png'), fullPage: false });
        console.log('✓ mobile drawer screenshot captured');
    }

    if (errors.length) {
        console.log(`⚠ ${errors.length} console/page errors:`);
        errors.slice(0, 10).forEach(e => console.log('   ' + e));
    } else {
        console.log('✓ no console errors');
    }

    await browser.close();
}

(async () => {
    await tour('desktop', { width: 1440, height: 900 }, false);
    await tour('mobile',  null,                          true);
    console.log('\nDone. Screenshots in:', OUT);
})().catch(err => { console.error(err); process.exit(1); });

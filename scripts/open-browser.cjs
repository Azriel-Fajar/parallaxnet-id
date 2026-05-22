const { chromium } = require('playwright');
(async () => {
  const b = await chromium.launch({ headless: false, args: ['--start-maximized'] });
  const ctx = await b.newContext({ viewport: null });
  const p = await ctx.newPage();
  await p.goto('http://127.0.0.1:8000', { waitUntil: 'networkidle' });
  console.log('Browser open — ' + await p.title());
  // keep process alive until manually closed
  await new Promise(() => {});
})();

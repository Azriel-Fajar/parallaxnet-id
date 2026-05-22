const { chromium } = require("playwright");
(async () => {
  const browser = await chromium.launch({ headless: true });
  const page = await browser.newPage();
  const shots = [
    ["http://127.0.0.1:8000/", "home-desktop", 1280, 900],
    ["http://127.0.0.1:8000/kursus", "kursus-desktop", 1280, 900],
    ["http://127.0.0.1:8000/kurikulum/standar", "standar-desktop", 1280, 900],
    ["http://127.0.0.1:8000/kurikulum/bootcamp/web-developer", "bootcamp-web-desktop", 1280, 900],
    ["http://127.0.0.1:8000/", "home-mobile", 390, 844],
  ];
  for (const [url, name, w, h] of shots) {
    await page.setViewportSize({ width: w, height: h });
    await page.goto(url, { waitUntil: "networkidle", timeout: 30000 });
    await page.screenshot({ path: "c:/xampp/htdocs/Parallaxnet ID/screenshots/" + name + ".png", fullPage: true });
    console.log("DONE: " + name);
  }
  await browser.close();
})().catch(e => { console.error(e.message); process.exit(1); });

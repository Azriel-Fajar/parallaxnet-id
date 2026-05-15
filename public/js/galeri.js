(function () {
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const btnClose = document.getElementById('lightbox-close');
    const btnPrev = document.getElementById('lightbox-prev');
    const btnNext = document.getElementById('lightbox-next');

    const items = Array.from(document.querySelectorAll('.masonry-item'));
    let current = 0;

    function open(index) {
        current = index;
        lightboxImg.src = items[current].dataset.src;
        lightbox.classList.add('is-open');
        updateArrows();
        document.body.style.overflow = 'hidden';
    }

    function close() {
        lightbox.classList.remove('is-open');
        lightboxImg.src = '';
        document.body.style.overflow = '';
    }

    function prev() {
        if (current > 0) open(current - 1);
    }

    function next() {
        if (current < items.length - 1) open(current + 1);
    }

    function updateArrows() {
        btnPrev.classList.toggle('is-hidden', items.length <= 1 || current === 0);
        btnNext.classList.toggle('is-hidden', items.length <= 1 || current === items.length - 1);
    }

    items.forEach(function (item, i) {
        item.addEventListener('click', function () { open(i); });
    });

    btnClose.addEventListener('click', close);
    btnPrev.addEventListener('click', prev);
    btnNext.addEventListener('click', next);

    lightbox.addEventListener('click', function (e) {
        if (e.target === lightbox) close();
    });

    document.addEventListener('keydown', function (e) {
        if (!lightbox.classList.contains('is-open')) return;
        if (e.key === 'Escape') close();
        if (e.key === 'ArrowLeft') prev();
        if (e.key === 'ArrowRight') next();
    });
})();

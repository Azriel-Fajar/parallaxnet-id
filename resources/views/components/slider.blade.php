@if ($images->isNotEmpty())
<section class="slider-section">
    <div class="container">
        <div class="slider-wrapper">
            <div class="slider" id="slider">
                <button class="nav-btn prev" id="prev">&#10094;</button>

                @foreach ($images as $item)
                    @php
                        $imagePath = public_path('storage/' . $item->filename);
                        if (file_exists($imagePath)) {
                            [$width, $height] = getimagesize($imagePath);
                        } else {
                            $width = 800;
                            $height = 450;
                        }
                    @endphp

                    <div class="slide" data-width="{{ $width }}" data-height="{{ $height }}">
                        <a href="{{ route('kurikulum') }}">
                            <img src="{{ asset('storage/' . $item->filename) }}" alt="{{ $item->filename }}">
                        </a>
                    </div>
                @endforeach

                <button class="nav-btn next" id="next">&#10095;</button>
            </div>
        </div>

        <div class="dots" id="dots"></div>
    </div>
</section>

{{-- Slider JS --}}
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const slider = document.getElementById("slider");
        const dotsContainer = document.getElementById("dots");
        const slides = document.querySelectorAll(".slide");
        let currentSlide = 0;
        let autoScrollInterval;

        slides.forEach((_, index) => {
            const dot = document.createElement("button");
            dot.classList.add("dot");
            dot.addEventListener("click", () => {
                currentSlide = index;
                showSlide();
            });
            dotsContainer.appendChild(dot);
        });

        const updateDots = () => {
            document.querySelectorAll(".dot").forEach((dot, i) => {
                dot.classList.toggle("active", i === currentSlide);
            });
        };

        const wrapper = slider.parentElement;

        const calcDisplay = (imgWidth, imgHeight, maxW, maxH) => {
            const ratio = imgWidth / imgHeight;
            let w = maxW, h = w / ratio;
            if (h > maxH) { h = maxH; w = h * ratio; }
            return { w, h };
        };

        // Move all slides back into slider (home position)
        const resetSlides = () => {
            slides.forEach((slide) => {
                if (slide.parentElement !== slider) slider.appendChild(slide);
                slide.classList.remove("active", "peek-left", "peek-right");
                slide.removeAttribute('style');
            });
        };

        const showSlide = () => {
            resetSlides();

            const active = slides[currentSlide];
            active.classList.add("active");

            const imgWidth = parseFloat(active.dataset.width);
            const imgHeight = parseFloat(active.dataset.height);
            const maxHeight = window.innerHeight * 0.75;
            const maxWidth = wrapper.clientWidth * 0.84;
            const { w: displayWidth, h: displayHeight } = calcDisplay(imgWidth, imgHeight, maxWidth, maxHeight);

            slider.style.width = `${displayWidth}px`;
            slider.style.height = `${displayHeight}px`;
            wrapper.style.height = `${displayHeight}px`;

            if (slides.length > 1) {
                const prevIdx = (currentSlide - 1 + slides.length) % slides.length;
                const nextIdx = (currentSlide + 1) % slides.length;

                const sliderLeft = (wrapper.clientWidth - displayWidth) / 2;
                const sliderRight = sliderLeft + displayWidth;

                const PEEK_VISIBLE = 60; // px visible outside active slide
                [{ slide: slides[prevIdx], side: 'left' }, { slide: slides[nextIdx], side: 'right' }].forEach(({ slide, side }) => {
                    const peekW = PEEK_VISIBLE * 3; // wider than visible so image isn't squished
                    const peekH = displayHeight;
                    // left peek: right edge = sliderLeft + PEEK_VISIBLE (peeks out from left of active)
                    // right peek: left edge = sliderRight - PEEK_VISIBLE (peeks out from right of active)
                    const leftPos = side === 'left'
                        ? sliderLeft + PEEK_VISIBLE - peekW
                        : sliderRight - PEEK_VISIBLE;

                    wrapper.appendChild(slide);
                    slide.classList.add(side === 'left' ? 'peek-left' : 'peek-right');
                    slide.style.position = 'absolute';
                    slide.style.width = `${peekW}px`;
                    slide.style.height = `${peekH}px`;
                    slide.style.top = '50%';
                    slide.style.transform = 'translateY(-50%)';
                    slide.style.left = `${leftPos}px`;
                    slide.style.zIndex = '1';
                    slide.style.overflow = 'hidden';
                    const img = slide.querySelector('img');
                    if (img) { img.style.width = '100%'; img.style.height = '100%'; img.style.objectFit = 'cover'; img.style.objectPosition = side === 'left' ? 'right center' : 'left center'; }
                });
            }

            updateDots();
        };

        const startAutoScroll = () => {
            autoScrollInterval = setInterval(() => {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide();
            }, 4000);
        };

        const stopAutoScroll = () => clearInterval(autoScrollInterval);

        document.getElementById("prev").addEventListener("click", () => {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide();
            stopAutoScroll();
            startAutoScroll();
        });

        document.getElementById("next").addEventListener("click", () => {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide();
            stopAutoScroll();
            startAutoScroll();
        });

        slider.addEventListener("mouseenter", stopAutoScroll);
        slider.addEventListener("mouseleave", startAutoScroll);

        // Touch swipe support
        let touchStartX = 0;
        let touchEndX = 0;
        wrapper.addEventListener("touchstart", (e) => {
            touchStartX = e.changedTouches[0].screenX;
            stopAutoScroll();
        }, { passive: true });
        wrapper.addEventListener("touchend", (e) => {
            touchEndX = e.changedTouches[0].screenX;
            const diff = touchStartX - touchEndX;
            if (Math.abs(diff) >= 50 && slides.length > 1) {
                if (diff > 0) {
                    currentSlide = (currentSlide + 1) % slides.length;
                } else {
                    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                }
                showSlide();
            }
            if (slides.length > 1) startAutoScroll();
        }, { passive: true });

        showSlide();
        if (slides.length > 1) startAutoScroll();

        window.addEventListener("resize", showSlide);
    });
</script>
@endif

@php
    $faqs = \App\Models\Faq::orderBy('sort_order')->get();
    $initial = $faqs->take(5);
    $extra = $faqs->slice(5);
@endphp

@if ($faqs->isNotEmpty())
    <section id="faq" class="faq-section">
        <div class="container">
            <h2>FAQ</h2>

            <div class="faq-list">
                @foreach ($initial as $faq)
                    <details class="faq-item">
                        <summary>{{ $faq->question }}</summary>
                        <div class="faq-answer">{!! nl2br(e($faq->answer)) !!}</div>
                    </details>
                @endforeach

                @if ($extra->count() > 0)
                    <div class="faq-more" hidden>
                        @foreach ($extra as $faq)
                            <details class="faq-item">
                                <summary>{{ $faq->question }}</summary>
                                <div class="faq-answer">{!! nl2br(e($faq->answer)) !!}</div>
                            </details>
                        @endforeach
                    </div>

                    <div class="faq-toggle-wrap">
                        <button class="faq-toggle" type="button" data-show="Lihat semua FAQ" data-hide="Tutup FAQ">
                            Lihat semua FAQ
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <script>
        (function () {
            var btn = document.querySelector('.faq-toggle');
            if (!btn) return;
            var more = document.querySelector('.faq-more');
            if (!more) return;
            btn.addEventListener('click', function () {
                var isHidden = more.hasAttribute('hidden');
                if (isHidden) {
                    more.removeAttribute('hidden');
                    btn.textContent = btn.dataset.hide;
                    btn.classList.add('is-open');
                } else {
                    more.setAttribute('hidden', '');
                    btn.textContent = btn.dataset.show;
                    btn.classList.remove('is-open');
                }
            });
        })();
    </script>
@endif

<?php
    $faqs = \App\Models\Faq::orderBy('sort_order')->get();
    $initial = $faqs->take(5);
    $extra = $faqs->slice(5);
?>

<?php if($faqs->isNotEmpty()): ?>
    <section id="faq" class="faq-section">
        <div class="container">
            <h2>FAQ</h2>

            <div class="faq-list">
                <?php $__currentLoopData = $initial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <details class="faq-item">
                        <summary><?php echo e($faq->question); ?></summary>
                        <div class="faq-answer"><?php echo nl2br(e($faq->answer)); ?></div>
                    </details>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if($extra->count() > 0): ?>
                    <div class="faq-more" hidden>
                        <?php $__currentLoopData = $extra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <details class="faq-item">
                                <summary><?php echo e($faq->question); ?></summary>
                                <div class="faq-answer"><?php echo nl2br(e($faq->answer)); ?></div>
                            </details>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="faq-toggle-wrap">
                        <button class="faq-toggle" type="button" data-show="Lihat semua FAQ" data-hide="Tutup FAQ">
                            Lihat semua FAQ
                        </button>
                    </div>
                <?php endif; ?>
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
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/components/faq.blade.php ENDPATH**/ ?>
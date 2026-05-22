<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['cssFile' => 'home']); ?>
    <section id="landing">
        <div class="landing-parallax"></div>
        
        <div class="landing-circle landing-circle--1" aria-hidden="true"></div>
        <div class="landing-circle landing-circle--2" aria-hidden="true"></div>
        <div class="landing-circle landing-circle--3" aria-hidden="true"></div>
        <div class="container">
            <div class="text-container">
                <span class="landing-eyebrow">Parallaxnet Siber Indonesia</span>
                <h1>Merevolusi Pendidikan dengan Pembelajaran IT Praktis</h1>
                <p class="landing-sub">Kursus praktis cybersecurity, web, AI, dan IT profesional untuk karier masa
                    depan.</p>
            </div>
            <div class="cta-row">
                <a href="<?php echo e(route('courses.all')); ?>" class="cta-button cta-secondary">Lihat Kursus</a>
                <a href="https://wa.me/6285788220000" target="_blank" rel="noopener" class="cta-button cta-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="currentColor" aria-hidden="true" style="flex-shrink:0;">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                        <path
                            d="M12 0C5.373 0 0 5.373 0 12c0 2.124.554 4.12 1.526 5.855L.057 23.857a.5.5 0 0 0 .608.61l6.178-1.483A11.94 11.94 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.885 0-3.655-.52-5.17-1.426l-.37-.22-3.827.918.949-3.73-.241-.386A9.96 9.96 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" />
                    </svg>
                    Daftar via WhatsApp
                </a>
            </div>
        </div>
    </section>

    <main>
        
        <?php
            $staticCards = [
                [
                    'name' => 'Basic Course',
                    'blurb' => 'Fondasi IT — cloud, keamanan siber, networking, dan Python untuk pemula.',
                    'image' => asset('images/basic.png'),
                    'route' => 'standar',
                ],
                [
                    'name' => 'Bootcamp',
                    'blurb' => 'Web, AI, dan Hacker bootcamp intensif untuk karier di dunia teknologi.',
                    'image' => asset('images/bootcamp.png'),
                    'route' => 'bootcamp',
                ],
                [
                    'name' => 'Professional Course',
                    'blurb' => 'Sertifikasi dan keahlian tingkat lanjut untuk karier cybersecurity dan IT.',
                    'image' => asset('images/professional.png'),
                    'route' => 'profesional',
                ],
            ];
        ?>

        <section class="category-section">
            <div class="container">
                <div class="category-section__layout">

                    
                    <?php if (isset($component)) { $__componentOriginal73a01698c44d001b92a97be3210dc74c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal73a01698c44d001b92a97be3210dc74c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home-video','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home-video'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal73a01698c44d001b92a97be3210dc74c)): ?>
<?php $attributes = $__attributesOriginal73a01698c44d001b92a97be3210dc74c; ?>
<?php unset($__attributesOriginal73a01698c44d001b92a97be3210dc74c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal73a01698c44d001b92a97be3210dc74c)): ?>
<?php $component = $__componentOriginal73a01698c44d001b92a97be3210dc74c; ?>
<?php unset($__componentOriginal73a01698c44d001b92a97be3210dc74c); ?>
<?php endif; ?>

                    
                    <div class="category-grid">
                        <?php $__currentLoopData = $staticCards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route($card['route'])); ?>" class="category-card">
                                <div class="category-card__thumb">
                                    <img src="<?php echo e($card['image']); ?>" alt="<?php echo e($card['name']); ?>" loading="lazy"
                                        onerror="this.style.display='none'">
                                </div>
                                <div class="category-card__body">
                                    <h3><?php echo e($card['name']); ?></h3>
                                    <p><?php echo e($card['blurb']); ?></p>
                                </div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                        <?php
                            $mosaicThumbs = collect();
                            if (isset($courseCategories)) {
                                foreach ($courseCategories as $cat) {
                                    foreach ($cat->courses as $c) {
                                        if ($c->image) {
                                            $mosaicThumbs->push(asset('storage/' . $c->image));
                                        }
                                        if ($mosaicThumbs->count() >= 4) {
                                            break 2;
                                        }
                                    }
                                }
                            }
                        ?>
                        <a href="<?php echo e(route('courses.all')); ?>" class="category-card category-card--all">
                            <div class="category-card__mosaic">
                                <?php $__currentLoopData = $mosaicThumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <img src="<?php echo e($m); ?>" alt="" loading="lazy"
                                        onerror="this.style.display='none'">
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php for($i = $mosaicThumbs->count(); $i < 4; $i++): ?>
                                    <div class="category-card__mosaic-slot"></div>
                                <?php endfor; ?>
                            </div>
                            <div class="category-card__body">
                                <h3>All Courses</h3>
                                <p class="category-card__all-cta">View All Courses &rarr;</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        
        <?php if (isset($component)) { $__componentOriginala02b71ca7fa3d8670dc711f95469e1f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala02b71ca7fa3d8670dc711f95469e1f3 = $attributes; } ?>
<?php $component = App\View\Components\Slider::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('slider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Slider::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala02b71ca7fa3d8670dc711f95469e1f3)): ?>
<?php $attributes = $__attributesOriginala02b71ca7fa3d8670dc711f95469e1f3; ?>
<?php unset($__attributesOriginala02b71ca7fa3d8670dc711f95469e1f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala02b71ca7fa3d8670dc711f95469e1f3)): ?>
<?php $component = $__componentOriginala02b71ca7fa3d8670dc711f95469e1f3; ?>
<?php unset($__componentOriginala02b71ca7fa3d8670dc711f95469e1f3); ?>
<?php endif; ?>

        
        <?php if(isset($testimonials) && $testimonials->count() > 0): ?>
            <section class="testimoni">
                <div class="container">
                    <h2>Testimoni</h2>
                    <div class="testi-grid">
                        <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $img = $testi->image ?? null;
                                if ($img) {
                                    if (str_starts_with($img, 'images/testimonials/')) {
                                        $imgUrl = asset('storage/' . $img);
                                    } elseif (str_starts_with($img, 'images/')) {
                                        $imgUrl = asset($img);
                                    } else {
                                        $imgUrl = asset('storage/' . $img);
                                    }
                                } else {
                                    $imgUrl = asset('images/avatar-placeholder.svg');
                                }
                            ?>
                            <article class="testi-card">
                                <svg class="testi-card__icon" viewBox="0 0 32 32" aria-hidden="true">
                                    <path
                                        d="M9.4 8C5.9 8 3 10.9 3 14.4v9.6h9.6V14.4H7.8c0-1.7 1.4-3.2 3.2-3.2V8H9.4zm12.8 0c-3.5 0-6.4 2.9-6.4 6.4v9.6h9.6V14.4h-4.8c0-1.7 1.4-3.2 3.2-3.2V8h-1.6z" />
                                </svg>
                                <p class="testi-quote"><?php echo e($testi->quote ?? ($testi->message ?? '')); ?></p>
                                <div class="testi-meta">
                                    <img class="testi-meta__avatar" src="<?php echo e($imgUrl); ?>"
                                        alt="<?php echo e($testi->name); ?>" loading="lazy">
                                    <div class="testi-meta__text">
                                        <span class="testi-meta__name"><?php echo e($testi->name); ?></span>
                                        <span class="testi-meta__role"><?php echo e($testi->role ?? ''); ?></span>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        
        <?php if (isset($component)) { $__componentOriginal9a832d76029d535741abf550da1dfcb2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a832d76029d535741abf550da1dfcb2 = $attributes; } ?>
<?php $component = App\View\Components\Gallery::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('gallery'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Gallery::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a832d76029d535741abf550da1dfcb2)): ?>
<?php $attributes = $__attributesOriginal9a832d76029d535741abf550da1dfcb2; ?>
<?php unset($__attributesOriginal9a832d76029d535741abf550da1dfcb2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a832d76029d535741abf550da1dfcb2)): ?>
<?php $component = $__componentOriginal9a832d76029d535741abf550da1dfcb2; ?>
<?php unset($__componentOriginal9a832d76029d535741abf550da1dfcb2); ?>
<?php endif; ?>

        
        <?php if (isset($component)) { $__componentOriginalc457016352c9443b6633e7dc1fd2d1f7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc457016352c9443b6633e7dc1fd2d1f7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.faq','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('faq'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc457016352c9443b6633e7dc1fd2d1f7)): ?>
<?php $attributes = $__attributesOriginalc457016352c9443b6633e7dc1fd2d1f7; ?>
<?php unset($__attributesOriginalc457016352c9443b6633e7dc1fd2d1f7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc457016352c9443b6633e7dc1fd2d1f7)): ?>
<?php $component = $__componentOriginalc457016352c9443b6633e7dc1fd2d1f7; ?>
<?php unset($__componentOriginalc457016352c9443b6633e7dc1fd2d1f7); ?>
<?php endif; ?>

        
        <?php if (isset($component)) { $__componentOriginal077cd3656d60d8750be1c5b824abe042 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal077cd3656d60d8750be1c5b824abe042 = $attributes; } ?>
<?php $component = App\View\Components\Universities::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('universities'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Universities::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal077cd3656d60d8750be1c5b824abe042)): ?>
<?php $attributes = $__attributesOriginal077cd3656d60d8750be1c5b824abe042; ?>
<?php unset($__attributesOriginal077cd3656d60d8750be1c5b824abe042); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal077cd3656d60d8750be1c5b824abe042)): ?>
<?php $component = $__componentOriginal077cd3656d60d8750be1c5b824abe042; ?>
<?php unset($__componentOriginal077cd3656d60d8750be1c5b824abe042); ?>
<?php endif; ?>
    </main>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/index.blade.php ENDPATH**/ ?>
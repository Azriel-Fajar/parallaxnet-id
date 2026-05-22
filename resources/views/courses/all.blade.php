<x-app-layout cssFile="home">
    <main>
        <section class="course-grid-section" style="padding-top:6.5rem;padding-bottom:3rem;">
            <div class="container">
                <x-back-button :href="route('home')" />
                <h1>All Courses</h1>

                @if ($courseCategories->isEmpty() || $courseCategories->every(fn($c) => $c->courses->isEmpty()))
                    <p class="empty-state">Belum ada kursus.</p>
                @else
                    @foreach ($courseCategories as $category)
                        @if ($category->courses->isNotEmpty())
                            <div class="course-category-block">
                                <h3 class="course-category-title">{{ $category->name }}</h3>
                                <div class="course-tile-grid">
                                    @foreach ($category->courses as $course)
                                        @php $tileUrl = $categoryRoutes[$category->name] ?? '#'; @endphp
                                        <a href="{{ $tileUrl }}" class="course-tile">
                                            <div class="course-tile__thumb">
                                                @if ($course->image)
                                                    <img src="{{ asset('storage/' . $course->image) }}"
                                                        alt="{{ $course->name }}" loading="lazy"
                                                        onerror="this.style.display='none'">
                                                @endif
                                            </div>
                                            <p>{{ $course->name }}</p>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif

                <div class="course-cta">
                    <a href="https://wa.me/6285788220000" target="_blank" rel="noopener"
                        class="cta-button cta-accent">Daftar via WhatsApp</a>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>

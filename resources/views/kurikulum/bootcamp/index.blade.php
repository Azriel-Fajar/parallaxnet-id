<x-kurikulum cssFile="course" cssKurikulum=true>    <x-course.hero
        eyebrow="Parallaxnet"
        title="Bootcamp"
        tagline="Bootcamp online intensif untuk tiga jalur karier: Web, AI, dan Hacker." />

    <x-course.section eyebrow="Overview" title="Tentang Bootcamp" variant="overview">
        <p>Bootcamp online intensif yang membekali keterampilan teknis mendalam pada tiga jalur karier: Web, AI, dan Hacker. Setiap jalur menyajikan proyek praktis berbasis dunia nyata untuk mempersiapkan peserta menghadapi tantangan industri teknologi.</p>
    </x-course.section>

    <x-course.section eyebrow="Pilih Jalur" title="Tiga jalur bootcamp">
        <ul class="course-hub">
            <li><a class="course-hub__link" href="{{ route('bootcamp.webdev') }}">Web Bootcamp<span class="course-hub__link-sub">Full stack dari nol ke deploy</span></a></li>
            <li><a class="course-hub__link" href="{{ route('bootcamp.ai') }}">AI Bootcamp<span class="course-hub__link-sub">Python, ML, deep learning</span></a></li>
            <li><a class="course-hub__link" href="{{ route('bootcamp.hacker') }}">Hacker Bootcamp<span class="course-hub__link-sub">Ofensif & defensif siber</span></a></li>
        </ul>
    </x-course.section>
</x-kurikulum>


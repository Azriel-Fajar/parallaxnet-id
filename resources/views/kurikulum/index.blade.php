<x-kurikulum cssFile="course" cssKurikulum=true>    <x-course.hero
        eyebrow="Parallaxnet"
        title="Kurikulum"
        tagline="Pilih jalur belajar yang sesuai â€” dari fondasi IT, bootcamp intensif, professional course, hingga Bahasa Inggris." />

    <x-course.section eyebrow="Pilih Program" title="Empat jalur belajar">
        <ul class="course-hub">
            <li><a class="course-hub__link" href="{{ route('standar') }}">Basic Course<span class="course-hub__link-sub">Fondasi 7 keterampilan IT</span></a></li>
            <li><a class="course-hub__link" href="{{ route('bootcamp') }}">Bootcamp<span class="course-hub__link-sub">Web / AI / Hacker</span></a></li>
            <li><a class="course-hub__link" href="{{ route('profesional') }}">Professional Course<span class="course-hub__link-sub">Cybersecurity / Ethical Hacker / IoT</span></a></li>
            <li><a class="course-hub__link" href="{{ route('inggris') }}">English Course<span class="course-hub__link-sub">Speaking, aksen, TOEFL</span></a></li>
        </ul>
    </x-course.section>
</x-kurikulum>


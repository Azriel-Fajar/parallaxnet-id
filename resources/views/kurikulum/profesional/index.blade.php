<x-kurikulum cssFile="course" cssKurikulum=true>    <x-course.hero
        eyebrow="Parallaxnet"
        title="Professional Course"
        tagline="Tiga bidang fokus lanjutan: Cybersecurity, Ethical Hacker, dan IoT." />

    <x-course.section eyebrow="Overview" title="Tentang Professional Course" variant="overview">
        <p>Professional Course dirancang memberi pengetahuan mendalam dan keterampilan teknis lanjutan pada tiga bidang fokus: Cybersecurity, Ethical Hacker, dan IoT. Setiap kursus menyajikan pengalaman praktis dengan materi yang relevan dengan kebutuhan industri saat ini, dapat diakses fleksibel melalui LMS.</p>
    </x-course.section>

    <x-course.section eyebrow="Pilih Fokus" title="Tiga bidang spesialisasi">
        <ul class="course-hub">
            <li><a class="course-hub__link" href="{{ route('profesional.cybersecurity') }}">Cybersecurity<span class="course-hub__link-sub">Strategi keamanan organisasi</span></a></li>
            <li><a class="course-hub__link" href="{{ route('profesional.ethicalhacker') }}">Ethical Hacker<span class="course-hub__link-sub">NMAP, Metasploit, Hydra</span></a></li>
            <li><a class="course-hub__link" href="{{ route('profesional.iot') }}">IoT<span class="course-hub__link-sub">Sensor, ESP32, LoRaWAN, MQTT</span></a></li>
        </ul>
    </x-course.section>
</x-kurikulum>


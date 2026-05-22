<x-app-layout cssFile="tentang-kami">
    <main>
        <section id="sec-1">
            <x-back-button :href="route('home')" />
            <div class="container">
                <div class="wrapper_1">
                    <h2>tentang kami</h2>
                    <h3>Mengapa Kami Hadir</h3>
                    <p>Parallaxnet mempunyai misi untuk merevolusi pendidikan dengan memperkenalkan pendekatan mutakhir
                        yang menempatkan pembelajaran praktis dan langsung di garis depan pengalaman pendidikan. Inti
                        dari perjalanan transformatif ini adalah integrasi Virtalus HyperCX Cloud, yang didukung oleh
                        platform opensource OpenNebula. Parallaxnet percaya bahwa model pendidikan tradisional, meskipun
                        berharga, sering kali gagal dalam mempersiapkan siswa menghadapi lanskap teknologi yang
                        berkembang pesat di abad ke-21. Untuk menjembatani kesenjangan ini, Parallaxnet membayangkan
                        kurikulum empat tahun yang secara mulus memadukan kursus teknologi dan bisnis, memberikan siswa
                        pemahaman holistik tentang dunia digital.</p>

                    <p>Intinya, misi Parallaxnet adalah melahirkan generasi lulusan yang tidak hanya unggul di bidangnya
                        masing-masing tetapi juga memiliki pemahaman mendalam tentang hubungan simbiosis antara
                        teknologi dan bisnis. Dengan memanfaatkan kekuatan pendidikan praktis dan langsung yang
                        disampaikan melalui platform Cloud, Parallaxnet bertujuan untuk menghasilkan individu yang
                        berpengetahuan luas, inovatif, dan siap menghadapi masa depan yang siap membentuk masa depan
                        dunia digital kita.</p>
                </div>
                <div class="wrapper_2">
                    <div class="wrapper_img">
                        <img src="{{ asset('images/slogan.png') }}" alt="">
                    </div>
                    <div class="wrapper_data">
                        <div class="data">
                            <a href="{{ route('benefit') }}">Benefit</a>
                        </div>
                        <div class="data">
                            <a href="{{ route('teknologi') }}">Teknologi</a>
                        </div>
                        <div class="data">
                            <a href="{{ route('os') }}">100+ OS</a>
                        </div>
                        <div class="data">
                            <a href="{{ route('impact') }}">Impact</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="sec-2">
            <div class="container">
                <div class="wrapper_img">
                    <img src="{{ asset('images/Direktur Parallaxnet ID.png') }}" alt="">
                </div>
                <div class="wrapper_desc">

                    <div class="founder">
                        <h2>Marsda Purn TNI (Purn) A. Joko Takarianto</h2>
                        <h3>ceo, pt parallaxnet siber indonesia</h3>
                    </div>
                    <div class="text">
                        <p>Dunia kita berkembang dengan kecepatan yang belum pernah terjadi sebelumnya, sebagian besar
                            didorong oleh inovasi teknologi. Saat kita menavigasi lanskap yang berubah dengan cepat ini,
                            penting bagi kita untuk mempertimbangkan dampak kemajuan ini terhadap pendidikan anak-anak
                            kita dan, pada akhirnya, masa depan mereka.</p>

                        <p>Teknologi telah menjadi bagian integral dari pendidikan, mengubah cara anak-anak kita belajar
                            dan berinteraksi dengan dunia. Dengan munculnya alat digital, sumber daya online, dan
                            platform e-learning, pendidikan telah melampaui batas-batas ruang kelas tradisional.
                            Aksesibilitas terhadap informasi dan materi pembelajaran berpotensi memberdayakan anak-anak
                            untuk mengeksplorasi minat mereka, menumbuhkan keterampilan berpikir kritis, dan terlibat
                            dalam pembelajaran seumur hidup. Kita harus mengatasi kesenjangan digital yang ada di
                            masyarakat kita. Tidak semua anak memiliki akses yang sama terhadap teknologi, sehingga
                            dapat memperburuk kesenjangan pendidikan. Menjembatani kesenjangan ini bukan hanya soal
                            penyediaan perangkat dan akses internet, namun juga memastikan bahwa konten pendidikan
                            bersifat inklusif dan dapat diakses oleh semua orang.</p>

                        <p>Kita harus memanfaatkan potensi teknologi untuk memberdayakan anak-anak kita dengan
                            pengetahuan dan keterampilan penting. Dengan melakukan hal ini, kita dapat mempersiapkan
                            anak-anak kita untuk berkembang di dunia yang terus berubah dan menciptakan masa depan yang
                            lebih cerah bagi generasi mendatang.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="sec-3">
            <div class="container">
                <div class="wrapper_text">
                    <h3>Parallaxnet</h3>
                    <h2>Keuntungan</h2>
                    <h4>Persiapkan siswa kita untuk masa depan</h4>
                    <div class="text">
                        <p>Kurikulum Parallaxnet dirancang berwawasan ke depan, menggabungkan teknologi baru dan tren
                            industri.</p>
                        <p>Parallaxnet bertujuan untuk membekali lulusan kami dengan keterampilan dan kemampuan
                            beradaptasi yang diperlukan untuk berkembang dalam lanskap digital yang terus berkembang.
                            Dengan menekankan pada inovasi, pemecahan masalah, dan kewirausahaan, kami memastikan bahwa
                            siswa kami tidak hanya siap menghadapi pekerjaan saat ini namun juga siap untuk membentuk
                            pekerjaan di masa depan.</p>
                        <p>Pendidikan Parallaxnet yang berkualitas tinggi, fokus pada keterampilan dunia nyata, dan
                            komitmen untuk menghasilkan lulusan yang kompetitif, semuanya diarahkan untuk memberdayakan
                            siswa untuk menjadi pemimpin masa depan dan pembuat perubahan di bidangnya masing-masing.
                        </p>
                    </div>
                </div>
                <div class="wrapper_img">
                    <img src="{{ asset('images/teamwork.jpg') }}" alt="">
                </div>
            </div>
    </main>
</x-app-layout>

<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Apa itu Parallaxnet?',
                'answer' => 'Parallaxnet adalah platform pembelajaran online global yang berfokus pada bidang Teknologi Informasi. Parallaxnet menghadirkan pembelajaran praktis, fleksibel, dan berbasis kompetensi untuk membantu peserta mengembangkan skill digital yang relevan dengan kebutuhan masa depan.',
            ],
            [
                'question' => 'Siapa saja yang bisa mengikuti program Parallaxnet?',
                'answer' => 'Program Parallaxnet dapat diikuti oleh pelajar, mahasiswa, guru, dosen, fresh graduate, profesional, institusi pendidikan, maupun masyarakat umum yang ingin meningkatkan keterampilan di bidang teknologi informasi.',
            ],
            [
                'question' => 'Apakah program Parallaxnet cocok untuk pemula?',
                'answer' => 'Ya. Parallaxnet menyediakan program dasar seperti Basic Course yang dirancang untuk peserta pemula. Program ini mencakup cloud computing, cybersecurity basic, software engineering, networking, Python, business course, dan techpreneur.',
            ],
            [
                'question' => 'Apakah pembelajaran dilakukan secara online atau offline?',
                'answer' => 'Pembelajaran Parallaxnet dilakukan secara online melalui LMS (Learning Management System). Peserta dapat mengakses materi secara fleksibel menggunakan perangkat yang tersedia, kapan saja dan dari mana saja.',
            ],
            [
                'question' => 'Berapa lama durasi belajar di Parallaxnet?',
                'answer' => 'Durasi belajar dapat berbeda sesuai program yang dipilih. Untuk Program Basic, peserta biasanya dapat menyelesaikan dalam minimal 3 bulan hingga 7 bulan. Pada skema integrasi kurikulum kampus, durasi belajarnya hingga 4 semester sesuai kebutuhan.',
            ],
            [
                'question' => 'Paket apa saja yang bisa saya ambil?',
                'answer' => "Peserta dapat memilih beberapa paket utama, yaitu:\n- Basic Course\n- Berbagai Bootcamp\n- Professional Courses\n- Individual Course (non-paket)\n- English Pro (non-paket)\n\nSetiap paket memiliki fokus kompetensi yang berbeda, mulai dari dasar teknologi, pengembangan web, artificial intelligence, cybersecurity, hingga speaking Bahasa Inggris.",
            ],
            [
                'question' => 'Apakah Parallaxnet berbayar?',
                'answer' => 'Ya, beberapa program Parallaxnet memiliki biaya sertifikasi dan akses program. Namun, Parallaxnet juga menyediakan skema subsidi sehingga biaya peserta dapat menjadi lebih terjangkau.',
            ],
            [
                'question' => 'Apakah Parallaxnet menyediakan beasiswa atau subsidi biaya?',
                'answer' => 'Ya. Parallaxnet menyediakan subsidi biaya hingga 90% melalui dukungan Virtalus.com untuk beberapa program. Skema ini membantu peserta mendapatkan akses pembelajaran dan sertifikasi dengan biaya yang lebih ringan.',
            ],
            [
                'question' => 'Bagaimana cara mendaftar kursus di Parallaxnet?',
                'answer' => 'Peserta dapat mendaftar melalui website resmi Parallaxnet atau menghubungi admin melalui WhatsApp.',
            ],
            [
                'question' => 'Apakah tersedia mentor atau pembimbing selama belajar?',
                'answer' => 'Parallaxnet menyediakan sistem pembelajaran melalui LMS dan dukungan pembelajaran sesuai program yang diikuti.',
            ],
            [
                'question' => 'Di mana saya bisa mendapatkan informasi lebih lanjut terkait Parallaxnet?',
                'answer' => "Informasi lebih lanjut dapat diperoleh melalui:\n- Website: www.parallaxnet.id\n- WhatsApp: +6285788220000\n- Email: info@parallaxnet.id\n- Instagram: @parallaxnet.id",
            ],
            [
                'question' => 'Sertifikasi Parallaxnet berstandar apa?',
                'answer' => 'Sertifikasi Parallaxnet merupakan Sertifikasi Internasional Parallaxnet USA.',
            ],
            [
                'question' => 'Apakah Sertifikasi Parallaxnet ada expirednya?',
                'answer' => 'Tidak. Sertifikasi Parallaxnet tidak memiliki masa expired atau masa kedaluwarsa. Sertifikat yang diperoleh peserta dapat digunakan sebagai bukti kompetensi setelah menyelesaikan program sesuai ketentuan yang berlaku di Parallaxnet.',
            ],
            [
                'question' => 'Apakah sertifikat Parallaxnet bisa digunakan untuk melamar kerja?',
                'answer' => 'Ya. Sertifikat Parallaxnet dapat digunakan sebagai dokumen pendukung untuk CV, portofolio, LinkedIn, maupun kebutuhan melamar kerja, terutama karena programnya berfokus pada keterampilan praktis di bidang teknologi informasi.',
            ],
            [
                'question' => 'Apa itu cloud atau virtual machine?',
                'answer' => 'Cloud atau virtual machine adalah fasilitas komputer virtual berbasis internet yang dapat digunakan peserta untuk praktik. Dengan fasilitas ini, peserta dapat belajar dan menjalankan aplikasi tanpa harus selalu bergantung pada spesifikasi komputer pribadi yang tinggi.',
            ],
            [
                'question' => 'Berapa lama masa akses cloud atau virtual machine?',
                'answer' => "Fasilitas mesin virtual diberikan untuk masa langganan hingga 2 tahun, dengan spesifikasi:\n- 2 vCore\n- 2 GB RAM\n- Penyimpanan cloud 25 GB\n- Akses ke lebih dari 100 aplikasi open-source perusahaan",
            ],
        ];

        foreach ($faqs as $index => $faq) {
            Faq::updateOrCreate(
                ['question' => $faq['question']],
                [
                    'answer' => $faq['answer'],
                    'sort_order' => $index + 1,
                ]
            );
        }
    }
}

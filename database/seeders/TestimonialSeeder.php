<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'name' => 'Achmad Dhalail Fauzi',
                'role' => 'Mahasiswa UMKT · Kalimantan Timur',
                'quote' => 'Untuk sejauh ini materi sertifikasi yang diberikan cukup baik, setiap bab dari materinya cukup jelas dan saling berkaitan, saya merasa sangat terbantu dengan adanya sertifikasi yang diselenggarakan oleh kerjasama antara UMKT dan parallaxnet.',
                'image' => 'images/achmad.jpg',
                'sort_order' => 1,
            ],
            [
                'name' => 'Aisiah Nur Azizah',
                'role' => 'Siswa Yayasan GCM · Bandung',
                'quote' => 'Materi yang diberikan sangat lengkap dan sistematis, penjelasannya bisa langsung dipahami bagi pemula seperti saya. Kita selalu didampingi, dipantau dan dipastikan tidak ada kendala di setiap tahapannya. Terbaik!',
                'image' => 'images/aisiah.jpg',
                'sort_order' => 2,
            ],
            [
                'name' => 'Azriel Fajar Wicaksono',
                'role' => 'Mahasiswa UKSW · Jawa Tengah',
                'quote' => 'Aplikasi LMS yang disediakan sudah sangat bagus dan mampu secara efektif menyampaikan materi pembelajaran. Dengan tampilan yang user-friendly, siswa bisa mengakses materi kapan saja dan di mana saja.',
                'image' => 'images/azriel.jpg',
                'sort_order' => 3,
            ],
        ];

        foreach ($items as $item) {
            Testimonial::updateOrCreate(
                ['name' => $item['name']],
                $item
            );
        }
    }
}

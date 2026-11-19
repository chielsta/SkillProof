<?php

namespace Database\Seeders;

use App\Models\ProjectCatalog;
use Illuminate\Database\Seeder;

class ProjectCatalogSeeder extends Seeder
{
    public function run(): void
    {
        $catalogs = [
            [
                'title' => 'Build REST API with Laravel',
                'description' => 'Membangun REST API sederhana untuk manajemen tugas dengan autentikasi menggunakan Laravel.',
                'difficulty' => 'medium',
                'skills' => ['Laravel', 'MySQL', 'REST API', 'API'],
                'references' => [
                    ['title' => 'Dokumentasi REST API Laravel', 'url' => 'https://laravel.com/docs/controllers#resource-controllers'],
                    ['title' => 'Panduan Standar RESTful API', 'url' => 'https://restfulapi.net/'],
                ],
            ],
            [
                'title' => 'E-Commerce Mini Project',
                'description' => 'Membangun aplikasi e-commerce sederhana dengan fitur keranjang, autentikasi, dan manajemen produk.',
                'difficulty' => 'medium',
                'skills' => ['Laravel', 'MySQL', 'JavaScript'],
                'references' => [
                    ['title' => 'Tutorial CRUD Laravel Eloquent', 'url' => 'https://laravel.com/docs/eloquent'],
                    ['title' => 'Integrasi JavaScript Modern', 'url' => 'https://developer.mozilla.org'],
                ],
            ],
            [
                'title' => 'Blog Platform',
                'description' => 'Membangun platform blog sederhana dengan fitur CRUD, kategori, dan pencarian.',
                'difficulty' => 'easy',
                'skills' => ['Laravel', 'Blade', 'MySQL'],
                'references' => [
                    ['title' => 'Dokumentasi Blade Templating', 'url' => 'https://laravel.com/docs/blade'],
                ],
            ],
            [
                'title' => 'Personal Portfolio Website',
                'description' => 'Website portofolio untuk menampilkan proyek terbaik dan informasi diri dengan tata letak responsif.',
                'difficulty' => 'easy',
                'skills' => ['HTML', 'CSS', 'JavaScript'],
                'references' => [
                    ['title' => 'MDN CSS Flexbox & Grid Guide', 'url' => 'https://developer.mozilla.org'],
                ],
            ],
            [
                'title' => 'Realtime Chat Application',
                'description' => 'Aplikasi percakapan instan real-time dengan status pengiriman pesan langsung menggunakan WebSocket.',
                'difficulty' => 'hard',
                'skills' => ['JavaScript', 'WebSocket', 'PHP', 'MySQL'],
                'references' => [
                    ['title' => 'Pengenalan WebSockets', 'url' => 'https://developer.mozilla.org/en-US/docs/Web/API/WebSockets_API'],
                ],
            ],
        ];

        foreach ($catalogs as $data) {
            ProjectCatalog::updateOrCreate(
                ['title' => $data['title']],
                $data
            );
        }
    }
}

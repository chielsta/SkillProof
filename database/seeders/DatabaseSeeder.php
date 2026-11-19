<?php

namespace Database\Seeders;

use App\Models\InternshipPosition;
use App\Models\PortfolioProject;
use App\Models\Project;
use App\Models\SkillEvidenceMap;
use App\Models\SkillRequirement;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Seed Katalog Rekomendasi Proyek
        $this->call(ProjectCatalogSeeder::class);

        // 2. Akun Demo Mahasiswa (Dinda Putri - sesuai Mockup 01-05)
        $user = User::updateOrCreate(
            ['email' => 'dinda@example.com'],
            [
                'name' => 'Dinda Putri',
                'username' => 'dindaputri',
                'password' => Hash::make('password'),
                'field' => 'Web Developer',
                'bio' => 'Mahasiswa yang tertarik pada pengembangan aplikasi web, khususnya menggunakan Laravel. Saat ini sedang mempersiapkan diri untuk peluang magang di bidang web development.',
                'github_url' => 'https://github.com',
                'linkedin_url' => 'https://linkedin.com',
                'website_url' => 'https://dindaputri.dev',
            ]
        );

        // 3. Proyek Pengguna
        $project1 = Project::updateOrCreate(
            ['user_id' => $user->id, 'title' => 'Sistem Kasir (Laravel)'],
            [
                'description' => 'Aplikasi kasir sederhana dengan fitur manajemen produk, transaksi penjualan, dan laporan keuangan.',
                'status' => 'completed',
                'repo_url' => 'https://github.com/example/sistem-kasir',
                'demo_url' => 'https://demo-kasir.example.com',
                'doc_url' => 'https://docs.example.com',
            ]
        );
        $project1->skills()->delete();
        foreach (['PHP', 'Laravel', 'MySQL', 'Blade'] as $s) {
            $project1->skills()->create(['skill_name' => $s]);
        }

        $project2 = Project::updateOrCreate(
            ['user_id' => $user->id, 'title' => 'Personal Portfolio'],
            [
                'description' => 'Website portofolio responsif untuk menampilkan resume, proyek pilihan, dan kontak profesional.',
                'status' => 'completed',
                'repo_url' => 'https://github.com/example/portfolio',
                'demo_url' => 'https://dindaputri.dev',
            ]
        );
        $project2->skills()->delete();
        foreach (['HTML', 'CSS', 'JavaScript'] as $s) {
            $project2->skills()->create(['skill_name' => $s]);
        }

        $project3 = Project::updateOrCreate(
            ['user_id' => $user->id, 'title' => 'ToDo App (REST API)'],
            [
                'description' => 'REST API untuk manajemen tugas dengan autentikasi berbasis token dan dokumentasi endpoint.',
                'status' => 'in_progress',
                'repo_url' => 'https://github.com/example/todo-api',
                'doc_url' => 'https://documenter.getpostman.com',
            ]
        );
        $project3->skills()->delete();
        foreach (['Laravel', 'MySQL', 'API'] as $s) {
            $project3->skills()->create(['skill_name' => $s]);
        }

        // 4. Proyek yang Ditampilkan di Portofolio Publik
        PortfolioProject::updateOrCreate(
            ['user_id' => $user->id, 'project_id' => $project1->id],
            ['display_order' => 1]
        );
        PortfolioProject::updateOrCreate(
            ['user_id' => $user->id, 'project_id' => $project2->id],
            ['display_order' => 2]
        );
        PortfolioProject::updateOrCreate(
            ['user_id' => $user->id, 'project_id' => $project3->id],
            ['display_order' => 3]
        );

        // 5. Posisi Magang Target (Mockup 01, 02, 03)
        $position = InternshipPosition::updateOrCreate(
            ['user_id' => $user->id, 'title' => 'Web Developer Intern'],
            [
                'company' => 'PT Tech Innovate',
                'description' => 'Kami mencari Web Developer Intern yang memiliki minat dalam pengembangan aplikasi web. Kandidat diharapkan memahami dasar PHP dan Laravel, mampu menggunakan MySQL, serta memiliki pengalaman dengan HTML, CSS, dan JavaScript. Pengalaman dengan Git dan REST API menjadi nilai tambah.',
                'status' => 'active',
            ]
        );

        // 6. Kebutuhan Skill dari Posisi Magang
        $skillsData = [
            ['skill' => 'HTML', 'category' => 'web', 'project' => $project2, 'status' => 'proven'],
            ['skill' => 'CSS', 'category' => 'web', 'project' => $project2, 'status' => 'proven'],
            ['skill' => 'JavaScript', 'category' => 'language', 'project' => null, 'status' => 'partial'],
            ['skill' => 'PHP', 'category' => 'language', 'project' => $project1, 'status' => 'proven'],
            ['skill' => 'Laravel', 'category' => 'framework', 'project' => null, 'status' => 'none'],
            ['skill' => 'MySQL', 'category' => 'database', 'project' => $project1, 'status' => 'proven'],
            ['skill' => 'REST API', 'category' => 'web', 'project' => null, 'status' => 'none'],
            ['skill' => 'Git', 'category' => 'tool', 'project' => $project1, 'status' => 'proven'],
        ];

        foreach ($skillsData as $item) {
            $req = SkillRequirement::updateOrCreate(
                ['position_id' => $position->id, 'skill_name' => $item['skill']],
                ['category' => $item['category']]
            );

            SkillEvidenceMap::updateOrCreate(
                ['requirement_id' => $req->id],
                [
                    'project_id' => $item['project'] ? $item['project']->id : null,
                    'status' => $item['status'],
                ]
            );
        }
    }
}

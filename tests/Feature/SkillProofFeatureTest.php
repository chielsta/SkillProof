<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SkillProofFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        // Seed data lengkap (katalog + akun demo Dinda Putri)
        $this->seed(DatabaseSeeder::class);
        $this->user = User::where('email', 'dinda@example.com')->first();
    }

    public function test_landing_page_can_be_rendered(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('SkillProof');
    }

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertSee('Masuk ke akun');
    }

    public function test_register_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('Buat akun baru');
    }

    public function test_user_can_login_and_redirect_to_dashboard(): void
    {
        $response = $this->post('/login', [
            'email' => 'dinda@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($this->user);
    }

    public function test_dashboard_can_be_rendered_for_authenticated_user(): void
    {
        $response = $this->actingAs($this->user)->get('/dashboard');
        $response->assertStatus(200);
        $response->assertSee('Halo, Dinda Putri!');
        $response->assertSee('Skill Terpenuhi');
        $response->assertSee('Posisi yang Kamu Targetkan');
    }

    public function test_analisis_lowongan_page_can_be_rendered(): void
    {
        $response = $this->actingAs($this->user)->get('/analisis-lowongan');
        $response->assertStatus(200);
        $response->assertSee('Analisis Lowongan');
    }

    public function test_create_analisis_lowongan_screen_can_be_rendered(): void
    {
        $response = $this->actingAs($this->user)->get('/analisis-lowongan/create');
        $response->assertStatus(200);
        $response->assertSee('Input Deskripsi Lowongan');
    }

    public function test_user_can_submit_and_analyze_job_vacancy(): void
    {
        $response = $this->actingAs($this->user)->post('/analisis-lowongan', [
            'title' => 'Backend Laravel Intern',
            'company' => 'PT Solusi Teknologi',
            'description' => 'Kami membutuhkan Backend Intern yang menguasai Laravel, PHP, MySQL, Git, dan REST API.',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('internship_positions', [
            'title' => 'Backend Laravel Intern',
            'user_id' => $this->user->id,
        ]);
    }

    public function test_skill_saya_mapping_page_can_be_rendered(): void
    {
        $response = $this->actingAs($this->user)->get('/skill-saya');
        $response->assertStatus(200);
        $response->assertSee('Pemetaan Bukti Skill');
        $response->assertSee('Sudah ada bukti');
    }

    public function test_proyek_index_can_be_rendered(): void
    {
        $response = $this->actingAs($this->user)->get('/proyek');
        $response->assertStatus(200);
        $response->assertSee('Kelola Proyek Portofolio');
        $response->assertSee('Sistem Kasir (Laravel)');
    }

    public function test_user_can_create_new_project(): void
    {
        $response = $this->actingAs($this->user)->post('/proyek', [
            'title' => 'Mobile Inventory App',
            'description' => 'Aplikasi inventaris berbasis mobile flutter dan rest api.',
            'status' => 'completed',
            'repo_url' => 'https://github.com/dinda/inventory',
            'skills' => 'Flutter, REST API, Dart',
        ]);

        $response->assertRedirect('/proyek');
        $this->assertDatabaseHas('projects', [
            'title' => 'Mobile Inventory App',
            'user_id' => $this->user->id,
        ]);
    }

    public function test_rekomendasi_proyek_can_be_rendered(): void
    {
        $response = $this->actingAs($this->user)->get('/rekomendasi');
        $response->assertStatus(200);
        $response->assertSee('Rekomendasi Proyek');
        $response->assertSee('Build REST API with Laravel');
    }

    public function test_portofolio_index_can_be_rendered(): void
    {
        $response = $this->actingAs($this->user)->get('/portofolio');
        $response->assertStatus(200);
        $response->assertSee('Portofolio Publik');
        $response->assertSee('Dinda Putri');
    }

    public function test_public_portfolio_can_be_viewed_without_login(): void
    {
        $response = $this->get('/p/dindaputri');
        $response->assertStatus(200);
        $response->assertSee('Dinda Putri');
        $response->assertSee('Portofolio');
    }

    public function test_pengaturan_can_be_rendered(): void
    {
        $response = $this->actingAs($this->user)->get('/pengaturan');
        $response->assertStatus(200);
        $response->assertSee('Pengaturan Akun');
        $response->assertSee('Informasi Pribadi & Portofolio', false);
    }
}

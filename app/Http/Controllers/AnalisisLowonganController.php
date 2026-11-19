<?php

namespace App\Http\Controllers;

use App\Models\InternshipPosition;
use App\Models\SkillRequirement;
use Illuminate\Http\Request;

class AnalisisLowonganController extends Controller
{
    public function index(Request $request)
    {
        $positions = $request->user()->internshipPositions()
            ->withCount('skillRequirements')
            ->latest()
            ->get();

        return view('analisis.index', compact('positions'));
    }

    public function create()
    {
        return view('analisis.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:5000'],
            'source_url' => ['nullable', 'url', 'max:500'],
        ]);

        $position = $request->user()->internshipPositions()->create($validated);

        // Ekstraksi skill otomatis dari deskripsi
        $skills = $this->extractSkills($validated['description']);

        foreach ($skills as $skill) {
            $position->skillRequirements()->create([
                'skill_name' => $skill['name'],
                'category' => $skill['category'],
            ]);
        }

        return redirect()->route('analisis-lowongan.show', $position)
            ->with('success', 'Lowongan berhasil dianalisis. Periksa hasil identifikasi skill di bawah.');
    }

    public function show(Request $request, InternshipPosition $analisis_lowongan)
    {
        if ($analisis_lowongan->user_id !== $request->user()->id) {
            abort(403, 'Anda tidak memiliki akses ke lowongan ini.');
        }

        $analisis_lowongan->load('skillRequirements');
        return view('analisis.show', ['position' => $analisis_lowongan]);
    }

    public function destroy(Request $request, InternshipPosition $analisis_lowongan)
    {
        if ($analisis_lowongan->user_id !== $request->user()->id) {
            abort(403, 'Anda tidak memiliki akses untuk menghapus lowongan ini.');
        }

        $analisis_lowongan->delete();
        return redirect()->route('analisis-lowongan.index')->with('success', 'Lowongan berhasil dihapus.');
    }

    /**
     * Ekstraksi skill berdasarkan kamus teknologi
     */
    private function extractSkills(string $description): array
    {
        $skillMap = [
            // Languages
            'PHP' => 'language',
            'JavaScript' => 'language',
            'TypeScript' => 'language',
            'Python' => 'language',
            'Java' => 'language',
            'Go' => 'language',
            'Rust' => 'language',
            'C++' => 'language',
            'C#' => 'language',
            'Ruby' => 'language',
            'Swift' => 'language',
            'Kotlin' => 'language',
            'Dart' => 'language',

            // Frameworks
            'Laravel' => 'framework',
            'React' => 'framework',
            'Vue' => 'framework',
            'Angular' => 'framework',
            'Next.js' => 'framework',
            'Nuxt' => 'framework',
            'Express' => 'framework',
            'Django' => 'framework',
            'Flask' => 'framework',
            'Spring' => 'framework',
            'Rails' => 'framework',
            'Flutter' => 'framework',
            'React Native' => 'framework',
            'Tailwind' => 'framework',
            'Bootstrap' => 'framework',

            // Databases
            'MySQL' => 'database',
            'PostgreSQL' => 'database',
            'MongoDB' => 'database',
            'Redis' => 'database',
            'SQLite' => 'database',
            'Firebase' => 'database',

            // Tools & Platforms
            'Git' => 'tool',
            'Docker' => 'tool',
            'Kubernetes' => 'tool',
            'AWS' => 'tool',
            'GCP' => 'tool',
            'Azure' => 'tool',
            'CI/CD' => 'tool',
            'Linux' => 'tool',
            'Figma' => 'tool',

            // Web Technologies
            'HTML' => 'web',
            'CSS' => 'web',
            'REST API' => 'web',
            'GraphQL' => 'web',
            'WebSocket' => 'web',

            // Concepts
            'OOP' => 'concept',
            'MVC' => 'concept',
            'API' => 'concept',
            'Agile' => 'concept',
            'Scrum' => 'concept',
            'TDD' => 'concept',
        ];

        $found = [];
        $descLower = strtolower($description);

        foreach ($skillMap as $skill => $category) {
            // Cocokkan pola kata secara aman
            if (preg_match('/(?:\b|\W)' . preg_quote(strtolower($skill), '/') . '(?:\b|\W)/i', ' ' . $descLower . ' ')) {
                $found[] = ['name' => $skill, 'category' => $category];
            }
        }

        return $found;
    }
}

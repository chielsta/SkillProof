<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectSkill;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function index(Request $request)
    {
        $projects = $request->user()->projects()
            ->with('skills')
            ->latest()
            ->get();

        return view('proyek.index', compact('projects'));
    }

    public function create()
    {
        return view('proyek.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'status' => ['required', 'in:planning,in_progress,completed'],
            'repo_url' => ['nullable', 'url', 'max:500'],
            'demo_url' => ['nullable', 'url', 'max:500'],
            'doc_url' => ['nullable', 'url', 'max:500'],
            'skills' => ['nullable', 'string'],
        ]);

        $project = $request->user()->projects()->create(
            collect($validated)->except('skills')->toArray()
        );

        if (!empty($validated['skills'])) {
            $skills = array_map('trim', explode(',', $validated['skills']));
            foreach ($skills as $skill) {
                if ($skill) {
                    $project->skills()->create(['skill_name' => $skill]);
                }
            }
        }

        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil ditambahkan.');
    }

    public function show(Request $request, Project $proyek)
    {
        if ($proyek->user_id !== $request->user()->id) {
            abort(403, 'Anda tidak memiliki akses ke proyek ini.');
        }

        return redirect()->route('proyek.edit', $proyek);
    }

    public function edit(Request $request, Project $proyek)
    {
        if ($proyek->user_id !== $request->user()->id) {
            abort(403, 'Anda tidak memiliki akses ke proyek ini.');
        }

        $proyek->load('skills');
        return view('proyek.edit', compact('proyek'));
    }

    public function update(Request $request, Project $proyek)
    {
        if ($proyek->user_id !== $request->user()->id) {
            abort(403, 'Anda tidak memiliki akses untuk mengubah proyek ini.');
        }

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'status' => ['required', 'in:planning,in_progress,completed'],
            'repo_url' => ['nullable', 'url', 'max:500'],
            'demo_url' => ['nullable', 'url', 'max:500'],
            'doc_url' => ['nullable', 'url', 'max:500'],
            'skills' => ['nullable', 'string'],
        ]);

        $proyek->update(collect($validated)->except('skills')->toArray());

        // Sync skills
        $proyek->skills()->delete();
        if (!empty($validated['skills'])) {
            $skills = array_map('trim', explode(',', $validated['skills']));
            foreach ($skills as $skill) {
                if ($skill) {
                    $proyek->skills()->create(['skill_name' => $skill]);
                }
            }
        }

        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil diperbarui.');
    }

    public function destroy(Request $request, Project $proyek)
    {
        if ($proyek->user_id !== $request->user()->id) {
            abort(403, 'Anda tidak memiliki akses untuk menghapus proyek ini.');
        }

        $proyek->delete();
        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil dihapus.');
    }
}

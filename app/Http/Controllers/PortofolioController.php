<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $user->load(['projects.skills', 'portfolioProjects.project.skills']);

        $portfolioProjects = $user->portfolioProjects()
            ->with('project.skills')
            ->orderBy('display_order')
            ->get();

        $allProjects = $user->projects()->with('skills')->get();

        return view('portofolio.index', compact('user', 'portfolioProjects', 'allProjects'));
    }

    public function addProject(Request $request)
    {
        $validated = $request->validate([
            'project_id' => ['required', 'exists:projects,id'],
        ]);

        // Verifikasi proyek milik user sendiri
        $project = $request->user()->projects()->findOrFail($validated['project_id']);

        $maxOrder = $request->user()->portfolioProjects()->max('display_order') ?? 0;

        $request->user()->portfolioProjects()->firstOrCreate(
            ['project_id' => $project->id],
            ['display_order' => $maxOrder + 1]
        );

        return back()->with('success', 'Proyek "' . $project->title . '" berhasil ditambahkan ke portofolio publik.');
    }

    public function removeProject(Request $request, $projectId)
    {
        $request->user()->portfolioProjects()->where('project_id', $projectId)->delete();
        return back()->with('success', 'Proyek berhasil dihapus dari portofolio.');
    }

    /**
     * Tampilan portofolio publik (bisa diakses recruiter tanpa login)
     */
    public function publicView(string $username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $portfolioProjects = $user->portfolioProjects()
            ->with('project.skills')
            ->orderBy('display_order')
            ->get();

        return view('portofolio.public', compact('user', 'portfolioProjects'));
    }
}

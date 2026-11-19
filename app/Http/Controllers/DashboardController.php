<?php

namespace App\Http\Controllers;

use App\Models\ProjectCatalog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $activePosition = $user->activePosition;
        $totalProjects = $user->projects()->count();
        $totalPositions = $user->internshipPositions()->where('status', 'active')->count();

        // Statistik Skill
        $skillStats = ['proven' => 0, 'partial' => 0, 'none' => 0, 'total' => 0];
        $missingRequirements = collect();

        if ($activePosition) {
            $requirements = $activePosition->skillRequirements()->with('evidenceMap')->get();
            $skillStats['total'] = $requirements->count();

            foreach ($requirements as $req) {
                $evidence = $req->evidenceMap->first();
                if ($evidence && $evidence->status === 'proven') {
                    $skillStats['proven']++;
                } elseif ($evidence && $evidence->status === 'partial') {
                    $skillStats['partial']++;
                } else {
                    $skillStats['none']++;
                }
            }

            $missingRequirements = $requirements->filter(function ($req) {
                $evidence = $req->evidenceMap->first();
                return !$evidence || $evidence->status !== 'proven';
            });
        }

        // Persentase Kesiapan Portofolio
        $progress = $skillStats['total'] > 0
            ? round(($skillStats['proven'] / $skillStats['total']) * 100)
            : 0;

        $rekomendasiCount = $missingRequirements->count();

        // Rekomendasi proyek yang cocok untuk dashboard preview
        $suggestedProject = null;
        if ($missingRequirements->isNotEmpty()) {
            $firstMissingSkill = $missingRequirements->first()->skill_name;
            $suggestedProject = ProjectCatalog::whereJsonContains('skills', $firstMissingSkill)->first();
        }
        if (!$suggestedProject) {
            $suggestedProject = ProjectCatalog::first();
        }

        return view('dashboard.index', compact(
            'user', 'activePosition', 'totalProjects', 'totalPositions',
            'skillStats', 'progress', 'rekomendasiCount', 'missingRequirements', 'suggestedProject'
        ));
    }
}

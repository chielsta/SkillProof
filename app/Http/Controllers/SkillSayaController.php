<?php

namespace App\Http\Controllers;

use App\Models\InternshipPosition;
use App\Models\SkillEvidenceMap;
use App\Models\SkillRequirement;
use Illuminate\Http\Request;

class SkillSayaController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $positions = $user->internshipPositions()
            ->where('status', 'active')
            ->with('skillRequirements.evidenceMap.project')
            ->get();

        $selectedPositionId = $request->input('position_id', $positions->first()?->id);
        $selectedPosition = $positions->firstWhere('id', $selectedPositionId);

        $skillMapping = collect();
        $userProjects = $user->projects()->with('skills')->get();

        if ($selectedPosition) {
            $requirements = $selectedPosition->skillRequirements;
            foreach ($requirements as $req) {
                $evidence = $req->evidenceMap->first();
                $matching = $userProjects->filter(function ($project) use ($req) {
                    return in_array($req->skill_name, $project->skill_names);
                });

                $skillMapping->push([
                    'requirement' => $req,
                    'status' => $evidence?->status ?? 'none',
                    'project' => $evidence?->project,
                    'matching_projects' => $matching,
                ]);
            }
        }

        return view('skill.index', compact('positions', 'selectedPosition', 'skillMapping', 'userProjects'));
    }

    public function linkProject(Request $request)
    {
        $user = $request->user();
        $validated = $request->validate([
            'requirement_id' => ['required', 'exists:skill_requirements,id'],
            'project_id' => ['required', 'exists:projects,id'],
        ]);

        // Verifikasi kepemilikan requirement dan project
        $requirement = SkillRequirement::whereHas('position', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->findOrFail($validated['requirement_id']);

        $project = $user->projects()->findOrFail($validated['project_id']);

        SkillEvidenceMap::updateOrCreate(
            ['requirement_id' => $requirement->id],
            [
                'project_id' => $project->id,
                'status' => 'proven',
            ]
        );

        return back()->with('success', 'Bukti proyek untuk skill "' . $requirement->skill_name . '" berhasil dikaitkan.');
    }
}

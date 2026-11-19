<?php

namespace App\Http\Controllers;

use App\Models\ProjectCatalog;
use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $filter = $request->input('filter', 'untuk-kamu');
        $skillFilter = $request->input('skill');

        $activePosition = $user->activePosition;
        $missingSkills = collect();

        if ($activePosition) {
            $missingSkills = $activePosition->skillRequirements()
                ->whereDoesntHave('evidenceMap', fn($q) => $q->where('status', 'proven'))
                ->pluck('skill_name');
        }

        $query = ProjectCatalog::query();

        if ($filter === 'untuk-kamu' && $missingSkills->isNotEmpty()) {
            $query->where(function ($q) use ($missingSkills) {
                foreach ($missingSkills as $skill) {
                    $q->orWhereJsonContains('skills', $skill);
                }
            });
        }

        if ($skillFilter) {
            $query->whereJsonContains('skills', $skillFilter);
        }

        $catalog = $query->get();

        return view('rekomendasi.index', compact('catalog', 'filter', 'missingSkills', 'skillFilter'));
    }
}

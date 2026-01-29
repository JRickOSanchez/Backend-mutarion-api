<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DnaSample;

class StatsController extends Controller
{
    public function index()
    {
        $mutations = DnaSample::where('has_mutation', true)->count();
        $noMutations = DnaSample::where('has_mutation', false)->count();

        return response()->json([
            'count_mutations' => $mutations,
            'count_no_mutation' => $noMutations,
            'ratio' => $noMutations > 0 ? $mutations / $noMutations : 0
        ]);
    }
}

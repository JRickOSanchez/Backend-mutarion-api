<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DnaSample;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function index()
    {
        $mutations = DB::table('dna_samples')->where('has_mutation', true)->count();
        $noMutations = DB::table('dna_samples')->where('has_mutation', false)->count();

        $ratio = $noMutations === 0
            ? 0
            : $mutations / $noMutations;

        return response()->json([
            'count_mutations' => $mutations,
            'count_no_mutation' => $noMutations,
            'ratio' => round($ratio, 2),
        ]);
    }
}

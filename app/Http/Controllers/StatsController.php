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
        $countMutations = DnaSample::where('has_mutation', true)->count();
        $countNoMutation = DnaSample::where('has_mutation', false)->count();

        $total = $countMutations + $countNoMutation;

        $ratio = $total > 0
            ? $countMutations / $total
            : 0;

        return response()->json([
            'count_mutations' => $countMutations,
            'count_no_mutation' => $countNoMutation,
            'ratio' => round($ratio, 2),
        ]);
    }
}

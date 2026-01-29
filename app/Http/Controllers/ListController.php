<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DnaSample;

class ListController extends Controller
{
    public function index()
    {
        $samples = DnaSample::orderBy('created_at', 'desc')
            ->take(10)
            ->get()
            ->map(function ($item) {
                return [
                    'date' => $item->created_at->toDateTimeString(),
                    'dna' => json_decode($item->dna_sequence),
                    'result' => $item->has_mutation ? 'Mutación' : 'No mutación',
                ];
            });

        return response()->json($samples);
    }
}

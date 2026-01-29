<?php

namespace App\Http\Controllers;

use App\Services\MutationDetectorService;
use App\Services\DnaPersistenceService;
use Illuminate\Http\Request;

class MutationController extends Controller
{
    public function detect(
    Request $request,
    MutationDetectorService $service,
    DnaPersistenceService $persistence
) {
    $dna = $request->input('dna');

    if (!is_array($dna)) {
        return response()->json(['error' => 'Formato inválido'], 400);
    }

    try {
        $hasMutation = $service->hasMutation($dna);
    } catch (\InvalidArgumentException $e) {
        return response()->json(['error' => $e->getMessage()], 400);
    }


    $persistence->store($dna, $hasMutation);

    return $hasMutation
        ? response()->json(['message' => 'Mutation detected'], 200)
        : response()->json(['message' => 'No mutation'], 403);
}
}

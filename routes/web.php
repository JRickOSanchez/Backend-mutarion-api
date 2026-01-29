<?php

use Illuminate\Support\Facades\Route;
use App\Services\MutationDetectorService;

Route::get('/test', function (MutationDetectorService $service) {

    $dna = ["ATGCGA","CAGTGC","TTATGT","AGAAGG","CCCCTA","TCACTG"];

    return $service->hasMutation($dna)
        ? 'MUTACIÓN'
        : 'NO MUTACIÓN';
});

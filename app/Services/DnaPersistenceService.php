<?php

namespace App\Services;

use App\Models\DnaSample;

class DnaPersistenceService
{
    public function store(array $dna, bool $hasMutation): void
    {
        $hash = hash('sha256', json_encode($dna));

        if (!DnaSample::where('dna_hash', $hash)->exists()) {
            DnaSample::create([
                'dna_hash' => $hash,
                'has_mutation' => $hasMutation,
            ]);
        }
    }
}
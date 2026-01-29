<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DnaSample extends Model
{
    use HasFactory;

    protected $table = 'dna_samples';
    protected $fillable = [
        'dna_hash',
        'has_mutation',
    ];
    protected $casts = [
        'dna_sequence' => 'array',
        'has_mutation' => 'boolean'
    ];
}

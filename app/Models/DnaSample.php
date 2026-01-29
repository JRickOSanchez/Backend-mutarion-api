<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DnaSample extends Model
{
    use HasFactory;

    protected $fillable = [
        'dna_hash',
        'has_mutation',
    ];
}

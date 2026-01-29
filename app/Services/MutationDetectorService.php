<?php

namespace App\Services;

class MutationDetectorService
{
    private const SEQUENCE_LENGTH = 4;
    private const MIN_MATCHES = 2;

    public function hasMutation(array $dna): bool
    {
        $this->validateDna($dna);

        $matrix = array_map('str_split', $dna);
        $n = count($matrix);
        $matches = 0;

        for ($i = 0; $i < $n; $i++) {
             for ($j = 0; $j < $n; $j++) {

                if ($j + 3 < $n && $this->check($matrix, $i, $j, 0, 1)) $matches++;
                if ($i + 3 < $n && $this->check($matrix, $i, $j, 1, 0)) $matches++;
                if ($i + 3 < $n && $j + 3 < $n && $this->check($matrix, $i, $j, 1, 1)) $matches++;
                if ($i + 3 < $n && $j - 3 >= 0 && $this->check($matrix, $i, $j, 1, -1)) $matches++;

                if ($matches >= self::MIN_MATCHES) {
                    return true;
                }
            }
        }

        return false;
    }

    private function check(array $matrix, int $x, int $y, int $dx, int $dy): bool
    {
        $letter = $matrix[$x][$y];

        for ($k = 1; $k < self::SEQUENCE_LENGTH; $k++) {
            if ($matrix[$x + $dx * $k][$y + $dy * $k] !== $letter) {
                return false;
            }
        }

        return true;
    }

    private function validateDna(array $dna): void
    {
        $n = count($dna);

        foreach ($dna as $row) {
            if (strlen($row) !== $n) {
                throw new \InvalidArgumentException("El ADN debe ser NxN");
            }

            if (!preg_match('/^[ATCG]+$/', $row)) {
                throw new \InvalidArgumentException("Bases nitrogenadas inválidas");
            }
        }
    }
}
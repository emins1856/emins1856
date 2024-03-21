<?php

class CollatzCalculator {
    // Generates the Collatz sequence for a given number
    public function generateSequence(int $n): array {
        $sequence = [];
        while ($n != 1) {
            $sequence[] = $n;
            $n = $this->nextCollatzNumber($n);
        }
        $sequence[] = 1; // Append the last number
        return $sequence;
    }

    // Calculate the next number in the Collatz sequence
    private function nextCollatzNumber(int $n): int {
        return $n % 2 == 0 ? $n / 2 : 3 * $n + 1;
    }

    // Calculates the maximum value in a sequence
    public function findMaxValue(array $sequence): int {
        return max($sequence);
    }

    // Calculates the total iterations to reach 1
    public function calculateIterations(array $sequence): int {
        return count($sequence) - 1;
    }
}

class ArithmeticProgression {
    // Checks if a given sequence is an arithmetic progression and returns the common difference if true
    public function isArithmeticProgression(array $sequence): ?int {
        if (count($sequence) <= 1) {
            return null; // Cannot form an arithmetic progression
        }

        $diff = $sequence[1] - $sequence[0];
        for ($i = 1; $i < count($sequence) - 1; $i++) {
            if ($sequence[$i + 1] - $sequence[$i] != $diff) {
                return null; // Not an arithmetic progression
            }
        }
        return $diff;
    }
}

class CollatzRangeCalculator {
    public function calculateRange(int $start, int $end): array {
        $collatzCalculator = new CollatzCalculator();

        if ($start <= 0 || $end <= 0) {
            throw new InvalidArgumentException("Start and end values must be greater than 0.");
        }
        if ($start >= $end) {
            throw new InvalidArgumentException("Start value must be less than the end value.");
        }

        $results = [];
        for ($i = $start; $i <= $end; $i++) {
            $sequence = $collatzCalculator->generateSequence($i);
            $results[$i] = [
                'sequence' => $sequence,
                'maxValue' => $collatzCalculator->findMaxValue($sequence),
                'iterations' => $collatzCalculator->calculateIterations($sequence)
            ];
        }
        return $results;
    }
}

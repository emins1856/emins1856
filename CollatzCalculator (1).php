<?php

class CollatzCalculator {
    
    public function generateSequence(int $n): array {
        $sequence = [];
        while ($n != 1) {
            $sequence[] = $n;
            $n = $this->nextCollatzNumber($n);
        }
        $sequence[] = 1; 
        return $sequence;
    }

    private function nextCollatzNumber(int $n): int {
        return $n % 2 == 0 ? $n / 2 : 3 * $n + 1;
    }

    public function findMaxValue(array $sequence): int {
        return max($sequence);
    }

    public function calculateIterations(array $sequence): int {
        return count($sequence) - 1;
    }
}

class ArithmeticProgression {
    public function isArithmeticProgression(array $sequence): ?int {
        if (count($sequence) <= 1) {
            return null; 
        }

        $diff = $sequence[1] - $sequence[0];
        for ($i = 1; $i < count($sequence) - 1; $i++) {
            if ($sequence[$i + 1] - $sequence[$i] != $diff) {
                return null; 
            }
        }
        return $diff;
    }
}

class CollatzRangeCalculator extends CollatzCalculator {
    public function calculateRange(int $start, int $end): array {
        if ($start <= 0 || $end <= 0) {
            throw new InvalidArgumentException("Start and end values must be greater than 0.");
        }
        if ($start >= $end) {
            throw new InvalidArgumentException("Start value must be less than the end value.");
        }

        $results = [];
        for ($i = $start; $i <= $end; $i++) {
            $sequence = $this->generateSequence($i);
            $results[$i] = [
                'sequence' => $sequence,
                'maxValue' => $this->findMaxValue($sequence),
                'iterations' => $this->calculateIterations($sequence)
            ];
        }
        return $results;
    }
}

class CollatzRangeHistogramCalculator extends CollatzRangeCalculator {
    public function calculateHistogram(int $start, int $end): array {
        $histogram = [];

        for ($i = $start; $i <= $end; $i++) {
            $sequence = $this->generateSequence($i);
            $iterations = $this->calculateIterations($sequence);

            if (!isset($histogram[$iterations])) {
                $histogram[$iterations] = 0;
            }
            $histogram[$iterations]++;
        }

        return $histogram;
    }
}
?>

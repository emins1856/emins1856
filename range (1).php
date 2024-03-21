<?php

function collatzSequenceDetailed($n) {
    $sequence = [$n]; 
    while ($n > 1) {
        if ($n % 2 == 0) {
            $n /= 2;
        } else {
            $n = 3 * $n + 1;
        }
        $sequence[] = $n; 
    }
    return $sequence;
}

function calculateAndOutputCollatzDetails($start, $end) {
    if ($start <= 0 || $end <= 0) {
        return "Error: Both start and end values must be greater than 0.";
    }
    if ($start >= $end) {
        return "Error: The start value must be less than the end value.";
    }

    for ($i = $start; $i <= $end; $i++) {
        $sequence = collatzSequenceDetailed($i);
        $iterations = count($sequence) - 1;
        $maxValue = max($sequence);
        echo "Number: $i, Iterations: $iterations, Maximum Value Reached: $maxValue, Sequence: " . implode(', ', $sequence) . "<br>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $start = isset($_POST['start']) ? (int)$_POST['start'] : null;
    $end = isset($_POST['end']) ? (int)$_POST['end'] : null;

    if (is_null($start) || is_null($end)) {
        echo "Error: Please provide both a start and an end value.";
    } else {
        $response = calculateAndOutputCollatzDetails($start, $end);
        if (is_string($response)) {
            echo $response; 
        }
    }
} else {
    echo "Please use the form to submit start and end values for the Collatz conjecture calculations.";
}

?>

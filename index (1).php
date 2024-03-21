<?php
require 'CollatzCalculator.php';

$singleResult = [];
$rangeResults = [];
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["number"])) {
        // Single number calculation
        $inputNumber = intval($_POST["number"]);
        $calculator = new CollatzCalculator();
        $sequence = $calculator->generateSequence($inputNumber);
        $singleResult = [
            'number' => $inputNumber,
            'sequence' => $sequence,
            'maxValue' => $calculator->findMaxValue($sequence),
            'iterations' => $calculator->calculateIterations($sequence)
        ];
    } elseif (!empty($_POST["start"]) && !empty($_POST["end"])) {
        // Range calculation
        $start = intval($_POST["start"]);
        $end = intval($_POST["end"]);
        $rangeCalculator = new CollatzRangeCalculator();
        try {
            $rangeResults = $rangeCalculator->calculateRange($start, $end);
        } catch (InvalidArgumentException $e) {
            $error = $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collatz Conjecture Calculator</title>
</head>
<body>
    <h2>Collatz Conjecture Calculator</h2>

    <form method="post" action="">
        <div>
            <label for="number">Enter a single number:</label>
            <input type="number" id="number" name="number">
        </div>
        <div>OR</div>
        <div>
            <label for="start">Start Range:</label>
            <input type="number" id="start" name="start">
            <label for="end">End Range:</label>
            <input type="number" id="end" name="end">
        </div>
        <button type="submit">Calculate</button>
    </form>

    <?php if ($singleResult): ?>
        <h3>Results for <?php echo htmlspecialchars($singleResult['number']); ?>:</h3>
        <p>Sequence: <?php echo implode(", ", $singleResult['sequence']); ?></p>
        <p>Maximum value (highest number) in the sequence: <?php echo $singleResult['maxValue']; ?></p>
        <p>Total iterations (stopping time): <?php echo $singleResult['iterations']; ?></p>
    <?php endif; ?>

    <?php if ($rangeResults): ?>
        <h3>Range Results:</h3>
        <ul>
            <?php foreach ($rangeResults as $number => $details): ?>
                <li>
                    Number: <?php echo $number; ?>, Iterations: <?php echo $details['iterations']; ?>, Maximum Value Reached: <?php echo $details['maxValue']; ?>, Sequence: <?php echo implode(', ', $details['sequence']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if ($error): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
</body>
</html>

 <?php
    function collatzSequence($number) {
        $sequence = [];
        while ($number != 1) {
            $sequence[] = $number;
            if ($number % 2 == 0) {
                $number /= 2;
            } else {
                $number = 3 * $number + 1;
            }
        }
        $sequence[] = 1; // 
        return $sequence;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputNumber = $_POST["number"];
        echo "<h3>Results for $inputNumber:</h3>";
        $sequence = collatzSequence($inputNumber);

       echo "<p>Sequence: " . implode(", ", $sequence) . "</p>";

        $maxValue = max($sequence);
        echo "<p>Maximum value (highest number) in the sequence: $maxValue</p>";

        $iterations = count($sequence) - 1; // Exclude the last "1"
        echo "<p>Total iterations (stopping time): $iterations</p>";
    }
	$number
    ?>

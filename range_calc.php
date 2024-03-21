<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collatz Conjecture Calculator</title>
</head>
<body>
    <h2>Collatz Conjecture Range Calculator</h2>
    <form action="range.php" method="post">
        <label for="start">Start Range:</label>
        <input type="number" id="start" name="start" required>
        <label for="end">End Range:</label>
        <input type="number" id="end" name="end" required>
        <button type="submit">Calculate</button>
    </form>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple PHP Calculator</title>
</head>
<body>

    <h1>Simple PHP Calculator</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];

        switch ($operation) {
            case "add":
                $result = $num1 + $num2;
                break;
            case "subtract":
                $result = $num1 - $num2;
                break;
            case "multiply":
                $result = $num1 * $num2;
                break;
            case "divide":
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    $result = "Cannot divide by zero";
                }
                break;
            default:
                $result = "Invalid operation selected";
        }
        echo "<h2>Result: " . $result . "</h2>";
    }
    ?>

    <form method="post" action="">
        <label for="num1">Number 1:</label>
        <input type="number" id="num1" name="num1" required>
        <br><br>
        
        <label for="num2">Number 2:</label>
        <input type="number" id="num2" name="num2" required>
        <br><br>
        
        <label for="operation">Operation:</label>
        <select id="operation" name="operation">
            <option value="add">Add</option>
            <option value="subtract">Subtract</option>
            <option value="multiply">Multiply</option>
            <option value="divide">Divide</option>
        </select>
        <br><br>
        
        <input type="submit" value="Calculate">
    </form>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the day, month, and year from the form input
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];

    // Combine the year, month, and day into a date
    $dob = "$year-$month-$day";

    // Calculate the age using date_diff and date_create
    $age = date_diff(date_create($dob), date_create('today'))->y;

    // Output the calculated age
    echo "Your age is $age years.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Calculator</title>
</head>
<body>

<h2>Age Calculator</h2>

<!-- Age calculation form with dropdowns for year, month, and day -->
<form method="post" action="">
    <label for="year">Year:</label>
    <select name="year" id="year" required>
        <?php
        // Generate year options from 1900 to the current year
        for ($i = date("Y"); $i >= 1900; $i--) {
            echo "<option value='$i'>$i</option>";
        }
        ?>
    </select><br><br>

    <label for="month">Month:</label>
    <select name="month" id="month" required>
        <option value="01">January</option>
        <option value="02">February</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
    </select><br><br>

    <label for="day">Day:</label>
    <select name="day" id="day" required>
        <?php
        for ($i = 1; $i <= 31; $i++) {
            echo "<option value='".str_pad($i, 2, '0', STR_PAD_LEFT)."'>$i</option>";
        }
        ?>
    </select><br><br>

    <input type="submit" value="Calculate Age">
</form>

</body>
</html>



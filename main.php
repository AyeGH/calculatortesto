<?php
// Initialize variables to avoid undefined errors
$result = "";
$error = "";

// Check if the form was submitted using POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get values from the form inputs
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operator = $_POST["operator"];

    // ===== INPUT VALIDATION =====

    // Check if any input is empty
    if ($num1 === "" || $num2 === "") {
        $error = "Please enter both numbers.";

    // Check if inputs are numeric
    } elseif (!is_numeric($num1) || !is_numeric($num2)) {
        $error = "Please enter valid numeric values.";

    } else {
        // ===== CALCULATION LOGIC =====

        // Addition
        if ($operator == "+") {
            $result = $num1 + $num2;

        // Subtraction
        } elseif ($operator == "-") {
            $result = $num1 - $num2;

        // Multiplication
        } elseif ($operator == "*") {
            $result = $num1 * $num2;

        // Division
        } elseif ($operator == "/") {

            // Prevent division by zero
            if ($num2 == 0) {
                $error = "Division by zero is not allowed.";
            } else {
                $result = $num1 / $num2;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Basic Calculator</title>

    <!-- Embedded CSS for simple and clean UI -->
    <style>
        body {
            font-family: Arial;
            background: #f2f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Card container */
        .card {
            background: white;
            padding: 25px;
            width: 300px;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
            text-align: center;
        }

        /* Form elements */
        input, select, button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            font-size: 16px;
        }

        /* Button styling */
        button {
            background: #4a6cf7;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #3a5bdc;
        }

        /* Error message style */
        .error {
            color: red;
            margin-top: 10px;
        }

        /* Result display */
        .result {
            margin-top: 15px;
            background: #f5f7ff;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="card">
    <h2>Basic Calculator</h2>

    <!-- Calculator Form -->
    <form method="POST">

        <!-- First number input -->
        <input type="text" name="num1" placeholder="Enter first number">

        <!-- Operator selection -->
        <select name="operator">
            <option value="+">Addition (+)</option>
            <option value="-">Subtraction (-)</option>
            <option value="*">Multiplication (×)</option>
            <option value="/">Division (÷)</option>
        </select>

        <!-- Second number input -->
        <input type="text" name="num2" placeholder="Enter second number">

        <!-- Submit button -->
        <button type="submit">Calculate</button>
    </form>

    <?php
    // Display error message if exists
    if ($error != "") {
        echo "<div class='error'>$error</div>";
    }

    // Display result if calculation is successful
    if ($error == "" && $result !== "") {
        echo "<div class='result'>Result: $result</div>";
    }
    ?>
</div>

</body>
</html>
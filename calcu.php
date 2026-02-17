<?php
// Initialize variables to avoid undefined errors
$ounces = "";
$kilograms = "";
$totalValue = "";
$error = "";

// Check if the form was submitted using POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get values from the form inputs
    $goldWeightGrams = $_POST["weight"];
    $pricePerGram = $_POST["price"];

    // INPUT VALIDATION 
    if ($goldWeightGrams === "" || $pricePerGram === "") {
        $error = "Please enter both weight and price per gram.";
    } elseif (!is_numeric($goldWeightGrams) || !is_numeric($pricePerGram)) {
        $error = "Please enter valid numeric values.";
    } else {
        // CALCULATION LOGIC
        $ounces = $goldWeightGrams / 28.3495;  // grams to ounces
        $kilograms = $goldWeightGrams / 1000;  // grams to kilograms
        $totalValue = $goldWeightGrams * $pricePerGram; // total value
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gold Calculator</title>


    <style>
        body {
            font-family: Arial;
            background: #f2f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: white;
            padding: 25px;
            width: 350px;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
            text-align: center;
        }

        input, button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            font-size: 16px;
        }

        button {
            background: #f4b400;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #e09e00;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

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
    <h2>Gold Weight Calculator</h2>

    <!-- Calculator Form -->
    <form method="POST">
        <!-- Gold weight input -->
        <input type="text" name="weight" placeholder="Enter gold weight in grams">

        <!-- Price per gram input -->
        <input type="text" name="price" placeholder="Enter price per gram">

        <!-- Submit button -->
        <button type="submit">Calculate</button>
    </form>

    <?php
    // Display error message if exists
    if ($error != "") {
        echo "<div class='error'>$error</div>";
    }

    // Display results if calculation is successful
    if ($error == "" && $ounces !== "") {
        echo "<div class='result'>";
        echo "Gold weight in grams: $goldWeightGrams g<br>";
        echo "Equivalent in ounces: " . round($ounces, 2) . " oz<br>";
        echo "Equivalent in kilograms: " . $kilograms . " kg<br>";
        echo "Total gold value: " . number_format($totalValue, 2) . "<br>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>

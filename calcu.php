<?php
$pricePerGram = 3500;

$grams = "";
$ounces = "";
$kilograms = "";
$totalValue = "";

if(isset($_POST['grams'])){
    $grams = $_POST['grams'];
    $ounces = $grams / 28.3495;
    $kilograms = $grams / 1000;
    $totalValue = $grams * $pricePerGram;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Gold Conversion</title>

<style>

body{
    margin:0;
    font-family:Arial, sans-serif;
    background:#f2f2f2;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.container{
    background:white;
    padding:50px;
    width:500px;
    border-radius:10px;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
}

h1{
    font-size:30px;
    margin-bottom:25px;
}

input{
    width:100%;
    padding:12px;
    font-size:16px;
    margin-bottom:15px;
    border:1px solid #ccc;
    border-radius:6px;
}

button{
    width:100%;
    padding:12px;
    font-size:16px;
    border:none;
    border-radius:6px;
    background:#333;
    color:white;
    cursor:pointer;
    transition:0.2s ease;
}

button:hover{
    background:#555;
}

.result{
    margin-top:25px;
    font-size:18px;
    line-height:1.6;
}

</style>
</head>

<body>

<div class="container">

<h1>Gold Conversion</h1>

<form method="post">
    <input type="number" name="grams" step="any" placeholder="Enter gold weight (grams)" required>
    <button type="submit">Calculate</button>
</form>

<div class="result">
<?php
if($grams !== ""){
    echo "Gold Weight: $grams grams<br>";
    echo "Ounces: " . round($ounces,2) . " oz<br>";
    echo "Kilograms: " . round($kilograms,3) . " kg<br>";
    echo "Total Gold Value: ₱" . number_format($totalValue);
}
?>
</div>

</div>

</body>
</html>

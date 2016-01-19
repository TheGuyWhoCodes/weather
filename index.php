<?php
$base = "http://api.openweathermap.org/data/2.5/weather?zip=";
$zip = $_POST["name"];
$country = ",us";
$degree = "&units=imperial";
$result = $base . $zip . $country . $degree . "&APPID=4f93138a79c422a9cac41912f152141a";
echo $result;

$predecode = file_get_contents($result);

$test = json_decode($predecode, true);

$page = $_SERVER['PHP_SELF'];
$sec = "200";

?>

<?php
$cookie_name = "zip";

setcookie($cookie_name, $zip, time() + (86400 * 30), "/"); // 86400 = 1 day
?>

<!DOCTYPE html>
<html>
			<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
        <meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <script src = "https://code.jquery.com/jquery-2.1.4.min.js"></script>
			</head>

<form action="index.php" method="post">
Zip: <input type="text" name="name"><br>
<input type="submit">
</form>



<script src = "js/clock.js"></script>

<body>
    <div class="container">
        <div class="card">
            <div class="city"><?php  echo $test['name'] ?></div>
            <div class="date" id = "daymonth"></div>
            <div class="container-sun">
                <svg class="svg-sun" version="1.1" viewBox="0 0 100 100" preserveAspectRatio="xMinYMin meet">
                    <circle cx="50" cy="50" r="35" id="sun"></circle>
                </svg>
            </div>

            <div class="temp">
                <?php  echo floor ($test['main']['temp']) ?>°F
             </div>
        </div>
    </div>

</body>
<div id = "weblogo">
  <a href = "http://chris-a.rocks">
    chris-a.rocks
    </a>
</div>
</html>

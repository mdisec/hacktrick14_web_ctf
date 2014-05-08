<?php
/**
 * Created by PhpStorm.
 * User: mince
 * Date: 5/8/14
 * Time: 6:33 PM
 */
$click = '';
if(isset($_GET['click']) and !empty($_GET['click']))
{
    $click = $_GET['click'];
    $click = htmlspecialchars($click);
    $click = str_replace('+','%2b',$click);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>IntelRAD | Web APP CTF ~ domify</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <script>
        function goToWebsite(e, param, base) {
            window.location = base + param;
        }
    </script>
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <h1>Domify</h1>
        <p></p>
        <p><a href="#" onclick="goToWebsite(this, '1337',  'index.php?click=<? echo $click;?>');" class="btn btn-danger btn-lg" role="button">Click me for redirect</a></p>
    </div>
</div>
</body>
</html>
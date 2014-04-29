<?
include_once("config.php");

if(!loggedIn()):
header('Location: index.php');
endif;
?>
<html>
<head>
    <title>IntelRAD | Web APP CTF ~ Orion</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="page-header"><h2>Member Board</h2></div>
        <div>
            Username : <?php echo htmlentities($_SESSION['login']);?>
        </div>
        <div>
            Is Admin : <?php echo htmlentities($_SESSION['admin']);?>
        </div>
        <div>
            <?php
            if($_SESSION['admin'] == 1)
                echo 'Gratz Flag : Cl1ffBrut00nRulZ'
            ?>
        </div>
        <div><a href="logout.php">Logout</a> </div>
    </div> <!--./row -->

</div> <!--./container -->
</body>
</html>

<?
include_once("config.php");
if(loggedIn())
    header('Location: members.php');

if(isset($_POST['register']))
    header('Location: join.php');

if(isset($_POST["login"]) and isset($_POST["password"]))
{
    if(!($row = checkPass($_POST["login"], $_POST["password"])))
    {
        $error = True;
    } else {
        header("Location: members.php");
    }
}
?>
<html>
<head>
    <title>IntelRAD | Web APP CTF ~ Orion</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="page-header"><h2>Login Form</h2></div>
        <form action="<?=$_SERVER["PHP_SELF"]; ?>" class="form-horizontal" method="POST">
            <fieldset>

                <!-- Form Name -->
                <legend><h3>Have an account? Sign In</h3></legend>
                <?php
                if($error === True)
                {
                    echo '<div class="alert alert-danger">Wrong username and password, you kiddo !!!</div>';
                    unset($error)
                }
                ?>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-1 control-label" for="username"></label>
                    <div class="col-md-12">
                        <input id="username" name="login" type="text" placeholder="Username" class="form-control input-md">
                    </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-1 control-label" for="password"></label>
                    <div class="col-md-12">
                        <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md">
                    </div>
                </div>

                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-1 control-label" for="login"></label>
                    <div class="col-md-5">
                        <button id="login" name="submit" class="btn btn-block btn-success">Login</button>
                    </div>
                    <div class="col-md-5">
                        <button id="forpass" name="register" class="btn btn-block btn-warning">Register</button></div>
                </div>
            </fieldset>
        </form>
    </div> <!--./row -->
</div> <!--./container -->
</body>
</html>

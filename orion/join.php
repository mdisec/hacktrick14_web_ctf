<?
include_once("config.php");
if(loggedIn())
    header('Location: members.php');

if(isset($_POST["submit"]))
{
	if(!($_POST["password"] == $_POST["password2"]))
    {
        $error = 1;
    } else {
        $query = $coll->findOne(array('login' => $_POST['login']));
        if(empty($query)):
            newUser($_POST["login"], $_POST["password"]);
            checkPass($_POST["login"], $_POST["password"]);
            header("Location: members.php");
        else:
            $error = 2;
        endif;
    }
}
?>
<html>
<head>
    <title>IntelRAD | Web APP CTF ~ Orion</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="page-header"><h2>Registration Form</h2></div>
        <form action="<?=$_SERVER["PHP_SELF"]; ?>" class="form-horizontal" method="POST">
            <fieldset>

                <!-- Form Name -->
                <?php
                if($error === 1)
                {
                    echo '<div class="alert alert-danger">Password does not match!</div>';
                } else if ($error === 2){
                    echo '<div class="alert alert-danger">Username already exists, please choose another username.</div>';
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

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-1 control-label" for="password"></label>
                    <div class="col-md-12">
                        <input id="password" name="password2" type="password" placeholder="Password Again" class="form-control input-md">
                    </div>
                </div>

                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-1 control-label" for="login"></label>
                    <div class="col-md-12">
                        <button id="forpass" name="submit" class="btn btn-block btn-warning">Register</button></div>
                </div>
            </fieldset>
        </form>
    </div> <!--./row -->
</div> <!--./container -->
</body>
</html>


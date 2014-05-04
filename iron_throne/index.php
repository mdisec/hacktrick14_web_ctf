<?php
include('lib/Crypt/RSA.php');
require('config.php');
if($_POST)
{
    if(!isset($_POST['encrypted_data']) or empty($_POST['encrypted_data']))
    {
        echo "Cnm sen MsgLsun gaLib@...";
        exit(0);
    }
    $rsa = new Crypt_RSA();
    $rsa->loadKey($private_key);
    $rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_PKCS1);
    $plain_text = $rsa->decrypt(base64_decode($_POST['encrypted_data']));

    if( ! $plain_text ){
        echo "Decryption error!";exit(0);
    }
    //
    $param = '';
    parse_str(str_replace(", ", "&", $plain_text), $param);
    //
    $mysqli = new mysqli("localhost", "root", "qwe123!", "hacktrick");
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $query = "SELECT * FROM news WHERE title LIKE '%".$param['keyword']."%'";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

}
?>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <title>IntelRAD | Web APP CTF ~ Iron Throne</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script type="application/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script type="application/javascript" src="js/jsencrypt.js"></script>
        <script type="application/javascript" src="js/jquery.cryptopost.js"></script>
        <script>
            var public_key = '<?php echo preg_replace('/\s+/', ' ', trim($public_key));?>';
        </script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="jumbotron">
                        <h2>Level : Iron Throne</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <form  action="<?=$_SERVER["PHP_SELF"]; ?>" method="POST">
                    <div class="col-lg-9">
                        <input name="keyword" type="text" class="form-control" placeholder="Type something">
                    </div>
                    <div class="col-lg-3">
                        <button type="submit" class="form-control btn btn-success">Search</button>
                    </div>
                </form>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">RESULT</h3>
                        </div>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                // GOING THROUGH THE DATA
                                if($_POST)
                                {
                                    if($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<tr><th>".$row['id']."</th><th>".$row['title']."</th></tr>";
                                        }
                                    }
                                    // CLOSE CONNECTION
                                    mysqli_close($mysqli);
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

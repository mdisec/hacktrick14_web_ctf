<?
function newUser($login, $password)
{
	global $coll;
	$coll->insert(array('login' => (string)$login, 'password' => (string)$password, 'admin' => 0));
	return true;
}

function checkPass($login, $password) 
{
	global $coll;
	$res = $coll->findOne(array('login' => $login, 'password' => $password));
	if($res)
    {
        $_SESSION["login"]=$res['login'];
        $_SESSION["password"]=$res['password'];
        $_SESSION["admin"]=$res['admin'];
        $_SESSION["loggedIn"]=true;
        return true;
    }
    return false;

}

function flushMemberSession()
{
	unset($_SESSION["login"]);
	unset($_SESSION["password"]);
    unset($_SESSION["admin"]);
	unset($_SESSION["loggedIn"]);
	session_destroy();
	return true;
}

function loggedIn()
{
	if($_SESSION['loggedIn']):
	  return true;
	else:
	  return false;
	endif;
}
?>

<?php
ob_start();
error_reporting(0);
try
{
  $m    = new Mongo();
  $db   = $m->hacktrick;
  $coll = $db->users;
}
catch (MongoConnectionException $e)
{
  die('Error connecting to MongoDB server');
} 
catch (MongoException $e) {
  die('Error: ' . $e->getMessage());
}
include_once("functions.php");
session_start();
?>
<?//var_dump($_SESSION);var_dump($_POST);?>
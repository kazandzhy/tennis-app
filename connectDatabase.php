<?php

try
{
  $user = 'pchqvjcytiaeip';
  $password = '87cd5e56bc35f219037b1ab9f97bf1aaef3c5aedee82780b2e75f04db4ebaa12';
  $db = new PDO('pgsql:host=ec2-34-197-141-7.compute-1.amazonaws.com;dbname=dcqcvtd749slki', $user, $password);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

?>
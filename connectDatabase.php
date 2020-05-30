<?php

try
{
  $user = 'xepidrpbrhkkrq';
  $password = '0c7cd609fcedaa2f3d3a0fea7f8d9bbd07d172d97b8d29c534b2d59e0c1ddac4';
  $db = new PDO('pgsql:host=ec2-18-233-32-61.compute-1.amazonaws.com;dbname=d9okmvliqi6qjn', $user, $password);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

?>
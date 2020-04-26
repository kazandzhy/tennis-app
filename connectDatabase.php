<?php

try
{
  $user = 'bzrqyfgyjobpan';
  $password = '48122bfe77676187d328d1852eeccbf7dbed7dbe57e5404d5573f0a1cbb2d45a';
  $db = new PDO('pgsql:host=ec2-50-19-232-205.compute-1.amazonaws.com;dbname=d16rumr94d7rv1', $user, $password);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

?>
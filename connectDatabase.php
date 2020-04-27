<?php

try
{
  $user = 'jlhiwhmjpxqllb';
  $password = '31ab1f47468d1a30b0b91e8b3a616615cdbaa5d361fbb97b2e10513457f801ba';
  $db = new PDO('pgsql:host=ec2-34-195-169-25.compute-1.amazonaws.com;dbname=dfles8eem9kgl2', $user, $password);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

?>
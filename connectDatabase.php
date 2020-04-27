<?php

try
{
  // $user = 'bzrqyfgyjobpan';
  // $password = '48122bfe77676187d328d1852eeccbf7dbed7dbe57e5404d5573f0a1cbb2d45a';
  // $db = new PDO('pgsql:host=ec2-50-19-232-205.compute-1.amazonaws.com;dbname=d16rumr94d7rv1', $user, $password);
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
<?php

require '../vendor/autoload.php';

$app= new \Slim\Slim();


$app->get('/',function(){
  echo json_encode("Hello");

  });
 $app->run();
 ?> 
<?php

define("_APP", dirname(__FILE__) . '/app');

require_once "/vendor/autoload.php";
//require 'PHPMailerAutoload.php';
use\Slim\Slim as Slim;
// During instantiation
$app = new Slim(array(
  'debug' => true
));
require_once _APP . '/controllers/controllers.php';
require_once _APP . '/helper/helper.php';
//require_once("phpmailer/class.phpmailer.php");

$app->run();
<?php
use Slim\Slim;
class helper {
    static function jsonResponse( $error = true, $message = '', $status = '', $data = array() ) {
    $app               = Slim::getInstance();
    $response          = new stdClass();
    $response->error   = $error;
    $response->message = $message;
    $response->status  = $status;
    $response->data    = $data;
    
    //$app->response()->header('Content-Type', 'application/xml', 'charset=utf8');
    //return $app->response()->body(xmlrpc_encode($response));
    
    $app->response()->header('Content-Type', 'application/json', 'charset=utf8');
    return $app->response()->body(json_encode($response));
  }
}

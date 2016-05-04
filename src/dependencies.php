<?php

$container = $app->getContainer();

$container['logger'] = function ($c){
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $handler = new Monolog\Handler\StreamHandler($settings['path'], Monolog\Logger::DEBUG);
    $handler->setFormatter(new Monolog\Formatter\JsonFormatter());
    $logger->pushHandler($handler);
    return $logger;
};

// errors
$container['errorHandler'] = function($c){
  return function($request, $response, $exception) use ($c)
    {

      $c['logger']->error($exception->getMessage());

      $json= array(
        "status"=> 500,
        "developer" => $exception->getMessage()
      );

      return $c['response']
        ->withStatus(500)
        ->withJson($json);

    };
};

$container['notFoundHandler'] = function($c){
  return function($request, $response) use ($c)
    {

      $json= array(
        "status"=> 404,
        "developer" => "Ruta no encontrada: revisa la sintaxis, solo estan admitidas urls del tipo /, recurso, recursos, recursos/id, recursos/id/recurso".PHP_EOL
      );

      $c['logger']->error("not found");

      return $c['response']
        ->withStatus(404)
        ->withJson($json);
    };
};

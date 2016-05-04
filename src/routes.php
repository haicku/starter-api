<?php

$app->get('/', function ($request, $response) {

  echo "root";
});

$app->get('/{resource:\w+[^s]}', function ($request, $response, $args) {

  $resource= $args['resource'];

  print_r($args);
});

$app->get('/{resources:\w+s}', function ($request, $response, $args) {
  echo "plural";

  print_r($args);
});

$app->get('/{resources:\w+s}/{id}', function ($request, $response, $args) {
  echo "plural:id";

  print_r($args);
});

$app->get('/{resources:\w+s}/{id}/{resource:\w+[^s]}', function ($request, $response, $args) {
  echo "plural:id:resource";

  print_r($args);
});

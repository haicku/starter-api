<?php
namespace app\resources;

interface ResourcesInterface
{
  public function __invoke(Request $request, Response $response, $args = []);

  public function read();
}
?>

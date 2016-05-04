<?php
namespace app\resources;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class Resources
{
  protected $logger;
  protected $settings;
  protected $request;
  protected $response;

  public function __construct($logger, $settings=array()){
    $this->logger=$logger;
    $this->settings=$settings;
  }

}
?>

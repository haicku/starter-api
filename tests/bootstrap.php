<?php

define('PROJECT_ROOT', realpath(__DIR__ . '/..'));
define('PHPUNIT', true);
define('BASE_URI', 'http://localhost/starter-api');

///////////////////////

// Settings to make all errors more obvious during testing
error_reporting(-1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
date_default_timezone_set('UTC');

require_once PROJECT_ROOT . '/vendor/autoload.php';
require_once PROJECT_ROOT . '/src/settings_defined.php';

class AppTest extends \PHPUnit_Framework_TestCase
{
    protected $http=null;
    protected $app=null;
    protected $logger=null;

    public function __construct(){

      $this->http = new GuzzleHttp\Client([
        'base_uri' => BASE_URI,
        'timeout'  => 2.0,
      ]);
      
      $this->logger = new Monolog\Logger('AppTest');
        $this->logger->pushProcessor(new Monolog\Processor\UidProcessor());
        $handler = new Monolog\Handler\StreamHandler(PROJECT_ROOT . '/logs/test.log', Monolog\Logger::DEBUG);
        //$handler->setFormatter(new Monolog\Formatter\JsonFormatter());
        $this->logger->pushHandler($handler);
    }

    public function getSlimInstance() {
      $app = new \Slim\App(array(
          'version'        => '0.0.0',
          'debug'          => true,
          'mode'           => 'testing'
      ));

      // Include our core application file
      require PROJECT_ROOT . '/index.php';
      return $app;
    }

}

interface AppTestInterface
{

}

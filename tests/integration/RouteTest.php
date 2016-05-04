<?php

class RouteTest extends AppTest
{
    public function testRoot(){

      $client = new GuzzleHttp\Client();
      $res = $client->request('GET', 'http://localhost/starter-api/version' );

      $status= $res->getStatusCode();

      $json= json_encode((string)$res->getBody());

      $this->assertSame($status,200);
    }

}

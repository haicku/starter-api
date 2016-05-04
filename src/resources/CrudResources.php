<?php
namespace app\resource;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class CrudResources extends Resources
{

    public function __invoke(Request $request, Response $response, $args = []){
        $this->request=$request;
        $this->response=$response;

        $crudTranslation= array(
          "POST"=> "create",
          "GET" => "read",
          "PUT" => "update",
          "DELETE" => "delete"
        );
        $httpVerb= $request->getMethod();
        $crudVerb= $crudTranslation[$httpVerb];

        $id= isset($args['id'])?$args['id']:false;
        $resource= isset($args['resource'])?$args['resource']:false;

        if(!method_exists($this->$crudVerb))
          throw new \Exception("method $crudVerb does not exists in $this");

        return $this->$crudVerb($id,$resource);
    }

}
?>

<?php
/**
 * Created by PhpStorm.
 * User: barry
 * Date: 2020/10/10
 * Time: 15:33
 */

namespace Rebuild\HttpServer;

class Server
{

    public function onRequest($request, $response){
        $response->header("Content-Type","text/html; charset=utf-8");
        $response->end("<h1>Hello Swoole. #".rand(1000,9999)."</h1>");
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: barry
 * Date: 2020/10/10
 * Time: 14:33
 */

namespace Rebuild\Server;

use Swoole\Server as SwooleServer;
use Swoole\Http\Server as SwooleHttpServer;

class Server implements ServerInterface
{

    /**
     * @var SwooleServer
     */
    protected $server;

    public function __construct()
    {
    }

    public function init(array $config): ServerInterface
    {
        foreach ($config['servers'] as $server){
            //暂时只支持配置一个server
            $this->server = new SwooleHttpServer($server['host'],$server['port'],$server['type'],$server['sock_type']);
            $this->registerSwooleEvents($server['callbacks']);
            break;

        }
        return $this;

    }

    public function start()
    {
        $this->getServer()->start();
    }

    public function getServer()
    {
        return $this->server;
    }

    protected function registerSwooleEvents(array $callbacks)
    {
        foreach ($callbacks as $swooleEvent => $callback) {
            [$class, $method] = $callback;
            $instance = new $class;
            $this->server->on($swooleEvent, [$instance,$method]);
        }


    }
}
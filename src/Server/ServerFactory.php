<?php
/**
 * Created by PhpStorm.
 * User: barry
 * Date: 2020/10/10
 * Time: 14:18
 */

namespace Rebuild\Server;


class ServerFactory
{

    protected $configs = [];

    /**
     * @var Server
     */
    protected $server;

    public function configure(array $configs)
    {
        $this->configs = $configs;
        $this->getServer()->init($this->configs);
    }

    public function getServer(): Server
    {
        if (!isset($this->server)) {
            $this->server = new Server();
        }
        return $this->server;
    }
}
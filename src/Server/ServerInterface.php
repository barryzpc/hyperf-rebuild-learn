<?php
/**
 * Created by PhpStorm.
 * User: barry
 * Date: 2020/10/10
 * Time: 14:21
 */

namespace Rebuild\Server;


interface ServerInterface
{
    const SERVER_HTTP = 1;

    const SERVER_WEBSOCKET = 2;

    const SERVER_BASE = 3;

    public function __construct();

    public function init(array $config): ServerInterface;

    public function start();

    /**
     * @return
     */
    public function getServer();


}
<?php
/**
 * Created by PhpStorm.
 * User: barry
 * Date: 2020/10/9
 * Time: 13:10
 */

use App\Bar;
use Rebuild\Command\StartCommand;
use Rebuild\Config\Config;
use Rebuild\Config\ConfigFactory;
use Symfony\Component\Console\Application;

!defined('BASE_PATH') && define('BASE_PATH', dirname(__DIR__, 1));

require 'vendor/autoload.php';

$application = new Application();
$config = new ConfigFactory();
$config = $config();
$commands = $config->get('commands');
foreach ($commands as $command) {
    if ($command === StartCommand::class) {
        $application->add(new StartCommand($config));
    }else{
        $application->add(new $command);
    }

}
$application->run();
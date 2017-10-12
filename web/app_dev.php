<?php

use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;

// If you don't want to setup permissions the proper way, just uncomment the following PHP line
// read https://symfony.com/doc/current/setup.html#checking-symfony-application-configuration-and-setup
// for more information
//umask(0000);

// This check prevents access to debug front controllers that are deployed by accident to production servers.
// Feel free to remove this, extend it, or make something more sophisticated.
if (isset($_SERVER['HTTP_CLIENT_IP'])
    || (isset($_SERVER['HTTP_X_FORWARDED_FOR']) &&
        // allow forwarded IP from extia kilix
        !in_array($_SERVER['HTTP_X_FORWARDED_FOR'], array(
            // FFB
            '82.245.250.139',
            // Extia
            '89.225.246.252',
            '89.225.246.253',
            '89.225.246.254',
            // csanquer
            '88.120.28.49',
        ))
    )
    || (!(in_array(@$_SERVER['REMOTE_ADDR'], array(
                //localhost
                '127.0.0.1',
                'fe80::1',
                '::1',
                //VM dev
                '172.16.196.1',
                '10.42.42.1',
                //dev
                '10.0.1.11',
                //release
                '10.0.2.11',
                '10.0.2.22',
                //dev bastion
                '10.0.1.1',
                //release bastion
                '10.0.2.1',
                //preprod/beta bastion
                '192.168.2.130',
                //prod bastion
                '192.168.3.10',
                //FFB
                '217.74.106.132',

            )) || php_sapi_name() === 'cli-server') &&
        // allow docker host
        strpos(@$_SERVER['REMOTE_ADDR'],'172.17.') !== 0
    )
) {
    exit('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
}

require __DIR__.'/../app/autoload.php';
Debug::enable();

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);

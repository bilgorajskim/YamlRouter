<?php

namespace YamlRouter;

use Silex\ServiceProviderInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\RouteCollection;
use Silex\Application;

class Provider implements ServiceProviderInterface{
    public function register(Application $app)
    {
        $app['routes'] = $app->extend('routes', function (RouteCollection $routes, Application $app) {
            $file_locator = $app['router.path']?$app['router.path']:(__DIR__.'/../config/routes.yml');
            $file_locator = explode(DIRECTORY_SEPARATOR, $file_locator);
            $file_name = end($file_locator);
            unset($file_locator[(count($file_locator)-1)]);
            $file_locator = implode('/',$file_locator);
            $loader = new YamlFileLoader(new FileLocator($file_locator));
            $collection = $loader->load($file_name);
            $routes->addCollection($collection);
            return $routes;
        });
    }

    public function boot(Application $app)
    {
    }

}

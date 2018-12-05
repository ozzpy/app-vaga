<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Zend\Expressive\Application;
use Zend\Expressive\MiddlewareFactory;

/**
 * Setup routes with a single request method:
 *
 * $test->get('/', App\Handler\HomePageHandler::class, 'home');
 * $test->post('/album', App\Handler\AlbumCreateHandler::class, 'album.create');
 * $test->put('/album/:id', App\Handler\AlbumUpdateHandler::class, 'album.put');
 * $test->patch('/album/:id', App\Handler\AlbumUpdateHandler::class, 'album.patch');
 * $test->delete('/album/:id', App\Handler\AlbumDeleteHandler::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $test->route('/contact', App\Handler\ContactHandler::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $test->route('/contact', App\Handler\ContactHandler::class)->setName('contact');
 *
 * or:
 *
 * $test->route(
 *     '/contact',
 *     App\Handler\ContactHandler::class,
 *     Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */
return function (Application $app, MiddlewareFactory $factory, ContainerInterface $container) : void {
    $app->get('/', App\Handler\HomePageHandler::class, 'home');
    $app->get('/api/ping', App\Handler\PingHandler::class, 'api.ping');

    $app->route(
        '/testevaga',
        \TesteVaga\Handler\TestHandler::class,
        ['POST','GET'],
        'testevaga'
    );

    $app->route(
        '/testevaga/cargo',
        \TesteVaga\Handler\TestRoleHandler::class,
        ['POST','GET'],
        'testevaga.role'
    );

    $app->route(
        '/testevaga/add',
        \TesteVaga\Handler\TestAddHandler::class,
        ['POST','GET'],
        'testevaga.add'
    );

    $app->route(
        '/testevaga/edit/:id',
        \TesteVaga\Handler\TestEditHandler::class,
        ['POST','GET'],
        'testevaga.edit'
    );

    $app->route(
        '/testevaga/delete/:id',
        \TesteVaga\Handler\TestDeleteHandler::class,
        ['POST','GET'],
        'testevaga.delete'
    );

};

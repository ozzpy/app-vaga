<?php
/**
 * Created by PhpStorm.
 * User: webmaster
 * Date: 05/12/18
 * Time: 01:03 PM
 */

declare(strict_types=1);

namespace TesteVaga;


class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     */
    public function __invoke() : array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
        ];
    }

    /**
     * Returns the container dependencies
     */
    public function getDependencies() : array
    {
        return [
            'invokables' => [
            ],
            'factories'  => [
                Handler\TestHandler::class       => Handler\TestHandlerFactory::class,
                Handler\TestAddHandler::class    => Handler\TestAddHandlerFactory::class,
                Handler\TestEditHandler::class   => Handler\TestEditHandlerFactory::class,
                Handler\TestDeleteHandler::class => Handler\TestDeleteHandlerFactory::class,
                Handler\TestRoleHandler::class   => Handler\TestRoleHandlerFactory::class,

            ],
        ];
    }

    /**
     * Returns the templates configuration
     */
    public function getTemplates() : array
    {
        return [
            'paths' => [
                'test'    => [__DIR__ . '/../templates/test'],
            ],
        ];
    }
}

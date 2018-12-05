<?php
/**
 * Created by PhpStorm.
 * User: webmaster
 * Date: 05/12/18
 * Time: 12:54 PM
 */

namespace TesteVaga\Handler;


use DbManager\Table\EmployeesTable;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

use function get_class;

/**
 * Class TestHandlerFactory
 * @package TesteVaga\Handler
 */
class TestEditHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return TestEditHandler
     */
    public function __invoke(ContainerInterface $container)
    {

        $router   = $container->get(RouterInterface::class);
        $template = $container->has(TemplateRendererInterface::class)? $container->get(TemplateRendererInterface::class): null;
        $employeesTable = $container->get(EmployeesTable::class);

        return new TestEditHandler(get_class($container), $router, $template,$employeesTable);
    }
}
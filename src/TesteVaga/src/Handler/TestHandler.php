<?php
/**
 * Created by PhpStorm.
 * User: webmaster
 * Date: 05/12/18
 * Time: 12:51 PM
 */

namespace TesteVaga\Handler;


use DbManager\Table\EmployeesTable;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class TestHandler implements MiddlewareInterface
{

    /** @var string */
    private $containerName;

    /** @var RouterInterface */
    private $router;

    /** @var TemplateRendererInterface */
    private $template;
    private $employeesTable;

    public function __construct(string $containerName,RouterInterface $router,TemplateRendererInterface $template,EmployeesTable $employeesTable
    ) {
        $this->containerName  = $containerName;
        $this->router         = $router;
        $this->template       = $template;
        $this->employeesTable = $employeesTable;
    }


    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {

        $params = $request->getQueryParams();

        $order = isset($params['order']) ? $params['order'] : null;
        $list  = isset($params['list'])  ? $params['list'] : null;

        if ( $list ) {
            $listEmployees = $this->employeesTable->getAllVagaTeste($list);
        } else {
            $listEmployees = $this->employeesTable->getAll($order);
        }

        $data = [
            'listEmployees' => $listEmployees
        ];
        return new HtmlResponse($this->template->render('test::init', $data));
    }
}
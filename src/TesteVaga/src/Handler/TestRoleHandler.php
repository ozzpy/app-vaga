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

class TestRoleHandler implements MiddlewareInterface
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


        $listEmployees = $this->employeesTable->getAll()->buffer();

        // aqui poderiamos ter os cargos de outra tabela para deixar o codigo dinamico
        $roles = [
            'recepcionista'=>0,
            'técnico'=>0,
            'gerente'=>0,
            'gestor'=>0
        ];

        foreach ($listEmployees as $employee){
            $roles[$employee->role]++;
        }

        $data = [
            'listEmployees' => $listEmployees,
            "roles"         => $roles
        ];
        return new HtmlResponse($this->template->render('test::role', $data));
    }
}
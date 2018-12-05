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
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class TestDeleteHandler implements MiddlewareInterface
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


        $routerMatch = $this->router->match($request);
        $routerParams = $routerMatch->getMatchedParams();

        $id = (int) (isset($routerParams['id']) ) && is_numeric($routerParams['id']) ? $routerParams['id'] : null;
        $registered = null;

        if ( is_null($id) ) {

            $data = ['status'=>'error',"public_message"=>"id errado"];
            return new HtmlResponse($this->template->render('test::message', $data));
        }

        try{

            $this->employeesTable->delete($id);

        } catch (\Exception $exception) {
            die($exception->getMessage());
        }




        $data = [
            'registered' => $registered
        ];
        return new HtmlResponse($this->template->render('test::delete', $data));
    }
}
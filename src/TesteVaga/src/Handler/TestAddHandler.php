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

class TestAddHandler implements MiddlewareInterface
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


        $registered = null;

        if ( $request->getMethod() ==  'POST' ){

            $dataPost = $request->getParsedBody();

            try{

                $dataPost['hiring_date'] = join("-",array_reverse(explode("/",$dataPost['hiring_date'])));

                $this->employeesTable->save($dataPost);

                $registered = true;

            } catch (\Exception $exception) {
                die($exception->getMessage());
            }

        }


        $data = [
            'registered' => $registered
        ];
        return new HtmlResponse($this->template->render('test::add', $data));
    }
}
<?php

namespace app\core;
class Application
{
    public Router $router;
    private Request $request;
    public Response $response;

    public static Application $app;

    private Database $database;
    public static string $ROOT_DIR;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request);
        require_once self::$ROOT_DIR."/routes/web.php";

    }

    public function run(){
        echo $this->router->resolved();
    }
}

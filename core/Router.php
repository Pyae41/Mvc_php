<?php

namespace app\core;

class Route
{

    private static array $routes = [];
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public static function get($path, $callback)
    {
        self::$routes['get'][$path] = $callback;
    }
    public static function post($path, $callback)
    {
        self::$routes['post'][$path] = $callback;
    }

    // for rendering views 
    public function resolved()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = self::$routes[$method][$path] ?? false;

        // checking for resorces
        if ($callback === false) {
            Application::$app->response->setStatusCode(404);
            return $this->renderView("_404");
        }

        // for callback string
        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        // for callback array
        if (is_array($callback)) {
            // initialize callback
            $callback[0] = new $callback[0]();
        }
        return call_user_func($callback,$this->request);
    }
    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);

        return str_replace("{{content}}", $viewContent, $layoutContent);
    }

    private function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/main.php";
        return ob_get_clean();
    }

    private function renderOnlyView($view, $params = [])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
}

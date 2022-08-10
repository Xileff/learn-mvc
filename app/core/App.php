<?php

class App
{
    // default properties
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    // constructor
    public function __construct()
    {
        $url = $this->parseURL();
        if ($url == null) {
            $url[0] = $this->controller;
            $url[1] = $this->method;
        }

        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            // misal url = home/index/param1
            // berarti controllernya object ini harus dijadiin index
            $this->controller = $url[0];
            unset($url[0]);

            // controller baru diinstansiasi
            require_once '../app/controllers/' . $this->controller . '.php';
            $this->controller = new $this->controller;

            // Memperbarui properti method dengan method yg terdapat di URL
            if (isset($url[1])) {
                if (method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }

            // Cek apakah ada parameter di URL
            if (!empty($url)) {
                $this->params = array_values($url);
            }

            // Jalankan controller & method, serta kirimkan params jika ada
            call_user_func_array([$this->controller, $this->method], $this->params);
        }
    }

    // functions
    public function parseURL()
    {
        if (isset($_GET['url'])) {
            // nantinya url didapetin dari .htaccess
            $url = $_GET['url'];
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}

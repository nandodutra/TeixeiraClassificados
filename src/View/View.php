<?php

namespace View;

use Symfony\Component\Yaml\Yaml;
use Models\User;

class View extends \Slim\View
{
    public function render($template)
    {

        $config = Yaml::parse(file_get_contents('../config/app.yml'));

        $user = User::find(1);

        $this->data['content'] = $template;
        $this->data['title'] = isset($this->data['title']) ? $this->data['title'] : $config['app']['title'];
        $this->data['css'] = isset($this->data['css']) ? array_merge($this->data['css'], $config['app']['css']) : $config['app']['css'];



        extract($this->data->all());
        ob_start();

        require $this->getTemplatePathname('index.php');

        return ob_get_clean();
    }

    public function get($var) {
        return isset($_GET[$var]) ? $_GET[$var] : false;
    }

    public function post($var) {
        return isset($_POST[$var]) ? $_POST[$var] : false;
    }
}
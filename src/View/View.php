<?php

namespace View;

use Symfony\Component\Yaml\Yaml;

class View extends \Slim\Extras\Views\Twig
{

    public function __construct() {
        
        $this->data = new \Slim\Helper\Set();

        parent::$twigExtensions = array(
            'Twig_Extension_Debug'
        );

        parent::$twigOptions = array(
            'twig_debug' => true
        );

    }

    public function render($template)
    {

        $config = Yaml::parse(file_get_contents('../config/app.yml'));

        $this->data['content'] = $template;
        $this->data['title'] = isset($this->data['title']) ? $this->data['title'] : $config['app']['title'];
        
        $this->data['css'] = isset($this->data['css']) ? array_merge($this->data['css'], $config['app']['css']) : $config['app']['css'];

        $this->data['js'] = isset($this->data['js']) ? array_merge($this->data['js'], $config['app']['js']) : $config['app']['js'];

        $env = $this->getEnvironment();
        $template = $env->loadTemplate($template);

        return $template->render($this->data->all());

    }
}
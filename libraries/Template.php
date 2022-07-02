<?php
    class Template {
        // path to the template
        protected $template;

        // vars passed in
        protected $vars = [];

        // constructor
        public function __construct($template)
        {
            $this->template = $template;
        }

        // getter for variables
        public function __get($name)
        {
            return $this->vars[$name];
        }

        // setter for variables
        public function __set($name, $value)
        {
            $this->vars[$name] = $value;
        }

        // tostring metod to convert vars to strings
        public function __toString()
        {
            extract($this->vars);
            chdir(dirname($this->template));
            ob_start();

            include basename($this->template);
            
            ob_get_clean();
        }
    }
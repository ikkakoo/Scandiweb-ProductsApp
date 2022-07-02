<?php
    class Template {
        // path to template
        protected $template;

        // variables passed in
        protected $vars = [];

        // constructor
        public function __construct($template)
        {
            $this->template = $template;
        }

        // getter func for vars
        public function __get($name)
        {
            return $this->vars[$name];
        }

        // setter func for vars
        public function __set($name, $value)
        {
            $this->vars[$name] = $value;
        }
        // to string method for vars
        public function __toString()
        {
            extract($this->vars);
            chdir(dirname($this->template));
            ob_start();

            include basename($this->template);

            return ob_get_clean();
        }
    } 
<?php
    class Controller
    {
        var $vars = [];
        var $layout = "default";

        function set($d)
        {
            $this->vars = array_merge($this->vars, $d);
        }

        function render($filename)
        {            
            $view = ROOT . "Views/" . ucfirst(str_replace('Controller', '', get_class($this))) . '/' . $filename . '.php';
            if (file_exists($view))
            { // Renders the view with the data if the file exist
                extract($this->vars);
                ob_start();
                require_once($view);
                $content_for_layout = ob_get_clean();
                require_once(ROOT . "Views/Layouts/" . $this->layout . '.php');
            }
            else
            {
                require_once(ROOT . 'Views/404.php');
            }
        }

        function str_to_noaccent($str)
        {
            $url = $str;
            $url = preg_replace('#Ç#', 'C', $url);
            $url = preg_replace('#ç#', 'c', $url);
            $url = preg_replace('#è|é|ê|ë#', 'e', $url);
            $url = preg_replace('#È|É|Ê|Ë#', 'E', $url);
            $url = preg_replace('#à|á|â|ã|ä|å#', 'a', $url);
            $url = preg_replace('#@|À|Á|Â|Ã|Ä|Å#', 'A', $url);
            $url = preg_replace('#ì|í|î|ï#', 'i', $url);
            $url = preg_replace('#Ì|Í|Î|Ï#', 'I', $url);
            $url = preg_replace('#ð|ò|ó|ô|õ|ö#', 'o', $url);
            $url = preg_replace('#Ò|Ó|Ô|Õ|Ö#', 'O', $url);
            $url = preg_replace('#ù|ú|û|ü#', 'u', $url);
            $url = preg_replace('#Ù|Ú|Û|Ü#', 'U', $url);
            $url = preg_replace('#ý|ÿ#', 'y', $url);
            $url = preg_replace('#Ý#', 'Y', $url);
            
            return ($url);
        }

        protected function secure_form($form)
        {
            foreach ($form as $key => $value)
            {
                $form[$key] = $this->secure_input($value);
            }
            return $form;
        }

        protected function secure_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

    }
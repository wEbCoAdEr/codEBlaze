<?php

/**
 * codEBlaze
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2020, Skarbol
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	codEBlaze
 * @author	wEbCoAdEr
 * @copyright	Copyright (c) 2020, Skarbol (https://skarbol.com/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeblaze.skarbol.com
 * @since	Version 1.0
 */
class codeblaze
{

    protected $controller;
    protected $default_controller;
    protected $action;
    protected $default_action = "index";
    protected $controllerAndAction;
    protected $prams = [];
    protected $routesData = [];
    private $controller_not_found = true;
    private $action_not_found = true;

    public function __construct()
    {
        global $systemConfig;
        global $routes;
        $this->default_controller = $systemConfig['DEFAULT_CONTROLLER'];
        $this->routesData = $routes;
        $this->processRequest();
        if (array_key_exists($this->controllerAndAction, $this->routesData)) {
            $this->processRequest($this->routesData[$this->controllerAndAction]);
        }
        $this->processController();
    }

    protected function processRequest($initRequest = "")
    {
        $request = $initRequest;
        if (empty($initRequest)) {
            $request = trim($_SERVER['REQUEST_URI'], '/');
        }
        if (!empty($request)) {
            $url = explode('/', $request);
            if (isset($url[0])) {
                $this->controller = $url[0] . '_controller';
                $this->controllerAndAction = $url[0];
            }
            if (isset($url[1])) {
                $this->action = $url[1];
                $this->controllerAndAction = $url[0] . '/' . $url[1];
            }
            if (empty($initRequest)) {
                unset($url[0], $url[1]);
                $this->prams = !empty($url) ? array_values($url) : [];
            }
        }
    }

    protected function processController()
    {
        if (!empty($this->controllerAndAction)) {
            if (file_exists(CONTROLLER . $this->controller . '.php')) {
                $this->controller = new $this->controller();
                $this->controller_not_found = false;
                if (method_exists($this->controller, $this->action)) {
                    call_user_func_array([$this->controller, $this->action], $this->prams);
                    $this->action_not_found = false;
                } else {
                    if (empty($this->action) and method_exists($this->controller, $this->default_action)) {
                        call_user_func_array([$this->controller, $this->default_action], $this->prams);
                        $this->action_not_found = false;
                    }
                }
            }
            if ($this->controller_not_found or $this->action_not_found) {
                include VIEW . '404.phtml';
            }
        } else {
            if (file_exists(CONTROLLER . $this->default_controller . '.php')) {
                $this->default_controller = new $this->default_controller();
                if (method_exists($this->default_controller, $this->default_action)) {
                    call_user_func_array([$this->default_controller, $this->default_action], $this->prams);
                }
            }
        }
    }
}

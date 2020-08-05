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
class loader {

    protected $view;
    protected $autoLoadData;

    public function __construct($autoloadConfig) {
        $this->autoLoadData = $autoloadConfig;
        $this->autoLoadModels($this->autoLoadData['MODELS']);
        $this->autoLoadLibraries($this->autoLoadData['LIBRARIES']);
        $this->autoLoadHelpers($this->autoLoadData['HELPERS']);
    }

    public function view($view, $data = []) {
        $this->view = new view($view, $data);
        return $this->view;
    }

    public function model($model) {
        $CT = Controller::get_instance();
        $model_name = $model;
        $model_path = MODEL . $model . '.php';
        if (file_exists($model_path)) {
            if (isset($CT->$model_name)) {
                throw new RuntimeException(
                        'The model "' . $model_name . '" is already loaded'
                );
                return false;
            }
            include $model_path;
            $CT->$model_name = new $model_name();
        }
    }

    public function library($library, array $parameters = []) {
        $CT = Controller::get_instance();
        $library_name = $library;
        $library_path = LIBRARY . $library_name . '.php';
        if (file_exists($library_path)) {
            if (isset($CT->$library_name)) {
                throw new RuntimeException(
                        'The library "' . $library_name . '" is already loaded'
                );
                return false;
            }
            include $library_path;
            $library_class = new ReflectionClass($library_name);
            $CT->$library_name = $library_class->newInstanceArgs($parameters);
        }
    }

    public function helper($helper) {
        $helper_name = $helper;
        $helper_path = HELPER . $helper_name . '.php';
        if (file_exists($helper_path)) {
            include_once($helper_path);
        }
    }

    private function autoLoadModels($autoLoadModels) {
        foreach ($autoLoadModels as $model) :
            $this->model($model);
        endforeach;
    }

    private function autoLoadLibraries($autoLoadLibraries) {
        foreach ($autoLoadLibraries as $library => $para) :
            $this->library($library, $para);
        endforeach;
    }

    private function autoLoadHelpers($autoLoadHelpers) {
        foreach ($autoLoadHelpers as $helper) :
            $this->helper($helper);
        endforeach;
    }

}

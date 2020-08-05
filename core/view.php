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
class view extends controller {

    protected $view_file;
    protected $view_data;

    public function __construct($view_file, $view_data) {
        $this->view_file = $view_file;
        $this->view_data = $view_data;
        $this->renderView();
    }

    public function renderView() {
        $this->view_file = VIEW . $this->view_file . '.phtml';
        if ($this->view_file) {
            if (!empty($this->view_data)) {
                extract($this->view_data);
            }
            include $this->view_file;
        }
    }

}

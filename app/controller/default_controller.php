<?php

class default_controller extends controller
{

    public function index()
    {
        $data['name'] = $this->default_model->getName();
        $this->load->view('default', $data);
    }
}

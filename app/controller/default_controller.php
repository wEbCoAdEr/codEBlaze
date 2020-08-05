<?php

class default_controller extends controller
{

    public function index()
    {
        $data['home_data'] = $this->default_model->getHomeData();
        $this->load->view('default', $data);
    }
}

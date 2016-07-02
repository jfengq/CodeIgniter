<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zui_xin extends CI_Controller
{
    public function index()
    {
        redirect('/zui_xin/all/0');
    }

    public function all($pageIndex=0)
    {
        $this->load->model('zui_xin_model');
        $data['zui_xin'] = $this->zui_xin_model->get_stock_list($pageIndex);
        $this->load->view('zui_xin', $data);
    }
}

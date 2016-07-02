<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zhang_Fu extends CI_Controller
{
    public function index()
    {
        redirect('/zhang_fu/all/0');
    }

    public function all($pageIndex=0)
    {
        $this->load->model('zhang_fu_model');
        $data['zhang_fu'] = $this->zhang_fu_model->get_stock_list($pageIndex);
        $this->load->view('zhang_fu', $data);
    }
}

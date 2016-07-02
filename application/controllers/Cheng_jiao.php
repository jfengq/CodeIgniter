<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cheng_Jiao extends CI_Controller
{
    public function index()
    {
        redirect('/cheng_jiao/all/0');
    }

    public function all($pageIndex=0)
    {
        $this->load->model('cheng_jiao_model');
        $data['cheng_jiao'] = $this->cheng_jiao_model->get_stock_list($pageIndex);
        $this->load->view('cheng_jiao', $data);
    }
}

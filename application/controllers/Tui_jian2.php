<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tui_Jian2 extends CI_Controller
{
    public function index()
    {
        $this->load->model('cheng_jiao30_model');
        $chengjiao_arr = $this->cheng_jiao30_model->get_tui_jian2_list();
        
        $data['tui_jian2'] = $chengjiao_arr;
        
        $this->load->view('tui_jian2', $data);
    }
}

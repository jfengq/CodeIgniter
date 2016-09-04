<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cheng_Jiao30 extends CI_Controller
{
    public function index()
    {
        $this->load->model('cheng_jiao30_model');
        $chengjiao30_arr = $this->cheng_jiao30_model->get_stock_list();
        $result_arr = array();
        
        for ($i = 0; $i < count($chengjiao30_arr); $i++) {
            $cj = $chengjiao30_arr[$i];
            //暂时不考虑创业板
            if (strpos($cj['code'], 'z3') > 0) {
                continue;
            }
            
            //剔除ST
            if (strpos($cj['name'], 'ST') > 0) {
                continue;
            }
            array_push($result_arr, $cj);
        }
        
        $this->load->view('cheng_jiao30', $chengjiao30_arr);
    }
}

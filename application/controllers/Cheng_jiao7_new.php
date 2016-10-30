<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cheng_Jiao7_New extends CI_Controller
{
    public function index()
    {
        $this->load->model('cheng_jiao30_model');
        $chengjiao7_arr = $this->cheng_jiao30_model->get_stock_list_new();
        $result_arr = array();
        
        for ($i = 0; $i < count($chengjiao7_arr); $i++) {
            $cj = $chengjiao7_arr[$i];
            
            //剔除ST
            if (strpos($cj['name'], 'T') > 0) {
                continue;
            }
            
            $min = min($cj['day0'], $cj['day1'], $cj['day2'], $cj['day3'], $cj['day4'], $cj['day5'], $cj['day6']);
            
            if ($min > 0 && $min >= $cj['day0'] && $cj['day0'] != 100000000) {
                array_push($result_arr, $cj);
            }
        }
        
        $data['chengjiao7'] = $result_arr;
        
        $this->load->view('cheng_jiao7_new', $data);
    }
    
    public function remove_list()
    {
        $code = $_GET['code'];
        $this->load->model('stock_list_model');
        
        $this->stock_list_model->set_new($code, 1);
    }
}

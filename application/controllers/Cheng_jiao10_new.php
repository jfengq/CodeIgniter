<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cheng_Jiao10_New extends CI_Controller
{
    public function index()
    {
        $this->load->model('cheng_jiao30_model');
        $chengjiao10_arr = $this->cheng_jiao30_model->get_stock_list_new();
        $result_arr = array();
        
        for ($i = 0; $i < count($chengjiao10_arr); $i++) {
            $cj = $chengjiao10_arr[$i];
            
            //剔除ST
            if (strpos($cj['name'], 'T') > 0) {
                continue;
            }
            
            $min = min($cj['day0'], $cj['day1'], $cj['day2'], $cj['day3'], $cj['day4'], $cj['day5'], $cj['day6'], $cj['day7'], $cj['day8'], $cj['day9']);
            
            if ($min > 0 && $min >= $cj['day0'] && $cj['day0'] != 100000000) {
                array_push($result_arr, $cj);
            }
        }
        
        $data['chengjiao10'] = $result_arr;
        
        $this->load->view('cheng_jiao10_new', $data);
    }
}

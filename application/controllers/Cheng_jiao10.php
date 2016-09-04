<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cheng_Jiao10 extends CI_Controller
{
    public function index()
    {
        $this->load->model('cheng_jiao30_model');
        $chengjiao10_arr = $this->cheng_jiao30_model->get_stock_list_10();
        $result_arr = array();
        
        for ($i = 0; $i < count($chengjiao10_arr); $i++) {
            $cj = $chengjiao10_arr[$i];
            //暂时不考虑创业板
            if (strpos($cj['code'], 'z3') > 0) {
                continue;
            }
            
            //剔除ST
            if (strpos($cj['name'], 'ST') > 0) {
                continue;
            }
            
            $min = min($cj['day0'], $cj['day1'], $cj['day2'], $cj['day3'], $cj['day4'], $cj['day5'], $cj['day6'], $cj['day7'], $cj['day8'], $cj['day9']
                , $cj['day10'], $cj['day11'], $cj['day12'], $cj['day13'], $cj['day14'], $cj['day15'], $cj['day16'], $cj['day17'], $cj['day18'], $cj['day19']
                , $cj['day20'], $cj['day21'], $cj['day22'], $cj['day23'], $cj['day24'], $cj['day25'], $cj['day26'], $cj['day27'], $cj['day28'], $cj['day29']);
            
            if ($min == $cj['day0'] && $cj['day0'] != 100000000) {
                array_push($result_arr, $cj);
            }
        }
        
        $data['chengjiao10'] = $result_arr;
        
        $this->load->view('cheng_jiao10', $data);
    }
}

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
            
            //剔除ST
            if (strpos($cj['name'], 'T') > 0) {
                continue;
            }
            
            $min = min($cj['day0'], $cj['day1'], $cj['day2'], $cj['day3'], $cj['day4'], $cj['day5'], $cj['day6'], $cj['day7'], $cj['day8'], $cj['day9']
                , $cj['day10'], $cj['day11'], $cj['day12'], $cj['day13'], $cj['day14'], $cj['day15'], $cj['day16'], $cj['day17'], $cj['day18'], $cj['day19']
                , $cj['day20'], $cj['day21'], $cj['day22'], $cj['day23'], $cj['day24'], $cj['day25'], $cj['day26'], $cj['day27'], $cj['day28'], $cj['day29']);
            
            if ($min > 0 && $min*1.1 >= $cj['day0'] && $cj['day0'] != 100000000) {
                array_push($result_arr, $cj);
            }
        }
        
        $data['chengjiao30'] = $result_arr;
        
        $this->load->view('cheng_jiao30', $data);
    }
}

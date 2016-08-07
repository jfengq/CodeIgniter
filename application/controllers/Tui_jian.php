<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tui_Jian extends CI_Controller
{
    public function index()
    {
        $day = $_GET['day'];
        $chengjiao0 = $_GET['chengjiao0'];
        $chengjiao1 = $_GET['chengjiao1'];
        $zuigao = $_GET['zuigao'];
        $zuidi = $_GET['zuidi'];
        $zhangfu0 = $_GET['zhangfu0'];
        $zhangfu2 = $_GET['zhangfu2'];
        $zhangfu3 = $_GET['zhangfu3'];
        $result_arr = array();

        $this->load->model('stock_list_model');
        $this->load->model('zui_xin_model');
        $this->load->model('zhang_fu_model');
        $this->load->model('cheng_jiao_model');
        
        $chengjiao_arr = $this->cheng_jiao_model->get_stock_list_all();

        for ($i = 0; $i < count($chengjiao_arr); $i++) {
            $cj = $chengjiao_arr[$i];
            $st = $this->stock_list_model->get_stock_by_code($cj['code']);
            $zf = $this->zhang_fu_model->get_stock_by_code($cj['code']);

            //暂时不考虑创业板
            if (strpos($cj['code'], 'z3') > 0) {
                continue;
            }

            //股价不能高于
            if ($st->zuixin > $zuigao) {
                continue;
            }

            //股价不能低于
            if ($st->zuixin < $zuidi) {
                continue;
            }

            if ($st->zhangfu > 0 && $st->zhangfu < $zhangfu0 && ($zf->day0 + $zf->day1) < $zhangfu2
                && ($zf->day0 + $zf->day1 + $zf->day2) < $zhangfu3 && $st->zuixin > $st->kaipan) {

            } else {
                continue;
            }

            if ($day == 2) {
                //最近3个交易日成交量都大于0，且成交量大于前一交易日成交量一定比例
                if ($cj['day0'] > 0 && $cj['day1'] > 0 && $cj['day0'] >= $cj['day1'] * $chengjiao0) {
                    
                } else {
                    continue;
                }
            }

            if ($day == 3) {
                //最近3个交易日成交量都大于0，且成交量大于前一交易日成交量一定比例
                if ($cj['day0'] > 0 && $cj['day1'] > 0 && $cj['day0'] >= $cj['day1'] * $chengjiao0
                    && $cj['day1'] >= $cj['day2'] * $chengjiao1) {

                } else {
                    continue;
                }
            }
            array_push($result_arr, $cj);
        }
        $data['tui_jian'] = $result_arr;
        $data['day'] = $day;
        $data['chengjiao0'] = $chengjiao0;
        $data['chengjiao1'] = $chengjiao1;
        $data['zuigao'] = $zuigao;
        $data['zuidi'] = $zuidi;
        $data['zhangfu0'] = $zhangfu0;
        $data['zhangfu2'] = $zhangfu2;
        $data['zhangfu3'] = $zhangfu3;
        $this->load->view('tui_jian', $data);
    }
}

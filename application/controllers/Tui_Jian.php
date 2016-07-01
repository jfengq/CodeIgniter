<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tui_Jian extends CI_Controller
{
    public function index()
    {
        $day = $_GET['day'];
        $chengjiao = $_GET['chengjiao'];
        $zuigao = $_GET['zuigao'];
        $zhangfu0 = $_GET['zhangfu0'];
        $zhangfu1 = $_GET['zhangfu1'];
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
            if (strpos($cj['code'], 'sz3')) {
                continue;
            }

            //股价不能高于30
            if ($st->zuixin > $zuigao) {
                continue;
            }

            //当日涨幅大于0，且涨幅不超过8，前一交易日涨幅不超过7，连续两日累计涨幅不超过13，连续3个交易日累计涨幅不超过17，且最新价高于开盘价
            if ($st->zhangfu > 0 && $st->zhangfu < $zhangfu0 && $zf->day1 < $zhangfu1 && ($zf->day0 + $zf->day1) < $zhangfu2
                && ($zf->day0 + $zf->day1 + $zf->day2) < $zhangfu3 && $st->zuixin > $st->kaipan) {

            } else {
                continue;
            }

            if ($day == 2) {
                //最近3个交易日成交量都大于0，且成交量大于前一交易日成交量一定比例
                if ($cj['day0'] > 0 && $cj['day1'] > 0 && $cj['day0'] >= $cj['day1'] * $chengjiao) {
                    
                } else {
                    continue;
                }
            }

            if ($day == 3) {
                //最近3个交易日成交量都大于0，且成交量大于前一交易日成交量一定比例
                if ($cj['day0'] > 0 && $cj['day1'] > 0 && $cj['day0'] >= $cj['day1'] * $chengjiao
                    && $cj['day1'] >= $cj['day2'] * $chengjiao) {

                } else {
                    continue;
                }
            }
            array_push($result_arr, $cj);
        }
        $data['tui_jian'] = $result_arr;
        $data['day'] = $day;
        $data['chengjiao'] = $chengjiao;
        $data['zuigao'] = $zuigao;
        $data['zhangfu0'] = $zhangfu0;
        $data['zhangfu1'] = $zhangfu1;
        $data['zhangfu2'] = $zhangfu2;
        $data['zhangfu3'] = $zhangfu3;
        $this->load->view('tui_jian', $data);
    }
}

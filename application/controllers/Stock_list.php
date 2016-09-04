<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \JJG\Request as Request;

class Stock_List extends CI_Controller
{
    public function index()
    {
        redirect('/stock_list/all/0');
    }

    public function all($pageIndex=0)
    {
        $this->load->model('stock_list_model');
        $data['stock_list'] = $this->stock_list_model->get_stock_list($pageIndex);
        $this->load->view('stock_list', $data);
    }

    public function init_stock()
    {
        $index = 1;
        $max = 2900;

        include 'JJG/Request.php';
        $this->load->model('stock_list_model');
        $this->load->model('zui_xin_model');
        $this->load->model('zhang_fu_model');
        $this->load->model('cheng_jiao_model');
        $this->stock_list_model->set_gengxinliebiao(1);

        for ($index; $index < $max; $index++) {
            $stockCode = $this->getStockCode('sz', $index);
            $this->requestStockData($stockCode);
            $dataArr = $this->requestStockData($stockCode);
            $this->stock_list_model->update_stock_list($dataArr, $stockCode);
            $this->zui_xin_model->update_stock_list($dataArr, $stockCode);
            $this->zhang_fu_model->update_stock_list($dataArr, $stockCode);
            $this->cheng_jiao_model->update_stock_list($dataArr, $stockCode);
        }

        $index = 300000;
        $max = 300610;
        for ($index; $index < $max; $index++) {
            $stockCode = $this->getStockCode('sz', $index);
            $this->requestStockData($stockCode);
            $dataArr = $this->requestStockData($stockCode);
            $this->stock_list_model->update_stock_list($dataArr, $stockCode);
            $this->zui_xin_model->update_stock_list($dataArr, $stockCode);
            $this->zhang_fu_model->update_stock_list($dataArr, $stockCode);
            $this->cheng_jiao_model->update_stock_list($dataArr, $stockCode);
        }

        $index = 600000;
        $max = 604150;
        for ($index; $index < $max; $index++) {
            $stockCode = $this->getStockCode('sh', $index);
            $dataArr = $this->requestStockData($stockCode);
            $this->stock_list_model->update_stock_list($dataArr, $stockCode);
            $this->zui_xin_model->update_stock_list($dataArr, $stockCode);
            $this->zhang_fu_model->update_stock_list($dataArr, $stockCode);
            $this->cheng_jiao_model->update_stock_list($dataArr, $stockCode);
        }
        $this->stock_list_model->set_gengxinliebiao(0);
        echo 'success';
    }

    public function check_server_status ()
    {
        echo 'ok';
    }

    public function check_update_stock_status ()
    {
        $this->load->model('stock_list_model');
        $result = $this->stock_list_model->get_status();

        if ($result->gengxinliebiao == 0) {
            echo 'ok';
        } else {
            echo 'processing';
        }
    }

    public function check_update_data_status ()
    {
        $this->load->model('stock_list_model');
        $result = $this->stock_list_model->get_status();

        if ($result->gengxinshuju == 0) {
            echo 'ok';
        } else {
            echo 'processing';
        }
    }

    public function check_backup_status ()
    {
        $this->load->model('stock_list_model');
        $result = $this->stock_list_model->get_status();

        if ($result->beifen == 0) {
            echo 'ok';
        } else {
            echo 'processing';
        }
    }

    public function back_up ()
    {
        $this->load->model('stock_list_model');
        $this->load->model('zui_xin_model');
        $this->load->model('zhang_fu_model');
        $this->load->model('cheng_jiao_model');
        $this->load->model('cheng_jiao30_model');
        $this->stock_list_model->set_beifen(1);
        $this->stock_list_model->back_up();
        $this->zui_xin_model->back_up();
        $this->zhang_fu_model->back_up();
        $this->cheng_jiao_model->back_up();
        $this->cheng_jiao30_model->back_up();
        $this->stock_list_model->set_beifen(0);

        echo 0;
    }

    private function getStockCode($type = 'sz', $index)
    {
        $code = '';

        if ($type == 'sz') {
            if ($index > 100000) {
                $code = 'sz' . $index;
            } else {
                $code = $code . $index;
                while (strlen($code) < 6) {
                    $code = '0' . $code;
                }
                $code = 'sz' . $code;
            }
        } else if ($type == 'sh') {
            $code = 'sh' . $index;
        }
        return $code;
    }

    private function requestStockData($stockCode)
    {
        $request = new Request('http://hq.sinajs.cn/list=' . $stockCode);
        $request->setContentType('application/x-javascript; charset=GBK');
        $request->execute();
        $response = $request->getResponse();
        $resArr = explode('=', $response);
        $res = $resArr[1];
        $res = str_replace('"', '', $res);
        $dataArr = explode(',', $res);
        if (strlen($res) < 10) {
            return;
        }

        $dataArr[0] = iconv('GBK', 'UTF-8', $dataArr[0]);
        return $dataArr;
    }

    public function update_stock_data ()
    {
        $this->load->model('stock_list_model');
        $this->load->model('zhang_fu_model');
        $this->load->model('zui_xin_model');
        $this->load->model('cheng_jiao_model');
        $this->load->model('cheng_jiao30_model');
        $this->stock_list_model->set_gengxinshuju(1);
        $stocks = $this->stock_list_model->get_stock_list_all();
        $index = 0;
        $max = count($stocks);

        include 'JJG/Request.php';

        for ($index; $index < $max; $index++) {
            $stockCode = $stocks[$index]['code'];
            $dataArr = $this->requestStockData($stockCode);
            $this->stock_list_model->update_stock_list($dataArr, $stockCode);
            $this->zhang_fu_model->update_stock_list($dataArr, $stockCode);
            $this->zui_xin_model->update_stock_list($dataArr, $stockCode);
            $this->cheng_jiao_model->update_stock_list($dataArr, $stockCode);
            $this->cheng_jiao30_model->update_stock_list($dataArr, $stockCode);
        }
        $this->stock_list_model->set_gengxinshuju(0);
    }
}

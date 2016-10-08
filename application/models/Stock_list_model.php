<?php
class Stock_list_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_stock_list_all ()
    {
        $query = $this->db->query('select * from stock');
        return $query->result_array();
    }

    public function get_stock_list($pageIndex=0)
    {
        $query = $this->db->query('select * from stock limit 20 offset ' . $pageIndex * 20);
        return $query->result_array();
    }

    public function get_stock_by_code($code)
    {
        $query = $this->db->query('select * from stock where code ="' . $code . '"');
        return $query->row();
    }

    public function update_stock_list ($arr, $code) {
        if (count($arr) > 0) {
            $name = $arr[0];
            $kaipan = $arr[1];
            $zuixin = $arr[3];
            $zuigao = $arr[4];
            $zuidi = $arr[5];
            $chengjiao = $arr[8];
            $zhangfu = round(($arr[3] - $arr[2]) / ($arr[2]), 4) * 100;
            if ($chengjiao == 0) {
                $zhangfu = 0;
            }
            $query = $this->db->query('select * from stock where code = "' . $code . '"');
            $arr = $query->row_array();
            $stock = array(
                'name' => $name,
                'code' => $code,
                'zuixin' => $zuixin,
                'zuigao' => $zuigao,
                'zuidi' => $zuidi,
                'chengjiao' => $chengjiao,
                'zhangfu' => $zhangfu,
                'kaipan' => $kaipan
            );

            if (count($arr) < 1) {
                $stock['new'] = 2;
                $this->db->insert('stock', $stock);
            } else {
                $this->db->query('update stock set zuixin=' . $zuixin . ',zuigao=' . $zuigao . ',zuidi=' . $zuidi . ',chengjiao=' . $chengjiao . ',zhangfu=' . $zhangfu . ',kaipan=' . $kaipan . ' where code="' . $code . '"');
            }
        }
    }

    public function get_stock_list_first()
    {
        $query = $this->db->query('select * from stock');
        return $query->first_row();
    }

    public function get_stock_list_last()
    {
        $query = $this->db->query('select * from stock');
        return $query->last_row();
    }

    public function back_up ()
    {
        $this->db->query('update stock set zuixin=0,zuigao=0,zuidi=0,zhangfu=0,chengjiao=0,kaipan=0');
    }

    public function get_status()
    {
        $query = $this->db->query('select * from status limit 1');
        return $query->row();
    }

    public function set_gengxinliebiao($status=0)
    {
        $this->db->query('update status set gengxinliebiao="' . $status . '"');
    }

    public function set_gengxinshuju($status=0)
    {
        $this->db->query('update status set gengxinshuju="' . $status . '"');
    }

    public function set_beifen($status=0)
    {
        $this->db->query('update status set beifen="' . $status . '"');
    }
}
?>

<?php
class Cheng_jiao_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_stock_list($pageIndex=0)
    {
        $query = $this->db->query('SELECT * FROM chengjiao WHERE day0>0 AND day1>0 ORDER BY day0/day1 limit 20 offset ' . $pageIndex * 20 . ' order by ');
        return $query->result_array();
    }

    public function get_stock_by_code($code)
    {
        $query = $this->db->query('select * from chengjiao where code ="' . $code . '"');
        return $query->row();
    }

    public function update_stock_list ($arr, $code) {
        if (count($arr) > 0) {
            $name = $arr[0];
            $zuixin = $arr[3];
            $zuigao = $arr[4];
            $zuidi = $arr[5];
            $chengjiao = $arr[8];
            $zhangfu = round(($arr[3] - $arr[2]) / ($arr[2]), 4) * 100;
            if ($chengjiao == 0) {
                $zhangfu = 0;
            }
            $query = $this->db->query('select * from chengjiao where code = "' . $code . '"');
            $arr = $query->row_array();
            $stock = array(
                'name' => $name,
                'code' => $code,
                'day0' => $chengjiao,
                'day1' => 0,
                'day2' => 0,
                'day3' => 0,
                'day4' => 0
            );

            if (count($arr) < 1) {
                $this->db->insert('chengjiao', $stock);
            } else {
                $this->db->query('update chengjiao set day0=' . $chengjiao . ' where code="' . $code . '"');
            }
        }
    }

    public function get_stock_list_all()
    {
        $query = $this->db->query('select * from chengjiao');
        return $query->result_array();
    }

    public function get_stock_list_first()
    {
        $query = $this->db->query('select * from chengjiao');
        return $query->first_row();
    }

    public function get_stock_list_last()
    {
        $query = $this->db->query('select * from chengjiao');
        return $query->last_row();
    }

    public function back_up ()
    {
        $query = $this->db->query('select * from chengjiao');

        foreach ($query->result() as $row)
        {
            $code = $row->code;
            $day0 = $row->day0;
            $day1 = $row->day1;
            $day2 = $row->day2;
            $day3 = $row->day3;
            $this->db->query('update chengjiao set day0=0, day1=' . $day0 . ', day2=' . $day1 . ', day3=' . $day2 . ', day4=' . $day3 . ' where code="' . $code . '"');
        }
    }
}


?>

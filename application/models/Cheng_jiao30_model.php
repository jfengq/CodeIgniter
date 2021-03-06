<?php
class Cheng_jiao30_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }
    public function get_stock_list()
    {
        $query = $this->db->query('select chengjiao30.* from chengjiao30 LEFT JOIN stock ON chengjiao30.code = stock.code WHERE stock.zuixin > 9 and stock.zuixin < 100 and stock.zhangfu > 0 and stock.zhangfu < 2 and chengjiao30.day0 > 0');
        return $query->result_array();
    }
    public function get_tui_jian2_list()
    {
        $query = $this->db->query('SELECT zuixin.code, zuixin.name, zuixin.day0 FROM stock.zuixin AS zuixin'
  . ' LEFT JOIN stock.chengjiao30 AS chengjiao30 ON chengjiao30.code = zuixin.code'
  . " WHERE zuixin.name NOT LIKE '%ST%' AND zuixin.name NOT LIKE '%银行%' AND zuixin.day0 > 8 AND zuixin.day0 < 20 AND"
          .' ((zuixin.day0 - zuixin.day1) / zuixin.day1 > -0.005) AND ((zuixin.day0 - zuixin.day1) / zuixin.day1 < 0.02)'
          .' AND (zuixin.day0 - zuixin.day4)/zuixin.day4 < 0.03'
          .' AND greatest(chengjiao30.day0, chengjiao30.day1, chengjiao30.day2, chengjiao30.day3, chengjiao30.day4, chengjiao30.day5, chengjiao30.day6)/least(chengjiao30.day0, chengjiao30.day1, chengjiao30.day2, chengjiao30.day3, chengjiao30.day4, chengjiao30.day5, chengjiao30.day6) > 5'
          .' AND greatest(chengjiao30.day0, chengjiao30.day1, chengjiao30.day2, chengjiao30.day3, chengjiao30.day4, chengjiao30.day5, chengjiao30.day6, chengjiao30.day7, chengjiao30.day8, chengjiao30.day9, chengjiao30.day10, chengjiao30.day11, chengjiao30.day12, chengjiao30.day13, chengjiao30.day14, chengjiao30.day15, chengjiao30.day16, chengjiao30.day17, chengjiao30.day18, chengjiao30.day19, chengjiao30.day20, chengjiao30.day21, chengjiao30.day22, chengjiao30.day23, chengjiao30.day24, chengjiao30.day25, chengjiao30.day26, chengjiao30.day27, chengjiao30.day28, chengjiao30.day29)/greatest(chengjiao30.day0, chengjiao30.day1, chengjiao30.day2, chengjiao30.day3, chengjiao30.day4, chengjiao30.day5, chengjiao30.day6) < 1.3');
        return $query->result_array();
    }
    public function get_stock_list_new()
    {
        $query = $this->db->query('select chengjiao30.* from chengjiao30 LEFT JOIN stock ON chengjiao30.code = stock.code WHERE stock.new=2 and stock.zuixin > 9 and stock.zuixin < 100 and stock.zhangfu > 0 and stock.zhangfu < 4 and chengjiao30.day0 > 0');
        return $query->result_array();
    }
    public function update_stock_list ($arr, $code) {
        if (count($arr) > 0) {
            $name = $arr[0];
            $chengjiao = $arr[8];
            $query = $this->db->query('select * from chengjiao30 where code = "' . $code . '"');
            $arr = $query->row_array();
            
            if ($chengjiao <= 0) {
                $chengjiao == 1000000000;
            }
            
            $stock = array(
                'name' => $name,
                'code' => $code,
                'day0' => $chengjiao,
                'day1' => 100000000,
                'day2' => 100000000,
                'day3' => 100000000,
                'day4' => 100000000,
                'day5' => 100000000,
                'day6' => 100000000,
                'day7' => 100000000,
                'day8' => 100000000,
                'day9' => 100000000,
                'day10' => 100000000,
                'day11' => 100000000,
                'day12' => 100000000,
                'day13' => 100000000,
                'day14' => 100000000,
                'day15' => 100000000,
                'day16' => 100000000,
                'day17' => 100000000,
                'day18' => 100000000,
                'day19' => 100000000,
                'day20' => 100000000,
                'day21' => 100000000,
                'day22' => 100000000,
                'day23' => 100000000,
                'day24' => 100000000,
                'day25' => 100000000,
                'day26' => 100000000,
                'day27' => 100000000,
                'day28' => 100000000,
                'day29' => 100000000
            );
            if (count($arr) < 1) {
                $this->db->insert('chengjiao30', $stock);
            } else {
                $this->db->query('update chengjiao30 set day0=' . $chengjiao . ' where code="' . $code . '"');
            }
        }
    }
    public function back_up ()
    {
        $query = $this->db->query('select * from chengjiao30');
        foreach ($query->result() as $row)
        {
            $code = $row->code;
            $day0 = $row->day0;
            $day1 = $row->day1;
            $day2 = $row->day2;
            $day3 = $row->day3;
            $day4 = $row->day4;
            $day5 = $row->day5;
            $day6 = $row->day6;
            $day7 = $row->day7;
            $day8 = $row->day8;
            $day9 = $row->day9;
            $day10 = $row->day10;
            $day11 = $row->day11;
            $day12 = $row->day12;
            $day13 = $row->day13;
            $day14 = $row->day14;
            $day15 = $row->day15;
            $day16 = $row->day16;
            $day17 = $row->day17;
            $day18 = $row->day18;
            $day19 = $row->day19;
            $day20 = $row->day20;
            $day21 = $row->day21;
            $day22 = $row->day22;
            $day23 = $row->day23;
            $day24 = $row->day24;
            $day25 = $row->day25;
            $day26 = $row->day26;
            $day27 = $row->day27;
            $day28 = $row->day28;
            $day29 = $row->day29;
            $this->db->query('update chengjiao30 set day0=0, day1=' . $day0 . ', day2=' . $day1 . ', day3=' . $day2 
            . ', day4=' . $day3 . ', day5=' . $day4 . ', day6=' . $day5 . ', day7=' . $day6 
            . ', day8=' . $day7 . ', day9=' . $day8 . ', day10=' . $day9 . ', day11=' . $day10 
            . ', day12=' . $day11 . ', day13=' . $day12 . ', day14=' . $day13
            . ', day15=' . $day14 . ', day16=' . $day15 . ', day17=' . $day16
            . ', day18=' . $day17 . ', day19=' . $day18 . ', day20=' . $day19 . ', day21=' . $day20
            . ', day22=' . $day21 . ', day23=' . $day22 . ', day24=' . $day23
            . ', day25=' . $day24 . ', day26=' . $day25 . ', day27=' . $day26
            . ', day28=' . $day27 . ', day29=' . $day28 . '  where code="' . $code . '"');
        }
    }
}
?>

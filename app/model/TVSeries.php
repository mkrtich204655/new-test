<?php

class TVSeries
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function getSeries(){
        $dateToday = date('Y-m-d');
        $nowDate = date("H:i:s");
        $this->db->query("SELECT * FROM `tv_series`  INNER JOIN `tv_series_intervals` ON tv_series.id = tv_series_intervals.id_tv_series 
                                WHERE `show_time` > '$nowDate' AND `week_day` = '$dateToday' ORDER BY `week_day`, `show_time` ASC ");
        $result = $this->db->resultSet();
        if (!$result){
            $this->db->query("SELECT * FROM `tv_series`  INNER JOIN `tv_series_intervals` ON tv_series.id = tv_series_intervals.id_tv_series
                                WHERE `week_day` > '$dateToday' ORDER BY `week_day`, `show_time` ASC  ");
            $result = $this->db->resultSet();
            return $result;
        }else{
            $this->db->query("SELECT * FROM `tv_series`  INNER JOIN `tv_series_intervals` ON tv_series.id = tv_series_intervals.id_tv_series 
                                WHERE `show_time` > '$nowDate' AND `week_day` = '$dateToday' ORDER BY `week_day`, `show_time` ASC ");
            $today = $this->db->resultSet();
            $this->db->query("SELECT * FROM `tv_series`  INNER JOIN `tv_series_intervals` ON tv_series.id = tv_series_intervals.id_tv_series 
                                WHERE `week_day` > '$dateToday' ORDER BY `week_day`, `show_time` ASC  ");
            $allDays = $this->db->resultSet();
            return array_merge($today,$allDays);
        }

    }

    public function getSeriesFilter($name = '',$date = null){

        $dateToday = date('Y-m-d');
        $nowDate = date("H:i:s");

//        $this->db->query("SELECT * FROM `tv_series`  INNER JOIN `tv_series_intervals` ON tv_series.id = tv_series_intervals.id_tv_series
//                                WHERE `show_time` > '$nowDate' AND `week_day` = '$dateToday' ORDER BY `week_day`, `show_time` ASC ");
//        $result = $this->db->resultSet();
        if ($date > $dateToday){
            $this->db->query("SELECT * FROM `tv_series`  INNER JOIN `tv_series_intervals` ON tv_series.id = tv_series_intervals.id_tv_series
                                WHERE `week_day` = '$date' AND `title` LIKE '%$name%' ORDER BY `week_day`, `show_time` ASC  ");
            $result = $this->db->resultSet();
            return $result;
        }else{
            $this->db->query("SELECT * FROM `tv_series`  INNER JOIN `tv_series_intervals` ON tv_series.id = tv_series_intervals.id_tv_series 
                                WHERE `show_time` > '$nowDate' AND `week_day` = '$dateToday' AND `title` LIKE '%$name%' ORDER BY `week_day`, `show_time` ASC ");
            $today = $this->db->resultSet();
            $this->db->query("SELECT * FROM `tv_series`  INNER JOIN `tv_series_intervals` ON tv_series.id = tv_series_intervals.id_tv_series 
                                WHERE `week_day` > '$dateToday' AND `title` LIKE '%$name%' ORDER BY `week_day`, `show_time` ASC  ");
            $allDays = $this->db->resultSet();
            return array_merge($today,$allDays);
        }
    }

}
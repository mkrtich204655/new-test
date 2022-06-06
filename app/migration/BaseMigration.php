<?php
try {
    $this->query("CREATE TABLE IF NOT EXISTS tv_series (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NULL,
            channel VARCHAR(255) NULL,
            gender VARCHAR(255)
            )");
    $this->execute();
    $this->query("CREATE TABLE IF NOT EXISTS tv_series_intervals (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            id_tv_series INT(6),
            week_day DATE,
            show_time TIME 

            )");
    $this->execute();

    $tv_seriesVal = $this->query("SELECT id FROM tv_series");
    $tv_seriesValResult = $this->resultSet();
    $tv_series_intervalsVal = $this->query("SELECT id FROM tv_series_intervals");
    $tv_series_intervalsValResult = $this->resultSet();

    if (empty($tv_seriesValResult) && empty($tv_series_intervalsValResult)){
        $this->query("INSERT INTO tv_series (title, channel, gender) VALUES ('NEWS SHANT', 'SHANT', 'boy')");
        $this->execute();
        $this->query("INSERT INTO tv_series (title, channel, gender) VALUES ('CCR', 'SHANT', 'boy')");
        $this->execute();
        $this->query("INSERT INTO tv_series (title, channel, gender) VALUES ('NEWS Tsayg', 'Tsayg', 'boy')");
        $this->execute();
        $this->query("INSERT INTO tv_series (title, channel, gender) VALUES ('Scientific Experiments', 'Tsayg', 'boy')");
        $this->execute();
        $this->query("INSERT INTO tv_series (title, channel, gender) VALUES ('NEWS Armenia', 'Armenia', 'boy')");
        $this->execute();

        $dateOfToday = date('Y-m-d');
        $dateOfTomorrow = date('Y-m-d',strtotime($dateOfToday . '+1 day' ));
        $dateOfDayAfterTomorrow =  date('Y-m-d',strtotime($dateOfToday . '+2 day' ));

        $time = "12:00:00";
        $time1 = "15:00:00";
        $time2 = "18:00:00";

        $this->query("INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES ('1', '".$dateOfToday."', '".$time."')");
        $this->execute();
        $this->query("INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES ('2', '".$dateOfTomorrow."','".$time1."')");
        $this->execute();
        $this->query("INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES ('3', '".$dateOfTomorrow."', '".$time2."')");
        $this->execute();
        $this->query("INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES ('4', '".$dateOfDayAfterTomorrow."', '".$time."')");
        $this->execute();
        $this->query("INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time) VALUES ('5',  '".$dateOfDayAfterTomorrow."', '".$time2."')");
        $this->execute();

    }

}catch (\mysql_xdevapi\Exception $exception){
    echo $exception;
}
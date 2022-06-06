<?php

class TVSeriesController extends Controller
{

    public function __construct(){
        $this->model = $this->model('TVSeries');
    }

    public function index(){
        $data = $this->model->getSeries();
        $this->view('home/index',$data);
    }

    public function filter(){
        $data = $this->model->getSeriesFilter($_REQUEST['seriesName'],$_REQUEST['date']);
       return $this->view('home/includes/filterView',$data);
    }
}
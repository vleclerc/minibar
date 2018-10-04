<?php

class GpioController extends MyController {
    
    static public $mapping = array(
        'pump1' => '17', // GPIO 0
        'pump2' => '18', // GPIO 1
        'pump3' => '27', // GPIO 2
        'pump4' => '22', // GPIO 3
        'pump5' => '23', // GPIO 4 //replace pump?
        'pump6' => '24', // GPIO 5
        'pump7' => '25', // GPIO 6
        'pump8' => '26' // GPIO 25...
    );
    
    public function getAction($request) {
        $data = new stdClass();
        $cmd = "php ".dirname(__FILE__)."/../scriptgpio.php 17 1";
        $output = passthru($cmd);
        $data->message = $output;
        $data->datetime = date('d/m/Y H:i:s');
        $this->response = new ResponseModel();
        $this->response->setData($data)->setStatus('success');
        return $this->response->toJson();
    }

    public function postAction($args) {
	   $data = new stdClass();
	   $this->response = new ResponseModel();
	   if(isset($args['pumpId']) && isset($args['during']) ){
            $pumpId = $args['pumpId'];
            $during = $args['during'];
            $id = self::$mapping[$pumpId];
            $cmd = "php ".dirname(__FILE__)."/../scriptgpio.php $id $during";
            $output = passthru($cmd);
            $data->message = $output;
            $this->response->setData($data)->setStatus('success');
        	}
        	else {
        		$data->message = 'no params found';
        		$this->response->setData($data)
        		->setStatus('error');
        	}
	
        return $this->response->toJson();;
    }

}

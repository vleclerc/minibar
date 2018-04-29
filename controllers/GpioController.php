<?php

class GpioController extends MyController {
    
    public function getAction($request) {
        $data = new StdClass();
        $result = exec('cd .. & sudo -t /usr/bin/php ./scriptgpio 17 1');
        $data->message = $result;
        $data->datetime = date('d/m/Y H:i:s');
        $this->response = new ResponseModel();
        $this->response->setData($data)->setStatus('success');
        return $this->response->toJson();
    }

    public function postAction($args) {
	
        var_dump(__METHOD__);
        
	   $data = new StdCLass();
	   $this->response = new ResponseModel();
	   if(isset($args['pumpId']) && isset($args['during']) ){
            $pumpId = $args['pumpId'];
            $during = $args['during'];
            $mapping = array(
        			'pump1' => '17',
        			'pump2' => '18',
        			'pump3' => '27',
        			'pump4' => '22',
        			'pump5' => '23',
        			'pump6' => '24',
        			'pump7' => '25',
        			'pump8' => '26'
        		);
        
            $id = $mapping[$pumpId];
            
            $cmd = "sudo -t php ./scriptgpio $id $during";
            
            var_dump($cmd);
            
            $output = passthru($cmd);
            
            
            var_dump($output);
            
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

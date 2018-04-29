<?php

class IndexController extends MyController{

   public $modules = [
      'gpio'
   ];

   public function getAction($request){

	$data = new StdClass();
	$data->modules = $this->modules;
	$data->datetime = date('d/m/Y H:i:s');

	$this->response = new ResponseModel();
	$this->response->setData($data);
        $this->response->setStatus('success');

	return $this->response->toJson();
   }

}

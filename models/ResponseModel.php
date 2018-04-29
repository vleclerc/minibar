<?php

class ResponseModel extends StdClass {

	public $data;
	public $status;

	public function setData($data){
		$this->data = $data;
		return $this;
	}

	public function setStatus($status){
		$this->status = $status;
		return $this;
	}

	public function toJson(){
		header('Content-Type: application/json');
		return json_encode($this,JSON_PRETTY_PRINT);
	}
}

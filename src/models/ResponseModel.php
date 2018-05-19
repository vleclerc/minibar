<?php

class ResponseModel extends StdClass {

	public $data;
	public $error;
	public $status;

	public function setData($data){
		$this->data = $data;
		return $this;
	}
	
	public function setError($error){
	    $this->error = $error;
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

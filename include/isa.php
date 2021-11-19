<?php

//require_once 'HTTP/Request2.php';

Class IsaRequest {

	protected $baseUrl = null;
	protected $headers = null;
	protected $Http = null;
	protected $options = null;
	protected $config = null;
	protected $type = null;
	protected $args = null;

	public function __construct() {
		$this->baseUrl = 'https://isa.epfl.ch/services/';
		$this->args = array('headers' => array('Accept' => 'application/xml', 'Accept-Charset' => 'UTF-8'));
	}

	public function executeRequest($url) {

		$data = null;
		$url = $this->baseUrl . $url;

		$request = wp_remote_get($url,$this->args);//new HTTP_Request2($url);

		if( is_wp_error( $request ) ) {
			echo "error ISARequest !";
			return false;
		}

		$data = wp_remote_retrieve_body( $request );//t->getBody();

		if (empty($data)){
			return null;
		}else{
			return $data;
		}
	}
}

?>

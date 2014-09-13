<?php

class Hello extends REST_Controller {

	function world_get() {
		$data->name = 'Matt';
		$this->response($data, 200);
	}

}
?>
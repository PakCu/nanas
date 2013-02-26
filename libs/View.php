<?php

class View {

	//setting for fix css and js and image, easy for bootsrapper.
	protected $fixheader = VIEW_FIXHEADER;

	function __construct() {
	}

	public function render($file_name, $data = null) {
		$ajax = $this->callAjax($file_name);
		require 'views/'.$file_name.'.php';
	}

	public function content($file_name) {
		require 'views/'.$file_name.'.php';
	}

	public function renderContent($file_name, $content_file, $data = null) {

		$content = $this->content($content_file);
		$this->render($file_name,$data);
	}

	protected function callAjax($name){
		$file = 'ajaxs/'.strtolower($name).'_ajax.js';
		if (file_exists($file)) {
			return '<script src="../'.$file.'"></script>';
		}
	}
}

?>
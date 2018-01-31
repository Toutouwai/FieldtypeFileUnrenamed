<?php namespace ProcessWire;

class WireUploadUnrenamed extends WireUpload {

	public function validateFilename($value, $extensions = array()) {
		$value = basename($value);
		if($value[0] == '.') return false; // no hidden files
		$value = $this->wire('sanitizer')->text($value);
		if(!strlen($value)) return false;

		$p = pathinfo($value);
		if(!isset($p['extension'])) return false;
		$extension = strtolower($p['extension']);

		if(count($extensions)) {
			if(!in_array($extension, $extensions)) $value = false;
		}

		return $value;
	}

}



<?php namespace ProcessWire;

class PagefilesUnrenamed extends Pagefiles {

	public function cleanBasename($basename, $originalize = false, $allowDots = true, $translate = false) {

		$basename = $this->wire('sanitizer')->text($basename);

		if($originalize) {
			$path = $this->path();
			$n = 0;
			$p = pathinfo($basename);
			while(is_file($path . $basename)) {
				$n++;
				$basename = "$p[filename]-$n.$p[extension]";
			}
		}

		return $basename;
	}

}

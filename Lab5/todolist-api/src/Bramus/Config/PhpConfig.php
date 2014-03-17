<?php

namespace Bramus\Config;

class PhpConfig extends BaseConfig {

	public function loadConfig() {

		$config = require $this->filename;
		$config = (1 === $config) ? array() : $config;
		return $config;

	}

}

// EOF
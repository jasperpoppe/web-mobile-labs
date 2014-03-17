<?php

namespace Bramus\Config;

abstract class BaseConfig extends \Pimple {

	public function __construct($filename) {

		// Store reference to filename
		$this->filename = $filename;

		// Make sure we have a filename
		if (!$this->filename) {
			throw new \RuntimeException('A valid configuration file must be passed before reading the config.');
		}

		// Make sure the file exists
		if (!file_exists($this->filename)) {
			throw new \InvalidArgumentException(sprintf("The config file '%s' does not exist.", $this->filename));
		}

		// Load the config
		$config = $this->loadConfig();

		// Inject all config values onto self
		$this->storeConfig($config);

	}

	abstract public function loadConfig();

	private function storeConfig(array $config) {
		foreach ($config as $k => $v) {
			$this[$k] = $v;
		}
	}

}

// EOF
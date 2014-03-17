<?php

namespace Api\Repository;

class Todos extends \Bramus\Database\Repository {

	public function getTableName() {
		return 'todos';
	}

}
<?php

namespace Providers\Core\DBConnection;

class MySqlConnectionAdapter extends BaseConnectionAdapter{
	
	public function __construct($dbName = NULL, $driverClass = ''){

		parent::__construct($dbName, $driverClass);

	}

	protected function makeConnection(array $config){ 

		$dbname = $this->getDBName();

		$type = $this->getType();

		$connectionString = 'mysql:host=' . $config['hostname'] . ';dbname=' . $dbname . ';charset=' . $config['charset'];

		if(isset($config['port'])){
			$connectionString .= ';port=' . $config['port'];
		}
		
		if(isset($config['unix_socket'])){
			$connectionString .= ';unix_socket' . $config['unix_socket'];
		}	

		if(!isset($type)){

			return NULL;
		}

		$dbo = new $type($connectionString, $config['username'], $config['password'], $config['settings']);

		return $dbo;
	}
}

?>


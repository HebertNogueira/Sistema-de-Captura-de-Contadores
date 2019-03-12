<?php
	class connect {
		public function connecting(){
			global $mysqli;
			$mysqli = new mysqli('127.0.0.1', '%%LOGIN%%', '%%SENHA%%', 'printers');
			
			if (mysqli_connect_errno()) {
				die('Não foi possível conectar-se ao banco de dados, motivo: ' . mysqli_connect_error() . ".");
				exit();
			}			
		}	
	}
?>
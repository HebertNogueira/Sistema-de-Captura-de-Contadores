<?php
	class connect {
		public function connecting(){
			global $mysqli;
			$mysqli = new mysqli('127.0.0.1', 'root', 'Fushid@2019DB', 'printers');
			
			if (mysqli_connect_errno()) {
				die('Não foi possível conectar-se ao banco de dados, motivo: ' . mysqli_connect_error() . ".");
				exit();
			}			
		}	
	}
?>
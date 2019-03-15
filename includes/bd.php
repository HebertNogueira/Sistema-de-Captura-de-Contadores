<?php
	class connect {
		public function connecting(){
			global $mysqli;
			//Alterar LOGIN e SENHA
			$mysqli = new mysqli('127.0.0.1', '>>>login<<<', '>>>senha<<<', 'printers');
			
			if (mysqli_connect_errno()) {
				die('Não foi possível conectar-se ao banco de dados, motivo: ' . mysqli_connect_error() . ".");
				exit();
			}			
		}	
	}
?>
<?php
	if(isset($_POST['acao'])){
		if($_POST['acao']=="alterar"){
			$manter = new manter();
			$manter->updateImpressoras();
		}
		
		if($_POST['acao']=="incluir"){
			$manter = new manter();
			$manter->insertImpressoras();
		}
		
		if($_POST['acao']=="excluir"){
			$manter = new manter();
			$manter->deleteImpressoras();
		}
	}

	class manter {
		function updateImpressoras(){
			$connect = new connect();
			$connect->connecting();			
			$codigoGet = $_GET['codigoGet'];
			$ip = $_POST['ip'];
			$nome = $_POST['nome'];
			$changed = $_GET['changed'];
			global $mysqli;
			
			$sql = "UPDATE equipamentos SET equipIP='$ip', equipNome='$nome' where idEquipamento_pk='$codigoGet'";
			if ($mysqli->query($sql) === TRUE) {
				echo "================================================ <p>";
				echo "Equipamento: $nome <br>Alterado com sucesso.<p>";
				echo "================================================ <p>";
			} else {
				echo "================================================ <p>";
				echo "Equipamento: $nome - ERRO.<br>";
				echo "Error: " . $sql . "<br>" . $mysqli->error;
				echo "================================================ <p>";
			}
			$mysqli->close();
			header('Location: index.php?action=cadastro');
		}
		
		function insertImpressoras(){
			$connect = new connect();
			$connect->connecting();	
			$ip = $_POST['ip'];
			$nome = $_POST['nome'];
			global $mysqli;
			
			$sql = "INSERT INTO equipamentos (equipIP,equipNome) values ('$ip','$nome')";
			if ($mysqli->query($sql) === TRUE) {
				echo "================================================ <p>";
				echo "Equipamento: $nome <br>Incluído com sucesso.<p>";
				echo "================================================ <p>";
			} else {
				echo "================================================ <p>";
				echo "Equipamento: $nome - ERRO.<br>";
				echo "Error: " . $sql . "<br>" . $mysqli->error;
				echo "================================================ <p>";
			}
			$mysqli->close();
		}
		
		function deleteImpressoras(){
			$connect = new connect();
			$connect->connecting();
			$codigoGet = $_GET['codigoGet'];
			$nome = $_POST['nome'];
			global $mysqli;
			
			$sql = "DELETE from equipamentos where idEquipamento_pk='$codigoGet'";
			if ($mysqli->query($sql) === TRUE) {
				echo "================================================ <p>";
				echo "Equipamento: $nome <br>Excluído com sucesso.<p>";
				echo "================================================ <p>";
			} else {
				echo "================================================ <p>";
				echo "Equipamento: $nome - ERRO.<br>";
				echo "Error: " . $sql . "<br>" . $mysqli->error;
				echo "================================================ <p>";
			}
			$mysqli->close();
		}
		
		function selectImpressoras(){
			$connect = new connect();
			$connect->connecting();
			$sql = "SELECT * FROM equipamentos ORDER BY equipIP";			
			global $result;
			global $mysqli;
			$result = $mysqli->query($sql);
			return $result;
		}
		
		function selectContadores(){
			$connect = new connect();
			$connect->connecting();
			$sql = "SELECT * FROM contadores ORDER BY dataContador";			
			global $result;
			global $mysqli;
			$result = $mysqli->query($sql);
			return $result;
		}
		
		function selectContadoresDetalhes($idEquipamento_fk, $dataContador){
			$connect = new connect();
			$connect->connecting();
			$sql = "SELECT * FROM contadores where idEquipamento_fk =$idEquipamento_fk and dataContador=$dataContador ORDER BY dataContador";			
			global $result;
			global $mysqli;
			$result = $mysqli->query($sql);
			return $result;
		}
		
	}
?>
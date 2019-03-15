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
			global $mysqli;
			$connect = new connect();
			$connect->connecting();			
			$codigoGet = $_GET['codigoGet'];
			$ip = $_POST['ip'];
			$nome = $_POST['nome'];
			$changed = $_GET['changed'];
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
			//header('Location: index.php?action=cadastro');
		}
		
		function insertImpressoras(){
			global $mysqli;
			$connect = new connect();
			$connect->connecting();	
			$ip = $_POST['ip'];
			$nome = $_POST['nome'];
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
			global $mysqli;
			$connect = new connect();
			$connect->connecting();
			$codigoGet = $_GET['codigoGet'];
			$nome = $_POST['nome'];			
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
			global $resultImpressoras;
			global $mysqli;
			$connect = new connect();
			$connect->connecting();
			$sql = "SELECT * FROM equipamentos ORDER BY idEquipamento_pk";			
			$resultImpressoras = $mysqli->query($sql);
			return $resultImpressoras;
		}
		
		function selectContadores(){
			global $resultContadores;
			global $mysqli;
			$connect = new connect();
			$connect->connecting();
			$sql = "SELECT * FROM contadores ORDER BY dataContador";
			$resultContadores = $mysqli->query($sql);
			return $resultContadores;
		}
		
		function selectContadoresDetalhes($idEquipamento_fk){
			global $resultContadoresDetalhes;
			global $mysqli;
			$connect = new connect();
			$connect->connecting();
			$sql = "SELECT * FROM contadores where idEquipamento_fk='$idEquipamento_fk' order by dataContador ";	
			$resultContadoresDetalhes = $mysqli->query($sql);
			return $resultContadoresDetalhes;
		}
		
		function selectImpressorasUnico($codigo){
			global $resultImpressorasUnico;
			global $mysqli;
			$connect = new connect();
			$connect->connecting();
			$sql = "SELECT * FROM equipamentos where idEquipamento_pk=$codigo ORDER BY equipIP";
			$resultImpressorasUnico = $mysqli->query($sql);
			return $resultImpressorasUnico;
		}
	}
?>
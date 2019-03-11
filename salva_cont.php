<?php
	//Instancia a classe connect() que esta em bd.php.
	$connect = new connect();
	
	//Chama a função de abertura de conexão com o banco de dados
	$connect->connecting();
	
	//Query para pesquisar no banco as impressoras cadastradas (ID, NOME, IP).
	$sql = "select idEquipamento_pk, equipNome, equipIP from equipamentos";

		//Executa a query de pesquisa de impressoras no banco.
	if ($result = $mysqli->query($sql)) {
		
		//While para executar as tarefas nas impressoras cadastradas
		while ($row = $result->fetch_assoc()) {
			
			//Armazena dados à ser utilizado na impressora da vez.
			$idEquipamento_pk = $row['idEquipamento_pk'];
			$equipNome = $row['equipNome'];
			$equipIP = $row['equipIP'];
			$date = date('Y-m-d H:i:s');
			
			//Comando SNMP à ser executado no shell e retornar contador.
			//Requer acesso ao SHELL pelo PHP e o pacone SNMP instalado no Linux.
			$exec = exec("snmpwalk -v 1 $equipIP iso.3.6.1.2.1.43.10.2.1.4.1.1 -c public");
			
			//Limpa o retorno, deixando somento o contador.
			$resultado = substr_replace($exec, '', 0, 43);
			
			//Query para salvar no banco de dados (ID, DATA, CONTADOR).
			$sql = "INSERT INTO contadores (idEquipamento_fk, dataContador, contTotal) 
			VALUES ('$idEquipamento_pk', '$date', '$resultado')";
			
			//Executa a query e trata o retorno.
			if ($mysqli->query($sql) === TRUE) {
				echo "================================================ <p>";
				echo "Equipamento: $equipNome <br>Salvo com sucesso.<p>";
			} else {
				echo "================================================ <p>";
				echo "Equipamento: $equipNome - ERRO.<br>";
				echo "Error: " . $sql . "<br>" . $mysqli->error;
			}
		}
				echo "================================================ <p>";
		
		//Limpa a pesquisa encontrada.
		$result->close();
		
	//Fecha conexão com o banco de dados.
	$mysqli->close();
	}
?>
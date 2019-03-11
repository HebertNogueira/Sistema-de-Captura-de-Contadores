<?php
	//Instancia a clase connect() que esta em bd.php.
	$connect = new connect();
	
	//Chama a função de abertura de conexão com o banco de dados
	$connect->connecting();
	
	//Query para pesquisar no banco as impressoras cadastradas (ID, NOME, IP).
	$sql = "select idEquipamento_pk, equipNome, equipIP from equipamentos";

		//Executa a query de pesquisa de impressoras no banco.
	if ($result = $mysqli->query($sql)) {
		
		echo "================================================ <br>";
		echo "DATA DO RELATÓRIO: " . date('d-m-Y H:i:s') . "<br>";
		echo "================================================ <p>";
		
		//While para executar as tarefas nas impressoras cadastradas
		while ($row = $result->fetch_assoc()) {
			
			//Comando SNMP à ser executado no shell e retornar contador.
			//Requer acesso ao SHELL pelo PHP e o pacone SNMP instalado no Linux.
			$exec = exec("snmpwalk -v 1 $row[equipIP] iso.3.6.1.2.1.43.10.2.1.4.1.1 -c public");
			
			//Limpa o retorno, deixando somento o contador.
			$resultado = substr_replace($exec, '', 0, 43);
			
			//Apresenta na tela o resultado da vez.
			echo "================================================ <p>";
			echo "Equipamento: $row[equipNome] <br>";
			echo "Endereço IP: $row[equipIP] <br>";
			echo "Contador: $resultado <p>";
			echo "================================================ <p>";
		}

		//Limpa a pesquisa encontrada.
		$result->close();
	}
	
	//Fecha conexão com o banco de dados.
	$mysqli->close();
?>
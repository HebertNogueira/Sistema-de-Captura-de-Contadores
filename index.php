<?php include 'includes/includes.php'; ?>
<html>
	<head>
		<title>IMPRESSORAS</title>
	</head>
	
	<body>	
	<h2>Sistema de Captura de Contadores</h2>
	<form action="index.php" method="get">
	<TABLE BORDER=0 CELLSPACING=0>
		<tr>
			<td>
				<button type="submit" name="action" value="cadastro" class="button"><span>Cadastrar Impressoras</span></button>
			</td>
			<td>
				<button type="submit" name="action" value="visualiza_cont" class="button" value ><span>Visualizar Contadores</span></button>
			</td>
			<td>
				<button type="submit" name="action" value="salva_cont" class="button"><span>Salvar Contadores</span></button>
			</td>										
		</tr>
	</table>
	</form>	
	<hr />	
	<?php	
		if(isset($_GET['action'])){
			if($_GET['action']=="visualiza_cont"){
				include 'visualiza_cont.php';
				}
			
			if($_GET['action']=="salva_cont"){
				include 'salva_cont.php';
			}
			
			if($_GET['action']=="cadastro"){
				include 'cadastro.php';
			}
		} else {
			include 'bemvindo.php';
		}
	?>
	</body>
</html>


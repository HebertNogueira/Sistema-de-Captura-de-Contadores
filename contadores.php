<?php include 'includes/includes.php'; ?>
<html>
	<head>
		<title>IMPRESSORAS</title>
	</head>
	
	<body>
	
	<TABLE BORDER=1 CELLSPACING=10>
		<tr>
			<?php $manter = new manter(); if ($manter->selectImpressoras()) while ($row = $result->fetch_assoc()) { ?>
				<td colspan=2><h3><?php echo $row['equipNome']; ?></h3></td>
			<?php }	?>
		</tr>
		
		<?php $manter = new manter();
			if ($manter->selectContadores()) while ($row = $result->fetch_assoc()) {
				$idEquipamento_fk=1;
				$dataContador=$row['dataContador'];
		?>
		
		<tr>
			<?php if ($manter->selectContadoresDetalhes($idEquipamento_fk, $dataContador)) while ($row = $result->fetch_assoc()) { ?>
				<td><?=$row['dataContador']?></td>
				<td><?=$row['contTotal']?></td>
			<?php $contaPrinters++; }?>	
			
			<?php if ($manter->selectContadoresDetalhes($idEquipamento_fk, $dataContador)) while ($row = $result->fetch_assoc()) { ?>
				<td><?=$row['dataContador']?></td>
				<td><?=$row['contTotal']?></td>
			<?php $contaPrinters++; } ?>	
				
			<?php if ($manter->selectContadoresDetalhes($idEquipamento_fk, $dataContador)) while ($row = $result->fetch_assoc()) { ?>
				<td><?=$row['dataContador']?></td>
				<td><?=$row['contTotal']?></td>
			<?php $contaPrinters++; } ?>	
	
			<?php if ($manter->selectContadoresDetalhes($idEquipamento_fk, $dataContador)) while ($row = $result->fetch_assoc()) { ?>
				<td><?=$row['dataContador']?></td>
				<td><?=$row['contTotal']?></td>
			<?php $contaPrinters++; } ?>	
			
		</tr>
		
		<?php } $result->close(); $mysqli->close();	?>	
		
	</table>
	
	
	
	
		<TABLE BORDER=0 CELLSPACING=0>
			<tr>
				<td>
					<label for="txtListar"> &nbspNome </label>
				</td>
				<td colspan=3>
					<label for="txtListar" > &nbspIP </label>
				</td>
			</tr>
			
		<?php $manter = new manter(); if ($manter->selectImpressoras()) while ($row = $result->fetch_assoc()) { ?>
		
		<form action="cadastro.php?codigoGet=<?php echo $row['idEquipamento_pk']; ?>&changed=<?php echo $row['idEquipamento_pk']; ?>" method="post">	
			<tr>
				<td align='center'>
					<input type="text" name="nome" style="width: 200" value="<?php echo $row['equipNome']; ?>"/>
				</td>
				<td align='center'>
					<input type="text" name="ip" style="width: 200" value="<?php echo $row['equipIP']; ?>"/>
				</td>
				<td align='center'>
					<button type="submit" name="acao" class="button" value="alterar"><span>Alterar</span></button>
				</td>
				<td align='center'>
					<button type="submit" name="acao" class="button" value="excluir"><span>Excluir</span></button>
				</td>
			</tr>
		</form>
		<?php } $result->close(); $mysqli->close();	?>
		</table>
	</body>
</html>
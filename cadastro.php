	<form action="index.php?action=cadastro" method="post">
		<h3>Cadastrar Impressora</h3>
		<TABLE BORDER=0 CELLSPACING=0>
			<tr>
				<td>
					<label for="txtListar" > &nbspNome </label>
				</td>
				<td>
					<label for="txtListar"> &nbspIP </label>
				</td>
			</tr>	
			<tr>
				<td >
					<input type="text" name="nome" style="width: 200"/>
				</td>
				<td>
					<input type="text" name="ip" style="width: 200"/>
				</td>
				<td>
					<input type="checkbox" name="acao" value="incluir" style="display:none" checked>
					<button type="submit" name="submit" class="button"><span>Cadastrar</span></button>
				</td>										
			</tr>
		</table>
	</form>	
	
	<h3>Impressoras Cadastradas</h3>
		<TABLE BORDER=0 CELLSPACING=0>
			<tr>
				<td>
					<label for="txtListar"> &nbspNome </label>
				</td>
				<td colspan=3>
					<label for="txtListar" > &nbspIP </label>
				</td>
			</tr>
			
		<?php $manter = new manter(); if ($manter->selectImpressoras()) while ($row = $result1->fetch_assoc()) { ?>
		
		<form action="index.php?action=cadastro&codigoGet=<?=$row['idEquipamento_pk']; ?>&changed=<?=$row['idEquipamento_pk']; ?>" method="post">	
			<tr>
				<td align='center'>
					<input type="text" name="nome" style="width: 200" value="<?=$row['equipNome']; ?>"/>
				</td>
				<td align='center'>
					<input type="text" name="ip" style="width: 200" value="<?=$row['equipIP']; ?>"/>
				</td>
				<td align='center'>
					<button type="submit" name="acao" class="button" value="alterar"><span>Alterar</span></button>
				</td>
				<td align='center'>
					<button type="submit" name="acao" class="button" value="excluir"><span>Excluir</span></button>
				</td>
			</tr>
		</form>
		<?php } $result1->close(); $mysqli->close();	?>
		</table>
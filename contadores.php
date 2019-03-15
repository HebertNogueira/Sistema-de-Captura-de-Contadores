<TABLE BORDER=1 CELLSPACING=10>
	<tr>
	<?php $manter = new manter(); if ($manter->selectImpressoras()) while ($row5 = $result1->fetch_assoc()) {
		global $idEquipamento_fk;
		$idEquipamento_fk=$row5['idEquipamento_pk'];
	?>	
		<td valign="top">
			<TABLE BORDER=1 CELLSPACING=10>	
				<?php if ($manter->selectImpressorasUnico($idEquipamento_fk)) while ($row1 = $result4->fetch_assoc()) { ?>
				
			<tr>
				<td colspan=2><h3><?php echo $row1['equipNome']; ?></h3></td>
			</tr>
			
			<?php if ($manter->selectContadoresDetalhes($idEquipamento_fk)) while ($row3 = $result3->fetch_assoc()) { ?>
			<tr>
				<td><?=$row3['dataContador']?></td>
				<td><?=$row3['contTotal']?></td>				
			</tr>
			<?php } ?>
			
			<?php }	?>
			
			</table>
		</td>
	<?php } ?>	
	</tr>
</table>			

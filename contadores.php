<TABLE BORDER=1 CELLSPACING=10>
	<tr>
	<?php
		$manter = new manter();
		if ($manter->selectImpressoras()) while ($linhasImpressoras = $resultImpressoras->fetch_assoc()) {
		global $idEquipamento_fk;
		$idEquipamento_fk=$linhasImpressoras['idEquipamento_pk'];
	?>	
		<td valign="top">
			<TABLE BORDER=1 CELLSPACING=10>	
				<?php if ($manter->selectImpressorasUnico($idEquipamento_fk)) while ($linhasImpressorasUnico = $resultImpressorasUnico->fetch_assoc()) { ?>
				
			<tr>
				<td colspan=2><h3><?php echo $linhasImpressorasUnico['equipNome']; ?></h3></td>
			</tr>
			
			<?php if ($manter->selectContadoresDetalhes($idEquipamento_fk)) while ($linhasContadoresDetalhes = $resultContadoresDetalhes->fetch_assoc()) { ?>
			<tr>
				<td><?=$linhasContadoresDetalhes['dataContador']?></td>
				<td><?=$linhasContadoresDetalhes['contTotal']?></td>				
			</tr>
			<?php } ?>
			
			<?php }	?>

			</table>
		</td>
	<?php } ?>
	</tr>
</table> 
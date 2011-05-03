<table border=1>
	<tr>
		<th>Contenido</th>
		<th>Fecha</th>
		<th>Autor</th>
	</tr>
	
	<?php foreach($data as $key=>$values):?>
	<tr>
		<td><?php echo $values["content"]?></td>
		<td><?php echo $values["date"]?></td>
		<td><?php echo $values["author"]?></td>
	</tr>		
	<?php endforeach;?>
</table>
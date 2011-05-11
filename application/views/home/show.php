<div class="span-6" id="menu">
	<div class="contenido-izq">
	<?php if (isset($page["contenido-izq"]) ){
		echo $page["contenido-izq"]["title"];
		echo $page["contenido-izq"]["value"];
		
	}?>	
	</div>
</div>

<div class="span-18 last">
	<p>
	<?php if (isset($page["principal"]) ){
		echo $page["principal"]["title"];
		echo $page["principal"]["value"];
	}?>
	</p>			

	

	<div class="span-6">
		<div class="borde-sombra">
			<?php if (isset($page["col1"]) ){
				echo $page["col1"]["title"];
				echo $page["col1"]["value"];
			}?>
		</div>			
	</div>
	
	<div class="span-6">
		<div class="borde-sombra">
		<?php if (isset($page["col2"]) ){
			echo $page["col2"]["title"];
			echo $page["col2"]["value"];
		}?>
		</div>		
	</div>
	
	<div class="span-6 borde-sombra-der last">
		<div class="borde-sombra" style="padding-right:10px">
		<?php if (isset($page["col3"]) ){
			echo $page["col3"]["title"];
			echo $page["col3"]["value"];
		}?>
		</div>
	</div>
	
	
</div>
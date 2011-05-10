<div class="span-5 border" id="menu">
	<div class="contenido-izq">
	<?php if (isset($page["contenido-izq"]) ){
		echo $page["contenido-izq"]["title"];
		echo $page["contenido-izq"]["value"];
	}?>	
	</div>
</div>

<div class="span-19 last">
	<p>
	<?php if (isset($page["principal"]) ){
		echo $page["principal"]["title"];
		echo $page["principal"]["value"];
	}?>
	</p>			

	<div class="span-6 colborder">
		<?php if (isset($page["col1"]) ){
			echo $page["col1"]["title"];
			echo $page["col1"]["value"];
		}?>		
	</div>
	
	<div class="span-6 colborder">
		<?php if (isset($page["col2"]) ){
			echo $page["col2"]["title"];
			echo $page["col2"]["value"];
		}?>		
	</div>
	
	<div class="span-5 last">
		<?php if (isset($page["col3"]) ){
			echo $page["col3"]["title"];
			echo $page["col3"]["value"];
		}?>	
	</div>
</div>
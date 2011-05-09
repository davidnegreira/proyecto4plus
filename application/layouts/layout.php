<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Título</title>
	
    <!-- Framework CSS -->
    <link rel="stylesheet" href="/styles/blueprint/screen.css" type="text/css" media="screen, projection">
    <link rel="stylesheet" href="/styles/blueprint/print.css" type="text/css" media="print">
    <link rel="stylesheet" href="/styles/layout.css" type="text/css" media="screen">
    <!--[if lt IE 8]><link rel="stylesheet" href="/styles/blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->

</head>

<body>

<!-- Las columnas miden 30px. Se pueden agrupar. El tamaño resultantes lo da la siguente formula: anchura = (columnas_que_unimos * 40) - 10 -->

<!-- Contenedor Principal de la Pagina -->
<div class="container" id="contenedor">
	<div class="span-24 last" id="cabecera">
		<div class="span-6" id="logo">
			<h1>Proyecto 4 +</h1>
		</div>
		
		<div class="span-18 last" id="cab-imagenes">
			<img src="/assets/imgcab.jpg" width="710" height="150" alt="imagen cabecera">
		</div>
			
	</div>
	
	<div class="span-24 last border-right border-left" id="cuerpo">
		
		<div class="span-5 border" id="menu">
			<div class="contenido-izq">
				<h3>Destacados</h3>
				<ul>
				<li><a>enlace1</a></li>
				<li><a>enlace2</a></li>
				</ul>
			</div>
		</div>
		
		<div class="span-19 last">
			<p>		
				<?php echo $content?>
			</p>		
		
			<div class="span-6 colborder">
				<h2>Columna 1</h2>
				<img src="/assets/imgcol1.jpg" width="220" height="140" alt="imagen col1">
				<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. </p>
			</div>
			
			<div class="span-6 colborder">
				<h2>Columna 2</h2>
				<img src="/assets/imgcol2.jpg" width="220" height="140" alt="imagen col2">
				<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. </p>			
			</div>
			
			<div class="span-5 last">
				<h2>Columna 3</h2>
				<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. </p>
			</div>
		</div>
		
		<div class="span-24 border-right border-left last" id="pie">
			<h4 class="prepend-22">copyright</h4>
		</div>	
			
	</div>
	
</div> 

<div id="pie_pagina">&nbsp;</div>

</body>
</html>
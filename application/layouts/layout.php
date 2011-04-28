<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Título</title>
	
    <!-- Framework CSS -->
    <link rel="stylesheet" href="/styles/blueprint/screen.css" type="text/css" media="screen, projection">
    <link rel="stylesheet" href="/styles/blueprint/print.css" type="text/css" media="print">
    <!--[if lt IE 8]><link rel="stylesheet" href="/styles/blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->

</head>

<body>

<!-- Las columnas miden 30px. Se pueden agrupar. El tamaño resultantes lo da la siguente formula: anchura = (columnas_que_unimos * 40) - 10 -->

<!-- Contenedor Principal de la Pagina -->
<div class="container">
	<div class="span-24 last" style="background-color:blue">
			<h1>Prueba del layout Blueprint</h1>
	</div>

	<div class="span-18" >
		<p>Cuerpo izquierda...</p>
		
		<p>		
			<?php echo $content?>
		</p>		
	
		<div class="span-5 colborder">
			<h2>Columna 1</h2>
			<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. </p>
		</div>
		
		<div class="span-5 colborder">
			<h2>Columna 2</h2>
			<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. </p>			
		</div>
		
		<div class="span-5 last">
			<h2>Columna 3</h2>
			<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. </p>
		</div>
	</div>

	<div class="span-6 last" style="background-color:red;">
		<div ">
			<h3>Lateral</h3>
			<ul>
			<li><a>enlace1</a></li>
			<li><a>enlace2</a></li>
			</ul>
		</div>
	</div>
	
	<div class="span-24 last" style="background-color:blue;">
		<h2>Pie</h2>
	</div>	
</div> 

</body>
</html>
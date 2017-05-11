<?php 
include('html/overall/header.php');

 ?>
<div class="container">
		<header class="codrops-header">
			
			<nav class="codrops-demos">
				<a class="current-demo" href="#" style="font-size: 25px;">Inicio</a>
				<a href="?opc=1" style="font-size: 25px; color: #FFFAF0;">Casas</a>
				<a href="?opc=2" style="font-size: 25px; color: #FFFAF0;">Terrenos</a>
				<a href="?opc=3" style="font-size: 25px; color: #FFFAF0;">Departamentos</a>
				<a href="?opc=4" style="font-size: 28px; color: black;" >Acceder</a>
				<a href="?opc=5" style="font-size: 28px; color: #FFFAF0;" >Registrarse</a>
				
			</nav>
		</header>
		<script type="text/javascript">
			function myFunction()
			{
				window.location='?opc=7';
			}
		</script>
		<div class="wrap">
			<div class="Background">
				<canvas class="Background-canvas"></canvas>
			</div>
		</div>
		<div class="intro">
			<h2 class="intro__title" style="color: white;"  onclick="myFunction()">Hooms</h2>
			<p class="intro__subtitle active" style="font-size: 20px;color:whitesmoke">Tu luagar ideal para buscar Casas, Terrenos, Departamentos y Más.</p>
			
			<center>
			<br>
				<form class="form-inline" method="POST" action="model/components/access.php">
					<div class="form-group">
					<input type="text" class="form-control" id="user" name="usuario" placeholder="Usuario....">
					</div>
					<div class="form-group">
					<input type="password" class="form-control" name="password" id="pass" placeholder="Contraseña">
					</div>
					<button type="submit" class="btn btn-success">Ingresar</button>
				</form>
			</center>
			<br>
			<br>
			<br>
			<br>
			<br>
		</div>
	</div>
	
	<?php 

		include('html/overall/footer.php');

	 ?>
<?php 
include('html/overall/header.php');

 ?>
<div class="container">
		<header class="codrops-header">
			
			<nav class="codrops-demos">
				<a class="current-demo" href="#" style="font-size: 25px;">Inicio</a>
				<a href="?opc=1" style="font-size: 25px; color: #FFFAF0;">Casas</a>
				<a href="?opc=2" style="font-size: 25px; color: black;">Terrenos</a>
				<a href="?opc=3" style="font-size: 25px; color: #FFFAF0;">Departamentos</a>
				<a href="?opc=4" style="font-size: 28px; color: #FFFAF0;" >Acceder</a>
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
			<p class="intro__subtitle active" style="font-size: 20px;color:whitesmoke">Tu luagar ideal para buscar Casas, Terrenos, Departamentos y Másss.</p>
			
			<center>
			<br>
			<div class='row' style='width:900px;height:350px;line-height:3em;overflow:scroll;overflow-style:hide ;'>
			<?php 
			$obj = new Casas();
			$obj->Mostrar();
			/**
			* 
			*/
			class Casas
			{
				private $sql,$query,$row;
				function __construct()
				{
					include 'conexion/query.php';
					$this->db = new Querys();
				}
				function Mostrar()
				{
					$this->sql="select * from terreno";
					$this->query=$this->db->ConsultaRetorno($this->sql);
					while ($this->row=mysqli_fetch_array($this->query)) {
						$asd=str_replace('../','',$this->row['foto']);
						echo "
								
								<div class='col-sm-4 col-md-3 overlay'>
								<div class='thumbnail alert alert-info'>
								<img class='img-rounded' src=".$asd." height='100' width='100'>
								<div class='caption'>
								<h4><span class='fa fa-home'></span><a href='?opc=description&id=".$this->row['id_terreno']."&tabla=casa'> ".$this->row['titulo']."</a></h4>
								<p><span class='fa fa-taxi'></span> ".$this->row['direccion']."</p>
								<strong><span class='fa fa-mobile-phone'></span>  ".$this->row['telefono']."</strong>
								<br>
								<p style='color:deeppink ;'><span class='fa fa-hand-o-right'></span> ".$this->row['estado']."</p>
								</div>
								</div>
								</div>
								
								";
					}
				}
			}
			 ?>
</div>
		</center>
		</div>
	</div>
	<?php 

		include('html/overall/footer.php');

	 ?>
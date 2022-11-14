<!-- Page header -->
<div class="full-box page-header">
	<h3 class="text-left">
		<i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR CLIENTE
	</h3>
	<p class="text-justify">
		Realiza búsqueda de todos tus clientes de una manera más rápida y ágil, busca por identificación,
        nombre, apellido o teléfono

	</p>
</div>

<div class="container-fluid">
	<ul class="full-box list-unstyled page-nav-tabs">
		<li>
			<a href="<?php echo SERVERURL; ?>client-new/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR CLIENTE</a>
		</li>
		<li>
			<a href="<?php echo SERVERURL; ?>client-list/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE CLIENTES</a>
		</li>
		<li>
			<a class="active" href="<?php echo SERVERURL; ?>client-search/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR CLIENTE</a>
		</li>
	</ul>
</div>

<?php
	// SI LA VARIABLE DE SESION NO ESTA DEFINIDA O NO EXISTE
	if(!isset($_SESSION['busqueda_cliente']) && empty($_SESSION['busqueda_cliente']) ){
?>
<!-- Content here-->
<div class="container-fluid">
<form class="FormularioAjax form-neon" action="<?php echo SERVERURL; ?>ajax/searchAjax.php"
	method="POST" data-form="search" autocomplete="off">
	<input type="hidden" name="modul" value="cliente">
		<div class="container-fluid">
			<div class="row justify-content-md-center">
				<div class="col-12 col-md-6">
					<div class="form-group">
						<label for="inputSearch" class="bmd-label-floating">¿Qué cliente estas buscando?</label>
						<input type="text" class="form-control" name="busquedaInicial" id="inputSearch" maxlength="30">
					</div>
				</div>
				<div class="col-12">
					<p class="text-center" style="margin-top: 40px;">
						<button type="submit" class="btn btn-raised btn-info"><i class="fas fa-search"></i> &nbsp; BUSCAR</button>
					</p>
				</div>
			</div>
		</div>
	</form>
</div>
<?php }else{ ?>
<div class="container-fluid">
<form class="FormularioAjax form-neon" action="<?php echo SERVERURL; ?>ajax/searchAjax.php"
	method="POST" data-form="search" autocomplete="off">
	<input type="hidden" name="modul" value="cliente">
		<input type="hidden" name="eliminarBusqueda" value="eliminar">
		<div class="container-fluid">
			<div class="row justify-content-md-center">
				<div class="col-12 col-md-6">
					<p class="text-center" style="font-size: 20px;">
						Resultados de la busqueda <strong>
							“<?php echo $_SESSION['busqueda_cliente']; ?>”
						</strong>
					</p>
				</div>
				<div class="col-12">
					<p class="text-center" style="margin-top: 20px;">
						<button type="submit" class="btn btn-raised btn-danger"><i class="far fa-trash-alt"></i> &nbsp; ELIMINAR BÚSQUEDA</button>
					</p>
				</div>
			</div>
		</div>
	</form>
</div>

<div class="container-fluid">
<?php
		require_once './controllers/clientController.php';
		$insClient = new clientController();

		// UsupaginatorController($actualPage, $registers, $privilegio, $url, $busqueda){
			// los array se cuentan desde 0,
			// 0 = vista y de 1 en adelante son las paginas de los datos que se muestran
			// la busqueda no se define ya que este es el listado general
		echo $insClient->clientPaginatorController($page[1], 5, $_SESSION['privilegio_sv'],
		$page[0],$_SESSION['busqueda_cliente']);
?>
</div>
<?php } ?>
<!-- Page header -->
<div class="full-box page-header">
	<h3 class="text-left">
		<i class="fab fa-dashcube fa-fw"></i> &nbsp; INICIO
	</h3>
	<p class="text-justify">
	Aquí encontraras todas las opciones con las que puedes interactuar según tu usuario y tus permisos.
	</p>
</div>

<!-- Content -->
<div class="full-box tile-container">
	<?php 
		require_once "./controllers/clientController.php";
		$insClient = new clientController();

		$totalClient = $insClient->dataClientController("Conteo",0);
	?>

	<a href="<?php echo SERVERURL; ?>client-new/" class="tile">
		<div class="tile-tittle">Clientes</div>
		<div class="tile-icon">
			<i class="fas fa-users fa-fw"></i>
			<p><?php echo $totalClient->rowCount(); ?> Registrados</p>
		</div>
	</a>
	<?php
			if($_SESSION['privilegio_sv'] == 1){
			require_once "./controllers/itemController.php";
			$insItem = new itemController();

			$totalItem = $insItem->dataItemController("Conteo",0);
	?>
	<a href="<?php echo SERVERURL; ?>item-list/" class="tile">
		<div class="tile-tittle">Productos</div>
		<div class="tile-icon">
			<i class="fas fa-pallet fa-fw"></i>
			<p><?php echo $totalItem->rowCount(); ?> Registrados</p>
		</div>
	</a>
	<?php } ?>

	<a href="<?php echo SERVERURL; ?>inventario-vendedores/" class="tile">
		<div class="tile-tittle">Invetario - Vendedor</div>
		<div class="tile-icon">
			<i class="fas fa-hand-holding-usd fa-fw"></i>
			<p> nada Registrados</p>
		</div>
	</a>

	<?php
		require_once "./controllers/prestamosController.php";
		$insReservacion = new prestamosController();
		$insPrestamo = new prestamosController();
		$insFinalizado = new prestamosController();

		$totalReservacion = $insReservacion->dataPrestamoController("conteoReservacion",0);
		$totalPrestamo = $insPrestamo->dataPrestamoController("conteoPrestamo",0);
		$totalFinalizado = $insFinalizado->dataPrestamoController("conteoFinalizado",0);
	?>
	<a href="<?php echo SERVERURL; ?>reservation-reservation/" class="tile">
		<div class="tile-tittle">Reservaciones</div>
		<div class="tile-icon">
			<i class="far fa-calendar-alt fa-fw"></i>
			<p><?php echo $totalReservacion->rowCount(); ?> Registradas</p>
		</div>
	</a>

	<a href="<?php echo SERVERURL; ?>reservation-pending/" class="tile">
		<div class="tile-tittle">Prestamos</div>
		<div class="tile-icon">
			<i class="fas fa-hand-holding-usd fa-fw"></i>
			<p><?php echo $totalPrestamo->rowCount(); ?> Registrados</p>
		</div>
	</a>

	<a href="<?php echo SERVERURL; ?>reservation-list/" class="tile">
		<div class="tile-tittle">Finalizados</div>
		<div class="tile-icon">
			<i class="fas fa-clipboard-list fa-fw"></i>
			<p><?php echo $totalFinalizado->rowCount(); ?> Registrados</p>
		</div>
	</a>

	<?php
		if($_SESSION['privilegio_sv'] == 1){
			require_once "./controllers/usuController.php";
			$insUsu = new usuController();

			$totalUsu = $insUsu->dataUserController("Conteo",0);
	?>
	<a href="<?php echo SERVERURL; ?>user-list/" class="tile">
		<div class="tile-tittle">Usuarios</div>
		<div class="tile-icon">
			<i class="fas fa-user-secret fa-fw"></i>
			<p><?php echo $totalUsu->rowCount(); ?> Registrados</p>
		</div>
	</a>
	<?php } ?>
	<?php
		if($_SESSION['privilegio_sv'] == 1){
			require_once "./controllers/usuController.php";
			$insUsu = new usuController();

	?>
	<a href="<?php echo SERVERURL; ?>company/" class="tile">
		<div class="tile-tittle">Empresa</div>
		<div class="tile-icon">
			<i class="fas fa-store-alt fa-fw"></i>
			<p>1 Registrada</p>
		</div>
	</a>
	<?php } ?>
</div>
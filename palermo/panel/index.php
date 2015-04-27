<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<!-- ***********************************
	Programado por Gaston Briones
	www.gastudio.com.ar
	info@gastudio.com.ar
	Buenos Aires - Argentina
*************************************** -->
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="shortcut icon" href="favicon.ico">
<title>BMF DRINK'S PANEL DE CONTROL Palermo</title>
<!-- JavaScript -->
<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="jsFrameworks/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/init.js"></script>

<!-- CSS -->
<link href="jsFrameworks/bootstrap/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
<link href="jsFrameworks/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div class="container">
	<?php if (isset($_SESSION['s_username'])) {?>
	<form action="phpScripts/login/logoutAction.php" style="float:right" method="post" enctype="multipart/form-data">
		 <button class="btn btn-link inline" type="submit">Salir</button>
	</form>
	<?php }?>

	<div class="page-header">
		<h1>BMF DRINK'S - Palermo<small> Panel de Control</small></h1>
	</div>

	<?php
		if (!isset($_SESSION['s_username'])) {?>
		<div class="alert alert-info">Acceso administraci�n</div>
		<div class="well">
			<?php
				if (isset($_SESSION["loginError"])){?>
				<div class="alert alert-error"><b>Error: </b><?php echo $_SESSION["loginError"]; unset($_SESSION["loginError"]); ?></div>
			<?php }?>
			<form action="phpScripts/login/loginAction.php" method="post" enctype="multipart/form-data" id="formLogin" class="form-horizontal">
				<div class="control-group">
					<label class="control-label" >Usuario:</label>
					<div class="controls">
						<div class="input-append">
							<input type="text" name="username" id="promo-descripcion" required />
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" >Contrase�a:</label>
					<div class="controls">
						<div class="input-append">
							<input type="password" name="password" id="promo-descripcion" required />
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn btn-info" id="save">Aceptar</button>&nbsp;&nbsp;<img alt="loader" id="imgLoader" style="display:none" src="images/loaderImg.gif">
					</div>
				</div>
			</form>
	<?php }else{?>



	<ul class="nav nav-tabs" id="myTab">
		<li class="active"><a href="#promos">Crear Promociones</a></li>
		<li><a href="#abmPromo">Editar / Borrar Promociones</a></li>
		<li><a href="#abmProducto">Productos</a></li>
		<li><a href="#abmListaProducto">Lista de Productos</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="promos">
			<div class="alert alert-info">Aqu� podras crear nuevas promociones!!</div>
			<div class="well">
				<div id="alertContainer"></div>
				<form action="phpScripts/promociones/newPromo.php" enctype="multipart/form-data" id="formPromos" class="form-horizontal">
					<div class="control-group">
						<label class="control-label">Im�gen</label>
						<div class="controls">
							<div class="input-append">
							   <input id="imagen" type="file" style="display:none"  name="img">
							   <input id="photoCover" class="input-large" type="text">
							   <span class="btn" onclick="$('input[id=imagen]').click();">Examinar</span>
							</div>
							<span class="ayuda">Solo se permiten im�genes tipo JPEG.</span>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" >Descripci�n:</label>
						<div class="controls">
							<div class="input-append">
								<input type="text" name="descripcion" id="promo-descripcion">
							</div>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" >Precio:</label>
						<div class="controls">
							<div class="input-append">
								<input type="text" name="precio" id="promo-precio">
							</div>
						</div>
					</div>

					<div class="control-group">
						<div class="controls">
							<button type="submit" class="btn" id="save">Subir</button>&nbsp;&nbsp;<img alt="loader" id="imgLoader" style="display:none" src="images/loaderImg.gif">
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="tab-pane" id="abmPromo">
			<div class="alert alert-info">Aqu� podras editar / borrar promociones!!</div>
			<div class="well">
				<div id="alertContainerBorrar"></div>
				<div id="imgTumb"></div>
			</div>
		</div>
		<div class="tab-pane" id="abmProducto">
			<div class="alert alert-info">Aqu� podras dar de alta productos / editar y borrar tipos de productos!!</div>
			<div class="well">
				<div id="abmProductoContainer"></div>

			</div>
		</div>
		<div class="tab-pane" id="abmListaProducto">
			<div class="alert alert-info">Aqu� podras editar y borrar productos!!</div>
			<div class="well">
				<div id="abmListProductoContainer"></div>
				<div id="listaDeProductos"></div>
			</div>
		</div>

		<!-- Modal -->
		<div id="editPromocion" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar�</button>
				<h3 id="myModalLabel">Editar promoci�n</h3>
			</div>
			<div class="modal-body" id="modal-body-edit">

			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
				<button class="btn btn-primary" onclick="javascript:$('#formPromosEdit').submit()">Guardar cambios</button>

			</div>
		</div>

		<!-- Modal -->
		<div id="nuevoTipoModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar�</button>
				<h3 id="myModalLabel">Nuevo Tipo</h3>
			</div>
			<div class="modal-body" id="modal-body-tipo">

			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
				<button class="btn btn-primary" onclick="$('#formNewTipo').submit()">Guardar cambios</button>
			</div>
		</div>
		<?php }?>

	</div>
</div>
</body>
</html>



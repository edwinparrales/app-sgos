	<!DOCTYPE html>
	<!--
	To change this license header, choose License Headers in Project Properties.
	To change this template file, choose Tools | Templates
	and open the template in the editor.
	-->
	<html>
		<head>
			<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Sgos</title>

			<!--Carga de estilos bootstrap-->
			<?php echo link_tag(base_url() . 'public/css/bootstrap.css'); ?>
			<?php echo link_tag(base_url() . 'public/css/main.css'); ?>


			<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/dist/sweetalert.css'); ?>">

			<!--data tables-->
			<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/media/css/dataTables.bootstrap.css'); ?>">



			<!---->

			<!-- Styles Select2-->
			<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />





			<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
			<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

			<script src="<?php echo base_url('public/media/js/jquery.dataTables.js'); ?>"></script>
			<script src="<?php echo base_url('public/media/js/dataTables.bootstrap.js'); ?>"></script>

			<script src="<?php echo base_url('public/js/bootstrap.min.js') ?> "></script>
			<script src="<?php echo base_url('public/dist/sweetalert.min.js'); ?>"></script>

			<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


		</head>
		<body>
				 <?php if (isset($nav)) {
					 $this->load->view($nav);
				 } ?>

			<br>





			<div class="container container-fluid">
				<?php if (!empty($contenido)) {
					$this->load->view($contenido);
				} ?>
			</div>

			<!-- Modal cambio de  contraseña -->
			<div id="modusuario" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Registro de usuarios</h4>
						</div>
						<div class="modal-body">

							<form method="post" action="<?php echo base_url('/Usuario/updatePasswd') ?>" class="form-group-lg"  >
								<?php
								$updatePasswd = $this->session->flashdata('updatePasswd');
								 $updatePasswd2 = $this->session->flashdata('updatePasswd2');
								 if(!$updatePasswd==null){
									  echo "<script>jQuery(function(){swal(\"Ok\", \"$updatePasswd\", \"success\");});</script>";
								 }
								 if(!$updatePasswd2==null){
									  echo "<script>jQuery(function(){swal(\"Error\", \"$updatePasswd2\", \"error\");});</script>";
								 }
								?>
								<div class="form-group">

									<label class="control-label">Usuario:</label>
									<input value="<?php echo $this->session->userdata('usuario'); ?>" class="form-control" type="text" name="usuario" id="usuario" >

								</div>

								<div class="form-group">

									<label class="control-label">Contraseña anterior:</label>
									<input class="form-control" type="password" name="passwd1" id="passwd1" required="true" >

								</div>
								<div class="form-group">

									<label class="control-label">Contraseña nueva: </label>
									<input class="form-control" type="password" name="passwd2" id="passwd2"  required="true">

								</div>

								<button type="submit"  class="btn-primary" >Modificar</button>

							</form>

						</div>

						<br>

					</div>
					<div class="modal-footer">

						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>

			</div>

		</body>
	</html>

<div class="container">
 <div class="row">
	 <div class="col-md-4">

			 <div class="panel panel-primary">
				 <div class="panel-heading">Registrar usuario</div>
				 <?php
				 $error = $this->session->flashdata('error');
				 $susses = $this->session->flashdata('susses');

				 if (!$error == null) {

					 echo "<script>jQuery(function(){swal(\"Error\", \"$error\", \"error\");});</script>";
				 }
				 if (!$susses == null) {

					 echo "<script>jQuery(function(){swal(\"Ok\", \"$susses\", \"susses\");});</script>";
				 }
				 ?>


				 <div class="panel-body">
					 <form method="POST" action="<?PHP echo base_url('/usuario/insert') ?>">

						 <div class="form-group">
							 <label for="login">Login:</label>
							 <input type="text" class="form-control" id="login" placeholder="Login" name="login" required="true">
						 </div>
						 <div class="form-group">
							 <label for="password">Contraseña:</label>
							 <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password" required="true">
						 </div>

						 <div class="form-group">
							 <label  class="form-control" for="perfil">Perfil:</label>
							 <select class="form-control select2-search" name="perfil" id="perfil">

								 <option></option>

							 </select>
						 </div>
						 <div class="form-group">
							 <label class="form-control">Numero Cedula profesional:</label>

							 <select class="form-control select2-search" id="selectpro" id="cedula" name="cedula" >
								 <option></option>
							 </select>

						 </div>

						 <div class="form-group">
							 <button type="submit" class="btn btn-default btn-primary">Registrar</button>
						 </div>

					 </form>

				 </div>
			 </div>
	 </div>
	 <div class="col-md-8">
		 <table id="tb_usuarios" class="display compact">

			 <thead class="text-capitalize">
			 <th>Codigo</th>
			 <th>Usuario</th>
			 <th>Nombre empleado</th>
			 <th>Numero Cedula</th>
			 <th>Cargo</th>
			 <th>Perfil</th>
			 <th>Estado</th>
			 <th>Operaciones</th>
			 </thead>
			 <tfoot>
			 <th>Codigo</th>
			 <th>Usuario</th>
			 <th>Nombre empleado</th>
			 <th>Numero Cedula</th>
			 <th>Cargo</th>
			 <th>Perfil</th>
			 <th>Estado</th>
			 <th>Operaciones</th>

			 </tfoot>
			 <tbody>
			 <?php foreach ($usuarios as $value) {
				 ?>
				 <tr>
					 <td><?php echo $value->consec ?></td>
					 <td><?php echo $value->login ?></td>
					 <td><?php echo $value->nombres . "&nbsp;&nbsp;", $value->apellidos ?></td>
					 <td><?php echo $value->num_cedula ?></td>
					 <td><?php echo $value->cargo ?></td>
					 <td><?php echo $value->perfil ?></td>
					 <td><?php echo $value->estado ?></td>
					 <td>
						 <a href="<?php echo base_url('usuario/edit/') . $value->consec ?>" title="Editar" class="btn btn-success  btn-sm"><span class="glyphicon glyphicon-pencil"></span>E</a>
						 <button  title="Eliminar" class=" btn btn-danger  btn-sm" id="btneliminar" name="btneliminar"><span class="glyphicon glyphicon-trash"></span>X</button>



					 </td>
				 </tr>
			 <?php } ?>

			 </tbody>

			 <tfoot>

			 </tfoot>

		 </table>
	 </div>

 </div>


</div>

<script type="text/javascript">
	$(document).ready(function () {
		let table = $('#tb_usuarios').DataTable({
			"pageLength": 5,
			lengthMenu: [5, 10, 20, 50],
		});



		//funcion para eliminar un usuario


		$("body").on("click", "#tb_usuarios #btneliminar", function () {
			vcodigo = $(this).parent().parent().children("td:eq(0)").text();
			eliminar(vcodigo);

		});


		function eliminar(vcodigo) {
			swal({
					title: "¿Esta seguro de eliminar el registro?",
					text: "Esto lo eliminara definitivamente",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "¡Eliminar!",
					cancelButtonText: "Cancelar",
					closeOnConfirm: false,
					closeOnCancel: false
				},
				function (isConfirm) {
					if (isConfirm) {
						$.ajax({
							url: "<?php echo base_url('Usuario/delete') ?>",
							type: "POST",
							data: {id: vcodigo},
							success: function (respuesta) {
								if (respuesta == "exito") {
									swal("El registro fue eliminado", "Aceptar", "success");

									location.reload();
								} else {

									alert("Error !No se puede eliminar el registro¡");

								}

							}
						});

					} else {
						swal("Operación Cancelada",
							"El registro no sera eliminado",
							"error");
					}
				});


		}


		$("#selectpro").select2({
			id: function (data) {
				return data.num_cedula
			},
			allowClear: true,
			placeholder: "Digite numero de cedula o apellido.",
			ajax: {
				url: " <?php  echo base_url("Profesionales/list3") ?>",
				dataType: 'json',
				delay: 250,
				data: function (params) {
					return {
						q: params.term, // search term
						page: params.page
					};
				},
				processResults: function (data, params) {
					// parse the results into the format expected by Select2
					// since we are using custom formatting functions we do not need to
					// alter the remote JSON data, except to indicate that infinite
					// scrolling can be used
					params.page = params.page || 1;

					return {
						results: data

					};
				},
				cache: true,
				minimumInputLength: 1
			}


		});


		var data = [{id: 'ADMINISTRADOR', text: 'Administrador'}, {id: 'TECNICO', text: 'Tecnico'}, {
			id: 'OPERADOR',
			text: 'Operador'
		}];

		$("#perfil").select2({
			allowClear: true,
			placeholder: "Seleccione perfil de usuario",
			data: data
		})


	});
</script>



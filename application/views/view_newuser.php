<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<body class="bg-dark">
  <div class="container">
	<div class="row justify-content-center">
	<div class="col-sx-12 col-sm-9">	
    <div class="card mt-5">
      <div class="card-header">Registrar Nueva Cuenta</div>
      <div class="card-body">
        <form id="adduser-form" action="<?php echo site_url('welcome/valida'); ?>" method="post" accept-charset="utf-8">
          <input type="hidden" id="c_valida" name="c_valida">
          <div class="form-group row">
            <label for="c_user" class="col-sm-3 col-form-label">Usuario</label>
            <div class="col-sm-9">
            	<input class="form-control" id="c_user" name="c_user" type="text" placeholder="Usuario">
            	<div id="c-user-feedback" class="valid-feedback">El usuario ya existe</div>
        	</div>
          </div>
          <div class="form-group row">
            <label for="c_password" class="col-sm-3 col-form-label">Contraseña</label>
            <div class="col-sm-9">
            	<input class="form-control " id="c_password" name="c_password" type="password" placeholder="Contraseña">
            	<div class="valid-feedback c-password-feedback">Las contraseñas deben coincidir</div>
            </div>
          </div>
          <div class="form-group row">
            <label for="c_password2" class="col-sm-3 col-form-label">Confirmar Contraseña</label>
            <div class="col-sm-9">
            	<input class="form-control " id="c_password2" name="c_password2" type="password" placeholder="Confirmar Contraseña">
            	<div class="valid-feedback c-password-feedback">Las contraseñas deben coincidir</div>
            </div>
          </div>
          <div class="form-group row">
            <label for="c_nombres" class="col-sm-3 col-form-label">Nombres</label>
            <div class="col-sm-9">
            	<input class="form-control " id="c_nombres" name="c_nombres" type="text" placeholder="Nombres">
            </div>
          </div>
          <div class="form-group row">
            <label for="c_apellido_p" class="col-sm-3 col-form-label">Apellido Paterno</label>
            <div class="col-sm-9">
            	<input class="form-control " id="c_apellido_p" name="c_apellido_p" type="text" placeholder="Apellido Paterno">
            </div>
          </div>
          <div class="form-group row">
            <label for="c_apellido_m" class="col-sm-3 col-form-label">Apellido Materno</label>
            <div class="col-sm-9">
            	<input class="form-control " id="c_apellido_m" name="c_apellido_m" type="text" placeholder="Apellido Materno">
            </div>
          </div>
          <div class="form-group row">
            <label for="c_email" class="col-sm-3 col-form-label">E-mail</label>
            <div class="col-sm-9">
            	<input class="form-control " id="c_email" name="c_email" type="email" placeholder="E-mail">
            </div>	
          </div>
          <div class="form-group row">
            <label for="c_code" class="col-sm-3 col-form-label">Codigo</label>
            <div class="col-sm-9">
            	<input class="form-control " id="c_code" name="c_code" type="text" placeholder="" value="<?php echo $c_code; ?>">
            	<div id="c-code-feedback" class="valid-feedback">Codigo Invalido</div>
            </div>
          </div>                                                                      
          <div class="form-group row">
            <div class="col-sm-9">
            	<input type="button" class="btn btn-primary" id="new_user_submit" value="Guardar">
            </div>
          </div>                                                                      
        </form>
      </div>
    </div>
	</div>
	</div>
  </div>

<script type="text/javascript">
	
	$(document).ready(function(){

		$('#new_user_submit').click(function(){

			$('#c_valida').val('SI');
			$('#c_user').removeClass('is-invalid');
			$('#c_password').removeClass('is-invalid');
			$('#c_password2').removeClass('is-invalid');
			$('#c_code').removeClass('is-invalid');
			$('#c-user-feedback').removeClass('invalid-feedback');
			$('#c-user-feedback').addClass('valid-feedback');
			$('.c-password-feedback').removeClass('invalid-feedback');
			$('.c-password-feedback').addClass('valid-feedback');
			$('#c-code-feedback').removeClass('invalid-feedback');
			$('#c-code-feedback').addClass('valid-feedback');							



			if ($('#c_user').val() == '')
			{
				$('#c_user').addClass('is-invalid');
				$('#c_valida').val('NO');
			}
			if ($('#c_password').val() == '')
			{
				$('#c_password').addClass('is-invalid');
				$('#c_valida').val('NO');
			}
			if ($('#c_code').val() == '')
			{
				$('#c_code').addClass('is-invalid');
				$('#c_valida').val('NO');
			}


			$.ajax({

				url: "<?php echo site_url('ajax/valida_user'); ?>",
				type: "POST",
				async: false,
				data: {
					'c_user': $('#c_user').val()
				},
				success: function(result){
					if (result == 'INV')
					{
						$('#c-user-feedback').removeClass('valid-feedback');
						$('#c-user-feedback').addClass('invalid-feedback');
						$('#c_user').addClass('is-invalid');
						$('#c_valida').val('NO');						
					}

				}
			});

			if ($('#c_password').val() != $('#c_password2').val())
			{
				$('#c_valida').val('NO');
				$('.c-password-feedback').removeClass('valid-feedback');
				$('.c-password-feedback').addClass('invalid-feedback');
				$('#c_password').addClass('is-invalid');
				$('#c_password2').addClass('is-invalid');
			}

			$.ajax({

				url: "<?php echo site_url('ajax/valida_code'); ?>",
				type: "POST",
				async: false,
				data: {
					'c_code': $('#c_code').val()
				},
				success: function(result){
					if (result == 'INV')
					{
						$('#c-code-feedback').removeClass('valid-feedback');
						$('#c-code-feedback').addClass('invalid-feedback');
						$('#c_code').addClass('is-invalid');
						$('#c_valida').val('NO');
					}
				}

			});

			if ($('#c_valida').val() == 'SI')
			{

				$.ajax({

					url: "<?php echo site_url('ajax/add_user'); ?>",
					type: "POST",
					async: false,
					data: {
						'c_user': $('#c_user').val(),
						'c_password': $('#c_password').val(),
						'c_nombres': $('#c_nombres').val(),
						'c_apellido_p': $('#c_apellido_p').val(),
						'c_apellido_m': $('#c_apellido_m').val(),
						'c_email': $('#c_email').val(),
						'c_code': $('#c_code').val()
					},	
					success: function(){
						alert('Registro exitoso.');
						$('#adduser-form').submit();

					}

				});

			}

		});

	});

</script>

</body>

</html>
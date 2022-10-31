<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>



<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form id="login-form" action="<?php echo site_url('welcome/valida'); ?>" method="post" accept-charset="utf-8">
          <div class="form-group">
            <label for="c_user">Usuario</label>
            <input class="form-control" id="c_user" name="c_user" type="text" placeholder="Usuario">
            <div id="c_user_feedback" class="valid-feedback">Usuario o Contraseña incorrecta</div>
          </div>
          <div class="form-group">
            <label for="c_password">Contraseña</label>
            <input class="form-control " id="c_password" name="c_password" type="password" placeholder="Contraseña">
          </div>          
          <input type="button" class="btn btn-primary btn-block" id="login" value="Login">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo site_url('welcome/add_user/1111'); ?>">Registrar nueva cuenta</a>
        </div>
      </div>
    </div>
  </div>


<script type="text/javascript">
	
$(document).ready(function(){

	$('#login').click(function(){

		$.ajax({

			url: "<?php echo site_url('ajax/valida_login'); ?>",
			type: "POST",
			data: {
				'c_user': $('#c_user').val(),
				'c_password': $('#c_password').val()
			},
			success: function(result){
				if (result == 'INV')
				{
					$('#c_user_feedback').removeClass('valid-feedback');
					$('#c_user_feedback').addClass('invalid-feedback');
					$('#c_user').addClass('is-invalid');
				}
				else
				{
					$('#login-form').submit();
				}
			}

		});

	});

});

</script>


</body>

</html>


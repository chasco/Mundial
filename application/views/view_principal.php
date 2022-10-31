  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <h1>Principal</h1>
        

          <div id="personal_info" class="row mt-3 mb-3">
            <div class="col-12">
              <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseInfo" aria-expanded="false" aria-controls="collapseExample">
                Completar Informacion
              </button>              
            </div>            
            <div class="col-sx-12 col-sm-8 collapse" id="collapseInfo">
              <div class="card mb-3 mt-3">
                <div class="card-header">
                  Informacion Personal
                </div>
                <div class="card-body">
                  <form>
                    <input type="hidden" id="n_coduser" name="n_coduser" value="<?php echo $resuser->n_coduser; ?>">
                    <div class="form-group row">
                      <label for="c_nombres" class="col-sm-3 col-form-label">Nombres</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="c_nombres" placeholder="Nombres">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="c_apellido_p" class="col-sm-3 col-form-label">Apellido Paterno</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="c_apellido_p" placeholder="Apellido Paterno">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="c_apellido_m" class="col-sm-3 col-form-label">Apellido Materno</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="c_apellido_m" placeholder="Apellido Materno">
                      </div>
                    </div>                    
                    <div class="form-group row">
                      <label for="c_email" class="col-sm-3 col-form-label">E-mail</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="c_email" placeholder="E-mail">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-9">
                        <input type="button" class="btn btn-primary" id="personal_info_submit" value="Guardar">
                      </div>
                    </div>                    

                  </form>  
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-sm-1">
              <h3>Partidos</h3>
            </div>
          </div>
<div class="row">
<?php foreach ($querypart->result() as $row): ?>
          
            <div class="col-sm-6">
              <div class="card mb-3">
                <div class="card-header"><?php if($row->c_estado == 'NIN') echo 'No Iniciado.'; elseif ($row->c_estado == 'INI') echo 'En Progreso'; elseif($row->c_estado == 'FIN') echo 'Finalizado'; ?></div>
                <div class="card-body">
                <div class="row">  
                <div class="col-sm-3">
                  <p><?php echo $row->c_equipo1; ?></p>
                </div>
                <div class="col-sm-1">
                  <p><?php echo $row->n_goles1; ?></p>
                </div>            
                <div class="col-sm-2">
                  <img src="<?php echo base_url();?>img/<?php echo $row->c_bandera1; ?>" class="img-fluid img-thumbnail rounded-circle">
                </div>
                <div class="col-sm-3">
                  <p><?php echo $row->c_equipo2; ?></p>
                </div>
                <div class="col-sm-1">
                  <p><?php echo $row->n_goles2; ?></p>
                </div>            
                <div class="col-sm-2">
                  <img src="<?php echo base_url();?>img/<?php echo $row->c_bandera2; ?>" class="img-fluid img-thumbnail rounded-circle">
                </div>
                </div>
                </div>
                <div class="card-footer">Inicio del Partido: <?php echo $row->c_hora; ?></div>
              </div>
            </div>
           
<?php endforeach; ?>
</div> 
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Mundial  2022</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cerrar Sesion?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Seleccione "Logout" a continuacion si esta listo para terminar la sesion actual</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo site_url(''); ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url();?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url();?>js/sb-admin.min.js"></script>

    <script type="text/javascript">
      
      $(document).ready(function(){

<?php
if ($resuser->c_email != '')
{
?>

        $('#personal_info').hide();

<?php
}
?>

        $('#personal_info_submit').click(function(){

          $.ajax({

            url: "<?php echo site_url('ajax/update_user'); ?>",
            type: "POST",
            data: {
              'n_coduser': $('#n_coduser').val(),
              'c_nombres': $('#c_nombres').val(),
              'c_apellido_p': $('#c_apellido_p').val(),
              'c_apellido_m': $('#c_apellido_m').val(),
              'c_email': $('#c_email').val()
            },
            success: function(){
              alert('Informacion actualizada.');
              location.reload();
            }

          });


        });

      });

    </script>

  </div>
</body>

</html>
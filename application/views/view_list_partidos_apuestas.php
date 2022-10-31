  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <h1>Apuestas</h1>


          <!-- Users DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Partidos</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Equipo</th>
                      <th>Equipo</th>
                      <th>Fecha</th>
                      <th>Apuesta</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Equipo</th>
                      <th>Equipo</th>
                      <th>Fecha</th>
                      <th>Apuesta</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
<?php foreach ($querypart->result() as $row): ?>

                    <tr>
                      <td><?php echo $row->c_equipo1; ?></td>
                      <td><?php echo $row->c_equipo2; ?></td>
                      <td><?php echo $row->d_fecha; ?></td>
                      <td><?php if ($row->n_apuestas > 0) { ?> <span class="badge badge-success">Con Apuesta</span> <?php } else { ?> <span class="badge badge-danger">Sin Apuesta</span> <?php } ?></td>
                      <td><input type="button" class="btn btn-warning" id="btn-new" value="Nueva Apuesta" onClick="passNew(<?php echo $row->n_codpartido; ?>,'<?php echo $row->c_equipo1; ?>','<?php echo $row->c_equipo2; ?>')" data-toggle="modal" data-target="#newModal"></td>
                      <td><input type="button" class="btn btn-primary" id="btn-info" value="Ver Apuestas" onClick="passInfo(<?php echo $row->n_codpartido; ?>)" data-toggle="modal" data-target="#infoModal"></td>
                    </tr>

<?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

          <input type="hidden" id="n_coduser" value="<?php echo $resuser->n_coduser; ?>">          



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



    <!-- Info Modal-->
    <div class="modal fade lg" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="infoModalLabel">Administracion de apuestas</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">

            <div id="show-container"></div>

          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            
          </div>
        </div>
      </div>
    </div>


    <!-- New Modal-->
    <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="infoModalLabel">Nueva Apuesta</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form>

              <input type="hidden" id="n_codpartido_new">
              <div class="form-group row">
                <label id="n_goles1_label" for="n_goles1_new" class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="n_goles1_new" placeholder="Resultado 1">
                  </div>
              </div>
              <div class="form-group row">
                <label id="n_goles2_label" for="n_goles2_new" class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="n_goles2_new" placeholder="Resultado 2">
                  </div>
              </div>                                          

            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <input type="button" class="btn btn-primary" id="btn-guardar-new" value="Apostar">
          </div>
        </div>
      </div>
    </div>




    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url();?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url();?>/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url();?>/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url();?>/js/sb-admin.min.js"></script>


    <script type="text/javascript">
      
      $(document).ready(function(){

        $('#btn-guardar-new').click(function(){

          var n_apuesta;

          $.ajax({

            url: "<?php echo site_url('ajax/get_apuesta'); ?>",
            type: "POST",
            async: false,
            data: {
              'n_coduser': $('#n_coduser').val(),
              'n_codpartido': $('#n_codpartido_new').val()
            },
            success: function(result){
              n_apuesta = parseInt(result);
            }

          });

          if (n_apuesta < 2)
          {
            $.ajax({

              url: "<?php echo site_url('ajax/add_apuesta'); ?>",
              type: "POST",
              async: false,
              data: {
                'n_codpartido': $('#n_codpartido_new').val(),
                'n_coduser': $('#n_coduser').val(),
                'n_goles1': $('#n_goles1_new').val(),
                'n_goles2': $('#n_goles2_new').val()
              },
              success: function(){
                alert('Informacion Registrada.');
                location.reload();
              }

            });

          }
          else
          {

            alert('Ya realizo una apuesta.');

          }

        });

      });

      function passNew(n_codpartido, c_equipo1, c_equipo2)
      {

        $('#n_codpartido_new').val(n_codpartido);
        $('#n_goles1_label').html(c_equipo1);
        $('#n_goles2_label').html(c_equipo2);

      }

      function passInfo(n_codpartido)
      {

        $.ajax({

          url: "<?php echo site_url('ajax/show_apuestas_partido'); ?>",
          type: "POST",
          data:  {
            'n_codpartido': n_codpartido,
            'n_coduser': $('#n_coduser').val()
          },
          success: function(result){
            $('#show-container').html(result);
          }

        });

      }

      function passUpdate(n_fila)
      {

        $.ajax({

          url: "<?php echo site_url('ajax/update_apuesta'); ?>",
          type: "POST",
          data: {
            'n_codpartido': $('#n_codpartido_'+n_fila).val(),
            'n_coduser': $('#n_coduser').val(),
            'n_seqapuesta': $('#n_seqapuesta_'+n_fila).val(),
            'n_goles1': $('#n_goles1_'+n_fila).val(),
            'n_goles2': $('#n_goles2_'+n_fila).val()
          },
          success: function(result){
            alert('Informacion Registrada.');
            $('#infoModal').modal('hide');
          }

        });

      }

      function passDelete(n_fila)
      {

        $.ajax({

          url: "<?php echo site_url('ajax/delete_apuesta'); ?>",
          type: "POST",
          data: {
            'n_codpartido': $('#n_codpartido_'+n_fila).val(),
            'n_coduser': $('#n_coduser').val(),
            'n_seqapuesta': $('#n_seqapuesta_'+n_fila).val()            
          },
          success: function(result){
            alert('Informacion Registrada.');
            $('#infoModal').modal('hide');
            location.reload();
          }

        });

      }


    </script>

  </div>
</body>

</html>
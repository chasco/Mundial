  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <h1>Ganadores</h1>


          <!-- Users DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Partidos Finalizados</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Equipo</th>
                      <th></th>
                      <th>Equipo</th>
                      <th></th>
                      <th>Fecha</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Equipo</th>
                      <th></th>
                      <th>Equipo</th>
                      <th></th>
                      <th>Fecha</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
<?php foreach ($querypart->result() as $row): ?>

                    <tr>
                      <td><?php echo $row->c_equipo1; ?></td>
                      <td><?php echo $row->n_goles1; ?> </td>
                      <td><?php echo $row->c_equipo2; ?></td>
                      <td><?php echo $row->n_goles2; ?></td>
                      <td><?php echo $row->d_fecha; ?></td>
                      <td><?php echo $row->n_monto_apuesta; ?></td>
                      <td><input type="button" class="btn btn-primary" id="btn-info" value="Ganadores" onClick="passInfo(<?php echo $row->n_codpartido; ?>)" data-toggle="modal" data-target="#infoModal"></td>
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
            <h5 class="modal-title" id="infoModalLabel">Ganadores</h5>
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



      });

      function passInfo(n_codpartido)
      {

        $.ajax({

          url: "<?php echo site_url('ajax/show_ganadores_partido'); ?>",
          type: "POST",
          data:  {
            'n_codpartido': n_codpartido
          },
          success: function(result){
            $('#show-container').html(result);
          }

        });

      }




    </script>

  </div>
</body>

</html>
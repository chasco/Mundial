  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <h1>Usuarios</h1>


          <!-- Users DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Usuarios</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Usuario</th>
                      <th>Nombres</th>
                      <th>Apellido Paterno</th>
                      <th>Apellido Materno</th>
                      <th>Saldo</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Usuario</th>
                      <th>Nombres</th>
                      <th>Apellido Paterno</th>
                      <th>Apellido Materno</th>
                      <th>Saldo</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
<?php foreach ($queryusers->result() as $row): ?>

                    <tr>
                      <td><?php echo $row->c_user; ?></td>
                      <td><?php echo $row->c_nombres; ?></td>
                      <td><?php echo $row->c_apellido_p; ?></td>
                      <td><?php echo $row->c_apellido_m; ?></td>
                      <td><?php echo $row->n_saldo; ?></td>
                      <td><input type="button" class="btn btn-primary" id="btn-saldo-<?php echo $row->n_coduser; ?>" value="Saldo" onClick="passSaldo(<?php echo $row->n_coduser; ?>,<?php echo $row->n_saldo; ?>)" data-toggle="modal" data-target="#saldoModal"></td>
                      <td><input type="button" class="btn btn-primary" id="btn-info-<?php echo $row->n_coduser; ?>" value="Actualizar" onClick="passInfo(<?php echo $row->n_coduser ?>,'<?php echo $row->c_nombres; ?>','<?php echo $row->c_apellido_p; ?>','<?php echo $row->c_apellido_m; ?>','<?php echo $row->c_email; ?>')" data-toggle="modal" data-target="#infoModal"></td>
                    </tr>

<?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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

    <!-- Saldo Modal-->
    <div class="modal fade" id="saldoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="saldoModalLabel">Modificar Saldo</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form>

              <input type="hidden" id="n_coduser_saldo">
              <div class="form-group row">
                <label for="n_saldo_saldo" class="col-sm-3 col-form-label">Saldo</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="n_saldo_saldo" placeholder="Saldo">
                  </div>
              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <input type="button" class="btn btn-primary" id="btn-guardar-saldo" value="Guardar">
          </div>
        </div>
      </div>
    </div>


    <!-- Info Modal-->
    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="infoModalLabel">Actualizar Informacion</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form>

              <input type="hidden" id="n_coduser_info">
              <div class="form-group row">
                <label for="c_nombres_info" class="col-sm-3 col-form-label">Nombres</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="c_nombres_info" placeholder="Nombres">
                  </div>
              </div>
              <div class="form-group row">
                <label for="c_apellido_p_info" class="col-sm-3 col-form-label">Apellido Paterno</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="c_apellido_p_info" placeholder="Apellido Paterno">
                  </div>
              </div>
              <div class="form-group row">
                <label for="c_apellido_m_info" class="col-sm-3 col-form-label">Apellido Materno</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="c_apellido_m_info" placeholder="Apellido Materno">
                  </div>
              </div>
              <div class="form-group row">
                <label for="c_email_info" class="col-sm-3 col-form-label">E-mail</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="c_email_info" placeholder="E-mail">
                  </div>
              </div>                                          

            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <input type="button" class="btn btn-primary" id="btn-guardar-info" value="Guardar">
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

        $('#btn-guardar-saldo').click(function(){

          $.ajax({

            url: "<?php echo site_url('ajax/update_saldo'); ?>",
            type: "POST",
            data: {
              'n_coduser': $('#n_coduser_saldo').val(),
              'n_saldo': $('#n_saldo_saldo').val()
            },
            success: function(){
              alert('Informacion Actualizada.');
              location.reload();
            }

          });

        });

        $('#btn-guardar-info').click(function(){

          $.ajax({

            url: "<?php echo site_url('ajax/update_user'); ?>",
            type: "POST",
            data: {
              'n_coduser': $('#n_coduser_info').val(),
              'c_nombres': $('#c_nombres_info').val(),
              'c_apellido_p': $('#c_apellido_p_info').val(),
              'c_apellido_m': $('#c_apellido_m_info').val(),
              'c_email': $('#c_email_info').val()
            },
            success: function(){
              alert('Informacion actualizada.');
              location.reload();
            }

          });

        });

      });

      function passSaldo(n_coduser,n_saldo)
      {

        $('#n_coduser_saldo').val(n_coduser);
        $('#n_saldo_saldo').val(n_saldo);

      }
      function passInfo(n_coduser,c_nombres,c_apellido_p,c_apellido_m,c_email)
      {

        $('#n_coduser_info').val(n_coduser);
        $('#c_nombres_info').val(c_nombres);
        $('#c_apellido_p_info').val(c_apellido_p);
        $('#c_apellido_m_info').val(c_apellido_m);
        $('#c_email_info').val(c_email);

      }

    </script>

  </div>
</body>

</html>
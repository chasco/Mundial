  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <h1>Partidos</h1>


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
                      <th>G</th>
                      <th>Equipo</th>
                      <th>G</th>
                      <th>Fecha</th>
                      <th>Hora</th>
                      <th>Estado</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Equipo</th>
                      <th>G</th>
                      <th>Equipo</th>
                      <th>G</th>
                      <th>Fecha</th>
                      <th>Hora</th>
                      <th>Estado</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
<?php foreach ($querypart->result() as $row): ?>

                    <tr>
                      <td><?php echo $row->c_equipo1; ?></td>
                      <td><?php echo $row->n_goles1; ?></td>
                      <td><?php echo $row->c_equipo2; ?></td>
                      <td><?php echo $row->n_goles2; ?></td>
                      <td><?php echo $row->d_fecha; ?></td>
                      <td><?php echo $row->c_hora; ?></td>
                      <td><?php echo $row->c_estado; ?></td>
                      <td><input type="button" class="btn btn-primary" id="btn-info-" value="Actualizar" onClick="passInfo(<?php echo $row->n_codpartido; ?>,<?php if(is_null($row->n_goles1)) echo 'null'; else echo $row->n_goles1; ?>,<?php if(is_null($row->n_goles2)) echo 'null'; else echo $row->n_goles2; ?>,'<?php echo $row->c_estado; ?>','<?php echo $row->c_equipo1; ?>','<?php echo $row->c_equipo2; ?>')" data-toggle="modal" data-target="#infoModal"></td>
                    </tr>

<?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

		  <div>
		  	<input type="button" class="btn btn-success" id="btn-partido" value="Nuevo Partido" data-toggle="modal" data-target="#newModal">
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

              <input type="hidden" id="n_codpartido_info">
              <div class="form-group row">
                <label id="n_goles1_label" for="n_goles1_info" class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="n_goles1_info" placeholder="Resultado 1">
                  </div>
              </div>
              <div class="form-group row">
                <label id="n_goles2_label" for="n_goles2_info" class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="n_goles2_info" placeholder="Resultado 2">
                  </div>
              </div>
              <div class="form-group row">
                <label for="c_estado_info" class="col-sm-3 col-form-label">Estado Partido</label>
                  <div class="col-sm-9">
                    <select class="form-control" id="c_estado_info">
                    	<option value="NIN">No Iniciado</option>
                    	<option value="INI">Iniciado</option>
                    	<option value="FIN">Finalizado</option>
                    </select>
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


    <!-- New Modal-->
    <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="infoModalLabel">Nuevo Partido</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form>

              <div class="form-group row">
                <label for="n_codequipo1_new" class="col-sm-3 col-form-label">Equipo 1</label>
                  <div class="col-sm-9">
                    <select class="form-control" id="n_codequipo1_new">
<?php foreach ($queryequi->result() as $row): ?>
                    	<option value="<?php echo $row->n_codequipo; ?>" ><?php echo $row->c_equipo; ?></option>
<?php endforeach; ?>                    	
                    </select>
                  </div>
              </div>
              <div class="form-group row">
                <label for="n_codequipo2_new" class="col-sm-3 col-form-label">Equipo 2</label>
                  <div class="col-sm-9">
                  	<select class="form-control" id="n_codequipo2_new">
<?php foreach ($queryequi->result() as $row): ?>
                    	<option value="<?php echo $row->n_codequipo; ?>" ><?php echo $row->c_equipo; ?></option>
<?php endforeach; ?>                  		
                  	</select>
                  </div>
              </div>
              <div class="form-group row">
                <label for="d_fecha_new" class="col-sm-3 col-form-label">Fecha Partido</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="d_fecha_new" placeholder="Fecha Partido">
                  </div>
              </div>

              <div class="form-group row">
                <label for="c_hora_new" class="col-sm-3 col-form-label">Hora Partido</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="c_hora_new" placeholder="Hora Partido">
                  </div>
              </div>                                          

            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <input type="button" class="btn btn-primary" id="btn-guardar-new" value="Guardar">
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

      	$('#btn-guardar-info').click(function(){

      		$.ajax({

      			url: "<?php echo site_url('ajax/update_partido'); ?>",
      			type: "POST",
      			data: {
      				'n_codpartido': $('#n_codpartido_info').val(),
      				'n_goles1': $('#n_goles1_info').val(),
      				'n_goles2': $('#n_goles2_info').val(),
      				'c_estado': $('#c_estado_info').val()
      			},
      			success: function(){
      				alert('Informacion Actualizada.');
      				location.reload();
      			}

      		});

      	});

      });

      $('#btn-guardar-new').click(function(){

      	$.ajax({

      		url: "<?php echo site_url('ajax/add_partido'); ?>",
      		type: "POST",
      		data: {
      			'n_codequipo1': $('#n_codequipo1_new').val(),
      			'n_codequipo2': $('#n_codequipo2_new').val(),
      			'd_fecha': $('#d_fecha_new').val(),
            'c_hora': $('#c_hora_new').val()
      		},
      		success: function(){
      			alert('Informacion Registrada.');
      			location.reload();
      		}

      	});

      });

      function passInfo(n_codpartido, n_goles1, n_goles2, c_estado,c_equipo1,c_equipo2)
      {

      	$('#n_codpartido_info').val(n_codpartido);
      	$('#n_goles1_info').val(n_goles1);
      	$('#n_goles2_info').val(n_goles2);
      	$('#c_estado_info').val(c_estado);
      	$('#n_goles1_label').html(c_equipo1);
      	$('#n_goles2_label').html(c_equipo2);      	

      }

    </script>

  </div>
</body>

</html>
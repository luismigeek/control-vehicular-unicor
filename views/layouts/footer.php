      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © <?php echo constant('WEBSITE'); ?> 2019</span>
          </div>
        </div>
      </footer>

      </div>
      <!-- /.content-wrapper -->

      </div>
      <!-- /#wrapper -->

      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a>

      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Seleccione "Cerrar" si deseas finalizar tu sesión actual.</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="<?php echo constant('URL'); ?>home/cerrar">Cerrar</a>
            </div>
          </div>
        </div>
      </div>


      <!-- Bootstrap core JavaScript -->
      <script src="<?php echo constant('URL'); ?>resource/jquery/jquery.min.js"></script>
      <script src="<?php echo constant('URL'); ?>resource/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Page level plugin JavaScript-->
      <script src="<?php echo constant('URL'); ?>resource/datatables/jquery.dataTables.js"></script>
      <script src="<?php echo constant('URL'); ?>resource/datatables/dataTables.bootstrap4.js"></script>

      <!-- Demo scripts for this page-->
      <script src="<?php echo constant('URL'); ?>resource/js/demo/datatables-demo.js"></script>

      <!-- Custom scripts for all pages-->
      <script src="<?php echo constant('URL'); ?>resource/js/styles.js"></script>
      <script src="<?php echo constant('URL'); ?>resource/js/logica.js"></script>

      </body>

      </html>
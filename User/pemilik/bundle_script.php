
    <!-- jQuery 2.1.4 -->
    <script src="../assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/app.min.js"></script>
	<!-- Daterange Picker -->
	<script src="../assets/plugins/daterangepicker/moment.min.js"></script>
	<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="../assets/plugins/select2/select2.full.min.js"></script>
	<script src="../assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<!-- page script -->
    <script>
      $(function () {
		// Daterange Picker
		$('#Tanggal_Lahir').daterangepicker({
			singleDatePicker: true,
			showDropdowns: true,
			format: 'YYYY-MM-DD'
		});

		  // Data Table
        $("#data").dataTable({
			scrollX: true
		});
      });
    </script>

	<!-- Date Time Picker -->
	<script>
		$(function (){
			$('#Jam_Mulai').datetimepicker({
				format: 'HH:mm'
			});

			$('#Jam_Selesai').datetimepicker({
				format: 'HH:mm'
			});
		});
	</script>

	<!-- Javascript Edit-->
	<script type="text/javascript">
		$(document).ready(function () {

		// Jadwal
		$(".open_modal").click(function(e) {
			var m = $(this).attr("id");
				$.ajax({
					url: "jadwal_modal_edit.php",
					type: "GET",
					data : {kd_jadwal: m,},
					success: function (ajaxData){
					$("#ModalEditJadwal").html(ajaxData);
					$("#ModalEditJadwal").modal('show',{backdrop: 'true'});
					}
				});
			});

		// Nilai
		$(".open_modal").click(function(e) {
			var m = $(this).attr("id");
				$.ajax({
					url: "nilai_modal_edit.php",
					type: "GET",
					data : {kd_nilai: m,},
					success: function (ajaxData){
					$("#ModalEditNilai").html(ajaxData);
					$("#ModalEditNilai").modal('show',{backdrop: 'true'});
					}
				});
			});
		});
	</script>

	<!-- Javascript Delete -->
	<script>
		function confirm_delete(delete_url){
			$("#modal_delete").modal('show', {backdrop: 'static'});
			document.getElementById('delete_link').setAttribute('href', delete_url);
		}
	</script>

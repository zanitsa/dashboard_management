    <!-- CORE JQUERY  -->
    <script src="../assets/js/jquery.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- DATATABLES SCRIPTS  -->
    <script src="../assets/plugin/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/plugin/datatables/dataTables.bootstrap.min.js"></script>
    <script src="../assets/plugin/datatables/dataTables.buttons.min.js"></script>
    <script src="../assets/plugin/datatables/dataTables.select.min.js"></script>
    <script src="../assets/plugin/datatables/dataTables.keyTable.min.js"></script>
    <script src="../assets/plugin/datatables/editor.dataTables.min.css"></script>
    <!-- SELECT2 SCRIPTS  -->
    <script src="../assets/plugin/select2/select2.min.js"></script>
  	<!--script src="assets/js/layout.js"></script-->
    <script src="../assets/js/top.js" type="text/javascript"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('#table').dataTable();
            $('#select').select2({
                placeholder: "Please Select"
            });
            $('#select2').select2({
                placeholder: "Please Select",
            });
            $(".enable").on("click", function () {
                $("#select2").prop("disabled", false);
            });
             
            $(".disable").on("click", function () {
                $("#select2").prop("disabled", true);
            });
    	});
    </script>
  </body>
</html>

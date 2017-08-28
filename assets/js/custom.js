
/*=============================================================
    Authour : Ilyunal Iqbal Kahfi
    License: Commons Attribution 3.0

    http://creativecommons.org/licenses/by/3.0/

    100% Free To use For Personal And Commercial Use.
    IN EXCHANGE JUST GIVE US CREDITS AND TELL YOUR FRIENDS ABOUT US

    ========================================================  */

//initialize
$b=10;
$c=11;
	
	$('.dataTable').DataTable();
	
	$('#example').DataTable( {
	    "processing": true,
	    "serverSide": true,
	    "ajax": "../../proses/load-data.php",
	} );
		
	$('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });

	for($a=1; $a <= $b; $a++){
		$('#form'+$a).fadeOut();
	}
	for($a=0; $a <= $b; $a++){
		$('#data'+$a).fadeOut();
	}
	/*
	for($a=0; $a <= $b; $a++){
		$('#click_form'+$a).click(function(e) {
			//for($d= $a + 1; $d <= $c; $d++){
				//$('#form'+$d).fadeOut(500);
			//}
			$('#form'+$a).fadeOut(500).fadeIn(500);
		});
	}
	*/
	$('#click_form0').click(function(e) {
		$('#data0').fadeOut(500);
		$('#data1').fadeOut(500);
		$('#data2').fadeOut(500);
		$('#data3').fadeOut(500);

		$('#form1').fadeOut(500);
		$('#form2').fadeOut(500);
		$('#form3').fadeOut(500);
		$('#form0').fadeOut(500).show(2000);
	});
	$('#click_form1').click(function(e) {
		$('#data0').fadeOut(500);
		$('#data1').fadeOut(500);
		$('#data2').fadeOut(500);
		$('#data3').fadeOut(500);

		$('#form0').fadeOut(500);
		$('#form2').fadeOut(500);
		$('#form3').fadeOut(500);
		$('#form1').fadeOut(500).show(2000);
	});
	$('#click_form2').click(function(e) {
		$('#data0').fadeOut(500);
		$('#data1').fadeOut(500);
		$('#data2').fadeOut(500);
		$('#data3').fadeOut(500);

		$('#form0').fadeOut(500);
		$('#form1').fadeOut(500);
		$('#form3').fadeOut(500);
		$('#form2').fadeOut(500).show(2000);
	});

	$('#click_data0').click(function(e) {
		$('#form0').fadeOut(500);
		$('#form1').fadeOut(500);
		$('#form2').fadeOut(500);
		$('#form3').fadeOut(500);

		$('#data1').fadeOut(500);
		$('#data2').fadeOut(500);
		$('#data3').fadeOut(500);
		$('#data0').fadeOut(500).show(2000);
	});
	$('#click_data1').click(function(e) {
		$('#form0').fadeOut(500);
		$('#form1').fadeOut(500);
		$('#form2').fadeOut(500);
		$('#form3').fadeOut(500);

		$('#data0').fadeOut(500);
		$('#data2').fadeOut(500);
		$('#data3').fadeOut(500);
		$('#data1').fadeOut(500).show(2000);
	});
	$('#click_data2').click(function(e) {
		$('#form0').fadeOut(500);
		$('#form1').fadeOut(500);
		$('#form2').fadeOut(500);
		$('#form3').fadeOut(500);

		$('#data0').fadeOut(500);
		$('#data1').fadeOut(500);
		$('#data3').fadeOut(500);
		$('#data2').fadeOut(500).show(2000);
	});
	$('#click_data3').click(function(e) {
		$('#form0').fadeOut(500);
		$('#form1').fadeOut(500);
		$('#form2').fadeOut(500);
		$('#form3').fadeOut(500);

		$('#data1').fadeOut(500);
		$('#data2').fadeOut(500);
		$('#data0').fadeOut(500);
		$('#data3').fadeOut(500).show(2000);
	});
	/*
	$('#datapaspor').click(function(e) {
		$('#kompetensi_reg').hide(500);
		$('#paspor').fadeOut(500);
		$('#data_paspor').hide(500).show(2000);
	});
	$('#kom_reg').click(function(e) {
		$('#data_paspor').hide(500);
		$('#paspor').fadeOut(500);
		$('#kompetensi_reg').hide(500).show(2000);
	});
	$('#klik_paspor').click(function(e) {
		$('#data_paspor').hide(500);
		$('#kompetensi_reg').hide(500);
		$('#paspor').fadeOut(500).fadeIn(500);
	});
	*/
	for($a=0; $a <= $b; $a++){
		$("#timepicker"+$a).timepicker({
            minuteStep: 1,
            template: 'dropdown',
			showSeconds: true,
            showMeridian: false,
            defaultTime: 'current',
			showInputs: false
		});
	}
	
	for($a=0; $a <= $b; $a++){
		$("#datepicker"+$a).datepicker({
			changeMonth: true,
			changeYear: true
		});
	}

	//Initialize Select2 Elements
  	$(".Sc-input-select").select2({
		placeholder: "Pilih Data ",
	    allowClear: true
	});

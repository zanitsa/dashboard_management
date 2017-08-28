<?php
  require_once "query/init.php";
  $error="";
  if(isset($_SESSION['user'])) {
      header('Location: dashboard/dashboard.php');
  }
  if(isset($_POST['submit'])) {
    $user=$_POST['user'];
    $pass=$_POST['pass'];

    if(check($user,$pass)){
      $_SESSION['user']= $user;
      header('Location: dashboard/dashboard.php');
    }else{
      $error = '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <p id="error"><strong>User dan Password Anda Tidak Benar..!</strong></p>
                </div>';
    }
  }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title> RSUD Sidoarjo</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style type="text/css">
          .loader {
                position: absolute;
              left: 50%;
              top: 50%;
              z-index: 1;
              width: 150px;
              height: 150px;
              margin: -75px 0 0 -75px;
              border: 16px solid #f3f3f3;
              border-radius: 50%;
              border-top: 16px solid #3498db;
              width: 120px;
              height: 120px;
              -webkit-animation: spin 2s linear infinite;
              animation: spin 2s linear infinite;
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
            .animate-bottom {
              position: relative;
              -webkit-animation-name: animatebottom;
              -webkit-animation-duration: 1s;
              animation-name: animatebottom;
              animation-duration: 1s
            }

            @-webkit-keyframes animatebottom {
              from { bottom:-100px; opacity:0 } 
              to { bottom:0px; opacity:1 }
            }

            @keyframes animatebottom { 
              from{ bottom:-100px; opacity:0 } 
              to{ bottom:0; opacity:1 }
            }
    </style>
</head>
<body id="myPage" onLoad="myFunction()" data-spy="scroll" data-target=".navbar" data-offset="60">
<div id="myDiv" style="display: none" class="animate-bottom">
    <div class="navbar navbar-inverse set-radius-zero" >
        <div class="container text-center">
          <div class="navbar-header" style="float: none;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              <div class="center-div" style="margin-top: 10px">
                <img alt="Sidoarjo" class="icon-margin" width="70px" src="assets/img/sidoarjo.png">
                <h3>RSUD SIDOARJO</h3>
              </div>
	      </div>
    </div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
<form action="" method="post">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-user"></i> Login</h4>
      </div>
      <div class="modal-body">
		<div class="form-group">
			<label>Username:</label>
			<input type="text" class="form-control" name="user" required>
		</div>
		<div class="form-group">
			<label>Password:</label>
			<input type="password" class="form-control" name="pass" required>
		</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="submit"><i class="fa fa-sign-in"></i> Login</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
</form>
    </div>

  </div>
</div>

    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="#" class="menu-top-active text-center" data-toggle="modal" data-target="#myModal"><i class="fa fa-sign-in"></i> Login</a></li>
                           
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
     <!-- MENU SECTION END-->
     
    <div class="content-wrapper">
    <div class="container">
	        <?=$error?>
            <h4 class="header-line"></h4>
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-6">
                	<a href="http://simrs.rsudsidoarjo.com/simrs/billing" style="text-decoration:none" >
                	<div class="alert alert-info back-widget-set text-center">
                    	<img alt="Billing" class="icon-margin" width="90%" height="90%" src="assets/img/billing1.png">
                        <h4>Billing</h4>
                        <h6>SIMRS</h6>
                    </div>
                    </a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                	<a href="http://simrs.rsudsidoarjo.com/simrs/anggaran" style="text-decoration:none" >
                	<div class="alert alert-success back-widget-set text-center">
                    	<img alt="Anggaran" class="icon-margin" width="60%" height="60%" src="assets/img/anggaran.png">
                        <h4>Anggaran</h4>
                        <h6>SIMRS</h6>
                    </div>
                    </a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                	<a href="http://simrs.rsudsidoarjo.com/simrs/askep" style="text-decoration:none" >
                	<div class="alert alert-warning back-widget-set text-center">
                    	<img alt="Askep" class="icon-margin" width="60%" height="60%" src="assets/img/nurse.png">
                        <h4>Askep</h4>
                        <h6>SIMRS</h6>
                    </div>
                    </a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                	<a href="http://simrs.rsudsidoarjo.com/simrs/bank_darah" style="text-decoration:none" >
                	<div class="alert alert-danger back-widget-set text-center">
                    	<img alt="Bank Darah" class="icon-margin" width="45%" height="45%" src="assets/img/bankdarah.png">
                        <h4>Bank Darah</h4>
                        <h6>SIMRS</h6>
                    </div>
                    </a>
                </div>
                
                <div class="col-md-2 col-sm-2 col-xs-6">
                	<a href="http://simrs.rsudsidoarjo.com/simrs/payroll" style="text-decoration:none" >
                	<div class="alert alert-success back-widget-set text-center">
                    	<img alt="Payroll" class="icon-margin" width="60%" height="60%" src="assets/img/payroll.png">
                        <h4>Payroll</h4>
                        <h6>SIMRS</h6>
                    </div>
                    </a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                	<a href="http://simrs.rsudsidoarjo.com/simrs/ulp" style="text-decoration:none" >
                	<div class="alert alert-info back-widget-set text-center">
                    	<img alt="Unit Layanan Pelanggan" class="icon-margin" width="50%" height="50%" src="assets/img/logistik.svg" style="margin-bottom: 20px;">
                        <h4>ULP</h4>
                        <h6>SIMRS</h6>
                    </div>
                    </a>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-6">
                	<a href="http://simrs.rsudsidoarjo.com/simrs/aset" style="text-decoration:none" >
                	<div class="alert alert-info back-widget-set text-center">
                    	<img alt="Aset" class="icon-margin" width="55%" height="55%" src="assets/img/asset.png">
                        <h4>Aset</h4>
                        <h6>SIMRS</h6>
                    </div>
                    </a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                	<a href="http://simrs.rsudsidoarjo.com/simrs/apotek" style="text-decoration:none" >
                	<div class="alert alert-success back-widget-set text-center">
                    	<img alt="Apotek" class="icon-margin" width="50%" height="50%" src="assets/img/apotek.png">
                        <h4>Apotek</h4>
                        <h6>SIMRS</h6>
                    </div>
                    </a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                	<a href="http://sdm.rsudsidoarjo.com/simrs/sdm" style="text-decoration:none" >
                	<div class="alert alert-warning back-widget-set text-center">
                    	<img alt="sdm" class="icon-margin" width="50%" height="50%" src="assets/img/sdm.png" style="margin-bottom: 20px">
                        <h4>SDM</h4>
                        <h6>SIMRS</h6>
                    </div>
                    </a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                	<a href="http://sdm.rsudsidoarjo.com/simrs/e-office" style="text-decoration:none" >
                	<div class="alert alert-danger back-widget-set text-center">
                    	<img alt="office" class="icon-margin" width="50%" height="50%" src="assets/img/office.png">
                        <h4>E-Office</h4>
                        <h6>SIMRS</h6>
                    </div>
                    </a>
                </div>
                
                <div class="col-md-2 col-sm-2 col-xs-6">
                	<a href="http://simrs.rsudsidoarjo.com/simrs/pemasaran" style="text-decoration:none" >
                	<div class="alert alert-success back-widget-set text-center">
                    	<img alt="pemasaran" class="icon-margin" width="55%" height="55%" src="assets/img/pemasaran.png">
                        <h4>Pemasaran</h4>
                        <h6>SIMRS</h6>
                    </div>
                    </a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                	<a href="http://simrs.rsudsidoarjo.com/simrs/akuntansi" style="text-decoration:none" >
                	<div class="alert alert-info back-widget-set text-center">
                    	<img alt="Akuntansi" class="icon-margin" width="60%" height="60%" src="assets/img/akuntansi.png">
                        <h4>Akutansi</h4>
                        <h6>SIMRS</h6>
                    </div>
                    </a>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-6">
                	<a href="http://santri.rsudsidoarjo.com/antrianloket" style="text-decoration:none" >
                	<div class="alert alert-info back-widget-set text-center">
                    	<img alt="Antrian Loket" class="icon-margin" width="50%" height="50%" src="assets/img/santri.png">
                        <h4>Antrian Loket</h4>
                        <h6>SANTRI</h6>
                    </div>
                    </a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                	<a href="http://e-kamar.rsudsidoarjo.com/" style="text-decoration:none" >
                	<div class="alert alert-success back-widget-set text-center">
                    	<img alt="E-Kamar" class="icon-margin" width="60%" height="60%" src="assets/img/kamar.PNG">
                        <h4>E-Kamar</h4>
                    </div>
                    </a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                	<a href="http://app.rsudsidoarjo.com/mutu" style="text-decoration:none" >
                	<div class="alert alert-warning back-widget-set text-center">
                    	<img alt="Mutu" class="icon-margin" width="50%" height="50%" src="assets/img/mutu.png">
                        <h4>Mutu</h4>
                    </div>
                    </a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                	<a href="http://app.rsudsidoarjo.com/ppi" style="text-decoration:none" >
                	<div class="alert alert-danger back-widget-set text-center">
                    	<img alt="ppi" class="icon-margin" width="60%" height="60%" src="assets/img/PPI.jpg">
                        <h4>PPI</h4>
                    </div>
                    </a>
                </div>
                
                <div class="col-md-2 col-sm-2 col-xs-6">
                	<a href="http://app.rsudsidoarjo.com/ekspedisi_berkas" style="text-decoration:none" >
                	<div class="alert alert-success back-widget-set text-center">
                    	<img alt="berkas" class="icon-margin" width="50%" height="50%" src="assets/img/logo_eb.png">
                        <h4>Ekspedisi Berkas </h4>
                    </div>
                    </a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                	<a href="http://simrs.rsudsidoarjo.com/simrs/gizi" style="text-decoration:none" >
                	<div class="alert alert-info back-widget-set text-center">
                    	<img alt="gizi" class="icon-margin" width="65%" height="65%" src="assets/img/gizi.png">
                        <h4>Gizi</h4>
                        <h6>SIMRS</h6>
                    </div>
                    </a>
                </div>
            </div>
            
            <!--<div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                	<a href="http://simrs.rsudsidoarjo.com/simrs/pemasaran" style="text-decoration:none" target="_blank">
                	<div class="alert alert-info back-widget-set text-center">
                    	<img alt="Pemasaran" class="icon-margin" width="55%" height="55%" src="assets/img/a.png">
                        <h4>Pemasaran</h4>
                        <h6>SIMRS</h6>
                    </div>
                    </a>
                </div>
            </div>-->
    

	<div class="col-md-4 col-sm-4 col-xs-4">
                        <a href="https://simpen.rsudsidoarjo.com" style="text-decoration:none" target="_blank">
                        <div class="alert alert-info back-widget-set text-center">
                        <img alt="s'MegaMendung" class="icon-margin" width="40%" height="40%" src="assets/img/megamendung.PNG">
                        <h4 size"25px" ></h4>
                        <h6>S'MegaMendung</h6>
                    </div>
                    </a>
                </div>

	<div class="col-md-4 col-sm-4 col-xs-4">
                        <a href="http://simrs.rsudsidoarjo.com/simrs/diklit" style="text-decoration:none" target="_blank">
                        <div class="alert alert-info back-widget-set text-center">
                        <img alt="diklit" class="icon-margin" width="20%" height="20%" src="assets/img/pendidikan.png">
                        <h4 size"25px" ></h4>
                        <h6>DIKLIT</h6>
                    </div>
                    </a>
                </div>



	 <div class="col-md-4 col-sm-4 col-xs-4">
                        <a href="http://remics.rsudsidoarjo.com/cso" style="text-decoration:none" target="_blank">
                        <div class="alert alert-info back-widget-set text-center">
                        <img alt="remics" class="icon-margin" width="20%" height="20%" src="assets/img/remics.png">
                        <h4 size"25px" ></h4>
                        <h6>REMICS</h6>
                    </div>
                    </a>
                </div>
    

       </div>
    </div>
    </div>
  
    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   Copyright &copy; 2017 |IT  RSUD Sidoarjo
                </div>

            </div>
        </div>
    </section>
    <a class="totop" href="#">Top</a>
      <!-- FOOTER SECTION END-->
</div>
  <div id="loader" class="loader"></div>
  
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.min.js"></script>
  	<!--script src="assets/js/layout.js"></script-->
    <script src="assets/js/top.js" type="text/javascript"></script>
  <script type='text/javascript'>
  //<![CDATA[
  // Lazy Load
  (function(a){a.fn.lazyload=function(b){var c={threshold:0,failurelimit:0,event:"scroll",effect:"show",container:window};if(b){a.extend(c,b)}var d=this;if("scroll"==c.event){a(c.container).bind("scroll",function(b){var e=0;d.each(function(){if(a.abovethetop(this,c)||a.leftofbegin(this,c)){}else if(!a.belowthefold(this,c)&&!a.rightoffold(this,c)){a(this).trigger("appear")}else{if(e++>c.failurelimit){return false}}});var f=a.grep(d,function(a){return!a.loaded});d=a(f)})}this.each(function(){var b=this;if(undefined==a(b).attr("original")){a(b).attr("original",a(b).attr("src"))}if("scroll"!=c.event||undefined==a(b).attr("src")||c.placeholder==a(b).attr("src")||a.abovethetop(b,c)||a.leftofbegin(b,c)||a.belowthefold(b,c)||a.rightoffold(b,c)){if(c.placeholder){a(b).attr("src",c.placeholder)}else{a(b).removeAttr("src")}b.loaded=false}else{b.loaded=true}a(b).one("appear",function(){if(!this.loaded){a("<img />").bind("load",function(){a(b).hide().attr("src",a(b).attr("original"))[c.effect](c.effectspeed);b.loaded=true}).attr("src",a(b).attr("original"))}});if("scroll"!=c.event){a(b).bind(c.event,function(c){if(!b.loaded){a(b).trigger("appear")}})}});a(c.container).trigger(c.event);return this};a.belowthefold=function(b,c){if(c.container===undefined||c.container===window){var d=a(window).height()+a(window).scrollTop()}else{var d=a(c.container).offset().top+a(c.container).height()}return d<=a(b).offset().top-c.threshold};a.rightoffold=function(b,c){if(c.container===undefined||c.container===window){var d=a(window).width()+a(window).scrollLeft()}else{var d=a(c.container).offset().left+a(c.container).width()}return d<=a(b).offset().left-c.threshold};a.abovethetop=function(b,c){if(c.container===undefined||c.container===window){var d=a(window).scrollTop()}else{var d=a(c.container).offset().top}return d>=a(b).offset().top+c.threshold+a(b).height()};a.leftofbegin=function(b,c){if(c.container===undefined||c.container===window){var d=a(window).scrollLeft()}else{var d=a(c.container).offset().left}return d>=a(b).offset().left+c.threshold+a(b).width()};a.extend(a.expr[":"],{"below-the-fold":"$.belowthefold(a, {threshold : 0, container: window})","above-the-fold":"!$.belowthefold(a, {threshold : 0, container: window})","right-of-fold":"$.rightoffold(a, {threshold : 0, container: window})","left-of-fold":"!$.rightoffold(a, {threshold : 0, container: window})"})})(jQuery);$(function(){$("img").lazyload({placeholder:"assets/img/lazy.gif",effect:"fadeIn",threshold:"-50"})});
  //]]>
var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 700);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
  </script>
</body>
</html>

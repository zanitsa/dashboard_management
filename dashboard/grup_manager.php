<?php
  require_once "header.php";
  $notif = $text = "";
  $sukses = '<div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <p id="error"><strong>';
  $penutup= '..!</strong></p></div>';
  $error = '<div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <p id="error"><strong>';

  if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $grup = $_POST['grup'];
    $b = "";
    if (input_grmngr($nama,$grup) && edit_temp($nama, $b)) {
      $text ="Sukses Menyimpan";
      $notif = $sukses . $text . $penutup;
    }else{
      $text= "Gagal Menyimpan";
      $notif= $error .$text .$penutup;
    }
  }

  if (isset($_POST['hapus'])) {
    $id=$_POST['id'];
    $nama=$_POST['nama'];
    $b= $nama;
    if (delete_grmngr($id) && edit_temp($nama,$b)){
      $text = "Sukses Menghapus";
      $notif=$sukses .$text .$penutup ;
    }
    else {
      $text= "Gagal Menghapus";
      $notif= $error .$text .$penutup ;
    }

  }
?>
        <div class="col-sm-3 col-sm-offset-3 col-md-4 col-md-offset-2 main">
          <h4 class="page-header"><center>Buat Grup Aplikasi</center></h4>
          <div class="row">
            <?=$notif?>
          </div>
<form action="" method="post" enctype="multipart/form-data">
            <div class="row" >
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Pilih Aplikasi:</label>
                  <select class="form-control" required id="select" name="nama">
                <?php
                  $optionmaster = view_master();
                  while ($arraymaster = pg_fetch_assoc($optionmaster) ) {
                ?>
                    <option value="<?=$arraymaster['temp']?>"><?=$arraymaster['temp']?></option>
                <?php
                  };
                ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row" >
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Pilih Grup:</label>
                  <select class="form-control" required id="select2" name="grup">
                <?php
                  $optiongrup = view_grup();
                  while ($arraygrup = pg_fetch_assoc($optiongrup) ) {
                ?>
                    <option value="<?=$arraygrup['grup']?>"><?=$arraygrup['grup']?></option>
                <?php
                  };
                ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-primary col-sm-3 col-xs-3" style="float: right" name="submit"><i class="fa fa-save"></i> Save</button>
              </div>
            </div>
</form>
          </div>

          <div class="col-sm-6 col-md-6 main">
            <h4 class="sub-header">Data Grup Aplikasi</h4>
            <div class="table-responsive">
              <table id="table" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Grup</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
            <?php
              $row = 0;
                $data = view_grmngr();
                while($key = pg_fetch_assoc($data)){
                  include "modal.php";
            ?>
                  <tr>
                    <td><?=++$row?></td>
                    <td><?=$key['nama']?></td>
                    <td><?=$key['grup']?></td>
                    <td>
                      <button data-toggle="modal" data-target="#hapus_<?=$key['id']?>" type="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>

                    </td>
                  </tr>
            <?php
                };
     
            ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Grup</th>
                    <th>Opsi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>

<?php
  require_once "footer.php";
?>

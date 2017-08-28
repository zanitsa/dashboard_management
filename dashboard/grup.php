<?php
  require_once "header.php";
  $notif = $text ="";
  $sukses = '<div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <p id="error"><strong>';
  $penutup= '..!</strong></p></div>';
  $error = '<div class="alert alert-danger alert-dismissable" style="color: white">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <p id="error"><strong>';
        

  $folder     = '../assets/img/grup/';
  $file_type  = array('png','jpg','jpeg');
  $max_size   = 100000; // 100kb

  if (isset($_POST['submit'])) {
    $nama=$_POST['nama'];
    $temp=$_POST['temp'];
    $user=$_POST['user'];
    $file_name  = $_FILES["icon"]["name"];
    $file_size  = $_FILES["icon"]["size"];
    //cari extensi file dengan menggunakan fungsi explode
    $explode    = explode('.',$file_name);
    $extensi    = $explode[count($explode)-1];
    
   // foreach ($_POST['user'] as $selected_option) {
     //   echo $selected_option;
    //}

   if(!in_array($extensi,$file_type)){
      $text= "File Harus Dalam Bentuk Gambar PNG atau JPG";
      $notif= $error . $text . $penutup;
    }
    elseif ($file_size > $max_size) {
      $text="Ukuran file max. 100KB";
      $notif= $error . $text . $penutup;
    }
    elseif(file_exists($folder.$file_name)) {
      $text="Nama file sudah ada. Silahkan cek kembali";
      $notif= $error . $text .$penutup; 
    }
    elseif( move_uploaded_file($_FILES["icon"]["tmp_name"], $folder.$file_name) && input_grup($nama, $file_name, $temp) && input_user_grup($user)){
      $text = "Sukses Menyimpan";
      $notif = $sukses . $text . $penutup;
    }else{
      $text = "Gagal Menyimpan";
      $notif = $error . $text . $penutup;
    }
  }
  if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $z=$_POST['nama'];
    $icon = $_POST['icon'];
    $user = $_POST['user'];
    $temp = cek_temp($_POST['temp']);

    if(pg_num_rows($temp) != 0){
      $text= "Tidak Bisa Dihapus, Data Masih Ada di Master Aplikasi";
      $notif= $error . $text . $penutup;
    }else{
      if (delete_grup($id) && delete_usergrp($id) && unlink($folder.$icon)) {
        $text= "Sukses Menghapus";
        $notif= $sukses . $text . $penutup;
      }
      else {
        $text = "Gagal Menghapus";
        $notif= $error . $text . $penutup;
      }
    }
  }

  if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $grup = $_POST['nama'];

    if(edit_grup($id, $grup) && edit_grupmaster($id, $grup)){
      $text = "Sukses Mengedit";
      $notif = $sukses . $text . $penutup;
    }else{
      $text = "Gagal Mengedit";
      $notif = $error . $text . $penutup;
    }

  }

  if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $icon = $_POST['edit_icon'];
    $file_name  = $_FILES["icon"]["name"];
    $file_size  = $_FILES["icon"]["size"];
    //cari extensi file dengan menggunakan fungsi explode
    $explode    = explode('.',$file_name);
    $extensi    = $explode[count($explode)-1];

    if(!in_array($extensi,$file_type)){
      $text = "File Harus Dalam Bentuk Gambar PNG atau JPG";
      $notif= $error . $text . $penutup;
    }
    elseif ($file_size > $max_size) {
      $text="Ukuran file max. 100KB";
      $notif= $error . $text . $penutup;
    }
    elseif(file_exists($folder.$file_name)) {
      $text = "Nama file sudah ada. Silahkan cek kembali";
      $notif= $error . $text . $penutup;
    }
    elseif(unlink($folder.$icon) && move_uploaded_file($_FILES["icon"]["tmp_name"], $folder.$file_name) && icon_grup($id, $file_name)){
      $text = "Sukses Menyimpan";
      $notif = $sukses . $text . $penutup;
    }else{
      $text = "Gagal Menyimpan";
      $notif = $error . $text . $penutup;
    }
  }
  
?>
        <div class="col-sm-3 col-sm-offset-3 col-md-4 col-md-offset-2 main">
          <h4 class="page-header"><center>Input Data Baru Master Group</center></h4>
          <div class="row">
            <?=$notif?>
          </div>
<form action="" method="post" enctype="multipart/form-data">
            <div class="row" >
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Nama:</label>
                  <input type="text" required class="form-control" name="nama">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Icon:</label>
                  <input type="file" required name="icon" value="browse">
                  
                </div>
              </div>
            </div>
            <hr style="margin: 8px 0px">
            <div class="row" style="margin-bottom: 10px">
              <div class="col-sm-12">
                <label>Butuh Login?&nbsp&nbsp&nbsp&nbsp</label>
                <div class="btn-group btn-group-md" role="group" aria-label="enabling and disabling">
                  <button type="button" class="enable btn btn-default"><i class="fa fa-lock"></i>
                    Enable &nbsp&nbsp&nbsp
                  </button>
                  <button type="button" class="disable btn btn-default"><i class="fa fa-unlock"></i>
                    Disable &nbsp&nbsp&nbsp
                  </button>
                </div>
              </div>
            </div>
            <div class="row" >
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Pilih User:</label>
                  <select class="form-control" required multiple="multiple" id="select2" name="user">
                <?php
                  $option = view_user();
                  while ($array = pg_fetch_assoc($option) ) {
                ?>
                    <option value="<?=$array['username']?>"><?=$array['username']?></option>
                <?php
                  };
                ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <input type="hidden" name="temp" value="<?=$plus?>">
                <button type="submit" class="btn btn-primary col-sm-3 col-xs-3" style="float: right" name="submit"><i class="fa fa-save"></i> Save</button>
              </div>
            </div>
</form>
          </div>

          <div class="col-sm-6 col-md-6 main">
            <h4 class="sub-header">Data Master Group</h4>
            <div class="table-responsive">
              <table id="table" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Icon</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
            <?php
              $row = 0;
                $data = view_grup();

                while($key = pg_fetch_assoc($data)){
                  include "modal.php";
            ?>
                  <tr>
                    <td><?=++$row?></td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#edit_grup<?=$key['id']?>" style="text-decoration: none">
                        <?=$key['grup']?>&nbsp&nbsp&nbsp
                        <i class="fa fa-pencil"></i>
                      </a>
                    </td>
                    <td>
                      <a target="_blank" href="../assets/img/grup/<?=$key['icon']?>">
                        <?=$key['icon']?>
                      </a>
                      &nbsp&nbsp&nbsp
                      <a href="#" data-toggle="modal" data-target="#edit_icon<?=$key['id']?>">
                        <i class="fa fa-pencil"></i>
                      </a>
                    </td>
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
                    <th>Icon</th>
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

<?php
  require_once "header.php";
  $notif = $text = "";
  $sukses = '<div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <p id="error"><strong>';
  $penutup = '..!</strong></p></div>';
  $error = '<div class="alert alert-danger alert-dismissable" style="color:white">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <p id="error"><strong>';

  $folder     = '../assets/img/master/';
  $file_type  = array('png','jpg','jpeg');
  $max_size   = 100000; // 100kb

  if (isset($_POST['submit'])) {
    $nam=$_POST['nama'];
    $link=$_POST['link'];
    $grup=$_POST['grup'];

    if( $row = pg_fetch_assoc(cek_grup($grup)) ){
      $t = $row['temp_grup'];
    }
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
    elseif( move_uploaded_file($_FILES["icon"]["tmp_name"], $folder.$file_name) && input_master($nam, $link,$grup, $file_name, $t) ){
      $text = "Sukses Menyimpan";
      $notif = $sukses . $text . $penutup;
    }else{
      $text = "Gagal Menyimpan";
      $notif = $error . $text . $penutup;
    }
  }

  if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $z = $_POST['nama'];
    $grup = $_POST['grup'];
    $icon = $_POST['icon'];

    if (delete_master($id) && unlink($folder.$icon)) {
      $text = "Sukses Menghapus";
      $notif= $sukses . $text . $penutup;
    }else{
      $text = "Gagal Menghapus";
      $notif=$error. $text . $penutup;
    }
  }
  if(isset($_POST['edit'])){
    $master = $_POST['nama'];
    $link = $_POST['link'];
    $id = $_POST['id'];

    if(edit_master($id, $master ,$link)){
      $text = " Sukses Mengedit";
      $notif = $sukses . $text . $penutup; 
    }
    else{
      $text ="Gagal Mengedit";
      $notif = $error . $text .$penutup;
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
    elseif(unlink($folder.$icon) && move_uploaded_file($_FILES["icon"]["tmp_name"], $folder.$file_name) && icon_master($id, $file_name)){
      $text = "Sukses Mengedit";
      $notif = $sukses . $text . $penutup;
    }else{
      $text = "Gagal Menyimpan";
      $notif = $error . $text . $penutup;
    }
  }
?>
        <div class="col-sm-3 col-sm-offset-3 col-md-4 col-md-offset-2 main">
          <h4 class="page-header"><center>Input Data Baru Master Aplikasi</center></h4>
          <div class="row">
            <?=$notif?>
          </div>
<form action="" method="post" enctype="multipart/form-data">
            <div class="row" >
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Nama Aplikasi:</label>
                  <input type="text" required class="form-control" name="nama">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Link Aplikasi:</label>

                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-link"></i></span>
                    <input type="url" class="form-control" name="link" placeholder="http://www.contoh.com">
                  </div>

                </div>
              </div>
            </div>
            <div class="row" >
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Masuk Grup:</label>
                  <select class="form-control" required id="select" name="grup">
                <?php
                  $optionmaster = view_grup();
                  while ($arraymaster = pg_fetch_assoc($optionmaster) ) {
                ?>
                    <option value="<?=$arraymaster['grup']?>"><?=$arraymaster['grup']?></option>
                <?php
                  };
                ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Icon Aplikasi:</label>
                  <input type="file" required name="icon" value="browse">
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
            <h4 class="sub-header">Data Master</h4>
            <div class="table-responsive">
              <table id="table" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Link</th>
                    <th>Grup</th>
                    <th>Icon</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
            <?php
              $row = 0;
                $data = view_master();
                while($key = pg_fetch_assoc($data)){
                  include "modal.php";
            ?>
                  <tr>
                    <td><?=++$row?></td>
                    <td><?=$key['nama']?></td>
                    <td><?=$key['link']?></td>
                    <td><?=$key['grup']?></td>
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
                      <button data-toggle="modal" data-target="#edit_master<?=$key['id']?>" type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></button>

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
                    <th>Link</th>
                    <th>Grup</th>
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

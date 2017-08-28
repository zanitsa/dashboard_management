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

if (isset ($_POST['submit'])) {
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $password = $_POST ['pass'];

  $data = cek_user($username);
  if( pg_num_rows($data) == ""){

    if (input_user($nama , $username , $password)) {
      $text = "Sukses Menyimpan";
      $notif= $sukses . $text . $penutup;
    }else{
      $text = "Gagal Menyimpan";
      $notif= $error. $text . $penutup;
    }

  }else{
      $text = "User Sudah Digunakan, Ganti Yang Lain";
      $notif= $error. $text . $penutup;
  }

}
if (isset($_POST['hapus'])) {
  $id = $_POST['id'];
  $nama = $_POST['nama'];

  if (delete_user($id)) {
    $text = "Sukses Menghapus";
    $notif = $sukses .$text .$penutup;
  }
  else{
    $text = "Gagal Menghapus";
    $notif = $error .$text .$penutup;
  }
}

if (isset($_POST['edit'])) {
  $id =$_POST['id'];
  $name=$_POST['nama'];
  $user= $_POST['username'];
  $pass=$_POST['pass'];
  
  if (edit_user($id,$name,$user,$pass)) {
    $text = "Sukses Mengedit";
    $notif = $sukses .$text .$penutup;
  }
  else {
    $text ="Gagal Mengedit";
    $notif =$error .$text .$penutup;
  }
}
 ?>
 <div class="col-sm-3 col-sm-offset-3 col-md-4 col-md-offset-2 main">
  <h4 class="page-header"><center>Input Data Baru User </center></h4>
  <div class="row">
    <?=$notif?>
  </div>

<form action="" method="post" enctype="multipart/form-data">
      <div class="row" >
        <div class="col-sm-12">
          <div class="form-group">
            <label>Nama :</label>
            <input type="text" required class="form-control" name="nama">
          </div>
        </div>
      </div>
      <div class="row" >
        <div class="col-sm-12">
          <div class="form-group">
            <label>Username :</label>
            <input type="text" required class="form-control" name="username">
          </div>
        </div>
      </div>
      <div class="row" >
        <div class="col-sm-12">
          <div class="form-group">
            <label>Password :</label>
            <input type="password" required class="form-control" name="pass">
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
        <h4 class="sub-header">Data User</h4>
        <div class="table-responsive">
          <table id="table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
        <?php
          $row = 0;
            $data = view_user();
            while($key = pg_fetch_assoc($data)){
              include "modal.php";
        ?>
              <tr>
                <td><?=++$row?></td>
                <td><?=$key['nama']?></td>
                <td><?=$key['username']?></td>
                <td>
                  <button data-toggle="modal" data-target="#edit_user<?=$key['id']?>" type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></button>

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
                <th>Username</th>
                <th>Opsi</th>
              </tr>
            </tfoot>
          </table>
      </div>
  </div>           
<?php
  require_once "footer.php";
?>
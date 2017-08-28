<!-- Modal -->
<div id="hapus_<?=$key['id']?>" class="modal fade" role="dialog">

  <div class="modal-dialog modal-sm">
<form action="" method="post">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi Hapus</h4>
      </div>
      <div class="modal-body">
          <p>Yakin Ingin Hapus Data Ini?</p>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id" value="<?=$key['id']?>">
        <input type="hidden" name="nama" value="<?=$key['nama']?>">
        <input type="hidden" name="grup" value="<?=$key['grup']?>">
        <input type="hidden" name="icon" value="<?=$key['icon']?>">
        <input type="text" name="user" value="<?=$key['user']?>">
        <input type="hidden" name="temp" value="<?=$key['temp_grup']?>">
        <button type="submit" class="btn btn-danger" name="hapus"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    
</form>
  </div>
</div>


<!-- Modal -->
<div id="edit_master<?=$key['id']?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
<form action="" method="post">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Data</h4>
      </div>
      <div class="modal-body">
          <div class="row" >
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Nama:</label>
                  <input type="text" required class="form-control" name="nama" value="<?=$key['nama']?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Link:</label>
                  <input type="text" required class="form-control" name="link" value="<?=$key['link']?>">
                </div>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id" value="<?=$key['id']?>">
        <button type="submit" class="btn btn-success" name="edit"><i class="fa fa-save"></i> Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>   
</form>
  </div>
</div>

<!-- Modal -->
<div id="edit_grup<?=$key['id']?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
<form action="" method="post">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Data</h4>
      </div>
      <div class="modal-body">
          <div class="row" >
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Nama Grup:</label>
                  <input type="text" required class="form-control" name="nama" value="<?=$key['grup']?>">
                </div>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id" value="<?=$key['temp_grup']?>">
        <button type="submit" class="btn btn-success" name="edit"><i class="fa fa-save"></i> Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>   
</form>
  </div>
</div>

<!-- Modal -->
<div id="edit_icon<?=$key['id']?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
<form action="" method="post" enctype="multipart/form-data">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Data</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Icon:</label>
              <input type="file" required name="icon" value="browse">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id" value="<?=$key['id']?>">
        <input type="hidden" name="edit_icon" value="<?=$key['icon']?>">
        <button type="submit" class="btn btn-success" name="update"><i class="fa fa-save"></i> save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>   
</form>
  </div>
</div>

<!-- Modal -->
<div id="edit_user<?=$key['id']?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
<form action="" method="post">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Data</h4>
      </div>
      <div class="modal-body">
          <div class="row" >
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Nama:</label>
                  <input type="text" required class="form-control" name="nama" value="<?=$key['nama']?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Username :</label>
                  <input type="text" required class="form-control" name="username" value="<?=$key['username']?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Password :</label>
                  <input type="password" required class="form-control" name="pass" value="<?=$key['pass']?>">
                </div>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id" value="<?=$key['id']?>">
        <button type="submit" class="btn btn-success" name="edit"><i class="fa fa-save"></i> Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>   
</form>
  </div>
</div>
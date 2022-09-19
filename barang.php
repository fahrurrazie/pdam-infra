<div class="modal modal-primary fade" id="modalbarang">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">INPUT BARANG</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" id="formbarang">          
          <div class="form-group">   
            <div class="col-md-2">
              <label  class="control-label">Nama</label>              
            </div>
            <div class="col-md-10">
              <input style="width: 100%;" type="text" class="form-control" name="nama" id="nama"> 
              <input type="hidden" name="id" id="id">               
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-2">
              <label  class="control-label">Merk</label> 
            </div>
            <div class="col-md-10">
              <input style="width: 100%;" type="text" class="form-control" name="merk" id="merk">     
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-2">
              <label  class="control-label">Tipe</label>   
            </div>   
            <div class="col-md-4">
              <input style="width: 100%;" type="text" class="form-control" name="tipe" id="tipe">  
            </div>
            <div class="col-md-2">
              <label  class="control-label">Stok</label>   
            </div>   
            <div class="col-md-4">
              <input style="width: 100%;" type="text" class="form-control" name="stok" id="stok">  
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
        <input type="hidden" id="simpan" name="simpan" value="barang" />
        <button type="button" id="bsimpan" class="btn btn-info" >Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <div class="form-group">
      <div class="col-md-10">
        <h3 class="box-title">DATA BARANG</h3> 
      </div> 
      <div class="col-md-1">
        <button class="btn btn-info pull-right" id="tambahbarang" type="button">Tambah</button>
      </div>
      <div class="col-md-1"> 
        <button class="btn btn-success pull-right" id="cetak" type="button">Cetak</button> 
      </div>
    </div>
  </div>
  <div class="box-body">
      <table id="example2" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Nama</th> 
          <th class="text-center">Merk</th>
          <th class="text-center">Tipe</th> 
          <th class="text-center">Harga</th>
          <th class="text-center">Stok</th>
          <th class="text-center" style="min-width:100px">Aksi</th> 
        </tr>
        </thead>
        <tbody>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr> 
        </tbody>
      </table>
  </div> 
</div>     
<!-- </div> -->

<!--footer-->
 <!--    </div> -->
      <!-- /.row -->

    </section>
    
   <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <strong>Copyright &copy; 2020 PDAM Bandarmasih Kota Banjarmasin</strong> All rights reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>

<script src="style/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="style/bootstrap/js/bootstrap.min.js"></script>
<script src="style/dist/js/app.min.js"></script>
<script src="style/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="style/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="style/sweetalert.min.js"></script>
<script>
tampil(); 

$("#tambahbarang").on('click',function(){
  $('#id,#nama,#merk,#tipe,#stok').val('');
  $("#modalbarang").modal('show');
});   

$("#cetak").on('click',function(){
  window.open("lapbarang.php");
}); 

$("#bsimpan").on('click',function(){
    var data = $('#formbarang').serialize();
    $("#modalbarang").modal('hide');
    $.ajax({
      type: 'POST',
      url: "simpan.php",
      data: data,
      success: function() {
        swal("Sukses", "Data Berhasil Disimpan", "success");
        tampil();
      }
    });
});

function tampil(){
  var nomor=0;
  $('#example2').dataTable( {
      "ajax": "tampil.php?data=barang",
      "destroy": true,
      "columns": [
          { "data": "aksi" },
          { "data": "nama" },
          { "data": "merk" },
          { "data": "tipe" },
          { "data": "harga" },
          { "data": "stok" },
          { "data": "aksi" }
        ],
      "aoColumnDefs": [ {
        "aTargets": [ 0 ],
        "mRender": function (data, type, full) {
            nomor=nomor+1;
            return nomor;
          }
        },
        {
        "aTargets": [ 4 ],
        "mRender": function (data, type, full) {
          var harga = "";
           if (full.harga!="0"){
            harga=full.harga;
           }
            return harga;
          }
        },
        {
        "aTargets": [ 6 ],
        "mRender": function (data, type, full) {
          var formmatedvalue = "<button type='button'  class='btn btn-sm btn-success edit' ";
            formmatedvalue = formmatedvalue+" value='"+full.id+"'> <i class='fa fa-pencil'></i></button>";
            formmatedvalue = formmatedvalue+" <button type='button' class='btn btn-sm btn-danger hapus' value='"+full.id+"'>";
            formmatedvalue = formmatedvalue+" <i class='fa fa-trash'></i></button>";
            return formmatedvalue;
          }
        },
      ],
      "lengthChange": false,
      "scrollY": 500,
      "scrollX": true,
      "scrollCollapse": true,
      "autoWidth": true,
      "ordering" : false,
      "info" : false
    });
}

//edit
$("#example2").on('click','.edit',function(){
    $.getJSON("tampil.php?data=editbarang&id="+$(this).val(), function(data) {
    $('#id').val(data.id);
    $('#nama').val(data.nama);
    $('#merk').val(data.merk);
    $('#tipe').val(data.tipe);
    $('#stok').val(data.stok);
    $("#modalbarang").modal('show');
  });
});

$("#example2").on('click','.hapus',function(){
    var id = $(this).val();
    swal({
      title: "Hapus Data?",
      text: "Data Akan Dihapus Permanen",
      icon: "warning",
      buttons: {
        cancel: "Batal",
        catch: {
          text: "Hapus",
          value: true,
          closeModal: false
        },
      },
      dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {
      return $.post("hapus.php?hapus=barang&id="+id, function(data) {
        swal("Sukses", "Data Berhasil Dihapus", "success");
        tampil();
      });
    } 
    });  
});

</script>

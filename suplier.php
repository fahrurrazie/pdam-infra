<div class="modal modal-primary fade" id="modalsuplier">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">INPUT SUPPLIER</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" id="formsuplier">          
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
              <label  class="control-label">Alamat</label> 
            </div>
            <div class="col-md-10">
              <textarea name="alamat" id="alamat" class="form-control" style="height: 50px;width: 100%;"></textarea>      
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2">
              <label  class="control-label">Kota</label>   
            </div>   
            <div class="col-md-4">
              <input style="width: 100%;" type="text" class="form-control" name="kota" id="kota">  
            </div>
            <div class="col-md-2">
              <label  class="control-label">No Telp</label>   
            </div>   
            <div class="col-md-4">
              <input style="width: 100%;" type="text" class="form-control" name="telp" id="telp">  
            </div>
          </div>
          <div class="form-group">   
            <div class="col-md-2">
              <label  class="control-label">Email</label>              
            </div>
            <div class="col-md-10">
              <input style="width: 100%;" type="text" class="form-control" name="email" id="email">                
            </div>
          </div>
          <div class="form-group">   
            <div class="col-md-2">
              <label  class="control-label">Jenis</label>              
            </div>
            <div class="col-md-10">
              <select multiple data-placeholder="Pilih Jenis" name="jenis[]" id="jenis" style="width: 100%;" class="form-control">
                <option>CPU</option>
                <option>Monitor</option>
                <option>Accesoris</option>
                <option>UPS</option>
                <option>Printer</option>
                <option>Mesin Absensi</option>
              </select>                 
            </div>
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
        <input type="hidden" id="simpan" name="simpan" value="suplier" />
        <button type="button" id="bsimpan" class="btn btn-info" >Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="box box-solid box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">DATA SUPPLIER</h3>   
        <button class="btn btn-success pull-right" id="tambahsuplier" type="button">Tambah Data</button>
    </div>
    <div class="box-body">
      <div>
        <form class="form-horizontal" role="form"> 
        <div class="form-group">
            <div class="col-md-1">
              <label  class="control-label">Filter</label>  
            </div>  
            <div class="col-md-4">
              <select multiple data-placeholder="Pilih Jenis" name="jenis_filter[]" id="jenis_filter" style="width: 100%;" class="form-control">
                <option>CPU</option>
                <option>Monitor</option>
                <option>Accesoris</option>
                <option>UPS</option>
                <option>Printer</option>
                <option>Mesin Absensi</option>
              </select> 
            </div>
            <div class="col-md-1">
              <button class="btn btn-info" id="filter" type="button">Filter</button>
            </div>
            <div class="col-md-1">
              <button class="btn btn-success" id="cetak" type="button">Cetak</button>
            </div>
        </div>
        </form>
      </div>
        <table id="example2" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama</th> 
            <th class="text-center">Alamat</th>
            <th class="text-center">Kota</th> 
            <th class="text-center">Telpon</th>
            <th class="text-center">Email</th>
            <th class="text-center">Jenis</th>
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
      <strong>Copyright &copy; 2019 PDAM Bandarmasih Kota Banjarmasin</strong> All rights reserved.
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
<script src="style/plugins/select2-3.5.4/select2.min.js"></script>
<script>
tampil(); 

$("#tambahsuplier").on('click',function(){
  $('#id,#nama,#alamat,#kota,#telp,#email').val('');
  $('#jenis').val('').change();
  $("#modalsuplier").modal('show');
});   

$("#jenis,#jenis_filter").select2();

$("#filter").on('click',function(){
  tampil();
});

$("#cetak").on('click',function(){
    var jenis_filter=$('#jenis_filter').val();
    if (jenis_filter==''||jenis_filter==null){jenis_filter='-';}
    window.open("lapsuplier.php?jenis_filter="+jenis_filter);
});

$("#bsimpan").on('click',function(){
    var data = $('#formsuplier').serialize();
    $("#modalsuplier").modal('hide');
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
  var jenis_filter=$('#jenis_filter').val();
  if (jenis_filter==''||jenis_filter==null){jenis_filter='-';}
  $('#example2').dataTable( {
      "ajax": "tampil.php?data=suplier&jenis_filter="+jenis_filter,
      "destroy": true,
      "columns": [
          { "data": "aksi" },
          { "data": "nama" },
          { "data": "alamat" },
          { "data": "kota" },
          { "data": "telp" },
          { "data": "email" },
          { "data": "jenis" },
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
        "aTargets": [ 7 ],
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
      "info" : false,
      "searching" : false
    });
}

//edit
$("#example2").on('click','.edit',function(){
    $.getJSON("tampil.php?data=editsuplier&id="+$(this).val(), function(data) {
    $('#id').val(data.id);
    $('#nama').val(data.nama);
    $('#alamat').val(data.alamat);
    $('#kota').val(data.kota);
    $('#telp').val(data.telp);
    $('#email').val(data.email);
      var jenis = data.jenis.split(',');
      $('#jenis').val(jenis).change();
    $("#modalsuplier").modal('show');
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
      return $.post("hapus.php?hapus=suplier&id="+id, function(data) {
        swal("Sukses", "Data Berhasil Dihapus", "success");
        tampil();
      });
    } 
    });  
});

</script>

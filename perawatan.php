<div class="modal modal-primary fade" id="modaledit">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">TAMBAH PERAWATAN</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" id="form1">          
          <div class="form-group">   
            <div class="col-md-2">
              <label  class="control-label">Barang</label>              
            </div>
            <div class="col-md-10">
              <input style="width: 100%;" type="text" class="form-control" name="barang" id="barang">               
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-2">
              <label  class="control-label">Keterangan</label>   
            </div>   
            <div class="col-md-10">
              <input style="width: 100%;" type="text" class="form-control" name="keterangan" id="keterangan">  
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
        <button type="button" id="bsimpan" class="btn btn-info" >Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="box box-solid box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">PERAWATAN</h3>   
    </div>
    <div class="box-body">
      <div>
        <form class="form-horizontal" role="form" id="formperawatan"> 
        <div class="form-group">
            <label  class="control-label  col-md-1">Tanggal</label>  
            <div class="col-md-2">
              <input  type="text" class="form-control datepicker" name="tanggal" id="tanggal" >
            </div>
            <label  class="control-label col-md-2">Departemen</label>  
            <div class="col-md-3">
              <input  type="text" class="form-control" name="id_departemen" id="id_departemen" >
            </div>
            <label  class="control-label  col-md-1">Ruangan</label>  
            <div class="col-md-3">
              <input  type="text" class="form-control" name="lokasi" id="lokasi" >
            </div>
        </div>
        <div class="form-group">
            <label  class="control-label  col-md-1">Teknisi</label>  
            <div class="col-md-3">
              <input  type="text" class="form-control" name="id_karyawan" id="id_karyawan">
            </div>
            <label  class="control-label  col-md-2">Mengetahui</label>  
            <div class="col-md-3">
              <input  type="text" class="form-control" name="mengetahui" id="mengetahui">
            </div>
            <div class="col-md-1">
              <button class="btn btn-info" id="simpanpembelian" type="button">Selesai</button>
            </div>
            <div class="col-md-1">
              <button class="btn btn-warning" id="hapus" type="button">Hapus</button>
            </div>
            <div class="col-md-1">
              <button class="btn btn-danger" id="batal" type="button">Batal</button></a>
              <!-- <button class="btn btn-danger" id="batal" <a href='menu.php?open=rekapperawatan'>Batal</button></a> -->
            </div>
        </div>
        </form>
      </div>
    </div> 
</div>

<div class="box box-solid box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">DETAIL PERAWATAN</h3>   
        <button class="btn btn-success pull-right" id="tambahdata" type="button">Tambah Data</button>
    </div>
    <div class="box-body">
        <table id="example2" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Id Barang</th>
            <th class="text-center">Barang</th> 
            <th class="text-center">Keterangan</th>
            <th class="text-center" style="min-width:50px">Aksi</th> 
          </tr>
          </thead>
          <tbody>

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
<script src="style/plugins/select2-3.5.4/select2.min.js"></script>
<script src="style/jquery.number.min.js"></script>
<script src="style/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<script>
$(function () {
  $('.datepicker').datepicker({
    autoclose: true,
    format :"yyyy-mm-dd"
  });
});

tabelbarang = $('#example2').DataTable( {
  "columnDefs": [
        {
            "targets": [ 1 ],
            "visible": false,
            "searchable": false
        }
    ],
    "lengthChange": false,
    "scrollY": 500,
    "scrollX": true,
    "scrollCollapse": true,
    "autoWidth": true,
    "ordering" : false,
    "info" : false
});

function tampilbarang(){
  $.getJSON("tampil.php?data=selectbarang", function(data) {
    $('#barang').select2({
      data: data.barang,
      placeholder: 'Pilih Barang',
      allowClear: true,
      minimumInputLength: 0,
      formatSelection: function(data) { return data.text },
      formatResult: function(data) {
        return  '<span class="label label-info">'+data.id+'</span>'+
              '<strong style="margin-left:5px">'+data.text+'</strong>';

      }
    });
  });
}

tampilbarang();

function tampilkaryawan(){
  $.getJSON("tampil.php?data=selectteknisi", function(data) {
    $('#id_karyawan').select2({
      data: data.karyawan,
      placeholder: 'Pilih teknisi',
      allowClear: true,
      minimumInputLength: 0,
      formatSelection: function(data) { return data.text },
      formatResult: function(data) {
        return  '<span class="label label-info">'+data.id+'</span>'+
              '<strong style="margin-left:5px">'+data.text+'</strong>';

      }
    });
  });
}

tampilkaryawan();

function tampildepartemen(){
  $.getJSON("tampil.php?data=selectdepartemen", function(data) {
    $('#id_departemen').select2({
      data: data.departemen,
      placeholder: 'Pilih Departemen',
      allowClear: true,
      minimumInputLength: 0,
      formatSelection: function(data) { return data.text },
      formatResult: function(data) {
        return  '<span class="label label-info">'+data.id+'</span>'+
              '<strong style="margin-left:5px">'+data.text+'</strong>';

      }
    });
  });
}

tampildepartemen();


//variabel 
var counter=1;
//
function clear(){
  $('#lokasi,#departemen,#mengetahui').val('');
  $('#tanggal').datepicker('setDate', null);
  $('#id_karyawan').val('').change();
  tabelbarang.clear().draw();
  var counter=1;
}


$("#tambahdata").on('click',function(){
  $('#keterangan').val('');
  $('#barang').val('').change();
  $("#modaledit").modal('show');
});  


$("#bsimpan").on('click',function(){
  if ($('#barang').val()==''||$('#keterangan').val()=='0'){
    swal("Lengkapi Inputan Data","", "info");
  }else{
    //validasi data sudah ada
    var text = $('#barang').select2('data').text;
    var results = $("#example2").find('td:contains("'+text+'")');
    if (results.length){
      swal("Item Sudah Diplih","", "info");
    }else{
      //masukkan data
      tabelbarang.row.add([
          counter,
          $('#barang').val(),
          $('#barang').select2('data').text,
          $('#keterangan').val(),
          "<button type='button' class='btn btn-sm btn-danger hapus' value='"+counter+"'> <i class='fa fa-trash'></i></button>"
      ]).draw(false);
      //hitung total qty dan total harga
      counter++;
      //
      $("#modaledit").modal('hide'); 
    }
  }       
});


$("#example2").on('click','.hapus',function(){
  //hapus
  tabelbarang.row( $(this).parents('tr') ).remove().draw();  

});

$("#simpanpembelian").on('click',function(){

  if ($('#lokasi').val()==''||$('#tanggal').val()==''||$('#id_karyawan').val()==''||$('#mengetahui').val()==''||
    $('#departemen').val()==''||tabelbarang.rows().data().toArray().length==0){
    swal("Lengkapi Inputan Data","", "info");
  }else{
    var detail = tabelbarang.rows().data().toArray();
    var data = $('#formperawatan').serializeArray();
    $.ajax({
      type: 'POST',
      url: "simpan.php",
      data: {simpan:"perawatan",data,detail:detail},
      success: function() {
        swal({
          title: "Data Berhasil Disimpan",
          text: "Pilih Input untuk menginput lagi, Rekap untuk Kembali ke Rekap",
          icon: "success",
          buttons: {
            cancel: "Input",
            catch: {
              text: "Rekap",
              value: true,
              closeModal: false
            },
          },
          dangerMode: false,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location.replace("index_admin.php?open=rekapperawatan");
          }else{
            clear();
          } 
        }); //endswall  
      }//endsuccess
    });
  }
});

$("#hapus").on('click',function(){
    clear();
});

$("#batal").on('click',function(){
    window.location.replace("index_admin.php?open=rekapperawatan");
});

</script>

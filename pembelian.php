<div class="modal modal-primary fade" id="modaledit">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">TAMBAH PEMBELIAN BARANG</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" id="formbarang">          
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
              <label  class="control-label">QTY</label>   
            </div>   
            <div class="col-md-2">
              <input style="width: 100%;" type="text" class="form-control" name="qty" id="qty">  
            </div>
            <div class="col-md-1">
              <label  class="control-label">Satuan</label>   
            </div>   
            <div class="col-md-3">
              <input style="width: 100%;" type="text" class="form-control" name="satuan" id="satuan">  
            </div>
            <div class="col-md-1">
              <label  class="control-label">Harga</label>   
            </div>   
            <div class="col-md-3">
              <input style="width: 100%;" type="text" class="form-control" name="harga" id="harga">  
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
      <h3 class="box-title">PEMBELIAN</h3>   
    </div>
    <div class="box-body">
      <div>
        <form class="form-horizontal" role="form" id="formpembelian"> 
        <div class="form-group">
            <label  class="control-label  col-md-1">Nota</label>  
            <div class="col-md-3">
              <input  type="text" class="form-control" name="nota" id="nota" >
            </div>
            <label  class="control-label  col-md-1">Tanggal</label>  
            <div class="col-md-2">
              <input  type="text" class="form-control datepicker" name="tanggal" id="tanggal" >
            </div>
            <label  class="control-label  col-md-1">Suplier</label>  
            <div class="col-md-4">
              <input  type="text" class="form-control" name="suplier" id="suplier" >
            </div>
        </div>
        <div class="form-group">
            <label  class="control-label  col-md-1">QTY</label>  
            <div class="col-md-3">
              <input  type="text" class="form-control" name="qty_pembelian" id="qty_pembelian" readonly>
            </div>
            <label  class="control-label  col-md-1">Total</label>  
            <div class="col-md-3">
              <input  type="text" class="form-control" name="total_harga" id="total_harga" readonly>
            </div>
            <div class="col-md-1">
              <button class="btn btn-info" id="simpanpembelian" type="button">Selesai</button>
            </div>
            <div class="col-md-1">
              <button class="btn btn-warning" id="hapus" type="button">Hapus</button>
            </div>
            <div class="col-md-1">
              <button class="btn btn-danger" id="batal" type="button">Batal</button>
            </div>
        </div>
        </form>
      </div>
    </div> 
</div>

<div class="box box-solid box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">DETAIL PEMBELIAN</h3>   
        <button class="btn btn-success pull-right" id="tambahdata" type="button">Tambah Data</button>
    </div>
    <div class="box-body">
        <table id="example2" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Id Barang</th> 
            <th class="text-center">Nama Barang</th>
            <th class="text-center col-sm-1">QTY</th> 
            <th class="text-center">Satuan</th>
            <th class="text-center">Harga</th>
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
  $('#qty_pembelian,#total_harga').number( true,0);
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

function tampilsuplier(){
  $.getJSON("tampil.php?data=selectsuplier", function(data) {
    $('#suplier').select2({
      data: data.suplier,
      placeholder: 'Pilih Suplier',
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

tampilsuplier();

//variabel 
var counter=1;
var qty=0;
var total_harga=0;
//
function clear(){
  $('#nota,#qty_pembelian,#total_harga').val('');
  $('#qty_pembelian,#total_harga').number( true,0);
  $('#tanggal').datepicker('setDate', null);
  $('#suplier').val('').change();
  tabelbarang.clear().draw();
  var counter=1;
  var qty=0;
  var total_harga=0;
}


$("#tambahdata").on('click',function(){
  $('#satuan,#qty,#harga').val('');
  $('#qty,#harga').number( true,0);
  $('#barang').val('').change();
  $("#modaledit").modal('show');
});  

// $("#barang").on('change',function(){
//     $.getJSON("tampil.php?data=editbarang&id="+$(this).val(), function(data) {
//     $('#harga').val(data.harga);
//   });
// }); 


$("#bsimpan").on('click',function(){
  if ($('#barang').val()==''||$('#qty').val()==''||$('#qty').val()=='0'||$('#satuan').val()==''||
      $('#harga').val()==''||$('#harga').val()=='0'){
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
          $('#qty').val(),
          $('#satuan').val(),
          $('#harga').val(),
          "<button type='button' class='btn btn-sm btn-danger hapus' value='"+counter+"'> <i class='fa fa-trash'></i></button>"
      ]).draw(false);
      //hitung total qty dan total harga
      counter++;
      qty=qty+parseFloat($('#qty').val());
      $('#qty_pembelian').val(qty);
      total_harga=total_harga+(parseFloat($('#harga').val())*parseFloat($('#qty').val()));
      $('#total_harga').val(total_harga);
      //
      $("#modaledit").modal('hide'); 
    }
  }       
});


$("#example2").on('click','.hapus',function(){
  //hitung
  var row=tabelbarang.row( $(this).parents('tr') ).index();
  var qty_old =tabelbarang.rows( { selected: true } ).data()[row][3];
  var harga_old =tabelbarang.rows( { selected: true } ).data()[row][5];

  qty=qty-qty_old;
  $('#qty_pembelian').val(qty);
  total_harga=total_harga-(harga_old*qty_old);
  $('#total_harga').val(total_harga);
  //hapus
  tabelbarang.row( $(this).parents('tr') ).remove().draw();  

});

$("#simpanpembelian").on('click',function(){

  if ($('#nota').val()==''||$('#tanggal').val()==''||$('#suplier').val()==''||tabelbarang.rows().data().toArray().length==0){
    swal("Lengkapi Inputan Data","", "info");
  }else{
    var detail = tabelbarang.rows().data().toArray();
    var data = $('#formpembelian').serializeArray();
    $.ajax({
      type: 'POST',
      url: "simpan.php",
      data: {simpan:"pembelian",data,detail:detail},
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
            window.location.replace("index_admin.php?open=rekappembelian");
          }else{
            clear();
          } 
        }); //endswall  
      }//endsucces
    });
  }
});

$("#hapus").on('click',function(){
    clear();
});

$("#batal").on('click',function(){
    window.location.replace("index_admin.php?open=rekappembelian");
});

</script>

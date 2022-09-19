<div class="modal fade" id="modalpeminjaman">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">INPUT PEMINJAMAN</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" id="formpeminjaman">          
          <div class="form-group">   
            <div class="col-md-2">
              <label  class="control-label">Tanggal</label>      
            </div>
            <div class="col-md-4"> 
              <input style="width: 100%;" type="text" class="form-control datepicker" name="tanggal" id="tanggal">    
              <input type="hidden" name="id" id="id">            
            </div>
          </div>
          <div class="form-group">   
            <div class="col-md-2">
              <label  class="control-label">Penyerah</label>      
            </div>
            <div class="col-md-4"> 
              <input style="width: 100%;" type="text" class="form-control" name="penyerah" id="penyerah">              
            </div>
            <div class="col-md-2">
              <label  class="control-label">Peminjam</label>      
            </div>
            <div class="col-md-4"> 
              <input style="width: 100%;" type="text" class="form-control" name="peminjam" id="peminjam">               
            </div>
          </div>

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
              <label  class="control-label">Stok</label>      
            </div>
            <div class="col-md-4">
               <input style="width: 100%;" type="text" class="form-control" name="jumlah_barang" id="jumlah_barang" readonly>  
            </div>
            <div class="col-md-2">
              <label  class="control-label">Jumlah Pinjam</label>      
            </div>
            <div class="col-md-4">  
              <input style="width: 100%;" type="text" class="form-control" id="jumlah" name="jumlah">
              <input type="hidden" id="jumlah_lama" name="jumlah_lama">   
            </div>   
          </div>
          <div class="form-group">
            <div class="col-md-2">
              <label  class="control-label">Keterangan</label>      
            </div>
            <div class="col-md-10"> 
              <input style="width: 100%;" type="text" class="form-control" id="ket" name="ket">                
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
        <input type="hidden" id="simpan" name="simpan" value="peminjaman" />
        <button type="button" id="bsimpan" class="btn btn-info" >Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal modal-primary fade" id="modalkembali">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">INPUT PENGEMBALIAN</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" id="formpengembalian">          
          <div class="form-group">
            <div class="col-md-3">
              <label  class="control-label">Tanggal Kembali</label>
              <input type="hidden"  name="id_pengembalian" id="id_pengembalian"> 
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control datepicker" name="tanggal_kembali" id="tanggal_kembali">     
            </div>
          </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
        <input type="hidden" id="simpan" name="simpan" value="pengembalian" />
        <button type="button" id="simpanpengembalian" class="btn btn-info" >Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="box box-solid box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">DATA PEMINJAMAN</h3>   
        <button class="btn btn-info pull-right" id="tambah" type="button">Tambah Data</button>
    </div>
    <div class="box-body">
      <div>
        <form class="form-horizontal" role="form"> 
        <div class="form-group">
            <div class="col-md-2">
              <select class="form-control" name="pilih" id="pilih">
                <option value="1">Bulan</option>
                <option value="2">Tahun</option>
              </select>  
            </div>  
            <div class="col-md-2">
              <input type="text" class="form-control monthpicker" name="bulan" id="bulan"> 
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
            <th class="text-center" style="min-width:100px">Aksi</th> 
            <th class="text-center">Status</th>
            <th class="text-center">Tanggal</th> 
            <th class="text-center">Barang</th> 
            <th class="text-center">Jumlah</th>
            <th class="text-center">Penyerah</th> 
            <th class="text-center">Peminjam</th> 
            <th class="text-center" style="min-width:150px">Ket</th>
            <th class="text-center">Tanggal Kembali</th>
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
            <td></td>
            <td></td>
          </tr> 
          </tbody>
        </table>
    </div> 
</div>     


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
<script src="style/plugins/select2-3.5.4/select2.min.js"></script>
<script src="style/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="style//plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="style/jquery.number.min.js"></script>
<script src="style/sweetalert.min.js"></script>
<script>
tampilbarang();
tampilkaryawan();
tampilteknisi();

$(function () {
  $('.datepicker').datepicker({
    autoclose: true,
    format :"yyyy-mm-dd"
  });
  $(".monthpicker").datepicker( {
    format: "yyyy-mm",
    startView: "months", 
    minViewMode: "months",
    startDate : "2015-01", 
    endDate : (new Date).getMonth().toString(), 
    autoclose: true
  });
});

$("#pilih").on('change',function(){
  if ($(this).val()=='1'){
    $(".monthpicker").datepicker('remove');
    $(".monthpicker").datepicker( {
      format: "yyyy-mm",
      startView: "months", 
      minViewMode: "months", 
      autoclose: true
    });
    $('#bulan').datepicker('setDate', null);
  }else{
    $(".monthpicker").datepicker('remove');
    $(".monthpicker").datepicker( {
      format: "yyyy",
      startView: "years", 
      minViewMode: "years", 
      autoclose: true
    });
    $('#bulan').datepicker('setDate', null);
  }  
});

$("#filter").on('click',function(){
  tampil();
});

$("#cetak").on('click',function(){
  if ($('#bulan').val()==''){
    alert('Pilih Bulan');
  }else{
    var bulan=$('#bulan').val();
    window.open("lappeminjaman.php?bulan="+bulan);
  }
});

function tampil(){
  var nomor=0;
  var bulan=$('#bulan').val();
  $('#example2').dataTable( {
      "ajax": "tampil.php?data=peminjaman&bulan="+bulan,
      "destroy": true,
      "columns": [
          { "data": "aksi" },
          { "data": "aksi" },
          { "data": "aksi" },
          { "data": "tanggal" },
          { "data": "nama_barang" },
          { "data": "jumlah" },
          { "data": "penyerah" },
          { "data": "peminjam" },
          { "data": "ket" },
          { "data": "tanggal_kembali" }
        ],
      "aoColumnDefs": [ {
        "aTargets": [ 0 ],
        "mRender": function (data, type, full) {
            nomor=nomor+1;
            return nomor;
          }
        },
        {
        "aTargets": [ 1 ],
        "mRender": function (data, type, full) {
            var formmatedvalue = "";
            if (full.status=='0'){
              formmatedvalue = formmatedvalue+"<button type='button' class='btn btn-xs btn-success edit' value='"+full.id+"'>";
              formmatedvalue = formmatedvalue+" Edit</button>";
            }
              formmatedvalue = formmatedvalue+" <button type='button' class='btn btn-xs btn-danger hapus' value='"+full.id+"'>";
              formmatedvalue = formmatedvalue+" Hapus</button>";
            return formmatedvalue;
          }
        },
        {
        "aTargets": [ 2 ],
        "mRender": function (data, type, full) {
            if (full.status=='0'){
               var formmatedvalue = "<button type='button'  class='btn btn-xs btn-info kembali'  value='"+full.id+"'> Pinjam</i></button>";
            }else if (full.status=='1'){
               var formmatedvalue = "<span class='btn btn-xs btn-success'>Sudah Kembali</span>";
            }           
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

function tampilkaryawan(){
  $.getJSON("tampil.php?data=selectkaryawan", function(data) {
    $('#peminjam').select2({
      data: data.karyawan,
      placeholder: 'Pilih Karyawan',
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

function tampilteknisi(){
  $.getJSON("tampil.php?data=selectteknisi", function(data) {
    $('#penyerah').select2({
      data: data.karyawan,
      placeholder: 'Pilih Teknisi',
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

$("#tambah").on('click',function(){
    $('#barang').val('').change();
    $('#peminjam').val('');
    $('#penyerah').val('').change();
    $('#id,#ket').val('');
    $('#tanggal').datepicker('setDate', null);
    $('#jumlah_barang,#jumlah').val('');
    $('#jumlah_barang,#jumlah').number( true,0);
    $('#jumlah_lama').val('0');
    $('#simpan').val('peminjaman');
    $("#modalpeminjaman").modal('show');   
});   

$("#barang").on('change',function(){
  $.getJSON("tampil.php?data=editbarang&id="+$(this).val(), function(data) {
    $('#jumlah_barang').val(data.stok);
  }); 
});

$("#bsimpan").on('click',function(){  
  if($('#tanggal').val()==''||$('#barang').val()==''||
      $('#peminjam').val()==''||$('#penyerah').val()==''||$('#ket').val()==''||
      $('#jumlah').val()==''||$('#jumlah').val()=='0'){
    swal("Lengkapi Inputan Data","", "info");
  }
  else{
    jumlah=parseFloat($('#jumlah').val());
    stok=parseFloat($('#jumlah_barang').val());
    //validasi stok
    if (jumlah>stok){
      swal("Jumlah Pinjam melebihi Stok tersedia","", "info");
    }
    else
    {
      var data = $('#formpeminjaman').serialize();
      $("#modalpeminjaman").modal('hide');
      $.ajax({
        type: 'POST',
        url: "simpan.php",
        data: data,
        success: function() {
          swal("Sukses", "Data Berhasil Disimpan", "success");
          tampil();
        }
      });
    }//endif
  } //endif 
});


//edit
$("#example2").on('click','.edit',function(){
    $.getJSON("tampil.php?data=editpeminjaman&id="+$(this).val(), function(data) {
    $('#id').val(data.id);
    $('#tanggal').val(data.tanggal);
    $('#barang').val(data.id_barang).change();
    $('#peminjam').val(data.peminjam);
    $('#penyerah').val(data.penyerah).change();
    $('#jumlah').val(data.jumlah);
    $('#jumlah_lama').val(data.jumlah);
    $('#ket').val(data.ket);
    $('#jumlah').number( true,0);
    $("#modalpeminjaman").modal('show');
  });
});

//pengembalian

$("#example2").on('click','.kembali',function(){
    $('#id_pengembalian').val($(this).val());
    $('#tanggal_kembali').val('');
    $('#simpan').val('pengembalian');
    $("#modalkembali").modal('show');
});

$("#simpanpengembalian").on('click',function(){
    var data = $('#formpengembalian').serialize();
    $("#modalkembali").modal('hide');
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

//hapus
$("#example2").on('click','.hapus',function(){
    var id = $(this).val();
    swal({
      title: "Apakah Anda Yakin?",
      text: "Once deleted, you will not be able to recover this file",
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
      return $.post("hapus.php?hapus=peminjaman&id="+id, function(data) {
        swal("Sukses", "Data Berhasil Dihapus", "success");
        tampil();
      });
    } 
    });  
});

</script>

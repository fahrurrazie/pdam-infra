<div class="modal fade" id="modalpermintaan">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">INPUT PERMINTAAN</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" id="formpermintaan">          
          <div class="form-group">   
            <div class="col-md-2">
              <label  class="control-label">Karyawan</label>      
            </div>
            <div class="col-md-4"> 
              <input style="width: 100%;" type="text" class="form-control" name="karyawan" id="karyawan">     
              <input type="hidden" name="id" id="id">            
            </div>
            <div class="col-md-2">
              <label  class="control-label">Departemen</label>      
            </div>
            <div class="col-md-4"> 
              <input style="width: 100%;" type="text" class="form-control" name="departemen" id="departemen">               
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
              <label  class="control-label">Jumlah Pinta</label>      
            </div>
            <div class="col-md-2">
               <input style="width: 100%;" type="text" class="form-control" name="jumlah" id="jumlah">  
            </div>
            <div class="col-md-1">
              <label  class="control-label">Stok</label>      
            </div>
            <div class="col-md-2"> 
              <input style="width: 100%;" type="text" class="form-control" name="stok" id="stok" readonly>  
            </div> 
            <div class="col-md-2">
              <label  class="control-label">Satuan</label>      
            </div>
            <div class="col-md-3">  
              <input style="width: 100%;" type="text" class="form-control" id="satuan" name="satuan">  
            </div>   
          </div>
          <div class="form-group">   
            <div class="col-md-2">
              <label  class="control-label">Tanggal</label>      
            </div>
            <div class="col-md-4"> 
              <input style="width: 100%;" type="text" class="form-control datepicker" name="tanggal" id="tanggal">                
            </div>
            <div class="col-md-2">
              <label  class="control-label">Ket</label>      
            </div>
            <div class="col-md-4"> 
              <input style="width: 100%;" type="text" class="form-control" name="ket" id="ket">               
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
        <input type="hidden" id="simpan" name="simpan" value="permintaan" />
        <button type="button" id="bsimpan" class="btn btn-info" >Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal modal-primary fade" id="modalverifikasi">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">INPUT VERIFIKASI</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" id="formverifikasi">          
          <div class="form-group">
            <div class="col-md-3">
              <label  class="control-label">Verifikasi</label>
              <input type="hidden"  name="id_permintaan" id="id_permintaan"> 
            </div>
            <div class="col-md-9">
              <select name="status_verifikasi" id="status_verifikasi" class="form-control">
                <option value="2">Diterima</option>
                <option value="3">Ditolak</option>
              </select>      
            </div>
          </div>
          <div id="divjumlah">
            <div class="form-group">
              <div class="col-md-3">
                <label  class="control-label">Stok</label>
              </div>
              <div class="col-md-9">
                <input style="width: 100%;" type="text" class="form-control" name="stok_v" id="stok_v" readonly>      
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-3">
                <label  class="control-label">Jumlah Pinta</label>
              </div>
              <div class="col-md-9">
                <input style="width: 100%;" type="text" class="form-control" name="jumlah_pinta" id="jumlah_pinta" readonly>      
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-3">
                <label  class="control-label">Jumlah Disetujui</label>
              </div>
              <div class="col-md-9">
                <input style="width: 100%;" type="text" class="form-control" name="jumlah_setujui" id="jumlah_setujui">      
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-3">
              <label  class="control-label">Tanggal Verifikasi</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control datepicker" name="tanggal_status" id="tanggal_status">     
            </div>
          </div> 
          <div class="form-group">
            <div class="col-md-3">
              <label  class="control-label">KETERANGAN</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="ket" id="ket">     
            </div>
          </div> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
        <input type="hidden" id="simpan" name="simpan" value="verifikasi" />
        <button type="button" id="simpanverifikasi" class="btn btn-info" >Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="box box-solid box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">DATA PERMINTAAN</h3>   
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
            <th class="text-center">Karyawan</th> 
            <th class="text-center">Departemen</th>
            <th class="text-center" style="min-width:150px">Barang</th>
            <th class="text-center">Jumlah</th>  
            <th class="text-center">Jumlah Disetujui</th> 
            <th class="text-center">Satuan</th>
            <th class="text-center" style="min-width:150px">Ket</th>
            <th class="text-center">Tanggal Perubahan Status</th>
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
tampildepartemen();
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


function tampil(){
  var nomor=0;
  var bulan=$('#bulan').val();
  if ($('#bulan').val()==''){bulan="-";}
  $('#example2').dataTable( {
      "ajax": "tampil.php?data=permintaan&bulan="+bulan,
      "destroy": true,
      "columns": [
          { "data": "aksi" },
          { "data": "aksi" },
          { "data": "aksi" },
          { "data": "tanggal" },
          { "data": "karyawan" },
          { "data": "departemen" },
          { "data": "nama_barang" },
          { "data": "jumlah" },
          { "data": "jumlah_setujui" },
          { "data": "satuan" },
          { "data": "ket" },
          { "data": "tanggal_status" }
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
            if (full.status=='1'){
              formmatedvalue = formmatedvalue+"<button type='button' class='btn btn-xs btn-success edit' value='"+full.id+"'>";
              formmatedvalue = formmatedvalue+" Edit</button>";
            
              formmatedvalue = formmatedvalue+" <button type='button' class='btn btn-xs btn-danger hapus' value='"+full.id+"'>";
              formmatedvalue = formmatedvalue+" Hapus</button>";
            }
            return formmatedvalue;
          }
        },
        {
        "aTargets": [ 2 ],
        "mRender": function (data, type, full) {
            if (full.status=='1'){
               var formmatedvalue = "<button type='button'  class='btn btn-xs btn-info verifikasi'  value='"+full.id+"'> Baru</i></button>";
            }else if (full.status=='2'){
               var formmatedvalue = "<button type='button'  class='btn btn-xs btn-success batalterima'  value='"+full.id+"'> Diterima</i></button>";
            }else if (full.status=='3'){
               var formmatedvalue = "<button type='button'  class='btn btn-xs btn-danger bataltolak'  value='"+full.id+"'> Ditolak</i></button>";
            }else if (full.status=='4'){
               var formmatedvalue = "<span class='btn btn-xs btn-primary'>Sudah Diserahkan</span>";
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

$('#example2').dataTable( {
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

function tampilkaryawan(){
  $.getJSON("tampil.php?data=selectkaryawan", function(data) {
    $('#karyawan').select2({
      data: data.karyawan,
      placeholder: 'Pilih karyawan',
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

function tampildepartemen(){
  $.getJSON("tampil.php?data=selectdepartemen", function(data) {
    $('#departemen').select2({
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

$("#filter").on('click',function(){
  tampil();
});

$("#cetak").on('click',function(){
  if ($('#bulan').val()==''){
    alert('Pilih Bulan');
  }else{
    var bulan=$('#bulan').val();
    window.open("lappermintaan.php?bulan="+bulan);
  }
}); 

$("#barang").on('change',function(){
  $.getJSON("tampil.php?data=editbarang&id="+$(this).val(), function(data) {
    $('#stok').val(data.stok);
  }); 
});  

$("#tambah").on('click',function(){
    $('#barang').val('').change();
    $('#karyawan').val('').change();
    $('#departemen').val('').change();
    $('#id,#ket,satuan').val('');
    $('#tanggal').datepicker('setDate', null);
    $('#stok,#jumlah').val('');
    $('#stok,#jumlah').number( true,0);
    $('#simpan').val('permintaan');
    $("#modalpermintaan").modal('show');   
});   

$("#bsimpan").on('click',function(){  
  if($('#tanggal').val()==''||$('#barang').val()==''||$('#karyawan').val()==''||
      $('#departemen').val()==''||$('#ket').val()==''||
      $('#jumlah').val()==''||$('#jumlah').val()=='0'){
    swal("Lengkapi Inputan Data","", "info");
  }else{
    jumlah=parseFloat($('#jumlah').val());
    stok=parseFloat($('#stok').val());
    //validasi stok
    if (jumlah>stok){
      swal("Jumlah Setujui melebihi Stok tersedia","", "info");
    }
    else
    {
      var data = $('#formpermintaan').serialize();
      $("#modalpermintaan").modal('hide');
      $.ajax({
        type: 'POST',
        url: "simpan.php",
        data: data,
        success: function() {
          swal("Sukses", "Data Berhasil Disimpan", "success");
          tampil();
        }
      });
    }//endif kedua
  } //endif pertama 
});


//edit
$("#example2").on('click','.edit',function(){
  $.getJSON("tampil.php?data=editpermintaan&id="+$(this).val(), function(data) {
    $('#id').val(data.id);
    $('#tanggal').val(data.tanggal);
    $('#barang').val(data.id_barang).change();
    $('#karyawan').val(data.id_karyawan).change();
    $('#departemen').val(data.id_departemen).change();
    $('#jumlah').val(data.jumlah);
    $('#ket').val(data.ket);
    $('#satuan').val(data.satuan);
    $('#jumlah,#stok').number( true,0);
    $("#modalpermintaan").modal('show');
  });
});

// verifikasi
  $('#divjumlah').show();
  $("#status_verifikasi").on('change',function(){
      if ($(this).val()=='2'){
        $('#divjumlah').show();
      }else if ($(this).val()=='3'){
        $('#divjumlah').hide();
        $('#jumlah_setujui').val('0');
      }
  });

$("#example2").on('click','.verifikasi',function(){
  $.getJSON("tampil.php?data=editpermintaan&id="+$(this).val(), function(data) {
    $('#id_permintaan').val(data.id);
    $('#status_verifikasi').val('2').change();
    $('#tanggal_status').datepicker('setDate', null);
    $('#jumlah_pinta').val(data.jumlah);
    $('#stok_v').val(data.stok);
    $('#jumlah_setujui').val('');
    $('#jumlah_pinta,#stok_v,#jumlah_setujui').number( true,0);
    $('#simpan').val('verifikasi');
    $("#modalverifikasi").modal('show');
  });    
});

$("#simpanverifikasi").on('click',function(){
  if ($('#tanggal_status').val()==''||
      (($('#jumlah_setujui').val()==''||$('#jumlah_setujui').val()=='0')&&$('#status_verifikasi').val()=='2')){
    swal("Lengkapi Inputan Data","", "info");
  }else{
    jumlah=parseFloat($('#jumlah_setujui').val());
    stok=parseFloat($('#stok_v').val());
    pinta=parseFloat($('#jumlah_pinta').val());
    //validasi stok
    if (jumlah>pinta&&$('#status_verifikasi').val()=='2'){
      swal("Jumlah Setujui melebihi Jumlah Pinta","", "info");
    }else 
    if (jumlah>stok&&$('#status_verifikasi').val()=='2'){
      swal("Jumlah Setujui melebihi stok tersedia","", "info");
    }
    else
    {
      var data = $('#formverifikasi').serialize();
      $("#modalverifikasi").modal('hide');
      $.ajax({
        type: 'POST',
        url: "simpan.php",
        data: data,
        success: function() {
          swal("Sukses", "Data Berhasil Disimpan", "success");
          tampil();
        }
      });
    }
  }
});

//batal verikasi
$("#example2").on('click','.bataltolak',function(){
    var id = $(this).val();
    swal({
      title: "Batalkan Status Verifikasi?",
      text: "Once deleted, you will not be able to recover this file",
      icon: "warning",
      buttons: {
        cancel: "Tidak",
        catch: {
          text: "Ya",
          value: true,
          closeModal: false
        },
      },
      dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {
      return $.post("hapus.php?hapus=batalverifikasi&id="+id, function(data) {
        swal("Sukses", "Verifikasi Berhasil Dibatalkan", "success");
        tampil();
      });
    } 
    });  
});

//batal verikasi
$("#example2").on('click','.batalterima',function(){
    var id = $(this).val();
    swal({
      title: "Batalkan Status Verifikasi?",
      text: "Once deleted, you will not be able to recover this file",
      icon: "warning",
      buttons: {
        cancel: "Tidak",
        catch: {
          text: "Ya",
          value: true,
          closeModal: false
        },
      },
      dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {
      return $.post("hapus.php?hapus=batalverifikasi&id="+id, function(data) {
        swal("Sukses", "Verifikasi Berhasil Dibatalkan", "success");
        tampil();
      });
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
      return $.post("hapus.php?hapus=permintaan&id="+id, function(data) {
        swal("Sukses", "Data Berhasil Dihapus", "success");
        tampil();
      });
    } 
    });  
});

</script>

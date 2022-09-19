<div class="modal modal-primary fade" id="modalpenyerahan">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">INPUT PENYERAHAN</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" id="formpenyerahan">   
          <div class="form-group">
            <div class="col-md-3">
              <label  class="control-label">Tanggal Penyerahan</label>
              <input type="hidden"  name="id" id="id"> 
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control datepicker" name="tanggal_penyerahan" id="tanggal_penyerahan">     
            </div>
          </div>         
          <div class="form-group">
            <div class="col-md-3">
              <label  class="control-label">Keterangan</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="ket_penyerahan" id="ket_penyerahan">      
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-3">
              <label  class="control-label">Penyerah</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="penyerah" id="penyerah">      
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-3">
              <label  class="control-label">Penerima</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="penerima" id="penerima">      
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
        <input type="hidden" id="simpan" name="simpan" value="penyerahan" />
        <button type="button" id="bsimpan" class="btn btn-info" >Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="box box-solid box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">DATA PENYERAHAN</h3>   
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
            <th class="text-center">Status</th>
            <th class="text-center">Tanggal</th> 
            <th class="text-center">Karyawan</th> 
            <th class="text-center">Departemen</th>
            <th class="text-center" style="min-width:150px">Barang</th>
            <th class="text-center">Jumlah</th>  
            <th class="text-center">Satuan</th>
            <th class="text-center" style="min-width:150px">Ket</th>
            <th class="text-center">Tanggal Penyerahan</th>
            <th class="text-center">Penyerah</th>
            <th class="text-center">Penerima</th>
            <th class="text-center" style="min-width:150px">Ket Penyerahan</th>
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

tampilkaryawan();
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

$('#example2').dataTable( {
    "lengthChange": false,
    "scrollY": 500,
    "scrollX": true,
    "scrollCollapse": true,
    "autoWidth": true,
    "ordering" : false,
    "info" : false
});

function tampil(){
  var nomor=0;
  var bulan=$('#bulan').val();
  if ($('#bulan').val()==''){bulan="-";}
  $('#example2').dataTable( {
      "ajax": "tampil.php?data=penyerahan&bulan="+bulan,
      "destroy": true,
      "columns": [
          { "data": "aksi" },
          { "data": "aksi" },
          { "data": "tanggal" },
          { "data": "karyawan" },
          { "data": "departemen" },
          { "data": "nama_barang" },
          { "data": "jumlah_setujui" },
          { "data": "satuan" },
          { "data": "ket" },
          { "data": "tanggal_penyerahan" },
          { "data": "nama_penyerah" },
          { "data": "nama_penerima" },
          { "data": "ket_penyerahan" }
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
            if (full.status=='2'){
               var formmatedvalue = "<button type='button'  class='btn btn-xs btn-success penyerahan'  value='"+full.id+"'> Diterima</i></button>";
            }else if (full.status=='4'){
               var formmatedvalue = "<button type='button'  class='btn btn-xs btn-primary'  value='"+full.id+"'> Sudah Diserahkan</i></button>";
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

function tampilkaryawan(){
  $.getJSON("tampil.php?data=selectkaryawan", function(data) {
    $('#penerima').select2({
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
tampilteknisi();

$("#filter").on('click',function(){
  tampil();
});

$("#cetak").on('click',function(){
  if ($('#bulan').val()==''){
    alert('Pilih Bulan');
  }else{
    var bulan=$('#bulan').val();
    window.open("lappenyerahan.php?bulan="+bulan);
  }
});
   
$("#example2").on('click','.penyerahan',function(){
    $('#id').val($(this).val());
    $('#tanggal_penyerahan').datepicker('setDate', null);
    $('#ket_penyerahan').val('');
    $('#penyerah').val('').change();
    $('#penerima').val('').change();
    $("#modalpenyerahan").modal('show');  
});

$("#bsimpan").on('click',function(){  
  if($('#tanggal_penyerahan').val()==''||$('#penyerah').val()==''||$('#penerima').val()==''||
      $('#jumlah').val()==''||$('#jumlah').val()=='0'){
    swal("Lengkapi Inputan Data","", "info");
  }
  else 
  if($('#penyerah').val()==$('#penerima').val()){
    swal("Penyerah dan Penerima Tidak Boleh Sama","", "info");
  }
  else{
    var data = $('#formpenyerahan').serialize();
    $("#modalpenyerahan").modal('hide');
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
});


//batal penyerahan
// $("#example2").on('click','.batalpenyerahan',function(){
//     var id = $(this).val();
//     swal({
//       title: "Batalkan Penyerahan?",
//       text: "Once deleted, you will not be able to recover this file",
//       icon: "warning",
//       buttons: {
//         cancel: "Tidak",
//         catch: {
//           text: "Ya",
//           value: true,
//           closeModal: false
//         },
//       },
//       dangerMode: true,
//     })
//     .then((willDelete) => {
//     if (willDelete) {
//       return $.post("hapus.php?hapus=batalpenyerahan&id="+id, function(data) {
//         swal("Sukses", "Penyerahan Berhasil Dibatalkan", "success");
//         tampil();
//       });
//     } 
//     });  
// });


</script>

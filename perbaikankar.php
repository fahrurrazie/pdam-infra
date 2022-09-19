<div class="modal modal-primary fade" id="modalproses">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">INPUT PROSES ADUAN</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" id="formprosesperbaikan">          

          <div class="form-group">
            <div class="col-md-2">
              <label  class="control-label">Teknisi</label>
            </div>
            <div class="col-md-10">
              <input style="width: 100%;" type="text" class="form-control" name="teknisi" id="teknisi">      
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2">
              <label  class="control-label">Analisa</label> 
            </div>
            <div class="col-md-10">
              <input style="width: 100%;" type="text" class="form-control" name="analisa" id="analisa">
              <input type="hidden"  name="id" id="id">     
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2">
              <label  class="control-label">Tindakan</label> 
            </div>
            <div class="col-md-10">
              <input style="width: 100%;" type="text" class="form-control" name="tindakan" id="tindakan">     
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2">
              <label  class="control-label">Tanggal Proses</label> 
            </div>
            <div class="col-md-10">
              <input style="width: 100%;" type="text" class="form-control datepicker" name="tanggal_proses" id="tanggal_proses">     
            </div>
          </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
        <input type="hidden" id="simpan" name="simpan" value="prosesperbaikan" />
        <button type="button" id="simpanproses" class="btn btn-info" >Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal modal-primary fade" id="modalselesai">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">INPUT SELESAI PERBAIKAN</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" id="formselesaiperbaikan">          
          <div class="form-group">
            <div class="col-md-2">
              <label  class="control-label">Tanggal Selesai</label>
              <input type="hidden"  name="id_perbaikan" id="id_perbaikan"> 
            </div>
            <div class="col-md-10">
              <input style="width: 100%;" type="text" class="form-control datepicker" name="tanggal_selesai" id="tanggal_selesai">     
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2">
              <label  class="control-label">Keterangan</label> 
            </div>
            <div class="col-md-10">
              <input style="width: 100%;" type="text" class="form-control" name="ket_selesai" id="ket_selesai">     
            </div>
          </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
        <input type="hidden" id="simpan" name="simpan" value="selesaiperbaikan" />
        <button type="button" id="simpanselesai" class="btn btn-info" >Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="box box-solid box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">DATA PROSES ADUAN</h3>   
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

        </div>
        </form>
      </div>
        <table id="example2" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th class="text-center">No</th>            
            <th class="text-center">Status</th> 
            <th class="text-center">Tanggal</th>
            <th class="text-center">Barang</th> 
            <th class="text-center">Jumlah</th>
            <th class="text-center" style="min-width:150px">Aduan</th>
            <th class="text-center">Teknisi</th>
            <th class="text-center">Analisa</th>
            <th class="text-center">Tindakan</th>
            <th class="text-center">Tanggal Proses</th>
            <th class="text-center">Tanggal Selesai</th>
            <th class="text-center">keterangan</th>
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
<script src="style/plugins/select2-3.5.4/select2.min.js"></script>
<script src="style/sweetalert.min.js"></script>
<script src="style/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<script>
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



tampilTeknisi();

function tampilTeknisi(){
  $.getJSON("tampil.php?data=selectteknisi", function(data) {
    $('#teknisi').select2({
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


$("#simpanproses").on('click',function(){
    var data = $('#formprosesperbaikan').serialize();
    $("#modalproses").modal('hide');
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

$("#simpanselesai").on('click',function(){
    var data = $('#formselesaiperbaikan').serialize();
    $("#modalselesai").modal('hide');
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
  var bulan=$('#bulan').val();
  $('#example2').dataTable( {
      "ajax": "tampil.php?data=perbaikan&bulan="+bulan,
      "destroy": true,
      "columns": [
          { "data": "aksi" },          
          { "data": "status" },
          { "data": "tanggal" },
          { "data": "barang" },
          { "data": "vol" },
          { "data": "aduan" },
          { "data": "nama_teknisi" },
          { "data": "analisa" },
          { "data": "tindakan" },
          { "data": "tanggal_proses" },
          { "data": "tanggal_selesai" },
          { "data": "ket_selesai" },
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
            if (full.status=='Baru'){
              var status = "<button type='button'  class='btn btn-xs btn-warning proses'  value='"+full.id+"'> Baru</i></button>";
            }
            else if (full.status=='Proses'){
              var status = "<button type='button' class='btn btn-xs btn-success selesai' value='"+full.id+"'> Proses</i></button>";
            }
            else if (full.status=='Selesai'){
              var status = "<button type='button'  class='btn btn-xs btn-info'> Selesai</i></button>";
            } 
            
            return status;
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
$("#example2").on('click','.proses',function(){
    $('#id').val($(this).val());
    $('#analisa').val('');
    $('#tindakan').val('');
    $('#tanggal').val('');
    $('#teknisi').val('').change();
    $('#simpan').val('prosesperbaikan');
    $("#modalproses").modal('show');
});

$("#example2").on('click','.selesai',function(){
    $('#id_perbaikan').val($(this).val());
    $('#tanggal_selesai').val('');
    $('#ket_selesai').val('');
    $('#simpan').val('selesaiperbaikan');
    $("#modalselesai").modal('show');
});


</script>

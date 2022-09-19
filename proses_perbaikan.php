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
<div class="box box-solid box-primary">
   <div class="box-header with-border">
    <div class="form-group">
      <div class="col-md-10">
        <h3 class="box-title">DATA KARYAWAN</h3> 
      </div> 

    </div>
  </div>
  <div class="box-body">
      <table id="example2" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Status</th> 
          <th class="text-center">Tanggal</th>
          <th class="text-center">Barang</th> 
          <th class="text-center">Jumlah</th>
          <th class="text-center">Aduan</th>
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


function tampil(){
  var nomor=0;
  var bulan=$('#bulan').val();
  $('#example2').dataTable( {
      "ajax": "tampil.php?data=proses_perbaikan",
      "destroy": true,
      "columns": [
          { "data": "aksi" },          
          { "data": "status" },
          { "data": "tanggal" },
          { "data": "barang" },
          { "data": "vol" },
          { "data": "aduan" },

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

      $("#example2").on('click','.proses',function(){
    $('#id').val($(this).val());
    $('#analisa').val('');
    $('#tindakan').val('');
    $('#tanggal').val('');
    $('#teknisi').val('').change();
    $('#simpan').val('prosesperbaikan');
    $("#modalproses").modal('show');
});

</script>

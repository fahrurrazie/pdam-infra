
<div class="box box-solid box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">REKAP PEMELIHARAAN</h3>   
        <a class="btn btn-info pull-right" href='index_teknisi.php?open=perawatantek'>Tambah Data</a>
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
            <th class="text-center">Tanggal</th>
            <th class="text-center">Departemen</th> 
            <th class="text-center">Ruangan</th> 
            <th class="text-center">Teknisi</th>
            <th class="text-center">Mengetahui</th>
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
<script src="style/sweetalert.min.js"></script>
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
      "ajax": "tampil.php?data=rekapperawatan&bulan="+bulan,
      "destroy": true,
      "columns": [
          { "data": "aksi" },
          { "data": "aksi" },
          { "data": "tanggal" },
          { "data": "departemen" },
          { "data": "lokasi" },
          { "data": "teknisi" },
          { "data": "mengetahui" }
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
            var formmatedvalue = " <button type='button' class='btn btn-xs btn-danger hapus' value='"+full.id+"'>";
            formmatedvalue = formmatedvalue+" Hapus</button>";

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


$("#filter").on('click',function(){
  tampil();
});

$("#cetak").on('click',function(){
  if ($('#bulan').val()==''){
    alert('Pilih Bulan');
  }else{
    var bulan=$('#bulan').val();
    window.open("laprekapperawatan.php?bulan="+bulan);
  }
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
      return $.post("hapus.php?hapus=perawatan&id="+id, function(data) {
        swal("Sukses", "Data Berhasil Dihapus", "success");
        tampil();
      });
    } 
    });  
});

</script>

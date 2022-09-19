<div class="modal modal-primary fade" id="modaladuan">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">INPUT ADUAN</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" id="formaduan">          
          <div class="form-group">
            <div class="col-md-2">
              <label  class="control-label">Tanggal</label> 
            </div>
            <div class="col-md-10">
              <input style="width: 100%;" type="text" class="form-control datepicker" name="tanggal" id="tanggal">     
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
              <label  class="control-label">Jumlah</label>   
            </div>   
            <div class="col-md-4">
              <input style="width: 100%;" type="text" class="form-control" name="vol" id="vol">  
            </div>
          </div>

          <div class="form-group">   
            <div class="col-md-2">
              <label  class="control-label">Aduan</label>              
            </div>
            <div class="col-md-10">
              <input style="width: 100%;" type="text" class="form-control" name="aduan" id="aduan"> 
              <input type="hidden" name="id" id="id">               
            </div>
          </div>
 
          <div class="form-group">
            <div class="col-md-2">
              <label  class="control-label">Departemen</label> 
            </div>
            <div class="col-md-10">
              <input style="width: 100%;" type="text" class="form-control" name="departemen" id="departemen">     
            </div>
          </div>

          <div class="form-group">   
            <div class="col-md-2">
              <label  class="control-label">Ruangan</label>              
            </div>
            <div class="col-md-10">
              <input style="width: 100%;" type="text" class="form-control" name="ruangan" id="ruangan">              
            </div>
          </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
        <input type="hidden" id="simpan" name="simpan" value="aduan" />
        <button type="button" id="bsimpan" class="btn btn-info" >Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="box box-solid box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">DATA ADUAN</h3>   
        <button class="btn btn-success pull-right" id="tambahaduan" type="button">PENGADUAN KERUSAKAN</button>
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
            <th class="text-center">Tanggal</th>
            <th class="text-center">Barang</th> 
            <th class="text-center">Jumlah</th>
            <th class="text-center">Aduan</th>
            <th class="text-center">Departemen</th>
            <th class="text-center">Ruangan</th>
            <th class="text-center">Status</th>
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



$("#tambahaduan").on('click',function(){
  $('#id,#vol,#aduan,#tanggal,#ruangan').val('');
  $('#barang').val('').change();
$('#departemen').val('').change();  
$("#modaladuan").modal('show');
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

tampildepartemen();



$("#bsimpan").on('click',function(){
    var data = $('#formaduan').serialize();
    $("#modaladuan").modal('hide');
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
      "ajax": "tampil.php?data=aduan&bulan="+bulan,
      "destroy": true,
      "columns": [
          { "data": "aksi" },
          { "data": "tanggal" },
          { "data": "barang" },
          { "data": "vol" },
          { "data": "aduan" },
          { "data": "departemen" },
          { "data": "ruangan" },
          { "data": "status" },
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
            var status ='';
            if (full.status=='Baru'){
              status = "<span  class='btn btn-xs btn-warning'> Baru</i></span>";
            }
            else if (full.status=='Proses'){
              status = "<span  class='btn btn-xs btn-success'> Proses</i></span>";
            }
            else if (full.status=='Selesai'){
              status = "<span  class='btn btn-xs btn-info'> Selesai</i></span>";
            } 
            
            return status;
          }
        },
        {
        "aTargets": [ 8 ],
        "mRender": function (data, type, full) {
            var formmatedvalue='';
            if (full.status=='Baru'){
                formmatedvalue = formmatedvalue+"<button type='button'  class='btn btn-sm btn-success edit' ";
                formmatedvalue = formmatedvalue+" value='"+full.id+"'> <i class='fa fa-pencil'></i></button>";
                formmatedvalue = formmatedvalue+" <button type='button' class='btn btn-sm btn-danger hapus' value='"+full.id+"'>";
                formmatedvalue = formmatedvalue+" <i class='fa fa-trash'></i></button>";
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

//edit
$("#example2").on('click','.edit',function(){
    $.getJSON("tampil.php?data=editaduan&id="+$(this).val(), function(data) {
    $('#id').val(data.id);
    $('#aduan').val(data.aduan);
    $('#departemen').val(data.departemen);
    $('#tanggal').val(data.tanggal);
    $('#barang').val(data.id_barang).change();
    $('#vol').val(data.vol);
    $("#modaladuan").modal('show');
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
      return $.post("hapus.php?hapus=aduan&id="+id, function(data) {
        swal("Sukses", "Data Berhasil Dihapus", "success");
        tampil();
      });
    } 
    });  
});

</script>

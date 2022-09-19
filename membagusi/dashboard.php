<br><br><br><br><br>

<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">

            <div class="col-md-12">
  <div class="card bg-secondary">
    <div class="card-heading bg-dark" style="font-size: 24px; ">
    <b><center>Waktu</center></b>
  </div>
  <div class="card-body">
  
  <link type="text/css" rel="stylesheet" href="style.css" /><h1><b><center>
  <div id="clockDisplay" class="clockStyle">
  </div>

  <script type="text/javascript" language="javascript">
  function renderTime(){
   var currentTime = new Date();
   var h = currentTime.getHours();
   var m = currentTime.getMinutes();
   var s = currentTime.getSeconds();
   if (h == 0){
    h = 24;
     }
     if (h < 10){
      h = "0" + h;
      }
      if (m < 10){
      m = "0" + m;
      }
      if (s < 10){
      s = "0" + s;
      }
   var myClock = document.getElementById('clockDisplay');
   myClock.textContent = h + " : " + m + " : " + s + "";    
   setTimeout ('renderTime()',1000);
   }
   renderTime();
  </script>

  </div>
  </div>
  </div>
  
  <div class="col-md-12">
    <div class="card bg-secondary">
    <div class="card-heading bg-dark" style="font-size: 24px; ">
    <b><center>Hari / Tanggal</center></b>
  </div>
  <div class="card-body">
  <h1><center><b>
  <script type='text/javascript'>
  var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
  var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
  var date = new Date();
  var day = date.getDate();
  var month = date.getMonth();
  var thisDay = date.getDay(),
      thisDay = myDays[thisDay];
  var yy = date.getYear();
  var year = (yy < 1000) ? yy + 1900 : yy;
  document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
  </script>
</div>
</div>

  </div>
  <!-- /.row (main row) -->
            
          </div>
        </div>
      </div>
    </section>
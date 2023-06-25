<?php $this->session->flashdata('pesan'); ?>
<div class="row m-4 d-flex justify-content-between">
   <div class="col-lg-3 col-6">
      <div class="small-box mt-3 mb-3 mr-2 ml-2  bg-info">
         <div class="inner">
            <h3><?= $critical_stock ?></h3>
            <p>STOCK TG 01</p>
         </div>
         <div class="icon">
            <i class="fas fa-box"></i>
         </div>
         <a href="<?= base_url('critical_stock/index') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
   </div>
   <div class="col-lg-3 col-6">
      <div class="small-box mt-3 mb-3 mr-2 ml-2  bg-primary">
         <div class="inner">
            <h3><?= $monitoring_stock ?></h3>
            <p>Stock 9999</p>
         </div>
         <div class="icon">
            <i class="fas fa-computer"></i>
         </div>
         <a href="<?= base_url('users/index') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
   </div>
   <div class="col-lg-3 col-6">
      <div class="small-box mt-3 mb-3 mr-2 ml-2  bg-red">
         <div class="inner">
            <h3><?= $users ?></h3>
            <p>user</p>
         </div>
         <div class="icon">
            <i class="fas fa-user"></i>
         </div>
         <a href="<?= base_url('users/index') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
   </div>
</div>
<div class="row m-4 mt-5 d-flex justify-content-between">
   <div class="col w-50 m-1 shadow rounded border">
      <canvas id="chartBar"></canvas>
   </div>
   <div class="col w-25 m-1 shadow rounded border">
      <canvas id="chartPie"></canvas>
   </div>
</div>
<div class="row m-4 mt-5">
   <div class="col d-block shadow rounded border h-1">
      <canvas id="chartLine"></canvas>
   </div>
</div>
<script type="text/javascript">
   var canvasCtxChartBar = document.getElementById('chartBar').getContext('2d');
   var canvasCtxChartLine = document.getElementById('chartLine').getContext('2d');
   var canvasCtxChartPie = document.getElementById('chartPie').getContext('2d');
   var chartBar = new Chart(canvasCtxChartBar, {
      type: 'bar',
      data: {
         labels: [
            <?php
            if (count($graph) > 0) {
               foreach ($graph as $data) {
                  echo "'" . $data->nama_area . "',";
               }
            }

            ?>
         ],
         datasets: [{
            label: 'Critical Stock',
            backgroundColor: '#FF0000',
            borderColor: '#708090',
            data: [
               <?php
               if (count($graph) > 0) {
                  foreach ($graph as $data) {
                     echo $data->total_value . ", ";
                  }
               }

               ?>
            ]
         }]
      },
   });
   var chartPie = new Chart(canvasCtxChartPie, {
      type: 'pie',
      data: {
         labels: [
            <?php
               if (count($graph) > 0) {
                  foreach ($graph as $data) {
                     echo "'" . $data->nama_area . "',";
                  }
               }
            ?>
         ],
         datasets: [{
            label: 'Critical Stock',
            backgroundColor: '#FF0000',
            borderColor: '#708090',
            data: [
               <?php
                  if (count($graph) > 0) {
                     foreach ($graph as $data) {
                        echo $data->total_value . ", ";
                     }
                  }
               ?>
            ]
         }]
      },
   });
   var chartLine = new Chart(canvasCtxChartLine, {
      type: 'line',
      data: {
         labels: [
            <?php
               if (count($graph) > 0) {
                  foreach ($graph as $data) {
                     echo "'" . $data->nama_area . "',";
                  }
               }
            ?>
         ],
         datasets: [{
            label: 'Critical Stock',
            backgroundColor: '#FF0000',
            borderColor: '#708090',
            data: [
               <?php
                  if (count($graph) > 0) {
                     foreach ($graph as $data) {
                        echo $data->total_value . ", ";
                     }
                  }
               ?>
            ]
         }]
      },
   });
</script>
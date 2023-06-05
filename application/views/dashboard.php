
 <!DOCTYPE html>
 <html>
      <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <?=$this->session->flashdata('pesan');?>
            <title>Halaman Dashboard</title>
            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
      </head>
            <body>
            <h3 style="font-weight:bold"><i class="nav-icon fas fa-tachometer-alt"></i> Halaman Dashboard</h3>
            <hr>
                <div class="container">
                        <div class="row">
                                <div class="col-lg-3 col-6">
                                    <div class="small-box bg-info">
                                                    <div class="inner">
                                                            <h3><?=$critical_stock?></h3>
                                                                <p>STOCK TG 01</p>
                                                    </div>
                                                            <div class="icon">
                                                                <i class="fas fa-box"></i>
                                                            </div>
                                                                <a href="<?=base_url('critical_stock/index')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>

                                        <div class="col-lg-3 col-6">
                                                <div class="small-box bg-primary">
                                                    <div class="inner">
                                                            <h3><?=$monitoring_stock?></h3>
                                                            <p>Stock 9999</p>
                                                    </div>
                                                            <div class="icon">
                                                                <i class="fas fa-computer"></i>
                                                             </div>
                                                                <a href="<?=base_url('users/index')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                        </div>

                                        <div class="col-lg-3 col-6">
                                                <div class="small-box bg-red">
                                                    <div class="inner">
                                                            <h3><?=$users?></h3>
                                                            <p>user</p>
                                                    </div>
                                                            <div class="icon">
                                                                <i class="fas fa-user"></i>
                                                             </div>
                                                                <a href="<?=base_url('users/index')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                        </div>
                        </div>
                </div>
 </html>
 <!-- <script>
                const baseUrl="<?php echo base_url();?>"
                const myChart =(chartType)=>
               {
                      $.ajax
                      ({
                                url:baseUrl='critical_stock/chart_data',
                                dateType:'json',
                                method:'get',
                                success: data=>
                        {
                                  let chartX=[]
                                  let chartY=[]
                                  data.map(data=>{
                                    chartX.push(data.Cut_off_stock)
                                    chartX.push(data.Total_value)
                                                  })
                                  const chartData=
                                 {
                                      labels:chartX,
                                      datasets:
                                      [
                                        {
                                          label:'Total_value',
                                          data:chartY,
                                          backgroundColor:['lightcoral'],
                                          borderColor:['lightcoral'],
                                          borderWidht:4
                                        }
                                      ]
                                  }
                            const ctx= document.getElementByid(chartType).getContext('2d')
                              const config= 
                              {
                                type:chartType,
                                data:chartData,
                              }
                                  switch(chartType)
                                        {
                                          case='pie':
                                            const pieColor=['salmon','red','green','blue','aliceblue','pink','orange','gold','plum','darkcyan','wheat','silver']
                                              chartData.datasets[0].backgroundColor=pieColor
                                              chartData.datasets[0].borderColor=pieColor
                                                  break;
                                                  case'bar':
                                                            chartData.datasets[0].backgroundColor=['skyblue']
                                                            chartData.datasets[0].borderColor=['skyblue']
                                                      break;
                                                      default:
                                                config.options =
                                                {
                                                    scales : 
                                                              {
                                                                  y:{
                                                                    beginAtZero:true
                                                                  }
                                                              } 
                                                } 
                                        }
                                                const chart= new chart(ctx,config)
                          }
                      })
                }
                                                myChart('pie')
                                                myChart('line')
                                                myChart('bar')
</script> -->
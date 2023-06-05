<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
        <body>
            <?= $this->session->flashdata('pesan');?>
            <h3 style="font-weight:bold"><i class="nav-icon fas fa-box"></i> Halaman Critical Stock</h3>
            <hr>
            <form action="<?= base_url('Uploadcritical/import_excel'); ?>" method="post" id="upload" enctype="multipart/form-data">
                <div>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <label class="formFileMultiple" clas="form-label"></label>
                            <input class="form-control" style="width:300px" type="file" id="file_input" name="fileExcel">
                        </div>
                        <div>
                             <button class='btn btn-success' type="submit" value="submit">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Import
                            </button>
                            <label for="fp">Upload Pertamakali</label>
                            <input id="fp" type="checkbox" value="true" name="first_upload">
                        </div>
                    </div>
                </div>
            </form>
            <div class="card">
                    <div class="card-header">
                            <div style="overflow:auto; width:100%;">
                                    <div class="card-body">
                                            <table border="1" width="300px"id="example1" class="table table-hover" style="width:100%">
                                                    <thead class="thead-dark">
                                                            <tr>
                                                                <th>plant</th>
                                                                <th>NAMA AREA</th>
                                                                <th>STORAGE LOCATION</th>
                                                                <th>MATERIAL TYPE</th>
                                                                <th>MATERIAL GROUP</th>
                                                                <th>MATERIAL GROUP DESCRIPTION</th>
                                                                <th>PACK SIZE</th>
                                                                <th>MATERIAL</th>
                                                                <th>MATERIAL DESCRIPTION</th>
                                                                <th>BATCH</th>
                                                                <th>SLEDD/BDD</th>
                                                                <th>VALUTION TYPE</th>
                                                                <th>GR DATE</th>
                                                                <th>MKT CATEGORY3</th>
                                                                <th>TOTAL STOCK BU</th>
                                                                <th>SCHEDULE DELIVERY BU</th>
                                                                <th>AVAILABLE STOCK BU</th>
                                                                <th>BASE UNIT</th>
                                                                <th>TOTAL STOCK OU</th>
                                                                <th>SCHEDULE DELIVERY OU</th>
                                                                <th>AVAILABLE STOCK OU</th>
                                                                <th>ORDER UNIT</th>
                                                                <th>TOTAL STOCK SU</th>
                                                                <th>SCHEDULE DELIVERY SU</th>
                                                                <th>AVAILABLE SU</th>
                                                                <th>SALES UNIT</th>
                                                                <th>SELF LIFE PRODUCT</th>
                                                                <th>PERIODE SHELF LIFE </th>
                                                                <th>CUT OFF STOCK</th>
                                                                <th>STORAGE CONDITION</th>
                                                                <th>TOTAL SELF LIFE</th>
                                                                <th>MKT CATEGORY 1</th>
                                                                <th>STANDARD PRICE</th>
                                                                <th>TOTAL VALUE</th>
                                                                <th>TIME TO EXPIRED</th>
                                                                <th>SELF LIFE %</th>
                                                                <th>KET SELF LIFE</th>
                                                                <th>KATEGORI PRINCIPAL</th>
                                                                <th>STATUS INVENTORY</th>
                                                                <th>SISA SLED</th>
                                                                <th>KET MATERIAL GROUP</th>
                                                                <th>SELF LIFE MONTH</th>
                                                                <th>TANGGAL CREATE</th>
                                                            </tr>
                                                    </thead>
                                            </table>
                                    </div>
                            </div>
                    </div>
            </div>                    
            <!-- <script> -->
            <!-- $(document).ready(function () {
            $('#example1').DataTable({
                    scrollX: true,
                    info: true,
                    responsive: true,
                    paging:false,

                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                    "order": [], //Initial no order.
            
                    // Load data for the table's content from an Ajax source
                    "ajax": {
                    "url": "<?php //echo site_url('critical_stock/ajax_list')?>",
                    "type": "POST"
                    },
            
                    //Set column definition initialisation properties.
                    "columnDefs": [
                    { 
                    "targets": [ 0 ], //first column / numbering column
                    "orderable": false, //set not orderable
                    },
                    ],
            });
            }); -->
            <!-- </script>   -->
            <script>
                var doUpload = (function _doUpload(){
                    console.log('asdasd');
                    var  form = document.getElementById('upload');
                    
                    form.onsubmit = function(e){
                        e.preventDefault();

                        var selfObject = this;
                        var data = new FormData(selfObject);
                        var xhr = new XMLHttpRequest();

                        xhr.open('POST', '<?= base_url('Uploadcritical/import_excel'); ?>');
                        xhr.onerror = function(e){
                            return alert('proses error !,' + e.status);
                        }
                        xhr.onload = function(e){
                            try{
                                var parseResponse = JSON.parse(e.target.response);
                                alert(parseResponse['messages']);
                            }catch(err){
                                throw alert('Terjadi Kegagalan, Error : ' + err);
                            }
                        }
                        xhr.send(data);
                    }

                    return _doUpload;
                }());
            </script>
        </body>
</html>
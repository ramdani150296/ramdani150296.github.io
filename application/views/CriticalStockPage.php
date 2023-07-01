<?= $this->session->flashdata('pesan'); ?>
<h3 class="m-2 text-bold">
    <i class="nav-icon fas fa-box"></i>
    Halaman {title}
</h3>
<hr>
<form action="<?= base_url('CriticalStockController/doInsertData'); ?>" method="post" id="upload" enctype="multipart/form-data">
    <div class="input-group mb-3">
        <div class="custom-file">
            <label for="file_input" class="mb-0 btn btn-primary mr-3">
                <span class="fa fa-file" aria-hidden="true"></span>
                Pilih Excel File
            </label>
            <input class="form-control d-none" type="file" id="file_input" name="fileExcel">
            <button class='btn btn-success' type="submit" value="submit">
                <span class="fa fa-upload" aria-hidden="true"></span>
                Upload
            </button>
            <div class="custom-control custom-checkbox mr-sm-2 ml-3">
                <input type="checkbox" class="custom-control-input" value="true" id="fu" name="first_upload">
                <label class="custom-control-label" for="fu">Upload Pertama</label>
                <i class="fa fa-info-circle align-middle text-primary" role="button" id="infoUpload"></i>
            </div>
        </div>
    </div>
</form>
<div class="card">
    <div class="card-header">
        <div style="overflow:auto; width:100%;">
            <div class="card-body">
                <table border="1" id="criticalTable" class="table table-striped table-hover table-sm small align-middle">
                    <thead class="thead-dark text-nowrap">
                        <tr>
                            <th>No.</th>
                            <th>PLANT</th>
                            <th>NAME 1</th>
                            <th>STORAGE LOCATION</th>
                            <th>MATERIAL TYPE</th>
                            <th>MATERIAL GROUP</th>
                            <th>PACK SIZE OLD</th>
                            <th>MATERIAL</th>
                            <th>MATERIAL DESC</th>
                            <th>BATCH</th>
                            <th>SLED/BBD</th>
                            <th>VALUATION TYPE</th>
                            <th>GR DATE</th>
                            <th>MKT CATEGORY 3</th>
                            <th>TOTAL STOCK (BU)</th>
                            <th>BASE UNIT</th>
                            <th>CUT  OFF STOCK</th>
                            <th>STORAGE CONDITIONS</th>
                            <th>TOTAL SHELF LIFE</th>
                            <th>STANDARD PRICE</th>
                            <th>TOTAL VALUE</th>
                            <th>TIME TO EXPIRED</th>
                            <th>% SHELF LIFE</th>
                            <th>KET SHELF LIFE</th>
                            <th>PRINCIPAL/ NON PRINCIPAL</th>
                            <th>STATUS INVENTORY</th>
                            <th>SISA SLED/BBD</th>
                            <th>SHELF LIFE (IN MONTH)</th>
                            <th>QTY SALES</th>
                            <th>QTY PGI</th>
                            <th>QTY NKB</th>
                            <th>QTY STO</th>
                            <th>QTY DISPOSAL</th>
                            <th>QTY MIGO</th>
                            <th>REMAKS MIGO</th>
                            <th>%SALES</th>
                            <th>%PGI</th>
                            <th>%NKB</th>
                            <th>%STO</th>
                            <th>%DISPOSAL</th>
                            <th>%MIGO</th>
                            <th>%AALL</th>
                            <th>VALUE SALES</th>
                            <th>VALUE PGI</th>
                            <th>VALUE NKB</th>
                            <th>VALUE STO</th>
                            <th>VALUE DISPOSAL</th>
                            <th>VALUE MIGO</th>
                            <th>PROGRESS VALUE</th>
                            <th>VALUE AWAL</th>
                            <th>KATEGORY PROGRES</th>
                            <th>RECORD DATE</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    (function(){
    addEventListener('load', function(e){
        var doUpload = (function _doUpload() {
            console.log('asdasd');
            var form = document.getElementById('upload');

            form.onsubmit = async function(e) {
                e.preventDefault();
                
                function turnBackOnButton(){
                    Swal.close();
                    doUpload();
                }

                var selfObject = this;
                var data = new FormData(selfObject);
                var xhr = new XMLHttpRequest();

                if(await swallUploadAlert()){
                    swallLoading();
                    this.onsubmit = null;
                    xhr.open('POST', selfObject.action);
                    xhr.onerror = function(e) {
                        turnBackOnButton();
                        return swallPopUp('Upload Gagal, Periksa Jaringan Internet ' + e.target.status, 'error');
                    }
                    xhr.onload = function(e) {
                        turnBackOnButton();
                        try {
                            var parseResponse = JSON.parse(e.target.response);
                                if(parseResponse['status'] === 'Success'){
                                    form.reset();
                                    loadDataTable();
                                    return swallPopUp(parseResponse['messages'], 'success');
                                }
                                return swallPopUp(parseResponse['messages'], 'warning');
                        } catch (err) {
                            return swallPopUp(
                                'Terjadi Kesalahan Gagal Melakukan Upload File,'+
                                'Pastikan total baris excel tidak melebihi 20.000 baris ' +
                                'dan file yang di masukan hanya format XLSX', 'error'
                            );
                        }
                    }
                    xhr.send(data);
                }
            }
            return _doUpload;
        }());
        var swallUploadAlert = (function(){
            var titleUpload = "Jika Upload di setujui maka, data " + 
                                "upload yang sebelum nya akan digantikan "+
                                "dengan data baru jika Upload Pertama dicentang, lanjutkan upload ?";
            return Swal.fire({
                title: 'Konfirmasi Upload',
                text: titleUpload,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Lanjutkan Upload'
            }).then((result) => {
                return result.isConfirmed;
            });
        });
        var swallLoading = (function(){
            return Swal.fire({ 
                title : 'Memproses File Excel',
                text : 'Jangan Tutup Halaman Sampai Proses Selesai',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton : false,
                didOpen: function(){
                    Swal.showLoading();
                }
            })
        });
        var swallPopUp = (function(textVal, iconVal){
            return Swal.fire({ 
                title : iconVal,
                text : textVal,
                icon : iconVal
            })
        });
        var loadDataTable = (function _loadDataTable(){
            var dtaTbl  = $('#criticalTable');
            dtaTbl.DataTable({
                scrollX : true,
                info : false,
                responsive : true,
                paging : true,
                bDestroy : true,
                processing : true, //Feature control the processing indicator.
                serverSide : true, //Feature control DataTables' server-side processing mode.
                ajax : { // Load data for the table's content from an Ajax source
                    url : "<?php echo site_url('CriticalStockController/getAllData') ?>",
                    type : "POST"
                },
                columnDefs : [ //Set column definition initialisation properties.
                    { 
                        targets : 0,
                        className : "text-center align-middle" 
                    },
                    { 
                        targets : "_all",
                        orderable : true,
                        className : "align-middle"
                    }
                ],
                language : {
                    loadingRecords : '&nbsp;',
                    processing : '<div class="spinner-border text-primary" role="status">'+
                                    '<span class="sr-only">Loading...</span>'+
                                    '</div>'
                }
            });
            return _loadDataTable;
        }());
        var uploadInformation = (function(){
            $('#infoUpload').click(function(){
                Swal.fire({
                    icon : 'info',
                    text : 'Centang pertama upload untuk membersihkan data sebelum nya yang ada pada database,' +
                            ' Jika tidak dicentang maka data sebelum nya akan bertambah dengan data baru, jika memiliki' +
                            ' file excel yang displit menjadi beberapa bagian' + 
                            ' silahkan centang Sekali Saat File Excel Pertama Diupload' 
                });
            });
        }());
        });
    }());
</script>
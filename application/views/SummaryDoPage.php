<h3 class="m-2 text-bold">
    <i class="nav-icon fas fa-truck"></i>
    Halaman {title}
</h3>
<hr>
<form action="<?= base_url('SummaryDoController/doInsertData'); ?>" method="post" id="upload" enctype="multipart/form-data">
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
        </div>
    </div>
</form>
<div class="card">
    <div class="card-header">
        <div style="overflow:auto; width:100%;">
            <div class="card-body">
                <table border="1" id="example1" class="table table-striped table-hover table-sm small align-middle">
                    <thead class="thead-dark text-nowrap">
                        <tr>
                             <th>No</th>
                             <th>PERIODE</th>
                             <th>SEMESTER</th>
                             <th>PLANT</th>
                             <th>KETERANGAN HO/CBG </th>
                             <th>MATERIAL DESCRIPTION GROUP</th>
                             <th>NAMA CABANG</th>
                             <th>MATERIAL</th>
                             <th>CREATE DO</th>
                             <th>CREATE SUKSES</th>
                             <th>DO GAGAL</th>
                             <th>% DO GAGAL</th>
                             <th>CREATE ET</th>
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
                    xhr.open('POST', '<?= base_url('SummaryDoController/doInsertData'); ?>');
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
                                'Pastikan total baris excel tidak melebihi 50.000 baris ' +
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
            var titleUpload = "Apakah Anda Yakin!";
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
            $('#example1').DataTable({
                scrollX : true,
                info : true,
                responsive : true,
                paging : true,
                bDestroy : true,
                processing : true, //Feature control the processing indicator.
                serverSide : true, //Feature control DataTables' server-side processing mode.
                ajax : { // Load data for the table's content from an Ajax source
                    url : "<?php echo site_url('SummaryDoController/getAllData') ?>",
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
                    text : 'Apakah Anda Yakin,' +
                           ' Jika tidak dicentang maka data sebelum nya akan bertambah dengan data baru. atau centang' +
                           ' Satu kali hanya pada saat file pertama di upload, jika memiliki file excel yang displit menjadi beberapa bagian' 
                });
            });
        }());
    });
}());
</script>
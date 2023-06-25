<h3 class="m-2 text-bold">
    <i class="nav-icon fas fa-clipboard"></i>
    Halaman {title}
</h3>
<hr>
<div class="card">
    <div class="card-header">
        <div style="overflow:auto; width:100%;">
            <div class="card-body">
                <table border="1" id="example1" class="table table-striped table-hover table-sm small align-middle">
                    <thead class="thead-dark text-nowrap">
                        <tr>
                            <th>NO</th>
                            <th>FULL NAMA</th>
                            <th>EMAIL</th>
                            <th>ROLL ID</th>
                            <th>IS ACTIVE</th>
                            <th>REACTION</th>
                            <th>CREAT ET</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="updateModeModal" tabindex="-1" role="dialog" aria-labelledby="updateModeModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form class="modal-content" method="post" id="updateFormUsers" action="<?php base_url('UsersController/doActionAction'); ?>">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="fullName">Full Name</label>
            <input type="text" class="form-control fieldInput" name="fullName" id="fullName" aria-describedby="text" placeholder="Full name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control fieldInput" name="email" id="email" placeholder="jhondoe@gmail.com">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
        <button type="submit" class="btn btn-danger" id="deleteMode" name="delete" id="delete">DELETE</button>
        <button type="submit" class="btn btn-primary" id="updateMode" name="update" id="update">UPDATE</button>
      </div>
    </form>
  </div>
</div>
<script>
    (function(){
        addEventListener('load', function(e){
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
            var swallDoAction = (function(){
                var titleConfirm = "Yakin Akan Melanjutkan Proses ? ";
                return Swal.fire({
                    title: 'Konfirmasi Aksi',
                    text: titleConfirm,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Lanjutkan Proses'
                }).then((result) => {
                    return result.isConfirmed;
                });
            });
            $('#example1').DataTable({
                scrollX : true,
                info : true,
                responsive : true,
                paging : true,
                bDestroy : true,
                processing : true, //Feature control the processing indicator.
                serverSide : true, //Feature control DataTables' server-side processing mode.
                ajax : { // Load data for the table's content from an Ajax source
                    url : "<?php echo site_url('UsersController/getAllData') ?>",
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
                        className : "align-middle cursor-pointer" 
                    }
                ],
                createdRow : function( row, data, dataIndex ) {
                    $(row).attr('role', 'button');
                    var singleTrClick = (function _singleTrClick(row, data){
                        row.onclick = function(e){
                            var sendingData = (function _sendingData(formData, callback){
                                var swallLoading = (function(){
                                    return Swal.fire({ 
                                        title : 'Permintaan Sedang Diproses',
                                        text : 'Jangan Tutup Halaman Sampai Proses Selesai',
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                        showConfirmButton : false,
                                        didOpen: function(){
                                            Swal.showLoading();
                                        }
                                    })
                                }());
                                var xhr = new XMLHttpRequest();
                                xhr.open('POST', '<?= base_url('UsersController/doActionCommand'); ?>');
                                xhr.onerror = function(e) {
                                    callback();
                                    return swallPopUp('Gagal memproses, Periksa Jaringan Internet ' + e.target.status, 'error');
                                }
                                xhr.onload = function(e) {
                                    callback();
                                    try {
                                        var parseResponse = JSON.parse(e.target.response);
                                        if(parseResponse['status'] === 'Success'){
                                            loadDataTable();
                                            return swallPopUp(parseResponse['messages'], 'success');
                                        }

                                        return swallPopUp(parseResponse['messages'], 'warning');
                                    } catch (err) {
                                        return swallPopUp(
                                            'Terjadi Kesalahan Gagal Melakukan Proses ' + err, 'error'
                                        );
                                    }
                                }
                                xhr.send(formData);

                                return _sendingData;
                            });
                            var swallActionAlert = (function(){
                                var titleConfirm = "Apakah Anda yakin untuk melanjutkan proses ?";
                                return Swal.fire({
                                    title: 'Konfirmasi Aksi',
                                    text: titleConfirm,
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    cancelButtonText: 'Batal',
                                    confirmButtonText: 'Lanjutkan Proses'
                                }).then((result) => {
                                    return result.isConfirmed;
                                });
                            });
                            var modalUpdate = $('#updateModeModal');
                            var fullName = $('#fullName');
                            var email = $('#email');
                            var fromDataTag =  document.getElementById('updateFormUsers');
                            var doAction =  (function _doAction(){
                                modalUpdate.modal('hide');
                                fromDataTag.onclick = async function(e){
                                    e.preventDefault();
                                    var targetClicked = e.target;
                                    var targetId = targetClicked.id;

                                    if(targetId === 'deleteMode' || targetId === 'updateMode'){
                                        modalUpdate.modal('hide');
                                        var formData = new FormData();
                                        var fieldInput = document.getElementsByClassName('fieldInput'); 
                                        var actionCommand = (targetId === 'deleteMode') ? 'doDelete' : 'doUpdate';

                                        formData.append('command', actionCommand);
                                        formData.append('id', data[7]); 

                                        for(var i =0; i < fieldInput.length; i++){
                                            var objData = fieldInput[i];
                                            var nameField = objData.id;
                                            var valueField = objData.value;
                                            formData.append(nameField, valueField);
                                        }

                                        if(await swallActionAlert()){
                                            return sendingData(formData, function(){
                                                modalUpdate.modal('hide');
                                            });
                                        }

                                        modalUpdate.modal('show');
                                    }
                                }

                                return _doAction;
                            });

                            //asign data to input field
                            fullName.val(data[1]);
                            email.val(data[2]);
                            modalUpdate.modal('show');
                            doAction();
                        }
                        return _singleTrClick;
                    }(row, data));
                }, 
                language : {
                    loadingRecords : '&nbsp;',
                    processing : '<div class="spinner-border text-primary" role="status">'+
                                    '<span class="sr-only">Loading...</span>'+
                                '</div>'
                }
            });
        });
    }());
</script>
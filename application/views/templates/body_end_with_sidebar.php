                    <!-- container-fluid end -->
                    <!-- penutup header body  -->
                    </div> 
                </div>
            </div>
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>BDD</b> INVENTORY
                </div>
                <strong>Copyright &copy;2023 <a href="https://adminlte.io">PT.Sukandajaya Diamond Cold</a>.</strong> All rights reserved.
            </footer>
            <aside class="control-sidebar control-sidebar-primary">
            </aside>
        </div>
        <script src="<?= base_url('assets/template') ?>/dist/js/adminlte.min.js"></script>
        <script src="<?= base_url('assets/template') ?>/dist/js/demo.js"></script>
        <script>
            function logout() {
                Swal.fire({
                    icon: 'question',
                    title: 'Apakah Anda Yakin?',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel',
                    type: 'question',
                }).then((result) => {
                    if (result.value) {
                        window.location = "<?php echo base_url('LogOutController'); ?>";
                    }
                });
            }
        </script>
    </body>
</html>
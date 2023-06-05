<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
        <body>
                <?=$this->session->flashdata('pesan');?>
                <h3 style="font-weight:bold"><i class="nav-icon fas fa-user"></i>Halaman User</h3>
                <hr>
                <div class="card">
                            <div class="card-header">
                             </div>
                                <div style="overflow:auto; width:100%;">
                                    <div class="card-body">

                                    <table border="1" width="600px"id="example1" class="table" style="width:100%">
                                                        <thead  class="thead-dark">
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>NAMA</th>
                                                                    <th>EMAIL</th>
                                                                    <th>PASSWORD</th>
                                                                    <th>ROLE ID</th>
                                                                    <th>STATUS</th>
                                                                    <th>TANGGAL MASUK</th>
                                                                    <th>ACTION</th>
                                                                </tr>
                                                        </thead>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($users as $usr) : ?>
                                                                <tbody>
                                                                        <tr>
                                                                            <td><?= $no++?></td>
                                                                            <td><?= $usr->fullname?></td>
                                                                            <td><?= $usr->email?></td>
                                                                            <td><?= $usr->password?></td>
                                                                            <td><?= $usr->role_id?></td>
                                                                            <td><?= $usr->is_active?></td>
                                                                            <td><?= $usr->date_created?></td>
                                                                            <td>
                                                                                <div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></div>
                                                                                <div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>
                                                                            </td>
                                                                        </tr>
                                                                </tbody>
                                                        <?php endforeach; ?>
                                            </table>
                                         </div>
                                </div>
                </div>     
                
        </body>
</html>

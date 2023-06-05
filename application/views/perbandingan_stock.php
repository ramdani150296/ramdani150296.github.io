<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
        <body>
                <h3 style="font-weight:bold"><i class="nav-icon fas fa-clipboard"></i> Halaman Perbandingan Stock</h3>
                    <hr> 
                                        <form action="<?= base_url('Uploadperbandingan/import_excel'); ?>" method="post" id="upload" enctype="multipart/form-data">
                                                <div style="width:300px;margin-left: 10px;">
                                                        <div class="input-group mb-3">
                                                                <div class="custom-file">
                                                                        <label class="formFileMultiple" clas="form-label"></label>
                                                                        <input class="form-control" type="file" id="file_input" name="fileExcel">
                                                                </div>
                                                                        <div>
                                                                                <button class='btn btn-success' type="submit" value="submit">
                                                                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Import</button>
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
                                                                <th class="text-center" cellpadding="1" style="width:100px;">NO</th>
                                                                    <th class="text-center" cellpadding="1" style="width:200px;">PERIODE</th>
                                                                    <th class="text-center" cellpadding="1" style="width:400px;">JENIS PENYIMPANAN</th>
                                                                    <th class="text-center" cellpadding="1" style="width:300px;">PLANT</th>
                                                                    <th class="text-center" cellpadding="1" style="width:300px;">GROUP</th>
                                                                    <th class="text-center" cellpadding="1" style="width:300px;">MATERIAL</th>
                                                                    <th class="text-center" cellpadding="1" style="width:300px;">MATERIAL DESCRIPTION</th>
                                                                    <th class="text-center" cellpadding="1" style="width:300px;">PACK SIZE</th>
                                                                    <th class="text-center" cellpadding="1" style="width:300px;">VALUTION TYPE</th>
                                                                    <th class="text-center" cellpadding="1" style="width:300px;">BATCH</th>
                                                                    <th class="text-center" cellpadding="1" style="width:1000px;">SLED_BDD</th>
                                                                    <th class="text-center" cellpadding="1" style="width:100px;">UOM</th>
                                                                    <th class="text-center" cellpadding="1" style="width:100px;">SYSTEM CYCLE COUNT</th>
                                                                    <th class="text-center" cellpadding="1" style="width:100px;">SYSTEM STOCK TAKING</th>
                                                                    <th class="text-center" cellpadding="1" style="width:100px;">FISIK CYCLE COUNT</th>
                                                                    <th class="text-center" cellpadding="1" style="width:100px;">FISIK STOCK TAKING</th>
                                                                    <th class="text-center" cellpadding="1" style="width:100px;">% CC</th>
                                                                    <th class="text-center" cellpadding="1" style="width:100px;">% ST</th>
                                                                    <th class="text-center" cellpadding="1" style="width:100px;">KETERANGAN</th>
                                                                    <th class="text-center" cellpadding="1" style="width:100px;">GAP AKURAT</th>
                                                                </tr>
                                                        </thead>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($perbandingan_stock as $pbs) : ?>
                                                                <tbody>
                                                                        <tr>
                                                                                <td><?= $no++?></td>
                                                                                <td><?= $pbs->bulan?></td>
                                                                                <td><?= $pbs->jenis_penyimpanan?></td>
                                                                                <td><?= $pbs->plant?></td>
                                                                                <td><?= $pbs->material?></td>
                                                                                <td><?= $pbs->description?></td>
                                                                                <td><?= $pbs->pack_size?></td>
                                                                                <td><?= $pbs->valution_type?></td>
                                                                                <td><?= $pbs->batch?></td>
                                                                                <td><?= $pbs->sled_bdd?></td>
                                                                                <td><?= $pbs->uom?></td>
                                                                                <td><?= $pbs->system_cycle_count?></td>
                                                                                <td><?= $pbs->system_stock_taking?></td>
                                                                                <td><?= $pbs->fisik_cycle_count?></td>
                                                                                <td><?= $pbs->fisik_stock_taking?></td>
                                                                                <td><?= $pbs->akurasi_cc?></td>
                                                                                <td><?= $pbs->akurasi_st?></td>
                                                                                <td><?= $pbs->keterangan?></td>
                                                                                <td><?= $pbs->gap_akurat?></td>
                                                                        </tr>
                                                                </tbody>
                                                        <?php endforeach; ?>
                                                </table>
                                        </div>
                                </div>
                        </div>
                </div>  
        </body>
</html>
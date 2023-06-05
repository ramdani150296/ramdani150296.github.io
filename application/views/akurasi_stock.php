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
                <h3 style="font-weight:bold"><i class="nav-icon fas fa-book"></i> Halaman Akurasi Stock</h3>
                <hr>
                                <form action="<?= base_url('Uploadakurasi/import_excel'); ?>" method="post" id="upload" enctype="multipart/form-data">
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
                                                                    <th>No</th>
                                                                    <th>CUT OFF</th>
                                                                    <th>PLANT</th>
                                                                    <th>STORAGE LOCATION</th>
                                                                    <th>TYPE STORAGE</th>
                                                                    <th>MATERIAL DESCRIPTION GROUP</th>
                                                                    <th>PACK SIZE</th>
                                                                    <th>MATERIAL</th>
                                                                    <th>MATERIAL DESCRIPTION</th>
                                                                    <th>UOM</th>
                                                                    <th>BATCH</th>
                                                                    <th>SLEDD-BDD</th>
                                                                    <th>VALUTION TYPE</th>
                                                                    <th>STORAGE TYPE</th>
                                                                    <th>STORAGE BIN</th>
                                                                    <th>TOTAL STOCK</th>
                                                                    <th>UN POSTED</th>
                                                                    <th>ON HAND REV</th>
                                                                    <th>GOD</th>
                                                                    <th>BAD</th>
                                                                    <th>DIFF QTY</th>
                                                                    <th>BIN ACCURACY</th>
                                                                    <th>STANDAR PRICE</th>
                                                                    <th>ONHAND VALUE</th>
                                                                    <th>PHYSIC VALUE</th>
                                                                    <th>DIFF VALUE</th>
                                                                    <th>ED FISIK</th>
                                                                    <th>KETERANGAN</th>
                                                                    <th>VALUE GOD</th>
                                                                    <th>VALUE BAD</th>
                                                                    <th>AKURASI</th>
                                                                    <th>TYPE ACTION</th>
                                                                    <th>KODE</th>
                                                                    <th>BULAN</th>
                                                                    <th>TOTAL FISIK</th>
                                                                </tr>
                                                        </thead>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($akurasi_stock as $ask) : ?>
                                                                <tbody>
                                                                        <tr>
                                                                            <td><?= $no++?></td>
                                                                            <td><?= $ask-> cut_off?></td>
                                                                            <td><?= $ask-> plant?></td>
                                                                            <td><?= $ask->sloc?></td>
                                                                            <td><?= $ask->type?></td>
                                                                            <td><?= $ask->group?></td>
                                                                            <td><?= $ask->pack_size?></td>
                                                                            <td><?= $ask->material?></td>
                                                                            <td><?= $ask->description?></td>
                                                                            <td><?= $ask->uom?></td>
                                                                            <td><?= $ask->batch?></td>
                                                                            <td><?= $ask->sled_bdd?></td>
                                                                            <td><?= $ask->valution_type?></td>
                                                                            <td><?= $ask->storage_type?></td>
                                                                            <td><?= $ask->storage_bin?></td>
                                                                            <td><?= $ask->total_stock?></td>
                                                                            <td><?= $ask->unposted?></td>
                                                                            <td><?= $ask->stock_onhand?></td>
                                                                            <td><?= $ask->stock_good?></td>
                                                                            <td><?= $ask->stock_bad?></td>
                                                                            <td><?= $ask->diff_qty?></td>
                                                                            <td><?= $ask->bin_accurasi?></td>
                                                                            <td><?= $ask->std_price?></td>
                                                                            <td><?= $ask->onhand_val?></td>
                                                                            <td><?= $ask->physic_val?></td>
                                                                            <td><?= $ask->dif_val?></td>
                                                                            <td><?= $ask->ed_fisik?></td>
                                                                            <td><?= $ask->keterangan?></td>
                                                                            <td><?= $ask->val_god?></td>
                                                                            <td><?= $ask->val_bad?></td>
                                                                            <td><?= $ask->akurasi?></td>
                                                                            <td><?= $ask->type_action?></td>
                                                                            <td><?= $ask->kode?></td>
                                                                            <td><?= $ask->bulan?></td>
                                                                            <td><?= $ask->total_fisik?></td>
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
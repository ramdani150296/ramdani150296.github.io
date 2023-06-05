<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
        <body>
        <h3 style="font-weight:bold"><i class="nav-icon fas fa-box"></i> Halaman Monitoring Stock</h3>
               <hr> 
                                <form action="<?= base_url('Uploadstock/import_excel'); ?>" method="post" id="upload" enctype="multipart/form-data">
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
                                            <table border="1" width="600px"id="example1" class="table table-hover" style="height: auto">
                                                        <thead class="thead-dark">
                                                                <tr align='center'>
                                                                    <th class="text-center" cellpadding="1" style="width:100px;">NO</th>
                                                                    <th class="text-center" cellpadding="1" style="width:200px;">PERIODE</th>
                                                                    <th class="text-center" cellpadding="1" style="width:400px;">KODE PLANT</th>
                                                                    <th class="text-center" cellpadding="1" style="width:300px;">NAMA AREA</th>
                                                                    <th class="text-center" cellpadding="1" style="width:300px;">STORAGE LOCATION</th>
                                                                    <th class="text-center" cellpadding="1" style="width:300px;">MATERIAL TYPE</th>
                                                                    <th class="text-center" cellpadding="1" style="width:300px;">MATERIAL GROUP</th>
                                                                    <th class="text-center" cellpadding="1" style="width:300px;">MATERIAL GROUP DESCRIPTION</th>
                                                                    <th class="text-center" cellpadding="1" style="width:300px;">PACK SIZE OLD</th>
                                                                    <th class="text-center" cellpadding="1" style="width:300px;">MATERIAL</th>
                                                                    <th class="text-center" cellpadding="1" style="width:1000px;">MATERIAL DESCRIPTION</th>
                                                                    <th class="text-center" cellpadding="1" style="width:100px;">BATCH</th>
                                                                    <th class="text-center" cellpadding="1" style="width:100px;">SLED/BDD</th>
                                                                    <th class="text-center" cellpadding="1" style="width:100px;">VALUTION TYPE</th>
                                                                    <th class="text-center" cellpadding="1" style="width:100px;">GR DATE</th>
                                                                    <th class="text-center" cellpadding="1" style="width:100px;">MKT CATEGORY 3</th>
                                                                    <th class="text-center" cellpadding="1" style="width:100px;">TOTAL STOCK BU</th>
                                                                    <th class="text-center" cellpadding="1" style="width:100px;">SCHEDULE DELIVERY BU</th>
                                                                    <th class="text-center" cellpadding="1" style="width:100px;">AVAILABLE STOCK BU</th>
                                                                    <th class="text-center" cellpadding="1" style="width:100px;">BASE UNIT</th>
                                                                    <th class="text-center" cellpadding="1" style="width:100px;">COST</th>
                                                                    <th class="text-center" cellpadding="1" style="width:100px;">TOTAL VALUE COST</th>
                                                                    <th class="text-center" cellpadding="1" style="width:100px;">KETERANGAN ED</th>
                                                                    <th class="text-center" cellpadding="1" style="width:100px;">KATEGORI PRINCIPAL</th>
                                                                    <th class="text-center" cellpadding="1" style="width:100px;">CUT OFF STOCK</th>
                                                                </tr>
                                                        </thead>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($monitoring_stock as $mtss) : ?>
                                                                <tbody>
                                                                        <tr>
                                                                        <td><?= $no++?></td>
                                                                        <td><?= $mtss->periode?></td>
                                                                        <td><?= $mtss->kode_plant?></td>
                                                                        <td><?= $mtss->nama_plant?></td>
                                                                        <td><?= $mtss->store_location?></td>
                                                                        <td><?= $mtss->material_type?></td>
                                                                        <td><?= $mtss->material_group?></td>
                                                                        <td><?= $mtss->material_group_description?></td>
                                                                        <td><?= $mtss->pack_size_old?></td>
                                                                        <td><?= $mtss->material?></td>
                                                                        <td><?= $mtss->material_description?></td>
                                                                        <td><?= $mtss->batch?></td>
                                                                        <td><?= $mtss->sledd_bdd?></td>
                                                                        <td><?= $mtss->valution_type?></td>
                                                                        <td><?= $mtss->gr_date?></td>
                                                                        <td><?= $mtss->mkt_category3?></td>
                                                                        <td><?= $mtss->total_stock?></td>
                                                                        <td><?= $mtss->schedule_delivery?></td>
                                                                        <td><?= $mtss->available_stock?></td>
                                                                        <td><?= $mtss->base_unit?></td>
                                                                        <td><?= $mtss->total_cost?></td>
                                                                        <td><?= $mtss->total_value?></td>
                                                                        <td><?= $mtss->keterangan_ed?></td>
                                                                        <td><?= $mtss->kategori_principal?></td>
                                                                        <td><?= $mtss->cut_off_stock?></td>
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
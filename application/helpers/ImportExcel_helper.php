<?php

   function doImportExcel(object $model, object $db){
      if(!isset($_FILES['fileExcel']['tmp_name']) || $_FILES['fileExcel']['tmp_name'] == ""){
         return "Data File XLSX belum dimasukan";
      }else{
         $temporaryFile = $_FILES["fileExcel"]["tmp_name"];
         $readerExcelFile = new PhpOffice\PhpSpreadsheet\Reader\Xlsx();
         $readerExcelFile->setReadDataOnly(true);
      
         if(!$readerExcelFile->canRead($temporaryFile)){
            return 'Hanya Dapat Menerima File XLSX';
         }else{
            $maxUploadedRow = 20000;  //change 20000 for increase or decrease rows size what you want
            $loadActiveSheet = $readerExcelFile->load($temporaryFile)->getActiveSheet();
            $totalRows =  $loadActiveSheet->getHighestRow();
            $endOfColumnSheet = $loadActiveSheet->getHighestColumn();
            $totalColumns = PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($endOfColumnSheet);
            $columnsName = "(";
            $columnsValues = ""; 

            if($totalRows > $maxUploadedRow){
               return 'Untuk Saat ini Proses hanya dapat di lakukan '.
                     'dengan data mecapai '.$maxUploadedRow.' baris, '.
                     'silahkan split file per '.$maxUploadedRow;
            }else{
               $order = "";
               for($i = 1; $i <= $totalColumns; $i++){
                  $comma = commaSeparator($i, $totalColumns, 1);
                  $scope = ($i == $totalColumns) ? ")" : null;
                  $columnsName .= '`'.joinHeader($loadActiveSheet->getCellByColumnAndRow($i, 1)->getValue()).'`'.$comma.$scope;
               }

               for($j = 2; $j <= $totalRows;  $j++){
                  $comma2 = commaSeparator($j, $totalRows, 1);
                  $parentheses = "(";

                  for($k= 1; $k <= $totalColumns; $k++){
                     $comma3 = commaSeparator($k, $totalColumns, 1);
                     $column = $loadActiveSheet->getCellByColumnAndRow($k, $j);
                     $columnValue = $column->getValue();
                     
                     switch(joinHeader($loadActiveSheet->getCellByColumnAndRow($k, 1)->getValue())){
                        case 'shipment_date' :
                        case 'delivery_date' :
                        case 'bulan' :
                        case 'sled_bbd' :
                        case 'gr_date' :
                        case 'ed_pisik' :
                        case 'cut_off' :
                           $parentheses .= (preg_match('/^[0-9]*$/', $columnValue)) ? "'".date('Y-m-d', PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($columnValue))."'" : "'".$columnValue."'";
                        break;

                        case 'shelf_life' :
                           $parentheses .= (is_numeric($columnValue)) ? "'".($columnValue*100)."%'" : "'".$columnValue."'";
                        break;

                        default :
                           $parentheses .= "'".htmlspecialchars($columnValue, ENT_QUOTES, 'UTF-8')."'";
                     }

                     $parentheses .= $comma3;
                  }

                  $columnsValues .= $parentheses.")".$comma2."\r\n";
               }

               if (isset($_POST['first_upload']) && $_POST['first_upload'] === 'true'){
                  $executeQueryClear = $db->query("truncate ".$model->getTable().";");
                  if(!$executeQueryClear){
                     return $db->intl_get_error_message();
                  }
               }

               $query = "INSERT INTO ".$model->getTable()."".$columnsName." VALUES ".$columnsValues.";";
               $executeQuery = $db->query($query);
               if(!$executeQuery){
                  return $db->intl_get_error_message();
               }
            }
         }
         return null;
      }
   }

   function joinHeader($headerValue){
      preg_match_all('/[a-zA-Z0-9]+/', $headerValue, $headerResults, PREG_OFFSET_CAPTURE);
      $header = $headerResults[0];
      $headerLength = count($header);
      $headerText = "";

      for($i = 0; $i < $headerLength; $i++){
         $underScore = ($i < ($headerLength-1) && $headerLength > 1) ? '_' : null;
         $headerText .= strtolower($header[$i][0]).$underScore;
      }
      return $headerText;
   }
   
   function commaSeparator($iterator, $totalLengthValue, $startIterator){
      return ($iterator >= $startIterator && $iterator < $totalLengthValue) ? (($totalLengthValue === $startIterator) ? null : ", ") : null;
   }

   function resultsDataToJson(object $model){
      $list = $model->getAllData();
      $listLength = count($list);
      $data = [];

      for($i=0; $i < $listLength; $i++){
         $data[] = array_values($list[$i]);
      }

      $output = [
      "draw" => $_POST['draw'],
      "recordsTotal" => $model->countAllData(),
      "recordsFiltered" => $model->countFilteredData(),
      "data" => $data,
      ];

      return print_r(json_encode($output));
   }

   function dateChecker($value){
      return PhpOffice\PhpSpreadsheet\Shared\Date::isDateTime($value);
   }

?>
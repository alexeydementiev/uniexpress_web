
 <?php

/*
{ "warehouseId": 61588, "partnerWarehouseId": "2e265c53-bc4f-48a7-a034-097f0f94f875", "skus": [ "41163", "41371", "LEGO75975", "41121", "INSTAPOD-01", "PIKO57156", "DS-50-02", "41368", "DS-50-01", "DC-V10-MTH", "DS-50-04" ] }
*/

$warehouseId =  $_POST["warehouseId"];
 
$data = ' {
  "warehouseId":'.$warehouseId.',
  "skus":
   [
    {
      "sku": "A200.190",
      "warehouseId": '.$warehouseId.',
      "items":
      [
        {
          "type": "FIT",
          "count": 15,
          "updatedAt": "2019-09-09T13:01:18+03:00"
        }
      ]
    },
    {
      "sku": "A287.14",
      "warehouseId": '.$warehouseId.',
      "items":
      [
        {
          "type": "FIT",
          "count": 7,
          "updatedAt": "2019-09-09T12:44:08+03:00"
        }
      ]
    }
  ]
} ';

print_r($data);

?>
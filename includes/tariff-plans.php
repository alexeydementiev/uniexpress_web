<?php
   $q2="select * from _reference300 WHERE _code='531'";
   $r2 = pg_query($connection, $q2);
   $f2 = pg_fetch_array($r2);
   $tarif_msk = str_replace('.00', '', $f2['_fld308']);
?>


<div class='tariffs'>

<div class='tarifs-table' id='tarifs_tbl_msk'>
  <div class='tarifs-table-top'>
     <div class='tarifs-table-header'><span class='tariff-plan'>Тарифный план</span><br /><span class='tariff-plan-name'>&laquo;Москва&raquo;</span></div>
  </div>
    <div class='tarifs-table-main'>
    <div class='tarifs-table-items'><span class='tariff-desc'>Тариф на доставку по городу</span><br /><span class='tariff-plan-price'>от <?php echo $tarif_msk; ?> руб. </span></div>
    <div class='tarifs-table-items'><span class='tariff-desc'>Услуга Самовывоз</span><br /><span class='tariff-plan-price'>от 70 руб. </span></div>
    <div class='tarifs-table-items'><span class='tariff-desc'>Комиссия за прием денежных средств</span><br /><span class='tariff-plan-price'>1%</span></div>
    <div class='tarifs-table-items'><span class='tariff-desc'>"Забор заказов" (от 10 заказов)</span><br /><span class='tariff-plan-price'>БЕСПЛАТНО</span></div>
    <a href='tariff-msk.html'><div id='tariff_details_button' class='tariff-details-button' title='Прайс-лист на курьерские услуги в Москве'>ПОДРОБНЕЕ</div></a>
   </div>
</div>

<div class='tarifs-table' id='tarifs_tbl_spb'>
  <div class='tarifs-table-top'>
     <div class='tarifs-table-header'><span class='tariff-plan'>Тарифный план</span><br /><span class='tariff-plan-name'>&laquo;Санкт-Петербург&raquo;</span></div>
  </div>
    <div class='tarifs-table-main'>
    <div class='tarifs-table-items'><span class='tariff-desc'>Тариф на доставку по городу</span><br /><span class='tariff-plan-price'>от <?php echo $tarif_msk; ?> руб. </span></div>
    <div class='tarifs-table-items'><span class='tariff-desc'>Услуга Самовывоз</span><br /><span class='tariff-plan-price'>от 70 руб. </span></div>
    <div class='tarifs-table-items'><span class='tariff-desc'>Комиссия за прием денежных средств</span><br /><span class='tariff-plan-price'>1%</span></div>
    <div class='tarifs-table-items'><span class='tariff-desc'>Отправка заказа из Москвы</span><br /><span class='tariff-plan-price'>+ 100 руб.</span></div>
    <a href='tariff-spb.html'><div id='tariff_details_button' class='tariff-details-button' title='Прайс-лист на курьерские услуги в Москве'>ПОДРОБНЕЕ</div></a>
   </div>
</div>

<div class='tarifs-table' id='tarifs_tbl_storage'>
  <div class='tarifs-table-top'>
     <div class='tarifs-table-header'><span class='tariff-plan'>Тарифный план</span><br /><span class='tariff-plan-name'>&laquo;Фулфилмент&raquo;</span></div>
  </div>
    <div class='tarifs-table-main'>
    <div class='tarifs-table-items'><span class='tariff-desc'>Тариф за хранение (до 0,1 м<sup>3</sup>)</span><br /><span class='tariff-plan-price'>БЕСПЛАТНО</span></div>
    <div class='tarifs-table-items'><span class='tariff-desc'>Тариф за хранение (ячейка 0,25 м<sup>3</sup>) </span><br /><span class='tariff-plan-price'>250 руб./месяц </span></div>
    <div class='tarifs-table-items'><span class='tariff-desc'>Комплектация заказа (до 3х ед. товара)</span><br /><span class='tariff-plan-price'>от 10 руб.</span></div>
    <div class='tarifs-table-items'><span class='tariff-desc'>Приемка товара</span><br /><span class='tariff-plan-price'>БЕСПЛАТНО</span></div>
    <a href='tariff-storage.html'><div id='tariff_details_button' class='tariff-details-button' title='Прайс-лист на курьерские услуги в Москве'>ПОДРОБНЕЕ</div></a>
   </div>
</div>


<div class='tarifs-table' id='tarifs_tbl_marketplace'>
  <div class='tarifs-table-top'>
     <div class='tarifs-table-header'><span class='tariff-plan'>Тарифный план</span><br /><span class='tariff-plan-name'>&laquo;Доставка на маркетплейсы&raquo;</span></div>
  </div>
    <div class='tarifs-table-main'>
    <div class='tarifs-table-items'><span class='tariff-desc'>Доставка ОЗОН Хоругвино</span><br /><span class='tariff-plan-price'>1250 руб.</span></div>
    <div class='tarifs-table-items'><span class='tariff-desc'>Доставка WILDBERRIES Коледино (г.Подольск)</span><br /><span class='tariff-plan-price'>1250 руб. </span></div>
    <div class='tarifs-table-items'><span class='tariff-desc'>Доставка в Яндекс.Маркет Томилино</span><br /><span class='tariff-plan-price'>1450 руб.</span></div>
    <div class='tarifs-table-items'><span class='tariff-desc'>Доставка ОЗОН Тверь</span><br /><span class='tariff-plan-price'>2850 руб.</span></div>
    <a href='tariff-marketplaces.html'><div id='tariff_details_button' class='tariff-details-button' title='Прайс-лист на курьерские услуги в Москве'>ПОДРОБНЕЕ</div></a>
   </div>
</div>


</div>

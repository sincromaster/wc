<?php

class ModelSubstoresComissoes extends Model {
  
  public function getCommisoes($store_id){
    
    
    $where = " WHERE sscr.store_id = $store_id";
    
    $strSQL = 'SELECT sscr.order_id, p.price, sscr.sales_comission, sscr.sales_created, pd.name FROM ' . DB_PREFIX . 'store_sales_comission_request AS sscr
               INNER JOIN ' . DB_PREFIX . 'product AS p ON p.product_id = sscr.product_id
               INNER JOIN ' . DB_PREFIX . 'product_description AS pd ON pd.product_id = sscr.product_id
              '. $where . ' ORDER BY sscr.sales_created DESC ';
    $objResult = $this->db->query($strSQL);
    return $objResult->rows;
    
  }

}

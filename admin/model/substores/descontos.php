<?php

class ModelSubstoresDescontos extends Model {
    
    public function getSubstoreProductsDiscounts($store_id) {
        
        $strSQL = 'SELECT * FROM ' . DB_PREFIX . 'store_products_discount WHERE store_id = ' . $store_id;
        $objResult = $this->db->query($strSQL);
        
        return $objResult->rows;
    }
}
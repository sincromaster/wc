<?php

class ModelSubstoresDescontos extends Model {
    
    public function getSubstoreProductsDiscounts($store_id) {
        
        $strSQL = 'SELECT spd.*, sc.sales_commission FROM ' . DB_PREFIX . 'store_products_discount spd LEFT JOIN ' . DB_PREFIX . 'store_sales_commission sc ON sc.product_id = spd.product_id WHERE spd.store_id = ' . $store_id;
        $objResult = $this->db->query($strSQL);
        
        return $objResult->rows;
    }
    public function getSubstoreCouponsDiscounts($store_id) {
        
        $strSQL = 'SELECT * FROM ' . DB_PREFIX . 'store_coupons WHERE store_id = ' . $store_id;
        $objResult = $this->db->query($strSQL);
        
        return current($objResult->rows);
    }
}
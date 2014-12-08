<?php

class ModelSubstoresDescontos extends Model {

    public function getSubstoreProductsDiscounts($store_id) {

        $strSQL = 'SELECT spd.*, sc.sales_comission FROM ' . DB_PREFIX . 'store_products_discount spd LEFT JOIN ' . DB_PREFIX . 'store_sales_comission sc ON sc.product_id = spd.product_id WHERE spd.store_id = ' . $store_id;
        $objResult = $this->db->query($strSQL);

        return $objResult->rows;
    }

    public function getSubstoreCategoryProduct($product_id) {

        return $this->db->query('SELECT * FROM ' . DB_PREFIX . 'product_to_category WHERE product_id = ' . $product_id)->row['category_id'];
    }

    public function getSubstoreProduct($store_id, $category_id, $arrProduct) {

        // Retorna os descontos
        $strSQLDiscounts = 'SELECT * FROM ' . DB_PREFIX . 'store_products_discount WHERE store_id = ' . $store_id . ' AND category_id = ' . $category_id . ' ORDER BY product_id DESC';

        $queryResultDiscounts = $this->db->query($strSQLDiscounts);

        foreach ($queryResultDiscounts->rows as $arrDesconto) {

            // Verifica o produto e a categoria
            if ($arrDesconto['product_id'] == $arrProduct['product_id'] || ($arrDesconto['category_id'] == $category_id && $arrDesconto['product_id'] == 0)) {

                // Verifica o grupo de usuários
                if ($arrDesconto['customer_group_id'] == 0 || $arrDesconto['customer_group_id'] == $customer_group_id) {

                    $arrProduct['desconto'] = $arrDesconto['discount'];
                    $arrProduct['price'] = $arrProduct['price'] - ($arrProduct['price'] * $arrDesconto['discount'] / 100);
                    return $arrProduct;
                }
            }
        }
        return $arrProduct;
    }
    
    public function getSubstoreOrder($order_id, $product_id = null){
        
        $strSubstoreOrderSQL = 'SELECT * FROM ' . DB_PREFIX . 'substores_order_product WHERE order_id = ' . $order_id;
        
        if(!empty($product_id)) {
            $strSubstoreOrderSQL .= ' AND product_id = ' . $product_id;
        }
        return $this->db->query($strSubstoreOrderSQL);
    }

    public function getSubstoreCouponsDiscounts($store_id) {

        $strSQL = 'SELECT * FROM ' . DB_PREFIX . 'store_coupons WHERE store_id = ' . $store_id;
        $objResult = $this->db->query($strSQL);

        return current($objResult->rows);
    }

}

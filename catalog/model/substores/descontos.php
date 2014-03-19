<?php

class ModelSubstoresDescontos extends Model {

    protected $data;

    public function __construct($data) {

        parent::__construct($data);

        $strSQL = 'SELECT * FROM ' . DB_PREFIX . 'store WHERE url = "http://' . $this->request->server['SERVER_NAME'] . '/"';

        $objResult = $this->db->query($strSQL);

        if (!empty($objResult->row)) {

            $strSQLDiscounts = 'SELECT * FROM ' . DB_PREFIX . 'store_products_discount WHERE store_id = ' . $objResult->row['store_id'] . ' ORDER BY product_id DESC';

            $queryResultDiscounts = $this->db->query($strSQLDiscounts);

            $this->data['substores_discounts'] = $queryResultDiscounts->rows;
        }
    }

    public function getSubstoresProduct($category_id, $arrProduct) {

        $strSQL = 'SELECT * FROM ' . DB_PREFIX . 'store WHERE url = "http://' . $this->request->server['SERVER_NAME'] . '/"';

        $objResult = $this->db->query($strSQL);

        if (!empty($objResult->row)) {

            // Recupera o grupo do usuário
            if ($this->customer->isLogged()) {

                $customer_group_id = $this->customer->getCustomerGroupId();
            } else {

                $customer_group_id = $this->config->get('config_customer_group_id');
            }

            // Retorna os descontos
            $strSQLDiscounts = 'SELECT * FROM ' . DB_PREFIX . 'store_products_discount WHERE store_id = ' . $objResult->row['store_id'] . ' AND category_id = ' . $category_id . ' ORDER BY product_id DESC';

            $queryResultDiscounts = $this->db->query($strSQLDiscounts);

            foreach ($queryResultDiscounts->rows as $arrDesconto) {

                // Verifica o produto e a categoria
                if ($arrDesconto['product_id'] == $arrProduct['product_id'] || ($arrDesconto['category_id'] == $category_id && $arrDesconto['product_id'] == 0)) {

                    // Verifica o grupo de usuários
                    if ($arrDesconto['customer_group_id'] == 0 || $arrDesconto['customer_group_id'] == $customer_group_id) {

                        $special = $arrProduct['price'] - ($arrProduct['price'] * $arrDesconto['discount'] / 100);
                        return $special;
                    }
                }
            }
            return $arrProduct['price'];
        }
    }
}

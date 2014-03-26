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

}

?>

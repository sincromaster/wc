<?php

class ModelSubstoresInstall extends Model {
    
    public function install() {
        
        $this->db->query("SELECT * FROM oc_store");

        $strSubstoresDescontosInstall = 
        'CREATE TABLE ' . DB_PREFIX . 'store_products_discount (
            store_id INT NOT NULL,
            category_id INT NOT NULL,
            product_id INT NOT NULL,
            discount DECIMAL(10,2) NOT NULL,
            status INT NOT NULL,
            customer_group_id INT NOT NULL,
            
            PRIMARY KEY (
                store_id, 
                category_id, 
                product_id, 
                customer_group_id
            )
        )
        
        COMMENT="Relacionamento entre as sublojas e os produtos"';
        
        $this->db->query($strSubstoresDescontosInstall);
        
        // Criacao da tabela para vinculo de pedidos/produtos
        $strSubstoresOrderDescontosInstall = 
        'CREATE TABLE ' . DB_PREFIX . 'substores_order_product (
            order_id INT NOT NULL,
            product_id INT NOT NULL,
            store_id INT NOT NULL,
            discount DECIMAL(10,2) NULL,
            PRIMARY KEY (order_id, product_id, store_id)
        )
        COMMENT="Relacionamento entre os pedidos e os produtos"';
         $this->db->query($strSubstoresOrderDescontosInstall);
        // Criacao da tabela para vinculo de sublojas/cupons
        $strSubstoresCuponsDescontoInstall =
        'CREATE TABLE ' . DB_PREFIX . 'store_coupons (
            store_id INT NULL,
            coupon_id INT NULL,
            created INT NULL,
            PRIMARY KEY (
                store_id,
                coupon_id
            )
        )
        COMMENT="Relacionamento entre as sublojas e os cupons de desconto"';
        
        $this->db->query($strSubstoresCuponsDescontoInstall);
 
        // Criacao da tabela para vinculo de sublojas/comissao
        $strSubstoresComissaoInstall =
        'CREATE TABLE ' . DB_PREFIX . 'store_sales_comission (
            store_id INT NULL,
            product_id INT NULL,
            sales_comission DECIMAL(10,2) NOT NULL,
            created INT NULL,
            PRIMARY KEY (
                store_id,
                product_id
            )
        )
        COMMENT="Relacionamento entre as sublojas e as comissoes por produto"';
        
        $this->db->query($strSubstoresComissaoInstall);

        // Criacao da tabela para vinculo de sublojas com as compras/comissoes
        $strSubstoresSalesComissionInstall =
        'CREATE TABLE ' . DB_PREFIX . 'store_sales_comission_request (
            order_id INT NOT NULL,
            store_id INT NULL,
            product_id INT NULL,
            sales_comission INT NOT NULL,
            sales_created INT NULL,
            PRIMARY KEY (
                order_id,
                store_id,
                product_id
            )
        )
        COMMENT="Relacionamento entre as sublojas e as comissoes das revendedoras"';
        
        $this->db->query($strSubstoresSalesComissionInstall);
        
        $this->model_user_user_group->addPermission($this->user->getId(), 'access', 'substores/substore');
        $this->model_user_user_group->addPermission($this->user->getId(), 'modify', 'substores/descontos/produtos');
        $this->model_user_user_group->addPermission($this->user->getId(), 'modify', 'substores/descontos/cupom');
        $this->model_user_user_group->addPermission($this->user->getId(), 'modify', 'substores/descontos/save');
    }
    
    public function uninstall() {
        $this->db->query('DROP TABLE ' . DB_PREFIX . 'store_products_discount');
        $this->db->query('DROP TABLE ' . DB_PREFIX . 'substores_order_product');
        $this->db->query('DROP TABLE ' . DB_PREFIX . 'store_sales_comission');
        $this->db->query('DROP TABLE ' . DB_PREFIX . 'store_sales_comission_request');
        $this->db->query('DROP TABLE ' . DB_PREFIX . 'store_coupons');
    }
}
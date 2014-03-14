<?php

/**
 * Substores Controller
 * 
 * @author Henrique Cocito <henriquecocito@gmail.com>
 * @since 2014-03-13
 */
class ControllerSubstoresDescontos extends Controller {
    
    private $error = array();
    
    public function produtos() {
        
        $intStoreID = $this->request->get['store_id'];
        
        $this->getSubstoresProductsDiscountForm($intStoreID);
    }
    
    /**
     * Retorna o formulário de atualização das sublojas
     * 
     * @author Henrique Cocito <henriquecocito@gmail.com>
     * @since 2014-03-12
     * 
     * @param int $intSubstoreID
     */
    private function getSubstoresProductsDiscountForm($intSubstoreID) {
        
        // Carrega a Language
        $this->language->load('substores/substores');
        
        // Page title
        $this->data['heading_title'] = $this->language->get('heading_title');
        
        // Carrega os arquivos JS necessários
        $this->document->addScript('view/javascript/substores/substores.js');
        
        // Carrega o header e o footer
        $this->children = array(
            'common/header',
            'common/footer'
        );
        
        // Breadcrumb
        $this->data['breadcrumbs'] = array();

        $this->data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => false
        );

        $this->data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('substores/substore', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );
        
        // Mensagens de erro e sucesso
        if (isset($this->error['warning'])) {

            $this->data['error_warning'] = $this->error['warning'];
        } else {

            $this->data['error_warning'] = '';
        }

        if (isset($this->session->data['success'])) {

            $this->data['success'] = $this->session->data['success'];

            unset($this->session->data['success']);
        } else {

            $this->data['success'] = '';
        }
        
        // 
        // Textos do cabeçalho da tabela
        $this->data['text_substore_category'] = $this->language->get('text_substore_category');
        $this->data['text_substore_product'] = $this->language->get('text_substore_product');
        $this->data['text_substore_discount'] = $this->language->get('text_substore_discount');
        $this->data['text_substore_customer_group'] = $this->language->get('text_substore_customer_group');
        $this->data['text_substore_actions'] = $this->language->get('text_substore_actions');
        
        // Campos do formulário
        $this->data['form']['action'] = $this->url->link('substores/descontos/save', 'token=' . $this->session->data['token'], 'SSL');
        $this->data['form']['table'] = 'store_products_discount';
        $this->data['form']['store_id'] = $intSubstoreID;
        
        $this->load->model('substores/descontos');
        
        $this->load->model('catalog/category');
        $this->data['form']['categories'] = $this->model_catalog_category->getCategories(array());
        
        $this->load->model('catalog/product');
        $this->data['form']['products'] = $this->model_catalog_product->getProducts();
        
        $this->load->model('sale/customer_group');
        $this->data['form']['customers'] = $this->model_sale_customer_group->getCustomerGroups();
        
        // Itens existentes na loja
        $arrDescontos = $this->model_substores_descontos->getSubstoreProductsDiscounts($intSubstoreID);
        $this->data['form_state'] = $arrDescontos;
        
        // Botões
        $this->data['text_substore_save'] = $this->language->get('text_substore_save');
        $this->data['text_substore_cancel'] = $this->language->get('text_substore_cancel');
        $this->data['button_substore_cancel'] = $this->url->link('substores/substore', 'token=' . $this->session->data['token']);
        
        // Carrega a view
        $this->template = 'substores/desconto-produtos.tpl';
        
        // Exibe a saída
        $this->response->setOutput($this->render());
    }
    
    /**
     * Salva as informações do formulário de atualização de subloja
     * 
     * @author Henrique Cocito <henriquecocito@gmail.com>
     * @since 2014-03-12
     */
    public function save() {
        
        // Carrega a Language
        $this->language->load('substores/substores');
        
        // Recupera os parametros enviados por POST
        $arrPost = $this->request->post;
        
        switch($arrPost['table']) {
            
            case 'store_products_discount':

                // Remove os registros da tabela para inseri-los novamente
                $this->db->query('DELETE FROM ' . DB_PREFIX . 'store_products_discount WHERE store_id = ' . $arrPost['store_id']);
                
                $intTotal = count($arrPost['category_id']);
                
                // Insere os registros na tabela
                for($i = 0; $i < $intTotal; $i++) {
                    
                    if(!empty($arrPost['category_id'][$i]) && !empty($arrPost['discount'])) {
                        
                        $strSQL = 'INSERT INTO ' . DB_PREFIX . $arrPost['table'] . ' (store_id, category_id, product_id, discount, status, customer_group_id)';
                        $strSQL .= ' VALUES(' . $arrPost['store_id']. ', ' . $arrPost['category_id'][$i] . ', ' . $arrPost['product_id'][$i] . ', ' . $arrPost['discount'][$i] . ', 1, ' . $arrPost['customer_group_id'][$i] . ')';
                        
                        // Executa a query
                        $this->db->query($strSQL);
                    }
                }

                // Retorna a mensagem
                $this->session->data['success'] = $this->language->get('text_substore_success');
                break;
        }
        
        // Redireciona para a lista de sublojas
        $this->redirect($this->url->link('substores/substore', 'token=' . $this->session->data['token'], 'SSL'));
    }
}
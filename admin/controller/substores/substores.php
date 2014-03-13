<?php

/**
 * Substores Controller
 * 
 * @author Henrique Cocito <henriquecocito@gmail.com>
 * @since 2014-03-11
 */
class ControllerSubstoresSubstores extends Controller {

    private $error = array();
    
    /**
     * Função inicial do controlador
     * 
     * @author Henrique Cocito <henriquecocito@gmail.com>
     * @since 2014-03-11
     */
    public function index() {
        
        // Carrega a Language
        $this->language->load('substores/substores');
        
        // Define o título da página
        $this->document->setTitle($this->language->get('heading_title'));
        
        // Carrega o Model
        $this->load->model('substores/substores');
        
        $arrSubstores = $this->model_substores_substores->getSubstores();
        $this->getList($arrSubstores);
    }
    
    /**
     * Instalação do módulo
     * Criação das tabelas necessárias
     * 
     * @author Henrique Cocito <henriquecocito@gmail.com>
     * @since 2014-03-11
     */
    public function install() {
        
        $strSubstoresCuponsInstall = 
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
        
        $this->db->query($strSubstoresCuponsInstall);
    }
    
    /**
     * Desinstalação do módulo
     * Remoção das tabelas criadas
     * 
     * @author Henrique Cocito <henriquecocito@gmail.com>
     * @since 2014-03-11
     */
    public function uninstall() {
        
        $this->db->query('DROP TABLE ' . DB_PREFIX . 'store_products_discount');
    }
    
    public function update() {
        
        $intStoreID = $this->request->get['store_id'];
        
        $this->getSubstoreUpdateForm($intStoreID);
    }

    /**
     * Retorna a lista de sub-lojas criadas
     * 
     * @author Henrique Cocito <henriquecocito@gmail.com>
     * @since 2014-03-11
     * 
     * @param array $arrRows
     */
    private function getList($arrRows) {

        $url = '';

        if (isset($this->request->get['page'])) {

            $url .= '&page=' . $this->request->get['page'];
        }

        // Criação do breadcrumb
        $this->data['breadcrumbs'] = array();

        $this->data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => false
        );

        $this->data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('substores/substores', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );

        // Links para inserção e exclusão das lojas
        $this->data['insert'] = $this->url->link('setting/store/insert', 'token=' . $this->session->data['token'], 'SSL');

        $this->data['delete'] = $this->url->link('setting/store/delete', 'token=' . $this->session->data['token'], 'SSL');

        // Lista de lojas
        $this->data['stores'] = array();

        foreach($arrRows as $arrStore) {
            
            // Ações disponíveis para a loja
            $action = array();
            
            $action[] = array(
                'text' => $this->language->get('text_substore_edit'),
                'href' => $this->url->link('substores/substores/update', 'store_id=' . $arrStore['store_id'] . '&token=' . $this->session->data['token'], 'SSL')
            );
            
            $this->data['stores'][] = array(
                'store_id' => $arrStore['store_id'],
                'name' => $arrStore['name'],
                'url' => '<a href="'.$arrStore['url'].'">' . $arrStore['url']. '</a>',
                'selected' => isset($this->request->post['selected']) && in_array($arrStore['store_id'], $this->request->post['selected']),
                'action' => $action
            );
        }

        // Carregamento dos textos
        $this->data['heading_title']    = $this->language->get('heading_title');
        $this->data['text_no_results']  = $this->language->get('text_no_results');
        $this->data['column_name']      = $this->language->get('column_substore_name');
        $this->data['column_url']       = $this->language->get('column_substore_url');
        $this->data['column_action']    = $this->language->get('column_substore_action');
        $this->data['button_insert']    = $this->language->get('button_insert');
        $this->data['button_delete']    = $this->language->get('button_delete');

        // Define as mensagens
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


        // Aplica a view ao controller
        $this->template = 'setting/store_list.tpl';

        // Adiciona o header e o footer
        $this->children = array(
            'common/header',
            'common/footer'
        );
        
        // Exibe a saída
        $this->response->setOutput($this->render());
    }
    
    /**
     * Retorna o formulário de atualização das sublojas
     * 
     * @author Henrique Cocito <henriquecocito@gmail.com>
     * @since 2014-03-12
     * 
     * @param int $intSubstoreID
     */
    private function getSubstoreUpdateForm($intSubstoreID) {
        
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
            'href' => $this->url->link('substores/substores', 'token=' . $this->session->data['token'], 'SSL'),
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
        
        // Textos do cabeçalho da tabela
        $this->data['text_substore_category'] = $this->language->get('text_substore_category');
        $this->data['text_substore_product'] = $this->language->get('text_substore_product');
        $this->data['text_substore_discount'] = $this->language->get('text_substore_discount');
        $this->data['text_substore_customer_group'] = $this->language->get('text_substore_customer_group');
        $this->data['text_substore_actions'] = $this->language->get('text_substore_actions');
        
        // Campos do formulário
        $this->data['form']['action'] = $this->url->link('substores/substores/save', 'token=' . $this->session->data['token'], 'SSL');
        $this->data['form']['table'] = 'store_products_discount';
        $this->data['form']['store_id'] = $intSubstoreID;
        
        $this->load->model('substores/substores');
        
        $this->load->model('catalog/category');
        $this->data['form']['categories'] = $this->model_catalog_category->getCategories(array());
        
        $this->load->model('catalog/product');
        $this->data['form']['products'] = $this->model_catalog_product->getProducts();
        
        $this->load->model('sale/customer_group');
        $this->data['form']['customers'] = $this->model_sale_customer_group->getCustomerGroups();
        
        // Itens existentes na loja
        $arrDescontos = $this->model_substores_substores->getSubstoreProductsDiscounts($intSubstoreID);
        $this->data['form_state'] = $arrDescontos;
        
        // Botões
        $this->data['text_substore_save'] = $this->language->get('text_substore_save');
        $this->data['text_substore_cancel'] = $this->language->get('text_substore_cancel');
        $this->data['button_substore_cancel'] = $this->url->link('substores/substores', 'token=' . $this->session->data['token']);
        
        // Carrega a view
        $this->template = 'substores/update.tpl';
        
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
        $this->redirect($this->url->link('substores/substores', 'token=' . $this->session->data['token'], 'SSL'));
    }
}

?>
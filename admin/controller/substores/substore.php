<?php

/**
 * Substores Controller
 * 
 * @author Henrique Cocito <henriquecocito@gmail.com>
 * @since 2014-03-11
 */
class ControllerSubstoresSubstore extends Controller {

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
        $this->load->model('substores/substore');
        
        $arrSubstores = $this->model_substores_substore->getSubstores();
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
        
        // Criação da tabela de revendedores
        $strRevendedoresSQL = 
        'CREATE TABLE ' . DB_PREFIX . 'store_revenda (
            revenda_id INT NOT NULL,
            revenda_nome VARCHAR(255),
            PRIMARY KEY (
                revenda_id 
            )
        )
        COMMENT="Revenda"';
        $this->db->query($strRevendedoresSQL);

        // Criação da tabela para relacionamento entre a venda e as comissoes
        $strComissaoRevendedoresSQL = 
        'CREATE TABLE ' . DB_PREFIX . 'store_comissao_revenda (
            comissao_id INT NOT NULL AUTO_INCREMENT,
            revenda_id VARCHAR(255),
            comissao DECIMAL(10,2) NOT NULL,
            store_id INT NOT NULL,

            PRIMARY KEY (
                comissao_id,
                revenda_id,
                store_id
            )
        )
        COMMENT="Dados comissao revenda"';
        $this->db->query($strComissaoRevendedoresSQL);
        
        
//        Permissões
//        this->model_user_user_group->addPermission($this->user->getId(), 'access', 'test/import');
//$this->model_user_user_group->addPermission($this->user->getId(), 'modify', 'test/import');
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
        $this->db->query('DROP TABLE ' . DB_PREFIX . 'store_coupons');
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
            'href' => $this->url->link('substores/substore', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );

        // Links para inserção e exclusão das lojas
        $this->data['insert'] = $this->url->link('setting/store/insert', 'token=' . $this->session->data['token'], 'SSL');

        $this->data['delete'] = $this->url->link('setting/store/delete', 'token=' . $this->session->data['token'], 'SSL');

        // Lista de lojas
        $this->data['stores'] = array();

        $this->load->model('setting/setting');
        foreach($arrRows as $arrStore) {
            
            // Ações disponíveis para a loja
            $action = array();
            
            $action[] = array(
                'text' => $this->language->get('text_substore_edit'),
                'href' => $this->url->link('substores/descontos/produtos', 'store_id=' . $arrStore['store_id'] . '&token=' . $this->session->data['token'], 'SSL')
            );
            
            
            $arrSettings = $this->model_setting_setting->getSetting('config', $arrStore['store_id']);
            $this->data['stores'][] = array(
                'store_id' => $arrStore['store_id'],
                'name' => $arrSettings['config_title'],
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
}

?>
<?php
//ini_set('display_errors',1);
//ini_set('display_startup_erros',1);
//error_reporting(E_ALL);
/**
 * Substores comissoes
 * 
 * @author wellington Fugiwara Peres <wellington.fugiwara@gmail.com>
 * @since 2014-03-16
 */
class ControllerSubstoresComissoes extends Controller {

  private $error = array();

  public function index() {

    // Carrega a Language
    $this->language->load('substores/comissoes');

    // Define o título da página
    $this->document->setTitle($this->language->get('heading_title'));

    $this->document->addScript('view/javascript/substores/substores.js');
    
    // Carrega o Model comissoes
    $this->load->model('substores/comissoes');

    $intSubstoreID = $this->request->get['store_id'];
    
    $this->getRevendas();
  }

  /**
   * Retorna a lista de sub-lojas criadas
   * 
   * @author wellington Fugiwara Peres <wellington.fugiwara@gmail.com>
   * @since 2014-03-16
   * 
   * @param array $arrRows ontendo os dados da revenda
   */
  private function getRevendas() {

    $url = '';

    if (isset($this->request->get['page'])) {
      $url .= '&page=' . $this->request->get['page'];
    }

    $intSubstoreID = $this->request->get['store_id'];
    
    // Tabs
    $this->data['tab_desconto_cupons'] = $this->url->link('substores/descontos/cupom', 'store_id=' . $intSubstoreID . '&token=' . $this->session->data['token'], 'SSL');
    $this->data['tab_comissoes'] = $this->url->link('substores/comissoes', 'store_id=' . $intSubstoreID . '&token=' . $this->session->data['token'], 'SSL');
    
    $this->data['text_substore_desconto_produtos'] = $this->language->get('text_substore_desconto_produtos');
    $this->data['text_substore_desconto_cupom'] = $this->language->get('text_substore_desconto_cupom');
    $this->data['text_substore_comissoes'] = $this->language->get('text_substore_comissoes'); // Breadcrumb
    $this->data['text_substore_save'] = $this->language->get('text_substore_save'); 
    $this->data['text_substore_cancel'] = $this->language->get('text_substore_cancel'); 
    
    $this->data['button_substore_cancel'] = $this->url->link('substores/substore', 'token=' . $this->session->data['token'], 'SSL');
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

    // Tabs
    $this->data['tab_desconto_cupons'] = $this->url->link('substores/descontos/cupom', 'store_id=' . $intSubstoreID . '&token=' . $this->session->data['token'], 'SSL');
    $this->data['tab_comissoes'] = $this->url->link('substores/comissoes', 'store_id=' . $intSubstoreID . '&token=' . $this->session->data['token'], 'SSL');
    $this->data['text_substore_desconto_produtos'] = $this->language->get('text_substore_desconto_produtos');
    $this->data['text_substore_desconto_cupom'] = $this->language->get('text_substore_desconto_cupom');
    $this->data['text_substore_comissoes'] = $this->language->get('text_substore_comissoes');

    // Campos do formulário
    $this->data['form']['action'] = $this->url->link('substores/descontos/save', 'token=' . $this->session->data['token'], 'SSL');
    $this->data['form']['table'] = 'store_comissao_revenda';
    $this->data['form']['store_id'] = $intSubstoreID;
    
    //recuperamos todos as comissoes cadastrados
    $arrayRevendas = $this->model_substores_comissoes->getRevendas();
    $this->data['revendas'] = $arrayRevendas;
    
     //recuperamos todos as comissoes cadastrados
    $arrayRevendasCadastradas = $this->model_substores_comissoes->getRevendasCadastradas($intSubstoreID);
    $this->data['form_state'] = $arrayRevendasCadastradas;
    
    //definimos o array com as revendas
    $this->data['revendas'] = array();
    foreach ($arrayRevendas as $val) {
      $this->data['revendas'][] = array(
          'revenda_id' => $val['revenda_id'],
          'revenda_nome' => $val['revenda_nome'],
      );
    }
    

    // Carregamento dos textos
    $this->data['heading_title'] = $this->language->get('heading_title');
    $this->data['text_no_results'] = $this->language->get('text_no_results');
    $this->data['column_revenda_id'] = $this->language->get('column_revenda_id');
    $this->data['column_substore_revenda_name'] = $this->language->get('column_substore_revenda_name');
    $this->data['column_comissao'] = $this->language->get('column_revenda_comisso');
    $this->data['column_url'] = $this->language->get('column_substore_url');
    $this->data['column_action'] = $this->language->get('column_substore_action');
    $this->data['button_insert'] = $this->language->get('button_insert');

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
    $this->template = 'substores/comissoes.tpl';

    // Adiciona o header e o footer
    $this->children = array(
        'common/header',
        'common/footer'
    );

    // Exibe a saída
    $this->response->setOutput($this->render());
  }

  public function install() {
    //cria tabela de revenda
    $revenda = 'CREATE TABLE ' . DB_PREFIX . 'store_revenda (
            revenda_id INT NOT NULL,
            revenda_nome VARCHAR(255),
            PRIMARY KEY (
                revenda_id 
            )
        )
        COMMENT="Revenda"';
    $this->db->query($revenda);

    //cria tabela de comissão por revenda
    $comissaoRevenda = 'CREATE TABLE ' . DB_PREFIX . 'store_comissao_revenda (
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
    $this->db->query($comissaoRevenda);
  }

}

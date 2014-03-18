<?php

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

    // Carrega o Model comissoes
    $this->load->model('substores/comissoes');

    //recuperamos todos os comissoes cadastrados
    $arrayRevendas = $this->model_substores_comissoes->getSubstoreComissoes(NULL);
    $this->getRevendas($arrayRevendas);
  }

  /**
   * Retorna a lista de sub-lojas criadas
   * 
   * @author wellington Fugiwara Peres <wellington.fugiwara@gmail.com>
   * @since 2014-03-16
   * 
   * @param array $arrRows ontendo os dados da revenda
   */
  private function getRevendas($arrayRevendas) {

    $url = '';

    if (isset($this->request->get['page'])) {
      $url .= '&page=' . $this->request->get['page'];
    }

    $this->data['breadcrumbs'] = array();

    $this->data['breadcrumbs'][] = array(
        'text' => $this->language->get('text_home'),
        'href' => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
        'separator' => false
    );

    $this->data['breadcrumbs'][] = array(
        'text' => $this->language->get('heading_title'),
        'href' => $this->url->link('substores/comissoes', 'token=' . $this->session->data['token'], 'SSL'),
        'separator' => ' :: '
    );

    // Links para inserção e exclusão das lojas
    $this->data['insert'] = $this->url->link('substores/comissoes/insert', 'token=' . $this->session->data['token'], 'SSL');

    //definimos o array com as revendas
    $this->data['revendas'] = array();

    foreach ($arrayRevendas as $val) {

      $action = array();

      $action[] = array(
          'text' => $this->language->get('text_substore_edit'),
          'href' => $this->url->link('substores/comissoes/edit', 'comissao_id=' . $val['comissao_id'] . '&token=' . $this->session->data['token'], 'SSL')
      );

      $this->data['revendas'][] = array(
          'revenda_id' => $val['revenda_id'],
          'name' => $val['revenda_nome'],
          'comissao' => $val['comissao'],
          'url' => '<a href="' . $val['url'] . '">' . $val['url'] . '</a>',
          'selected' => isset($this->request->post['selected']) && in_array($val['revenda_id'], $this->request->post['selected']),
          'action' => $action
      );
    }

    // Carregamento dos textos
    $this->data['heading_title'] = $this->language->get('heading_title');
    $this->data['text_no_results'] = $this->language->get('text_no_results');
    $this->data['column_revenda_id'] = $this->language->get('column_revenda_id');
    $this->data['column_name'] = $this->language->get('column_substore_name');
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

  public function getComissoesRevendaForm() {

    // Carrega a Language
    $this->language->load('substores/comissoes');

    // Define o título da página
    $this->document->setTitle($this->language->get('heading_title'));

    // Carrega o Model comissoes
    $this->load->model('substores/comissoes');

    // Campos do formulário
    $this->data['form']['action'] = $this->url->link('substores/comissoes/insert', 'token=' . $this->session->data['token'], 'SSL');
//    $this->data['form']['table'] = 'store_products_discount';
//    $this->data['form']['store_id'] = $intSubstoreID;

    $this->load->model('substores/comissoes/insert');

    $this->load->model('catalog/category');
    $this->data['form']['categories'] = $this->model_catalog_category->getCategories(array());

    $this->load->model('catalog/product');
    $this->data['form']['products'] = $this->model_catalog_product->getProducts();

    // Carrega a view
    $this->template = 'substores/desconto-produtos.tpl';

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
            comissao_id INT NOT NULL,
            revenda_id VARCHAR(255),
            comissao DECIMAL(10,2) NOT NULL,
            store_id INT NOT NULL,
            
            PRIMARY KEY (
                comissao_id,
                revenda_id 
            )
        )
        COMMENT="Dados comissao revenda"';
    $this->db->query($comissaoRevenda);
  }

}
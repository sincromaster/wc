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
        $this->document->setTitle($this->language->get('heading_title_comissoes'));

        $this->document->addScript('view/javascript/substores/substores.js');

        // Carrega o Model comissoes
        $this->load->model('substores/comissoes');

        $intSubstoreID = $this->request->get['store_id'];

        $this->getRelatorioCommisoes($intSubstoreID);
    }

    /**
     * Retorna relatorio de commisões
     * 
     * @author wellington Fugiwara Peres <wellington.fugiwara@gmail.com>
     * @since 2014-03-16
     * 
     * @param array $arrRows ontendo os dados da revenda
     */
    private function getRelatorioCommisoes($intSubstoreID = FALSE ) {

        $url = '';

        if (isset($this->request->get['page'])) {
            $url .= '&page=' . $this->request->get['page'];
        }
        
        if($intSubstoreID) {
          $intSubstoreID = $this->request->get['store_id'];
        }

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
        $this->data['tab_desconto_produtos'] = $this->url->link('substores/descontos/produtos', 'store_id=' . $intSubstoreID . '&token=' . $this->session->data['token'], 'SSL');
        $this->data['tab_desconto_cupons'] = $this->url->link('substores/descontos/cupom', 'store_id=' . $intSubstoreID . '&token=' . $this->session->data['token'], 'SSL');
        $this->data['tab_comissoes'] = $this->url->link('substores/comissoes', 'store_id=' . $intSubstoreID . '&token=' . $this->session->data['token'], 'SSL');
        
        // Campos do formulário
        $this->data['form']['action'] = $this->url->link('substores/comissoes', 'token=' . $this->session->data['token'], 'SSL');

        //recuperamos todos as comissoes cadastrados
        $arrayComissoes = $this->model_substores_comissoes->getCommisoes($intSubstoreID);
        $this->data['form_state'] = $arrayComissoes;

        // Carregamento dos textos
        $this->data['heading_title'] = $this->language->get('heading_title');
        $this->data['text_no_results'] = $this->language->get('text_no_results');
        $this->data['text_substore_comissao_pedido_id'] = $this->language->get('text_substore_comissao_pedido_id');
        $this->data['text_substore_comissao_produto'] = $this->language->get('text_substore_comissao_produto');
        $this->data['text_substore_comissao_comissao'] = $this->language->get('text_substore_comissao_comissao');
        $this->data['text_substore_comissao_data'] = $this->language->get('text_substore_comissao_data');

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

}

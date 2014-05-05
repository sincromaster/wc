<?php

class ControllerModuleAgenda extends Controller {

    public function index() {

        // Load language
        $this->language->load('module/agenda');

        // Set title
        $this->document->setTitle($this->language->get('heading_title'));
        
        // Load JS
        $this->document->addScript('view/javascript/ckeditor/ckeditor.js');
        
        // Set heading title
        $this->data['heading_title'] = $this->language->get('heading_title');

        // Set breadcrumbs
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

        // Set error and success messages
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

        // Set heading title
        $this->data['form']['text_agenda_campo_cabecalho'] = $this->language->get('text_agenda_campo_cabecalho');
        $this->data['form']['text_agenda_campo_rodape'] = $this->language->get('text_agenda_campo_rodape');
        $this->data['form']['text_agenda_save'] = $this->language->get('text_agenda_save');
        
        $this->data['token'] = $this->session->data['token'];
        
        // Carrega o header e o footer
        $this->children = array(
            'common/header',
            'common/footer'
        );

        // Load form
        $this->getAdminAgendaForm();
    }

    private function getAdminAgendaForm() {

        // Form action
        $this->data['form']['action'] = $this->url->link('module/agenda/save', 'token=' . $this->session->data['token'], 'SSL');

        // Form fields
        $this->data['form']['fields']['agenda_campo_cabecalho'] = $this->getAdminAgendaFields('agenda_campo_cabecalho');
        $this->data['form']['fields']['agenda_campo_rodape'] = $this->getAdminAgendaFields('agenda_campo_rodape');

        // Set template
        $this->template = 'agenda/formfields.tpl';

        // Outputs result
        $this->response->setOutput($this->render());
    }

    public function save() {

        $arrPost = $this->request->post;

        $this->load->model('agenda/agenda');
        
        $error = false;
        foreach($arrPost as $key => $value) {
            
            if(!$this->model_agenda_agenda->setField($key, $value)) {
                
                $error = true;
            }
        }
        
        if($error) {
            
            $this->error['warning'] = 'Ocorreu um erro ao salvar o registro. Tente novamente';
        } else {
            
            $this->session->data['success'] = 'Informações salvas com sucesso.';
        }
        
        // Redirect
        $this->redirect($this->url->link('module/agenda', 'token=' . $this->session->data['token'], 'SSL'));
    }

    private function getAdminAgendaFields($field_name) {

        $this->load->model('agenda/agenda');

        return $this->model_agenda_agenda->getField($field_name);
    }

    public function install() {

        $tabela_agenda = '
      CREATE TABLE ' . DB_PREFIX . 'agenda_gratis (
        agenda_id        INT              NOT NULL  AUTO_INCREMENT,
        nome             VARCHAR(255)     NOT NULL,
        cpf              VARCHAR(255)     NOT NULL,
        cnpj             VARCHAR(255)     NOT NULL,
        email            VARCHAR(255)     NOT NULL,
        ddd              INT(2)           NOT NULL,
        telefone         INT(9)           NOT NULL,

        endereco              VARCHAR(255)     NOT NULL,
        endereco_numero       INT(11)          NOT NULL,
        endereco_complemento  VARCHAR(255)     NULL,
        endereco_cep          VARCHAR(11)      NOT NULL,

        placa                  VARCHAR(8)     NOT NULL,
        placa_uf               VARCHAR(2)     NOT NULL,
        placa_cidade           VARCHAR(255)   NOT NULL,
        vencimento_cnh         INT(11)        NOT NULL,
        renavan                INT(11)    NULL,
        vencimento_seguro      INT(11)    NULL,
        km_atual               INT(11)    NULL,
        km_dia                 INT(11)    NULL,
        km_ultima_revisao      INT(11)    NULL,
        regiao_circulacao      VARCHAR(255)     NOT NULL,
        tipo_de_veiculo        VARCHAR(255)     NOT NULL,
        created         INT(11)        NOT NULL,

        PRIMARY KEY (agenda_id))
        ';

        $this->db->query($tabela_agenda);

        $this->model_user_user_group->addPermission($this->user->getId(), 'access', 'feed/agenda');
        $this->model_user_user_group->addPermission($this->user->getId(), 'modify', 'feed/agenda');
        $this->model_user_user_group->addPermission($this->user->getId(), 'access', 'feed/agenda/export');
        $this->model_user_user_group->addPermission($this->user->getId(), 'modify', 'feed/agenda/export');
    }

    public function uninstall() {
        $this->db->query('DROP TABLE ' . DB_PREFIX . 'agenda_gratis');
    }

}

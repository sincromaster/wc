<?php

class ControllerFeedAgenda extends Controller {
    
    public function index() {
        
        $this->getExportFormFilter();
    }
    
    private function getExportFormFilter() {
        
        
        // Load language
        $this->load->language('feed/agenda');
        
        // Set title
        $this->document->setTitle('Agenda grátis | Exportação');
        
        // Page title
        $this->data['heading_title'] = $this->language->get('heading_title');
        
        // Loads header and footer
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
            'href' => $this->url->link('feed/agenda', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );

        // Error and success messages
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
        
        // Form fields
        $this->data['form']['action'] = $this->url->link('feed/agenda/export', 'token=' . $this->session->data['token'], 'SSL');

        $this->data['form']['fields']['initialDate'] = strtotime('-30 days');
        $this->data['form']['fields']['endDate'] = time();
        $this->data['form']['text_initialDate'] = $this->language->get('text_initialDate');
        $this->data['form']['text_endDate'] = $this->language->get('text_endDate');
        $this->data['form']['text_submit'] = $this->language->get('text_submit');
        $this->data['form']['text_clear'] = $this->language->get('text_clear');
        
        
        // Load view
        $this->template = 'agenda/form.tpl';
        
        // Output
        $this->response->setOutput($this->render());
    }
    
    public function export() {
       
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private", false);
        header("Content-Type: application/octet-stream; charset=utf-8");
        header("Content-Disposition: attachment; filename='agenda_gratis_" . date('Y-m-d') . ".csv'" );
        header("Content-Transfer-Encoding: binary");

        $this->load->model('agenda/agenda');
        
        $initialDate = DateTime::createFromFormat('d/m/Y', $this->request->post['initialDate']);
        $endDate = DateTime::createFromFormat('d/m/Y', $this->request->post['endDate']);
        
        $arrResults = $this->model_agenda_agenda->getCadastros(strtotime('+1 day', strtotime($initialDate->format('Y-m-d'))), strtotime($endDate->format('Y-m-d'))+10800);
        
        $fp = fopen('php://output', 'w');
        fputcsv($fp, array_keys(current($arrResults)));
        foreach($arrResults as $arrFields) {
            
            fputcsv($fp, $arrFields);
        }
        
        fclose($fp);
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
        
        $this->model_user_user_group->addPermission($this->user->getId(), 'modify', 'feed/agenda');
        $this->model_user_user_group->addPermission($this->user->getId(), 'access', 'feed/agenda/export');
        $this->model_user_user_group->addPermission($this->user->getId(), 'modify', 'feed/agenda/export');
    }

    public function uninstall() {
        $this->db->query('DROP TABLE ' . DB_PREFIX . 'agenda_gratis');
    }

}
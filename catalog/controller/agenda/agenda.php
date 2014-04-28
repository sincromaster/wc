<?php

class ControllerAgendaAgenda extends Controller {

  public function index() {

    $this->language->load('agenda/agenda');

    $this->document->setTitle($this->language->get('heading_title'));

    $this->data['breadcrumbs'] = array();

    $this->data['breadcrumbs'][] = array(
        'text' => $this->language->get('text_home'),
        'href' => $this->url->link('common/home'),
        'separator' => false
    );

    $this->data['breadcrumbs'][] = array(
        'text' => $this->language->get('text_agenda'),
        'href' => $this->url->link('agenda/agenda', '', 'SSL'),
        'separator' => $this->language->get('text_separator')
    );

    $this->document->addStyle('catalog/view/theme/default/stylesheet/agenda/agenda.css');

    $this->data['form']['action'] = $this->url->link('agenda/agenda/save');

    $this->template = 'default/template/agenda/agenda.tpl';

    $this->children = array(
        'common/column_left',
        'common/column_right',
        'common/content_top',
        'common/content_bottom',
        'common/footer',
        'common/header'
    );
    
    $this->response->setOutput($this->render());
  }
  
  

  public function save() {
    
    //TODO, VALIDAR AS INFORMAÇÕES
    $arrPost = $this->request->post;

    var_dump($arrPost);
    exit;
  }

}

?>
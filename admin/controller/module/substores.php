<?php
class ControllerModuleSubstores extends Controller {
    
    public function index() {
        
        $this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token']));
    }
    /**
     * Instalação do módulo
     * Criação das tabelas necessárias
     * 
     * @author Henrique Cocito <henriquecocito@gmail.com>
     * @since 2014-03-11
     */
    public function install() {
        
        $this->load->model('substores/install');
        $this->model_substores_install->install();
    }
    
    /**
     * Desinstalação do módulo
     * Remoção das tabelas criadas
     * 
     * @author Henrique Cocito <henriquecocito@gmail.com>
     * @since 2014-03-11
     */
    public function uninstall() {
        $this->load->model('substores/install');
        $this->model_substores_install->uninstall();
    }
    
}
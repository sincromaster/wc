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
        $this->data['form']['fields']['endDate'] = strtotime('+1 day');
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

        $arrResults = $this->model_agenda_agenda->getCadastros(strtotime('+1 day', strtotime($initialDate->format('Y-m-d'))), strtotime($endDate->format('Y-m-d')) + 10800);

        $fp = fopen('php://output', 'w');
        fputcsv($fp, array_keys($this->opencart2Dynamics()), ',');
        
        foreach ($arrResults as $arrRow) {

            fputcsv($fp, $this->opencart2Dynamics($arrRow), ',');
        }
        fclose($fp);
    }

    private function opencart2Dynamics($arrRow = null) {

        // Array de relacionamento entre os campos do Dynamics com a tabela da Agenda Gratis
        $arrOpencartDynamics = array();

        $arrOpencartDynamics['Order_cpf'] = 'cpf';
        $arrOpencartDynamics['Order_cnpj'] = 'cnpj';
        $arrOpencartDynamics['Order_razao_social'] = '';
        $arrOpencartDynamics['Order_inscricao_estadual'] = '';
        $arrOpencartDynamics['Order_data_nascimento'] = '';
        $arrOpencartDynamics['Order_ddd'] = 'ddd';
        $arrOpencartDynamics['Order_ddd2'] = '';
        $arrOpencartDynamics['Order_telephone2'] = '';
        $arrOpencartDynamics['Order_sexo'] = '';
        $arrOpencartDynamics['Order_shipping_numero'] = 'endereco_numero';
        $arrOpencartDynamics['Order_shipping_complemento'] = 'endereco_complemento';
        $arrOpencartDynamics['Order_payment_numero'] = 'endereco_numero';
        $arrOpencartDynamics['Order_payment_complemento'] = 'endereco_complemento';
        $arrOpencartDynamics['Order_order_id'] = 'agenda_id';
        $arrOpencartDynamics['Order_invoice_no'] = '';
        $arrOpencartDynamics['Order_invoice_prefix'] = '';
        $arrOpencartDynamics['Order_store_id'] = '';
        $arrOpencartDynamics['Order_store_name'] = '';
        $arrOpencartDynamics['Order_store_url'] = '';
        $arrOpencartDynamics['Order_customer_id'] = '';
        $arrOpencartDynamics['Order_customer'] = 'nome';
        $arrOpencartDynamics['Order_customer_group_id'] = '';
        $arrOpencartDynamics['Order_firstname'] = 'nome';
        $arrOpencartDynamics['Order_lastname'] = 'nome';
        $arrOpencartDynamics['Order_telephone'] = 'telefone';
        $arrOpencartDynamics['Order_fax'] = '';
        $arrOpencartDynamics['Order_email'] = 'email';
        $arrOpencartDynamics['Order_payment_firstname'] = 'nome';
        $arrOpencartDynamics['Order_payment_lastname'] = 'nome';
        $arrOpencartDynamics['Order_payment_company'] = '';
        $arrOpencartDynamics['Order_payment_company_id'] = '';
        $arrOpencartDynamics['Order_payment_tax_id'] = '';
        $arrOpencartDynamics['Order_payment_address_1'] = 'endereco';
        $arrOpencartDynamics['Order_payment_address_2'] = '';
        $arrOpencartDynamics['Order_payment_postcode'] = 'endereco_cep';
        $arrOpencartDynamics['Order_payment_city'] = '';
        $arrOpencartDynamics['Order_payment_zone_id'] = '';
        $arrOpencartDynamics['Order_payment_zone'] = '';
        $arrOpencartDynamics['Order_payment_zone_code'] = '';
        $arrOpencartDynamics['Order_payment_country_id'] = '';
        $arrOpencartDynamics['Order_payment_country'] = '';
        $arrOpencartDynamics['Order_payment_iso_code_2'] = '';
        $arrOpencartDynamics['Order_payment_iso_code_3'] = '';
        $arrOpencartDynamics['Order_payment_address_format'] = '';
        $arrOpencartDynamics['Order_payment_method'] = '';
        $arrOpencartDynamics['Order_payment_code'] = '';
        $arrOpencartDynamics['Order_shipping_firstname'] = 'nome';
        $arrOpencartDynamics['Order_shipping_lastname'] = 'nome';
        $arrOpencartDynamics['Order_shipping_company'] = '';
        $arrOpencartDynamics['Order_shipping_address_1'] = 'endereco';
        $arrOpencartDynamics['Order_shipping_address_2'] = '';
        $arrOpencartDynamics['Order_shipping_postcode'] = 'endereco_cep';
        $arrOpencartDynamics['Order_shipping_city'] = '';
        $arrOpencartDynamics['Order_shipping_zone_id'] = '';
        $arrOpencartDynamics['Order_shipping_zone'] = '';
        $arrOpencartDynamics['Order_shipping_zone_code'] = '';
        $arrOpencartDynamics['Order_shipping_country_id'] = '';
        $arrOpencartDynamics['Order_shipping_country'] = '';
        $arrOpencartDynamics['Order_shipping_iso_code_2'] = '';
        $arrOpencartDynamics['Order_shipping_iso_code_3'] = '';
        $arrOpencartDynamics['Order_shipping_address_format'] = '';
        $arrOpencartDynamics['Order_shipping_method'] = '';
        $arrOpencartDynamics['Order_shipping_code'] = '';
        $arrOpencartDynamics['Order_comment'] = '';
        $arrOpencartDynamics['Order_total'] = '';
        $arrOpencartDynamics['Order_reward'] = '';
        $arrOpencartDynamics['Order_order_status_id'] = '';
        $arrOpencartDynamics['Order_affiliate_id'] = '';
        $arrOpencartDynamics['Order_affiliate_firstname'] = '';
        $arrOpencartDynamics['Order_affiliate_lastname'] = '';
        $arrOpencartDynamics['Order_commission'] = '';
        $arrOpencartDynamics['Order_language_id'] = '';
        $arrOpencartDynamics['Order_language_code'] = '';
        $arrOpencartDynamics['Order_language_filename'] = '';
        $arrOpencartDynamics['Order_language_directory'] = '';
        $arrOpencartDynamics['Order_currency_id'] = '';
        $arrOpencartDynamics['Order_currency_code'] = '';
        $arrOpencartDynamics['Order_currency_value'] = '';
        $arrOpencartDynamics['Order_ip'] = '';
        $arrOpencartDynamics['Order_forwarded_ip'] = '';
        $arrOpencartDynamics['Order_user_agent'] = '';
        $arrOpencartDynamics['Order_accept_language'] = '';
        $arrOpencartDynamics['Order_date_added'] = 'created';
        $arrOpencartDynamics['Order_date_modified'] = 'created';
        $arrOpencartDynamics['Order_shipping_cost'] = '';
        $arrOpencartDynamics['Product_order_product_id'] = '';
        $arrOpencartDynamics['Product_order_id'] = 'agenda_id';
        $arrOpencartDynamics['Product_product_id'] = '';
        $arrOpencartDynamics['Product_name'] = '';
        $arrOpencartDynamics['Product_model'] = '';
        $arrOpencartDynamics['Product_quantity'] = '';
        $arrOpencartDynamics['Product_price'] = '';
        $arrOpencartDynamics['Product_cost'] = '';
        $arrOpencartDynamics['Product_total'] = '';
        $arrOpencartDynamics['Product_tax'] = '';
        $arrOpencartDynamics['Product_reward'] = '';
        $arrOpencartDynamics['Product_loja'] = '';
        $arrOpencartDynamics['Product_desconto'] = '';
        $arrOpencartDynamics['Option_Name'] = '';
        $arrOpencartDynamics['Option_Value'] = '';
        $arrOpencartDynamics['placa'] = 'placa';
        $arrOpencartDynamics['placa_uf'] = 'placa_uf';
        $arrOpencartDynamics['placa_cidade'] = 'placa_cidade';
        $arrOpencartDynamics['vencimento_cnh'] = 'vencimento_cnh';
        $arrOpencartDynamics['vencimento_seguro'] = 'vencimento_seguro';
        $arrOpencartDynamics['km_atual'] = 'km_atual';
        $arrOpencartDynamics['km_dia'] = 'km_dia';
        $arrOpencartDynamics['km_ultima_revisao'] = 'km_ultima_revisao';
        $arrOpencartDynamics['dt_ultima_revisao'] = 'dt_ultima_revisao';

        foreach ($arrOpencartDynamics as $strField => $strValue) {

            switch ($strField) {
                case 'Order_firstname':
                case 'Order_payment_firstname':
                case 'Order_shipping_firstname':

                    $arrNome = explode(' ', $arrRow[$strValue]);
                    $arrNome = array_slice($arrNome, 0, count($arrNome)-1);
                    $arrReturn[$strField] = encodeToExcel(implode(' ', $arrNome));
                    break;

                case 'Order_lastname':
                case 'Order_payment_lastname':
                case 'Order_shipping_lastname':

                    $arrName = explode(' ', $arrRow[$strValue]);
                    $arrReturn[$strField] = encodeToExcel($arrName[count($arrName) - 1]);
                    break;

                case 'Order_data_nascimento':
                case 'Order_date_added':
                case 'Order_date_modified':
                case 'vencimento_cnh':
                case 'vencimento_seguro':
                case 'dt_ultima_revisao':

                    $arrReturn[$strField] = !empty($arrRow[$strValue]) ? date('d/m/Y', $arrRow[$strValue]) : null;
                    break;

                case 'Option_Name':

                    $arrReturn[$strField] = encodeToExcel('Área de Circulação do Veículo|Renavam do veículo 1');
                    break;

                case 'Option_Value':

                    $arrReturn[$strField] = encodeToExcel($arrRow['regiao_circulacao']) . '|' . $arrRow['renavam'];
                    break;

                case 'Product_name':

                    $arrReturn[$strField] = encodeToExcel('Agenda Grátis');
                    break;

                case 'Product_model':

                    $arrReturn[$strField] = 'wca-025';
                    break;

                case 'Product_order_product_id':

                    $arrReturn[$strField] = '375';
                    break;

                case 'Product_product_id':

                    $arrReturn[$strField] = '152';
                    break;

                case 'Product_quantity':
                case 'Product_total':

                    $arrReturn[$strField] = '1';
                    break;

                case 'Product_price':
                case 'Product_cost':
                case 'Product_tax':
                case 'Product_reward':
                case 'Product_loja':
                case 'Product_desconto':

                    $arrReturn[$strField] = '0';
                    break;

                default:

                    $arrReturn[$strField] = encodeToExcel($arrRow[$strValue]);
                    break;
            }
        }

        return $arrReturn;
    }
}

function encodeToExcel($string) {

    return mb_convert_encoding($string, 'UTF-16LE', 'UTF-8');
}

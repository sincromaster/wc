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
    
    // Define as mensagens
    if (isset($_SESSION['error'])) {

        $this->data['error_warning'] = $_SESSION['error'];
        unset($_SESSION['error']);
    } else {

        $this->data['error_warning'] = '';
    }
    
    // Define as mensagens
    if (isset($_SESSION['success'])) {

        $this->data['success'] = $_SESSION['success'];
        unset($_SESSION['success']);
    } else {

        $this->data['success'] = '';
    }

    $this->document->addScript('catalog/view/javascript/jquery.maskedinput-1.3.min.js');
    $this->document->addScript('catalog/view/javascript/agenda.js');
    $this->document->addStyle('catalog/view/theme/default/stylesheet/agenda/agenda.css');

    $this->load->model('agenda/agenda');
    
    $arrTexts = $this->model_agenda_agenda->getTexts();
    
    $this->data['text_cabecalho'] = $arrTexts['agenda_campo_cabecalho'];
    $this->data['text_rodape'] = $arrTexts['agenda_campo_rodape'];
    
    $this->data['form']['action'] = $this->url->link('agenda/agenda/save');
    
    // Define as mensagens
    if (isset($_SESSION['fields'])) {

        $this->data['fields'] = $_SESSION['fields'];
        unset($_SESSION['fields']);
    } else {

        $this->data['fields'] = '';
    }

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

  //router para receber as informaçoes e salvar
  public function save() {

    $this->load->model('agenda/agenda');

    $arrPost = $this->request->post;

    //validamos o nome
    if (!empty($arrPost['nome'])) {
      $dados['nome'] = utf8_decode($arrPost['nome']);
    } else {
      $error['nome'] = "Nome obrigatório.";
    }

    //valida cpf e cnpj
    if (!empty($arrPost['cpf_cnpj'])) {

      //removemos todos os caracteres
      $numeros = preg_replace("/[^0-9]/", "", $arrPost['cpf_cnpj']);

      //validamos o cnpj
      if (strlen($numeros) > 11 && $cnpj = $this->validaCnpj($numeros)) {

        $cnpj = ($cnpj != FALSE) ? $cnpj : 0;

        //validamos o cpf
      } elseif (strlen($numeros) <= 11 && $cpf = $this->validaCpf($numeros)) {

        $cpf = ($cpf != FALSE) ? $cpf : 0;
      } else {
        $error['cpf_cnpj'] = "CPF ou CNPJ inválido";
      }
      $dados['cpf'] = ($cpf != FALSE) ? $cpf : 0;
      $dados['cnpj'] = ($cnpj != FALSE) ? $cnpj : 0;
    } else {
      $error['cpf_cnpj'] = "CPF ou CNPJ obrigatório.";
    }

    //validamos o e-mail
    if (!empty($arrPost['email'])) {
        if(filter_var($arrPost['email'], FILTER_VALIDATE_EMAIL)) {

            $dados['email'] = utf8_decode($arrPost['email']);
        } else {
            
            $error['email'] = "E-mail inválido";
        }
    } else {
      $error['email'] = "E-mail obrigatório.";
    }

    //validações do telefone
    if (!empty($arrPost['telefone'])) {

      //deixa somente os numeros
      $telefone = preg_replace("/[^0-9]/", "", $arrPost['telefone']);

      if (strlen($telefone) <= 11) {

        //montamos os dados de ddd e telefone
        $dados['ddd'] = substr($telefone, 0, 2);
        $dados['telefone'] = substr($telefone, 2);
      } else {
        $error['telefone'] = "Telefone inválido";
      }
    } else {
        
        $error['telefone'] = "Telefone obrigatório.";
    }

    //validacao de endereco
    if (!empty($arrPost['endereco'])) {
      $dados['endereco'] = utf8_decode($arrPost['endereco']);
    } else {
      $error['endereco'] = "Endereço obrigatório.";
    }

    //validamos numero do endereco
    if (!empty($arrPost['numero'])) {
      $dados['endereco_numero'] = preg_replace("/[^0-9]/", "", $arrPost['numero']);
    } else {
      $error['numero'] = "Número obrigatório.";
    }

    $dados['complemento'] = $arrPost['complemento'];
    
    //validamos cep do endereco
    if (!empty($arrPost['cep'])) {

      //somente numeros
      $cep = preg_replace("/[^0-9]/", "", $arrPost['cep']);

      if (strlen($cep) <= 8) {
        $dados['endereco_cep'] = $cep;
      } else {
        $error['cep'] = "CEP inválido";
      }
    } else {
      $error['cep'] = "CEP obrigatório.";
    }

    //Validamos a placa
    if (!empty($arrPost['placa'])) {
      $dados['placa'] = utf8_decode($arrPost['placa']);
    } else {
      $error['placa'] = "Placa obrigatório.";
    }

    //validamos o UF da Placa
    if (!empty($arrPost['uf'])) {
      $dados['placa_uf'] = utf8_decode($arrPost['uf']);
    } else {
      $error['uf'] = "Placa UF obrigatório.";
    }

    //validamos o cidade da Placa
    if (!empty($arrPost['cidade'])) {
      $dados['placa_cidade'] = utf8_decode($arrPost['cidade']);
    } else {
      $error['cidade'] = "Placa cidade obrigatório.";
    }

    //validamos o vencimento da cnh 
    if (!empty($arrPost['cnh'])) {

      //convertemos o / para - para poder montar o timestamp
      list($day_cnh, $month_cnh, $year_cnh) = explode('/', $arrPost['cnh']);
      $cnh = mktime(0, 0, 0, $month_cnh, $day_cnh, $year_cnh);

      $dados['vencimento_cnh'] = $cnh;
    } else {
      $error['cnh'] = "Vencimento CNH obrigatório.";
    }

    if(!empty($arrPost['vctoSeguro'])) { 
        $dados['renavam'] = $arrPost['renavam'];
    } else {
        
        $dados['renavam'] = 0;
    }

    //convertemos o / para - para poder montar o timestamp
    if(!empty($arrPost['vctoSeguro'])) { 
        list($day_vctoseguro, $month_vctoseguro, $year_vctoseguro) = explode('/', $arrPost['vctoSeguro']);
        $vctoSeguro = mktime(0, 0, 0, $month_vctoseguro, $day_vctoseguro, $year_vctoseguro);
        $dados['vencimento_seguro'] = $vctoSeguro;
    } else {
        
        $dados['vencimento_seguro'] = 0;
    }

    //convertemos o / para - para poder montar o timestamp
    if(!empty($arrPost['dtrevisao_l'])) { 
        list($day_dtrevisao, $month_dtrevisao, $year_dtrevisao) = explode('/', $arrPost['dtrevisao_l']);
        $dataRevisao = mktime(0, 0, 0, $month_dtrevisao, $day_dtrevisao, $year_dtrevisao);
        $dados['dt_ultima_revisao'] = $dataRevisao;
    } else {
        
        $dados['dt_ultima_revisao'] = 0;
    }

    $dados['km_atual'] = !empty($arrPost['kmatual']) ? preg_replace("/[^0-9]/", "", $arrPost['kmatual']) : 0;
    $dados['km_dia'] = !empty($arrPost['kmdia']) ? preg_replace("/[^0-9]/", "", $arrPost['kmdia']) : 0;
    $dados['km_ultima_revisao'] = !empty($arrPost['kmrevisao_l']) ? preg_replace("/[^0-9]/", "", $arrPost['kmrevisao_l']) : 0;
    
    //validamos a regiao
    if (!empty($arrPost['regiao'])) {
        
        $dados['regiao_circulacao'] = ($arrPost['regiao']);
    } else {
        $error['regiao'] = 'Região de circulação obrigatório.';
    }
    
    if (count($error) > 0) {
        $_SESSION['error'] = implode('<br />', $error);
        $_SESSION['fields'] = serialize($arrPost);
        $this->redirect($this->url->link('agenda/agenda'));
    }
    //enviamos os dados a model para poder salvar
    $return = $this->model_agenda_agenda->saveAgenda($dados);
    $this->agendaSendMail($dados['email']);
    
    if ($return) {
      $this->redirect($this->url->link('agenda/agenda'));
    }
  }

  /**
   * valida CPF
   * @param type $cpf
   * @return boolean
   */
  public function validaCpf($cpf) {

    // Clear the CPF
    $cpf = eregi_replace('[-\/.a-zA-Z]', '', trim($cpf));

    // Check if its not the forbidden combinations
    if (strlen($cpf) != 11 or $cpf == '00000000000' or
            $cpf == '11111111111' or $cpf == '22222222222' or
            $cpf == '33333333333' or $cpf == '44444444444' or
            $cpf == '55555555555' or $cpf == '66666666666' or
            $cpf == '77777777777' or $cpf == '88888888888' or
            $cpf == '99999999999') {
      return FALSE;
    }

    // Check the 11st and 12nd numbers
    for ($numbers = 9; $numbers <= 10; $numbers++) {
      $digit = 0;
      for ($i = 0; $i < $numbers; $i++) {
        $digit += $cpf{$i} * ($numbers + 1 - $i);
      }

      // Calculate the digit and check it
      $digit = 11 - ($digit % 11);
      if ($digit == 10 or $digit == 11) {
        $digit = 0;
      }
      if ($digit != $cpf{$numbers}) {
        return FALSE;
      }
    }

    return $cpf;
  }

  /**
   * Valida CNPJ
   * @param type $cnpj
   * @return boolean
   */
  public function validaCnpj($cnpj) {

    // Clear the CNPJ
    $cnpj = eregi_replace('[-\/.a-zA-Z]', '', trim($cnpj));

    // Check if its not the forbidden combinations
    if (strlen($cnpj) != 14 or $cnpj == '00000000000000' or
            $cnpj == '11111111111111' or $cnpj == '22222222222222' or
            $cnpj == '33333333333333' or $cnpj == '44444444444444' or
            $cnpj == '55555555555555' or $cnpj == '66666666666666' or
            $cnpj == '77777777777777' or $cnpj == '88888888888888' or
            $cnpj == '99999999999999') {
      return FALSE;
    } else {
      $i = 0;
      while ($i < 14) {
        $cnpj_d[$i] = substr($cnpj, $i, 1);
        $i++;
      }

      $digit = ($cnpj[0] * 5) + ($cnpj[1] * 4) + ($cnpj[2] * 3) + ($cnpj[3] * 2) +
              ($cnpj[4] * 9) + ($cnpj[5] * 8) + ($cnpj[6] * 7) + ($cnpj[7] * 6) +
              ($cnpj[8] * 5) + ($cnpj[9] * 4) + ($cnpj[10] * 3) + ($cnpj[11] * 2);

      // Calculate the digit and check it
      $digit = 11 - ($digit % 11);
      if ($digit == 10 or $digit == 11) {
        $digit = 0;
      }

      if ($digit != $cnpj{12}) {
        return FALSE;
      }

      $digit = ($cnpj[0] * 6) + ($cnpj[1] * 5) + ($cnpj[2] * 4) +
              ($cnpj[3] * 3) + ($cnpj[4] * 2) + ($cnpj[5] * 9) + ($cnpj[6] * 8) +
              ($cnpj[7] * 7) + ($cnpj[8] * 6) + ($cnpj[9] * 5) + ($cnpj[10] * 4) +
              ($cnpj[11] * 3) + ($digit * 2);

      // Calculate the digit and check it
      $digit = 11 - ($digit % 11);
      if ($digit == 10 or $digit == 11) {
        $digit = 0;
      }

      if ($digit != $cnpj{13}) {
        return FALSE;
      }

      return $cnpj;
    }
  }

  /**
   * função responsavel pelo envio de e-mail
   * @param type $email
   */
  public function agendaSendMail($email) {

    //adiciona classe phpmailer
    require_once("PHPMailer/class.phpmailer.php");

    $message = "<table width='320px' style='color:#22355d'>";
    $message .= "<tr><td><img src='http://wecareauto.com.br/image/logo-cabecalho.jpg' /></td></tr>";
    $message .= "<tr>
                  <td>
                    <br /><br />
                    <p>Olá,</p>
                    <p>
                      Este e-mail é uma confirmação da sua inscrição na <b>Agenda Grátis WeCare Auto.</b><br />
                      Desde já agradecemos a sua participação e interesse em nossos serviços.<br />
                      Em breve um de nossos Especialistas entrará em contato para colher as informações 
                      complementares necessárias para geração completa da Agenda do Automóvel.<br />
                      <b><p>Atenciosamente,<br />Equipe WeCare Auto.</></b>
                      <p><a href='http://www.wecareauto.com.br'>www.wecareauto.com.br</a><br />
                      Mais cuidado para o seu carro. Mais tempo pra você.
                    </p>
                   </td>
                  </tr>";
    $message .="</table>";
    $message = utf8_decode($message);

    //envio de email
    $mail = new PHPMailer();

    // utilizamos o envio smtp para envitar que o email seje considerado um spam
//    $mail->IsSMTP();

    //credenciais de acesso para enviar via SMTP
//    $mail->Host = 'smtp.office365.com';
//    $mail->SMTPAuth = true;
//    $mail->Username = 'admin@wecareauto.com.br';
//    $mail->Password = 'amilwecare';
//    $mail->SMTPSecure = 'tls';

    //remetente
    $mail->From = 'admin@wecareauto.com.br';
    $mail->FromName = 'Wecare';

    //destinatario
    $mail->AddAddress($email, $email);

    //dados do e-mail
    $mail->IsHTML(TRUE);
    $mail->CharSet = 'iso-8859-1';

    $mail->Subject = "Wecare - Agenda";
    $mail->Body = $message;

    //validamos se o envio de e-mail foi realizado
    $envio = $mail->Send();
    if (!$envio) {
      echo "E-mail não enviado.<br>";
      echo "Mensagem de erro: " . var_dump($mail->ErrorInfo);
      exit;
    } else {
//        $_SESSION['success'] .= '<br />E-mail enviado com sucesso.';
    }
  }

}

?>
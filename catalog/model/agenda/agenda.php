<?php

class ModelAgendaAgenda extends Model {

  public function saveAgenda($data) {
       $result = $this->db->query("INSERT INTO " . DB_PREFIX . "agenda_gratis
      (
        nome,
        cpf,
        cnpj,
        email,
        ddd,
        telefone,
        endereco,
        endereco_numero,
        endereco_complemento,
        endereco_cep,
        placa,
        placa_uf,
        placa_cidade,
        vencimento_cnh,
        renavam,
        vencimento_seguro,
        km_atual,
        km_dia,
        km_ultima_revisao,
        regiao_circulacao,
        dt_ultima_revisao,
        created
      ) VALUES (
        '".utf8_encode($data['nome'])."',
        ".$data['cpf'].",
        ".$data['cnpj'].",
        '".utf8_encode($data['email'])."',
        ".$data['ddd'].",
        ".$data['telefone'].",
        '".utf8_encode($data['endereco'])."',
        '".$data['endereco_numero']."',
        '".utf8_encode($data['endereco_complemento'])."',
        ".$data['endereco_cep'].",
        '".$data['placa']."',
        '".utf8_encode($data['placa_uf'])."',
        '".utf8_encode($data['placa_cidade'])."',
        ".$data['vencimento_cnh'].",
        ".$data['renavam'].",
        ".$data['vencimento_seguro'].",
        ".$data['km_atual'].",
        ".$data['km_dia'].",
        ".$data['km_ultima_revisao'].",
        '".$data['regiao_circulacao']."',
        '".$data['dt_ultima_revisao']."',
        '".time()."'
      )"
    );
    
    $_SESSION['success'] = 'Cadastro realizado com sucesso.';
    
    return $result;
  }
  
  public function getTexts() {
      
      $strSQL = 'SELECT ' . DB_PREFIX . 'setting.key, ' . DB_PREFIX . 'setting.value FROM ' . DB_PREFIX . 'setting WHERE ' . DB_PREFIX . 'setting.key IN("agenda_campo_cabecalho", "agenda_campo_rodape")';

      $arrReturn = array();
      
      foreach($this->db->query($strSQL)->rows as $row) {
          $arrReturn[$row['key']] = $row['value'];
      }
      
      return $arrReturn;
  }
}
?>
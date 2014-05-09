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
        '".mysql_real_escape_string(utf8_encode($data['nome']))."',
        ".mysql_real_escape_string($data['cpf']).",
        ".mysql_real_escape_string($data['cnpj']).",
        '".mysql_real_escape_string(utf8_encode($data['email']))."',
        ".mysql_real_escape_string($data['ddd']).",
        ".mysql_real_escape_string($data['telefone']).",
        '".mysql_real_escape_string(utf8_encode($data['endereco']))."',
        '".mysql_real_escape_string($data['endereco_numero'])."',
        '".mysql_real_escape_string(utf8_encode($data['endereco_complemento']))."',
        ".mysql_real_escape_string($data['endereco_cep']).",
        '".mysql_real_escape_string($data['placa'])."',
        '".mysql_real_escape_string(utf8_encode($data['placa_uf']))."',
        '".mysql_real_escape_string(utf8_encode($data['placa_cidade']))."',
        ".mysql_real_escape_string($data['vencimento_cnh']).",
        ".mysql_real_escape_string($data['renavam']).",
        ".mysql_real_escape_string($data['vencimento_seguro']).",
        ".mysql_real_escape_string($data['km_atual']).",
        ".mysql_real_escape_string($data['km_dia']).",
        ".mysql_real_escape_string($data['km_ultima_revisao']).",
        '".mysql_real_escape_string($data['regiao_circulacao'])."',
        '".mysql_real_escape_string($data['dt_ultima_revisao'])."',
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

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
        renavan,
        vencimento_seguro,
        km_atual,
        km_dia,
        km_ultima_revisao,
        regiao_circulacao,
        tipo_de_veiculo,
        created
      ) VALUES (
        '".utf8_encode($data['nome'])."',
        ".utf8_encode($data['cpf']).",
        ".utf8_encode($data['cnpj']).",
        '".utf8_encode($data['email'])."',
        ".utf8_encode($data['ddd']).",
        ".utf8_encode($data['telefone']).",
        '".utf8_encode($data['endereco'])."',
        '".utf8_encode($data['endereco_numero'])."',
        '".utf8_encode($data['endereco_complemento'])."',
        ".utf8_encode($data['endereco_cep']).",
        '".utf8_encode($data['placa'])."',
        '".utf8_encode($data['placa_uf'])."',
        '".utf8_encode($data['placa_cidade'])."',
        ".utf8_encode($data['vencimento_cnh']).",
        ".utf8_encode($data['renavan']).",
        ".utf8_encode($data['vencimento_seguro']).",
        ".utf8_encode($data['km_atual']).",
        ".utf8_encode($data['km_dia']).",
        ".utf8_encode($data['km_ultima_revisao']).",
        '".utf8_encode($data['regiao_circulacao'])."',
        '".utf8_encode($data['tipo_de_veiculo'])."',
        '".time()."'
      )"
    );
    
    $_SESSION['success'] = 'Registro inserido com sucesso.';
    
    return $result;
  }
  
  

}
?>
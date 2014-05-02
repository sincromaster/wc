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
        '".$data['nome']."',
        ".$data['cpf'].",
        ".$data['cnpj'].",
        '".$data['email']."',
        ".$data['ddd'].",
        ".$data['telefone'].",
        '".$data['endereco']."',
        '".$data['endereco_numero']."',
        '".$data['endereco_complemento']."',
        ".$data['endereco_cep'].",
        '".$data['placa']."',
        '".$data['placa_uf']."',
        '".$data['placa_cidade']."',
        ".$data['vencimento_cnh'].",
        ".$data['renavan'].",
        ".$data['vencimento_seguro'].",
        ".$data['km_atual'].",
        ".$data['km_dia'].",
        ".$data['km_ultima_revisao'].",
        '".$data['regiao_circulacao']."',
        '".$data['tipo_de_veiculo']."',
        '".time()."'
      )"
    );
    
    $_SESSION['success'] = 'Registro inserido com sucesso.';
    
    return $result;
  }
  
  

}
?>
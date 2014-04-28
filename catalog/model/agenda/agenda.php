<?php

class ModelAgendaAgenda extends Model {

  public function saveAgenda($data) {
    
    var_dump($data);exit;

    $this->db->query("INSERT INTO oc_agenda_gratis
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
        tipo_de_veiculo     
        
      ) VALUES (
        ".$data['adasdasd']."

      )"
    );
  }

}
?>
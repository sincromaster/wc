<?php

class ModelSubstoresInstall extends Model {

  public function install() {

    $tabela_agenda = '
      CREATE TABLE oc_agenda_gratis (
        agenda_id        INT              NOT NULL,
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

        PRIMARY KEY (agenda_id))
        ';

    $this->db->query($tabela_agenda);
  }

  public function uninstall() {
    $this->db->query('DROP TABLE oc_agenda_gratis');
  }

}
?>

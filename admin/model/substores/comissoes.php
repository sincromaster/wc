<?php

class ModelSubstoresComissoes extends Model {
    
    public function getSubstoreComissoes($comissao_id) {
      
        $where = isset($comissao_id) ? " WHERE scr.comissao_id = ".$comissao_id : '';
        
        $strSQL = 'SELECT * FROM ' . DB_PREFIX . 'store_comissao_revenda AS scr
                   INNER JOIN oc_store_revenda AS sr ON sr.revenda_id = scr.revenda_id
                   INNER JOIN oc_store AS s ON s.store_id = scr.store_id
                  '. $where;
        $objResult = $this->db->query($strSQL);
        
        return $objResult->rows;
    }
    
    public function insertSubstoreComissoes() {
      
       //TODO montar insert
        return $objResult->rows;
    }
    
    
}
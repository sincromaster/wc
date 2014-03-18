<?php

class ModelSubstoresComissoes extends Model {
    
    public function getRevendas($store_id) {
      
        $where = isset($store_id) ? " WHERE scr.store_id = ".$store_id : '';
        
        $strSQL = 'SELECT * FROM ' . DB_PREFIX . 'store_revenda sr
                   INNER JOIN ' . DB_PREFIX . 'store_comissao_revenda AS scr ON sr.revenda_id = scr.revenda_id
                  '. $where;
        $objResult = $this->db->query($strSQL);
        
        return $objResult->rows;
    }
    
    public function insertSubstoreComissoes() {
      
       //TODO montar insert
        return $objResult->rows;
    }
    
    
}
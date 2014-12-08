<?php

class ModelSubstoresSubstore extends Model {
    
    public function getSubstores($arrWhere = array()) {
        
        $strSQL = 'SELECT * FROM ' . DB_PREFIX . 'store';
        if (count($arrWhere)) {
            $list = array();
            foreach($arrWhere as $key => $item) {
                $condition = $key .' = '. $item;
                array_push($list, $condition);
            }
            
            $strSQL .= ' WHERE '. implode('AND', $list);
        }
        
        $objResult = $this->db->query($strSQL);
        
        return $objResult->rows;
    }
}

?>
<?php

class ModelAgendaAgenda extends Model {
    
    public function getCadastros($initialDate, $endDate) {
        
        $strSQL = 'SELECT * FROM ' . DB_PREFIX . 'agenda_gratis WHERE created BETWEEN ' . $initialDate . ' AND ' . $endDate;

        return $this->db->query($strSQL)->rows;
    }
}
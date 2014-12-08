<?php

class ModelAgendaAgenda extends Model {

    public function getCadastros($initialDate, $endDate) {

        $strSQL = 'SELECT * FROM ' . DB_PREFIX . 'agenda_gratis WHERE created BETWEEN ' . $initialDate . ' AND ' . $endDate;

        $objResult = $this->db->query($strSQL);

        return $objResult->rows;
    }

    public function getField($field_name) {

        $strSQL = 'SELECT value FROM ' . DB_PREFIX . 'setting WHERE ' . DB_PREFIX . 'setting.key = "' . $field_name . '"';

        return $this->db->query($strSQL)->row['value'];
    }

    public function setField($field_name, $value) {

        $oldValue = $this->getField($field_name);

        if (!empty($oldValue)) {

            $strSQL = 'UPDATE ' . DB_PREFIX . 'setting SET ' . DB_PREFIX . 'setting.value = "' . $value . '" WHERE ' . DB_PREFIX . 'setting.key = "' . $field_name . '"';
        } else {

            $strSQL = 'INSERT INTO ' . DB_PREFIX . 'setting (' . DB_PREFIX . 'setting.store_id, ' . DB_PREFIX . 'setting.group, ' . DB_PREFIX . 'setting.key, ' . DB_PREFIX . 'setting.value, ' . DB_PREFIX . 'setting.serialized) '
                    . 'VALUES (0, "agenda", "' . $field_name . '", "' . $value . '", 0)';
        }

        return $this->db->query($strSQL);
    }

}

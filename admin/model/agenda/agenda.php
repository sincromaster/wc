<?php

class ModelAgendaAgenda extends Model {

    public function getCadastros($initialDate, $endDate) {

        $strSQL = 'SELECT * FROM ' . DB_PREFIX . 'agenda_gratis WHERE created BETWEEN ' . $initialDate . ' AND ' . $endDate;

        $objResult = $this->db->query($strSQL);
        $arrReturn = array();

        $i = 0;
        foreach ($objResult->rows as $row) {
            foreach ($row as $key => $value) {

                $newKey = null;
                switch ($key) {

                    case 'nome':
                        $newKey = 'Order_customer';
                        break;
                    case 'cpf':
                        $newKey = 'Order_cpf';
                        break;
                    case 'cnpj':
                        $newKey = 'Order_cnpj';
                        break;
                    case 'email':
                        $newKey = 'Order_email';
                        break;
                    case 'ddd':
                        $newKey = 'Order_ddd';
                        break;
                    case 'telefone':
                        $newKey = 'Order_telephone';
                        break;
                    case 'endereco':
                        $newKey = 'Order_shipping_address_1';
                        break;
                    case 'endereco_numero':
                        $newKey = 'Order_shipping_numero';
                        break;
                    case 'endereco_complemento':
                        $newKey = 'Order_shipping_complemento';
                        break;
                    case 'endereco_cep':
                        $newKey = 'Order_shipping_postcode';
                        break;
                    case 'created':
                        $newKey = 'Order_date_added';
                        $value = date('d/m/Y', $value);
                        break;
                    case 'dt_ultima_revisao':
                    case 'vencimento_seguro':
                    case 'vencimento_cnh':
                        $value = date('d/m/Y', $value);
                        break;
                    default:
                        $newKey = $key;
                        break;
                }

                $arrReturn[$i][$newKey] = $value;
            }
            $i++;
        }

        return $arrReturn;
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

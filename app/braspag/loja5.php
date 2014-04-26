<?php
function HTMLPedidos($pedido){
$lista_de_status_braspag = array(0=>'Pagamento confirmado',1=>'Pagamento Autorizado',2=>'Negado, vai tentar novamente',3=>'Negado, nao agendar retentativa',4=>'Negado, nao tentar novamente',5=>'Negado, nao tentar novamente, pedido desabilitado',6=>'Aguardando resposta',7=>'Desqualificado',8=>'Erro interno');
$html = '';
$itens = ItensPedidoBrasPag($pedido);
$html .= '<table border="1">';
$html .= '<tr><td><b>Fatura/Pedido</b></td><td><b>Pago</b></td><td><b>Status</b></td><td><b>Prox/Debito</b></td><td><b>Valor</b></td><td><b>Detalhes</b></td></tr>';
foreach($itens AS $linha){
$html .= '<tr><td>#'.$linha['numPag'].'/'.$linha['idPedido'].'</td><td>'.$linha['pago'].'</td><td>'.$lista_de_status_braspag[$linha['statusPagamento']].'</td><td>'.$linha['dataDebito'].'</td><td>'.number_format($linha['valorPago'], 2, '.', '').'</td><td>'.$linha['dadosPag'].'</td></tr>';
}
$html .= '</table>';
return $html;
}
function UltimoCronBraspag(){
global $db;
$query = $db->query("SELECT * FROM `braspag_cron` ORDER BY id DESC LIMIT 1");
return $query->row;
}
$dados_cron = @UltimoCronBraspag();
function TotalPedidoBrasPag($pedido){
global $db;
$query = $db->query("SELECT * FROM `".DB_PREFIX."order` WHERE `order_id` = '".(int)$pedido."' LIMIT 1");
return $query->row;
}
function DetalhesItemBrasPag($pedido,$item){
global $db;
$query = $db->query("SELECT * FROM `braspag_itens` WHERE `idPedido` = '".(int)$pedido."' AND `numPag` = '".$item."' LIMIT 1");
return $query->row;
}
function ItensPedidoBrasPag($pedido){
global $db;
$query = $db->query("SELECT * FROM `braspag_itens` WHERE `idPedido` = '".(int)$pedido."';");
return $query->rows;
}
function DetalhesPedidoBrasPag($pedido){
global $db;
$query = $db->query("SELECT * FROM `braspag_pedidos` WHERE `idPedido` = '".(int)$pedido."' LIMIT 1");
return $query->row;
}
function BraspagTipo($amb){
if($amb=='1'){
return 'https://homologacao.pagador.com.br/webservice/Recorrente.asmx?wsdl';
}else{
return 'https://transaction.pagador.com.br/webservice/Recorrente.asmx?wsdl';
}
}
function SomarDatas($data, $dias, $meses, $ano){
  $data = explode("/", $data);
  $resData = date("d/m/Y", mktime(0, 0, 0, $data[1] + $meses, $data[0] + $dias, $data[2] + $ano));
  return $resData;
}
?>
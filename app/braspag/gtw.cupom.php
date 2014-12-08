<?php
//chama os dados
include("dados.php");
include("loja5.php");
//verificador 01
if(!isset($_GET['token'])){
echo "Ops, retorno invalido!";
exit;
}
if(isset($_GET['token'])){
$numero_do_pedido = base64_decode($_GET['token']);
$query = $db->query("SELECT * FROM `".DB_PREFIX."order_cielo` WHERE idOrder ='".$numero_do_pedido."'");
$dados = $query->row;
?>
<script>
window.resizeTo(770,550);
location.href = '../../index.php?route=payment/buypagecieloloja5/ver_cupom&token=<?php echo $_GET['token'];?>&session=<?php echo base64_encode($dados['tidCielo']);?>&hash=<?php echo md5($dados['tidCielo']);?>';
</script>
<?php
}
?>

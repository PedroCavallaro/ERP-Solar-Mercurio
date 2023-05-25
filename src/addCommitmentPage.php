<?php

include_once "../src/server.php";

//try{

    $codPedido = filter_input(INPUT_POST, "cod-pedido", FILTER_SANITIZE_SPECIAL_CHARS);
    $supplier = filter_input(INPUT_POST, "supplier", FILTER_SANITIZE_SPECIAL_CHARS);
    $valor = filter_input(INPUT_POST, "valor", FILTER_SANITIZE_SPECIAL_CHARS);
    $dtVencimento = filter_input(INPUT_POST, "dt-vencimento", FILTER_SANITIZE_SPECIAL_CHARS);
    $valorPago = filter_input(INPUT_POST, "valor-pago", FILTER_SANITIZE_SPECIAL_CHARS);
    $dtPagamento = filter_input(INPUT_POST, "dt-pagamento", FILTER_SANITIZE_SPECIAL_CHARS);
    $tipoCompromisso = filter_input(INPUT_POST, "tipo-compromisso", FILTER_SANITIZE_SPECIAL_CHARS);
    $observacoes = filter_input(INPUT_POST, "observacoes", FILTER_SANITIZE_SPECIAL_CHARS);

    $bd = connect();
    
    $sql = 'INSERT INTO compromissos(cd_pedido, id_fornecedor, nr_valor, dt_vencimento, nr_valor_pago, dt_pagamento, id_tipo, ds_observacao) 
            VALUES ("' . $codPedido . '", ' . intval($supplier) . ', ' . floatval($valor) . ', "' . $dtVencimento . '",
            ' . floatval($valorPago) . ', "' . $dtPagamento . '", ' . intval($tipoCompromisso) . ', "' . $observacoes . '")';
    
    $bd->beginTransaction();
    $lines=$bd->exec($sql);
    
    if($lines == 1){
        $bd->commit();
    
    }else{
    
        $bd->rollBack();
    }

    //header("location:../views/commitments.php");
//}

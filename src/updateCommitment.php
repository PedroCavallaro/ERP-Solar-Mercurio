<?php
include_once "../src/server.php";

    $bd = connect();
    $id = $_GET["id"];
    $codPedido = filter_input(INPUT_POST, "cod-pedido", FILTER_SANITIZE_SPECIAL_CHARS);
    $supplier = filter_input(INPUT_POST, "supplier", FILTER_SANITIZE_SPECIAL_CHARS);
    $valor = filter_input(INPUT_POST, "valor", FILTER_SANITIZE_SPECIAL_CHARS);
    $dtVencimento=    $_POST["dt-vencimento"];
    $valorPago = filter_input(INPUT_POST, "valor-pago", FILTER_SANITIZE_SPECIAL_CHARS);
    $dtPagamento = filter_input(INPUT_POST, "dt-pagamento", FILTER_SANITIZE_SPECIAL_CHARS);
    $coomitmentType = filter_input(INPUT_POST, "coomitmentType", FILTER_SANITIZE_SPECIAL_CHARS);
    $observacoes = filter_input(INPUT_POST, "observacoes", FILTER_SANITIZE_SPECIAL_CHARS);

    $sql = "UPDATE `compromissos` SET 
                    `cd_pedido`='".$codPedido."',
                    `id_fornecedor`='".$supplier."',
                    `nr_valor`='".$valor."',
                    `dt_vencimento`='".$dtVencimento."',
                    `nr_valor_pago`='".$valorPago."',
                    `dt_pagamento`='".$dtPagamento."',
                    `id_tipo`='".$coomitmentType."',
                    `ds_observacao`='".$observacoes."' 
                    WHERE id_compromisso = $id";

    $bd->beginTransaction();
    
    $lines = $bd->exec($sql);

    if($lines == 1){
        $bd->commit();
    }else{
        $bd-> rollBack();
    }

    header("location:../views/editCommitment.php?id=$id");


?>
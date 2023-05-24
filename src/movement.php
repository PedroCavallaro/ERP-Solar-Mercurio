<?php

include_once "../src/server.php";
function getMovement(){
    $bd = connect();
    $sql = "SELECT c.cd_pedido,
    c.id_compromisso,
    b.nm_banco,
    s.ds_status,
    m.nr_movimentado,
    m.dt_movimentacao,
    co.nr_conta,
    tc.ds_conta
    FROM movimentacoes m
    LEFT JOIN compromissos c
        ON m.id_compromisso = c.id_compromisso
    LEFT JOIN contas_bancarias co
        ON m.id_conta = co.id_conta
    LEFT JOIN tipos_de_contas tc
        on co.id_tipo = tc.id_tipo_conta
    LEFT JOIN agencia a
        ON co.id_agencia = a.id_agencia
    LEFT JOIN bancos b
        ON b.id_banco = a.id_banco
    LEFT JOIN status_movimentacao s
        ON m.id_status = s.id_status";   
        
        
     $result = $bd->query($sql);           
     while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
        $valorPago = is_null($data["nr_movimentado"]) ? "-----" : "R$ " . $data["nr_movimentado"];
        $dataPaga = is_null($data["dt_movimentacao"]) ? "-----" : date("d/m/Y", strtotime($data["dt_movimentacao"]));
        $bankName = is_null($data["nm_banco"]) ? "-----" : date("d/m/Y", strtotime($data["nm_banco"]));
        echo "<tr>
                <td>".$data["id_compromisso"]."</td>
                <td>".$data["cd_pedido"]."</td>    
                <td>".validate($data["nr_conta"])."</td>
                <td>".validate($data["nm_banco"])."</td>
                <td>".validate($data["ds_conta"])."</td>
                <td>".$valorPago."</td>
                <td>".$dataPaga."</td>        
                <td>".$data["ds_status"]."</td>        
            </tr>";

     }
}

function validate($data){
    return is_null($data) ? "-----" : $data;
}

?>
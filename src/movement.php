<?php

include_once "../src/server.php";
function getMovement(){
    $bd = connect();
    $sql = "SELECT c.cd_pedido,
    b.nm_banco,
    s.ds_status,
    m.nr_movimentado,
    m.dt_movimentacao,
    co.nr_conta,
    tc.ds_conta
    FROM movimentacoes m
    INNER JOIN compromissos c
        ON m.id_compromisso = c.id_compromisso
    INNER JOIN contas_bancarias co
        ON m.id_conta = co.id_conta
        OR (m.id_conta is null) = co.id_conta
    INNER JOIN tipos_de_contas tc
        on co.id_tipo = tc.id_tipo_conta
    INNER JOIN agencia a
        ON co.id_agencia = a.id_agencia
    INNER JOIN bancos b
        ON b.id_banco = a.id_banco
    INNER JOIN status_movimentacao s
        ON m.id_status = s.id_status";   
        
        
     $result = $bd->query($sql);           
     while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
        $valorPago = is_null($data["nr_movimentado"]) ? "-----" : "R$ " . $data["nr_movimentado"];
        $dataPaga = is_null($data["dt_movimentacao"]) ? "-----" : date("d/m/Y", strtotime($data["dt_movimentacao"]));

        echo "<tr>
                <td>".$data["cd_pedido"]."</td>    
                <td>".$data["nr_conta"]."</td>
                <td>".$data["nm_banco"]."</td>
                <td>".$data["ds_conta"]."</td>
                <td>".$valorPago."</td>
                <td>".$dataPaga."</td>        
                <td>".$data["ds_status"]."</td>        
            </tr>";

     }
}


?>
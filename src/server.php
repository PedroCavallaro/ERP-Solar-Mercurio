<?php
function connect() {
    $dsn = "mysql:host=localhost;dbname=erp_solar";
    $username = "root";
    $password = "";
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
    return $conn;
}

function commitment() {
    $bd = connect();

    $sql = "SELECT c.cd_pedido,
                    f.nm_fornecedor,
                    c.nr_valor,
                    c.dt_vencimento,
                    c.nr_valor_pago
                    FROM compromissos c
                    INNER JOIN fornecedores f
                    WHERE c.id_fornecedor = f.id_fornecedor ";
    $result = $bd->query($sql);

    while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "
        <tr>
            <td>" . $data["cd_pedido"] . "</td>
            <td>" . $data["nm_fornecedor"] . "</td>
            <td>" . $data["nr_valor"] . "</td>
            <td>" . $data["cd_pedido"] . "</td>
            <td>" . status($data["nr_valor_pago"]) . "</td>
        </tr>";
    }
}

function commitmentFull() {
    $bd = connect();

    $sql = "SELECT c.cd_pedido, f.nm_fornecedor, c.nr_valor, c.dt_vencimento, c.nr_valor_pago, c.dt_pagamento, t.ds_tipo, c.ds_observacao
        FROM compromissos c INNER JOIN tipo_compromisso t ON
            c.id_tipo = t.id_tipo
        INNER JOIN fornecedores f ON
            c.id_fornecedor = f.id_fornecedor;";

    $result = $bd->query($sql);

    while ($data = $result->fetch(PDO::FETCH_ASSOC)) {

        $date = strtotime($data["dt_vencimento"]);

        $valorPago = is_null($data["nr_valor_pago"]) ? "-----" : "R$ " . $data["nr_valor_pago"];
        $dataPaga = is_null($data["dt_pagamento"]) ? "-----" : date("d/m/Y", strtotime($data["dt_pagamento"]));

        echo "
        <tr>
            <td>" . $data["cd_pedido"] . "</td>
            <td>" . $data["nm_fornecedor"] . "</td>
            <td>" . "R$ " . $data["nr_valor"] . "</td>
            <td>" . date("d/m/Y", $date) . "</td>
            <td>" . $valorPago . "</td>
            <td>" . $dataPaga    . "</td>
            <td>" . $data["ds_tipo"] . "</td>
            <td>" . status($data["nr_valor_pago"]) . "</td>
            <td>" . $data["ds_observacao"] . "</td>
        </tr>
        ";
    }
}

function status($data) {
    if ($data == null) {
        return "Pendente";
    } else {
        return "Pago";
    }
}

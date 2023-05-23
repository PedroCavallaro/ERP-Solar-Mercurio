<?php 
include_once "server.php";

function getBanks() {
    $bd = connect();

    $sql = "SELECT
                c.nr_conta,
                a.nr_agencia,
                b.nm_banco,
                t.ds_conta
            FROM
                contas_bancarias c
            INNER JOIN agencia a ON
                c.id_agencia = a.id_agencia
            INNER JOIN bancos b ON
                a.id_banco = b.id_banco
            INNER JOIN tipos_de_contas t ON
                c.id_tipo = t.id_tipo_conta";

    $result = $bd->query($sql);

    while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
        $agencia = str_pad($data["nr_agencia"], 4, "0", STR_PAD_LEFT);

        echo "
            <tr>
                <td>" . $data["nr_conta"] . "</td>
                <td>" . $agencia . "</td>
                <td>" . $data["nm_banco"] . "</td>
                <td>" . $data["ds_conta"] . "</td>
                <td>
                    <div class='actions-buttons'>
                        <a id='edit-button' href='#'><input type='button' value='Editar'></a>
                        <a id='del-button' href='#'><input type='button' value='Excluir'></a>
                    </div>
                </td>
            </tr>
        ";
    }
}

function getBankNames() {
    $bd = connect();

    $sql = "SELECT id_banco, nm_banco FROM bancos";

    $result = $bd->query($sql);

    while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
        
        echo "
            <option value=" . $data["id_banco"] . ">" . $data["nm_banco"] . "</option>
        ";
    }
}

function getTypes() {
    $bd = connect();

    $sql = "SELECT id_tipo_conta, ds_conta FROM tipos_de_contas";

    $result = $bd->query($sql);

    while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
        
        echo "
            <option value=" . $data["id_tipo_conta"] . ">" . $data["ds_conta"] . "</option>
        ";
    }
}
?>
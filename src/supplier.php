<?php
include_once "../src/server.php";
function getSuppliers() {
    $bd = connect();

    $sql = "SELECT nm_fornecedor,
                    nr_cnpj,
                    ds_email,
                    nr_contato
                    FROM fornecedores";
    $result = $bd->query($sql);

    while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "
        <tr>
            <td>" . $data["nm_fornecedor"] . "</td>
            <td>" . $data["nr_cnpj"] . "</td>
            <td>" . $data["ds_email"] . "</td>
            <td>" . $data["nr_contato"] . "</td>
            <td> <a>Editar</a>
                <a>Excluir</a>". "</td>
        </tr>";
    }
}




?>
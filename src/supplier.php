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
        $cnpj = sprintf(
            '%d%d.%d%d%d.%d%d%d/%d%d%d-%d%d',
            ...str_split($data["nr_cnpj"])
        );

        $telefone = sprintf(
            '(%d%d) %d%d%d%d%d-%d%d%d%d',
            ...str_split($data["nr_contato"])
        );

        echo "
        <tr>
            <td>" . $data["nm_fornecedor"] . "</td>
            <td>" . $cnpj . "</td>
            <td>" . $data["ds_email"] . "</td>
            <td>" . $telefone . "</td>
            <td> <a>Editar</a>
                <a>Excluir</a>". "</td>
        </tr>";
    }
}




?>
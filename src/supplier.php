<?php
include_once "../src/server.php";
function getSuppliers() {
    $bd = connect();

    $sql = "SELECT id_fornecedor,
                    nm_fornecedor,
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
            <td>" .$telefone . "</td>
            <td> <a href='editSupplierPage.php?id=".$data["id_fornecedor"]."'>Editar</a>
            
        </tr>";
    }
}
function renderCities(){
    $bd = connect();
    $sql2 = "SELECT * FROM cidades";
    $result2=$bd->query($sql2);
    $html = "";
    
    while($data = $result2->fetch(PDO::FETCH_ASSOC)){
        $html = $html."<option value='".$data["id_cidade"]."'>".$data["ds_cidade"]."</option>";
    }
    return $html;
}



?>
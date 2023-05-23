<?php

include_once "../src/server.php";

function SupplierOptions(){
    $bd = connect();
    $sql = "SELECT nm_fornecedor,
                    id_fornecedor
                FROM fornecedores";
    $result = $bd->query($sql);
    $html = "";
    while($data = $result->fetch(PDO::FETCH_ASSOC)){
        $html = $html."<option value='".$data["id_fornecedor"]."' >".$data["nm_fornecedor"]."</option>";
    }
    return $html;
} 

function CommitmentTypes(){
    $bd = connect();
    $sql = "SELECT ds_tipo,
                    id_tipo
                FROM tipo_compromisso";
    $result = $bd->query($sql);
    $html = "";
    while($data = $result->fetch(PDO::FETCH_ASSOC)){
        $html = $html."<option value='".$data["id_tipo"]."' >".$data["ds_tipo"]."</option>";
    }
    return $html;
}


?>
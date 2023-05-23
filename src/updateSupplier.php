<?php
include_once "../src/server.php";

try{
    $bd = connect();
    $supName = filter_input(INPUT_POST, "supName", FILTER_SANITIZE_SPECIAL_CHARS);
    $supCnpj = filter_input(INPUT_POST, "supCnpj", FILTER_SANITIZE_SPECIAL_CHARS);
    $nrContact = filter_input(INPUT_POST, "nrContact", FILTER_SANITIZE_SPECIAL_CHARS);
    $supEmail = filter_input(INPUT_POST, "supEmail", FILTER_SANITIZE_EMAIL);
    $supCep = filter_input(INPUT_POST, "supCep", FILTER_SANITIZE_NUMBER_INT);
    $supCity = filter_input(INPUT_POST, "supCity", FILTER_SANITIZE_SPECIAL_CHARS);
    $supLog = filter_input(INPUT_POST, "supLog", FILTER_SANITIZE_SPECIAL_CHARS);
    $supNeighbohood = filter_input(INPUT_POST, "supNeighbohood", FILTER_SANITIZE_SPECIAL_CHARS);
    $supNumber = filter_input(INPUT_POST, "supNumber", FILTER_SANITIZE_NUMBER_INT);
    $supExtra = filter_input(INPUT_POST, "supExtra", FILTER_SANITIZE_SPECIAL_CHARS);
    $id = $_GET["id"];
    $sql = "UPDATE fornecedores SET
                nm_fornecedor='".$supName."',
                nr_cnpj='".$supCnpj."',
                ds_email='".$supEmail."',
                nr_contato='".$nrContact."'
            WHERE id_fornecedor = ".$id.";"."
    UPDATE enderecos_fornecedor SET  ds_logradouro='".$supLog."',
        ds_bairro='".$supNeighbohood."',
        ds_complemento='".$supExtra."',
        nr_endereco='".$supNumber."',
        nr_cep ='".$supCep."',
        id_cidade='".$supCity."'
        WHERE id_fornecedor = ".$id.";";

$bd->beginTransaction();
$lines=$bd->exec($sql);

if($lines == 1){
    $bd->commit();
    header("location:../views/editSupplierPage.php?id=$id");
}else{  
    $bd->rollBack();
}
}catch(Exception){
    header("location:../views/editSupplierPage.php?id=$id&err=10283018230");
}
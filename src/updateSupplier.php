<?php
include_once "../src/server.php";

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

    $sql = "
    ALTER TABLE fornecedores DROP INDEX nr_cnpj;
    ALTER TABLE fornecedores DROP INDEX nr_contato;
    ALTER TABLE fornecedores DROP INDEX ds_email;
    UPDATE fornecedores SET
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
        WHERE id_fornecedor = ".$id.";
        ALTER TABLE fornecedores ADD UNIQUE (nr_cnpj);
        ALTER TABLE fornecedores ADD UNIQUE (nr_contato);
        ALTER TABLE fornecedores ADD UNIQUE (ds_email);";

$bd->beginTransaction();
$lines=$bd->exec($sql);
header("location:../views/editSupplierPage.php?id=$id");

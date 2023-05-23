<?php
include_once "../src/server.php";
try{

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
    
    
    $bd = connect();
    
    $sql = "INSERT INTO `fornecedores`(`nm_fornecedor`, `nr_cnpj`, `ds_email`, `nr_contato`) 
                    VALUES ('".$supName."','".$supCnpj."','".$supEmail."','".$nrContact."')";
    
    $bd->beginTransaction();
    $lines=$bd->exec($sql);
    
    if($lines == 1){
        $bd->commit();
    
    }else{
    
        $bd->rollBack();
    }
}catch(Exception){
    echo"deu erro";
}

?>
<?php
include_once "../src/server.php";

function renderInfo(){
    $id = $_GET['id'];
    $bd = connect();
    $sql = "SELECT f.nm_fornecedor,
                    f.nr_cnpj,
                    f.nr_contato,
                    f.ds_email,
                    e.nr_cep,
                    e.nr_endereco,
                    e.ds_logradouro,
                    e.ds_bairro,
                    e.ds_complemento
                FROM fornecedores f
                INNER JOIN enderecos_fornecedor e
                    ON f.id_fornecedor = e.id_fornecedor
                WHERE f.id_fornecedor = $id";

    $result = $bd->query($sql);
    $data = $result ->fetch(PDO::FETCH_ASSOC);

    return " <label for=''>
    Nome:
    <input
    value='".$data["nm_fornecedor"]."' 
    class='info'
    name='supName'
    type='text'>
</label>
<label for=''>
    CNPJ:
    <input
    value='".$data['nr_cnpj']."' 
    class='info'
    name='supCnpj'
    type='text'>
</label>
<label for=''>
    Número de contato:
    <input
    value='".$data["nr_contato"]."' 
    class='info'
    name='nrContact'
    type='text'>
</label>
<label for=''>
    E-mail:
    <input
    value='".$data["ds_email"]."' 
    class='info'
    name='supEmail'
    type='text'>
</label>
<label for=''>
    CEP:
    <input 
    value='".$data["nr_cep"]."'
    class='info'
    maxlength='8'
    name='supCep'
    type='text'>
</label>
<label for=''>
    Cidade:
    <select name='supCity'>".
        renderCities()
    ."</select>
</label>
<label for=''>
    Logradouro:
    <input
    value='".$data["ds_logradouro"]."'  
    class='info'
    id='logradouro'
    name='supLog'
    type='text'>
</label>
<label for=''>
    Bairro:
    <input
    value='".$data["ds_bairro"]."' 
    class='info'
    id='bairro'
    name='supNeighbohood'
    type='text'>
</label> 
<div class='extraInfo'>
    <label for=''>Número:
        <input
        value='".$data["nr_endereco"]."' 
        class='info'
        name='supNumber'
        type='text'>
    </label>
    <label for=''>
        Complemento:
        <input
        value='".$data["ds_complemento"]."' 
        name='supExtra'
        type='text'>
    </label>
</div>";
    
}

function renderCities(){
    $id = $_GET['id'];
    $bd = connect();
    $sql = "
        SELECT ds_cidade,
                id_cidade
        FROM cidades 
        WHERE id_cidade in
            (SELECT id_cidade
                FROM enderecos_fornecedor
                WHERE id_fornecedor in ( SELECT id_fornecedor
                                            FROM fornecedores 
                                            WHERE id_fornecedor = $id))";
    
    
    $result = $bd->query($sql);
    $supplierCity = $result->fetch(PDO::FETCH_ASSOC);
    $html = "<option value='".$supplierCity["id_cidade"]."'>".$supplierCity["ds_cidade"]."</option>"; 

    $sql2 = "SELECT ds_cidade,
                    id_cidade
            FROM cidades 
            WHERE id_cidade NOT IN
                (SELECT id_cidade
                    FROM enderecos_fornecedor
                    WHERE id_fornecedor IN ( SELECT id_fornecedor
                                                FROM fornecedores 
                                                WHERE id_fornecedor = $id))";
    $result2=$bd->query($sql2);
    while($data = $result2->fetch(PDO::FETCH_ASSOC)){
        $html = $html."<option value='".$data["id_cidade"]."'>".$data["ds_cidade"]."</option>";
    }
    return $html;
}

?>
<?php
include_once "../src/server.php";
include_once "../src/addCommitment.php";


function editCommitment($id) {
    $bd = connect();

    $sql = "SELECT c.cd_pedido,
                    f.nm_fornecedor,
                    c.nr_valor,
                    c.dt_vencimento,
                    c.nr_valor_pago,
                    c.dt_pagamento,
                    c.ds_observacao
                    FROM compromissos c
                    INNER JOIN fornecedores f
                    ON c.id_fornecedor = f.id_fornecedor
                    WHERE c.id_compromisso = $id ";
    $result = $bd->query($sql);

  $data = $result->fetch(PDO::FETCH_ASSOC);
        echo "<div>
        <label for='cod-pedido'>Código do Pedido
            <input type='text'
            value=".$data['cd_pedido']."
            class='info'
            id='cod-pedido'
            name='cod-pedido'>
        </label>

        <label for='fornecedor'>Fornecedor
            <select name='supplier' class='info' id='>
                <option value=' readonly>Selecione o fornecedor</option>".
                SupplierOptions()."
            </select>
        </label>

        <div class='col'>
            <label for='valor'>Valor
                <input type='number'
                class='info'
                value='".$data["nr_valor"]."' id='valor'
                name='valor'
                step='0.01'>
            </label>
            <label for='dt-vencimento'>Vencimento
                <input type='date'
                value='".$data['dt_vencimento']."' class='info'
                id='dt-vencimento'
                name='dt-vencimento'>
            </label>
        </div>

        <label for='valor-pago'>Valor Pago
            <input type='number'
            value='".$data['nr_valor_pago']."' 
           
            id='valor-pago'
            name='valor-pago'
            step='0.01'>
        </label>

        <label for='dt-pagamento'>Data de Pagamento
            <input type='date'
            value='".$data['dt_pagamento']."'
        
            id='dt-pagamento'
            name='dt-pagamento'>
        </label>

        <label for='tipo-compromisso'>Tipo do Compromisso
            <select name='coomitmentType' class='info' id='>
                <option value=' readonly>Selecione o tipo do compromisso</option>
                ".CommitmentTypes()."
            </select>
        </label>

        <label for='observacoes'>Observação
            <textarea 
            name='observacoes'
            class='info'
            id='observacoes'
            >".$data["ds_observacao"]."</textarea>
        </label>
    </div>
    <input type='submit' value='Atualizar'>";
    
}
function renderSupplier(){
    $id = $_GET['id'];
    $bd = connect();
    $sql = "
        SELECT nm_fornecedor, 
                id_fornecedor
        FROM fornecedores 
        WHERE id_fornecedor IN
            (SELECT id_fornecedor
                FROM compromissos
                WHERE id_compromisso  = $id)";
    
    
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
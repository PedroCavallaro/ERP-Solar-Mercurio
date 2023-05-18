<?php
function connect(){
        $dsn = "mysql:host=localhost;dbname=erp_solar";
        $username="root";
        $password ="";
        $conn = new PDO($dsn, $username, $password);
        $conn -> setAttribute(PDO::ATTR_ERRMODE,
                              PDO::ERRMODE_EXCEPTION);
        return $conn;

}

function commitment(){
    $bd = connect();

    $sql = "SELECT c.cd_pedido,
                    f.nm_fornecedor,
                    c.nr_valor,
                    c.dt_vencimento,
                    c.nr_valor_pago
                    FROM compromissos c
                    INNER JOIN fornecedores f
                    WHERE c.id_fornecedor = f.id_fornecedor ";
    $result = $bd->query($sql);

    while($data = $result->fetch(PDO::FETCH_ASSOC)){
        echo "
        <tr>
            <td>".$data["cd_pedido"]."</td>
            <td>".$data["nm_fornecedor"]."</td>
            <td>".$data["nr_valor"]."</td>
            <td>".$data["cd_pedido"]."</td>
            <td>".status($data["nr_valor_pago"])."</td>
        </tr>";
        
    }
}

function status($data){
        if($data == null){
            return "Pendente";
        }else{
            return "Pago";
        }
}
?>
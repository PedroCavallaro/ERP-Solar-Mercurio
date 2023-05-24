<?php
include_once "../src/server.php";

try {

  $numConta = filter_input(INPUT_POST, "num-conta", FILTER_SANITIZE_SPECIAL_CHARS);
  $agConta = filter_input(INPUT_POST, "ag-conta", FILTER_SANITIZE_SPECIAL_CHARS);
  $bancoConta = filter_input(INPUT_POST, "banco-conta", FILTER_SANITIZE_SPECIAL_CHARS);
  $tipoConta = filter_input(INPUT_POST, "tipo-conta", FILTER_SANITIZE_SPECIAL_CHARS);

  $bancoConta = intval($bancoConta);
  $agConta = intval($agConta);

  $bd = connect();

  $sql = 'INSERT INTO agencia(nr_agencia, id_banco) VALUES (' . $agConta . ', ' . $bancoConta . ')';

  $bd->beginTransaction();

  $lines = $bd->exec($sql);

  if ($lines == 1) {
    $bd->commit();
  } else {
    $bd->rollBack();
  }

  $sqlAg = "SELECT id_agencia FROM agencia ORDER BY id_agencia DESC";

  $result = $bd->query($sqlAg);
  $data = $result->fetch(PDO::FETCH_ASSOC);

  echo $data["id_agencia"];

  $sql2 = 'INSERT INTO contas_bancarias(nr_conta, id_agencia, id_tipo) VALUES ("' . $numConta . '", ' . $data["id_agencia"] . ', ' . $tipoConta . ')';

  $bd->beginTransaction();

  $lines = $bd->exec($sql2);

  if ($lines == 1) {
    $bd->commit();
  } else {
    $bd->rollBack();
  }

  header("location:../views/banks.php");
} catch (Exception) {
  header("location:../views/addBankPage.php?err=12983918239812");
}

<?php
include_once "../src/server.php";

try {

  $idConta = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);

  $idConta = intval($idConta);

  $bd = connect();

  $sql = "DELETE FROM contas_bancarias WHERE id_conta = " . $idConta;

  $bd->beginTransaction();

  $lines = $bd->exec($sql);

  if ($lines == 1) {
    $bd->commit();
  } else {
    $bd->rollBack();
  }

  header("location:../views/banks.php");
} catch (Exception) {
  header("location:../views/banks.php?err=12983918239812");
}

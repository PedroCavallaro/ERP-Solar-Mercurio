<?php
include_once "../src/supplier.php"
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornecedores</title>
    <link rel="stylesheet" href="./style/addSupplierPage.css">
</head>

<body>
    <header>
        <nav>
            <div>
                <img class="navImg" src="./assets/usericon.png" alt="" srcset="">
                <p>Usuário 001</p>
            </div>
            <div>
                <img class="navImg" src="./assets/gear.png" alt="gearIcon" srcset="">
                <p>Configurações</p>
            </div>
        </nav>
    </header>
    <main>
        <section class="left-menu">
            <div class="buttons-container">
                <a href="./index.php"><input type="button" value="Página Inicial"></a>
                <a href="./commitments.php"><input type="button" value="Compromissos"></a>
                <a href="#"><input type="button" value="Movimentações"></a>
                <a href="#"><input type="button" value="Fornecedores"></a>
                <a href="#"><input type="button" value="Bancos"></a>
            </div>
            <div class="mercury-main-container">
                <div class="mercury-container">
                    <img class="mercury" src="./assets/Mercury.png" alt="teste">
                </div>
                <div class="planet-name">
                    <h1>Mercúrio</h1>
                </div>
            </div>
        </section>
        <section class="rigth-menu">
            <form class="info">
                <h1>Cadastro de Fornecedor</h1>
                <div>
                    <label for="">
                        Nome:
                        <input class="info" name="supName" type="text">
                    </label>
                    <label for="">
                        CNPJ:
                        <input class="info" name="supCnpj" type="text">
                    </label>
                    <label for="">
                        Número de contato:
                        <input class="info" name="nrContact" type="text">
                    </label>
                    <label for="">
                        E-mail:
                        <input class="info" name="supEmail" type="text">
                    </label>
                    <label for="">
                        CEP:
                        <input class="info" name="supCep" type="text">
                    </label>
                    <label for="">
                        Cidade:
                        <input class="info" id="localidade" name="supCity" type="text">
                    </label>
                    <label for="">
                        Logradouro:
                        <input  class="info" id="logradouro" name="supLog" type="text">
                    </label>
                    <label for="">
                        Bairro:
                        <input class="info" id="bairro" name="supNeighbohood" type="text">
                    </label> 
                    <div class="extraInfo">
                        <label for="">Número:
                            <input class="info" name="supNumber" type="text">
                        </label>
                        <label for="">
                            Complemento:
                            <input name="supExtra" type="text">
                        </label>
                    </div>
                    <footer>
                            <div class="actions">
                                <img src="./assets/cancel.png" alt="">
                                <input type="button" class="actionButton" value="Cancelar">
                            </div>
                        <h1>Mercúrio</h1>
                        <div class="actions">
                            <img src="./assets/check.png" alt="">
                            <input type="submit" class="actionButton" id="sendInfo" value="Cadastrar">
                        </div>
                    </footer>
                </div>
                <input type="submit" class="actionButton" id="sendInfo" value="Cadastrar">

            </form>
        </section>
    </main>
</body>

<script src="./dist/addSupplier.js"></script>

</html>
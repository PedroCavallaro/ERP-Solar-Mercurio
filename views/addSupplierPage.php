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
                        <input type="text">
                    </label>
                    <label for="">
                        CNPJ:
                        <input type="text">
                    </label>
                    <label for="">
                        Número de contato:
                        <input type="text">
                    </label>
                    <label for="">
                        E-mail:
                        <input type="text">
                    </label>
                    <label for="">
                        Cidade:
                        <input type="text">
                    </label>
                    <label for="">
                        Logradouro:
                        <input type="text">
                    </label>
                    <label for="">
                        Bairro:
                        <input type="text">
                    </label>
                    <div class="extraInfo">
                        <label for="">Número:
                            <input type="text">
                        </label>
                        <label for="">
                            Complemento:
                            <input type="text">
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
                            <input type="submit" class="actionButton" value="Cadastrar">
                        </div>
                    </footer>
                </div>
            </form>
        </section>
    </main>
</body>
<script src="https://use.fontawesome.com/1278951f00.js"></script>

</html>
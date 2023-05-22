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
    <link rel="stylesheet" href="./style/supplier.css">
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
            <div class="info">
                <div>
                    <form action="" method="post">
                        <h1>Fornecedores</h1>
                        <label id="addSupplier" for="">
                            <img id="addButton" src="./assets/adicionar.png" alt="">
                            <input type="submit" value="Adicionar">
                        </label>
                    </form>
                </div>
                <table>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>Email</th>
                    <th>Contato</th>
                    <th>Ações</th>
                    <tbody>
                        <?=getSuppliers()?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
<script src="https://use.fontawesome.com/1278951f00.js"></script>

</html>
<?php
include_once "../src/movement.php"
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contas a Pagar - Home</title>
    <link rel="stylesheet" href="./style/index.css">
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
                <a href="./movements.php"><input type="button" value="Movimentações"></a>
                <a href="./supplier.php"><input type="button" value="Fornecedores"></a>
                <a href="./banks.php"><input type="button" value="Bancos"></a>
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
                <h1>Movimentações</h1>
                <table>
                    <th>Id compromisso</th>
                    <th>Código</th>    
                    <th>Numero da conta</th>
                    <th>Banco</th>
                    <th>Tipo Conta</th>
                    <th>Valor</th>
                    <th>Data</th>
                    <th>Status</th>
                    <tbody>
                        <?=getMovement()?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/index.css">
    <title>Contas a Pagar - Compromissos</title>
</head>

<?php
include_once "../src/index.php"
?>

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

                <div class="head-info">
                    <h1>Compromissos</h1>
                    <a href="./addCommitmentPage.php">
                        <input type="button" value="Adicionar">
                    </a>
                </div>

                <table>
                    <th>Cód Pedido</th>
                    <th>Fornecedor</th>
                    <th>Valor a pagar</th>
                    <th>Data de Vencimento</th>
                    <th>Valor Pago</th>
                    <th>Data de Pagamento</th>
                    <th>Tipo do Compromisso</th>
                    <th>Status</th>
                    <th>Observação</th>
                    <th>Ação</th>
                    <tbody>
                        <?= commitmentFull() ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
 
</body>

</html>
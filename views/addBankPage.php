<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="./style/index.css">
    <link rel="stylesheet" href="./style/addCommitimentPage.css"> 

    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <title>Contas a Pagar - Novo Banco</title>
</head>

<?php 
include_once "../src/banks.php"
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

                <div class="head-info">
                    <h1>Bancos</h1>
                    <a href="./banks.php">
                        <input id="close-button" type="button" value="Fechar">
                    </a>
                </div>

                <form id="formBank" action="../src/addBank.php" method="POST">
                    <div class="form-main-content">
                        <label for="num-conta">Número da Conta
                            <input type="text" class="info" id="num-conta" name="num-conta">
                        </label>

                        <label for="ag-conta">Agência
                            <input type="text" class="info" id="ag-conta" name="ag-conta">
                        </label>

                        <label for="banco-conta"> Banco
                            <select name="banco-conta" class="info" id="banco-conta">
                                <option value="">Escolha um Banco</option>
                                <?= getBankNames() ?>
                            </select>
                        </label>

                        <label for="tipo-conta">Tipo da Conta
                            <select name="tipo-conta" class="info" id="tipo-conta">
                                <option value="">Escolha um Banco</option>
                                <?= getTypes() ?>
                            </select>
                        </label>
                    </div>
                    <input type="submit" value="Cadastrar">
                </form>
            </div>
        </section>
    </main>
</body>

<script src="./dist/addBank.js"></script>

</html>
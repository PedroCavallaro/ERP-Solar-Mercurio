<?php
include_once "../src/editCommitment.php";
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contas a Pagar - Novo Compromissos</title>
    <link rel="stylesheet" href="./style/index.css">
    <link rel="stylesheet" href="./style/addCommitimentPage.css"> 
    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>

    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
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
                <div class="head-info">
                    <h1>Compromissos</h1>
                    <a href="./commitments.php">
                        <input id="close-button" type="button" value="Fechar">
                    </a>
                </div>
                <?php
                        echo "<form id='formCommitment' action='../src/updateCommitment.php?id=$id' method='POST'>"
                ?>     
                <?=editCommitment($id)?>
                    
                </form>
            </div>
        </section>
    </main>
</body>
<script type="module" src="./dist/commitments.js"></script>

</html>
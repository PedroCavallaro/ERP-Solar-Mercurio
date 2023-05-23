<?php
include_once "../src/editSupplier.php";
$id = $_GET["id"];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornecedores</title>
    <link rel="stylesheet" href="./style/addSupplierPage.css">
    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
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
            <?php
                echo "<form class='info' id='formSupplier'  action='../src/updateSupplier.php?id=$id' method='post'>"
            ?>
            <h1>Cadastro de Fornecedor</h1>
                <div>
                   <?=renderInfo()?>
                </div>
                <div id="formFoot">
                    <label id="cancel" for="">
                        <img src="assets/cancel.png" alt="">
                        Cancelar
                    </label>
                    <h1>Mercúrio</h1>
                    <label id="submitContainer" for="sendInfo">
                        <img src="../views/assets/check.png" alt="">
                        <input type="submit" id="sendInfo"  value="Cadastrar">
                    </label>
                </div>
            </form>
        </section>
    </main>
</body>

<script type="module" src="./dist/addSupplier.js"></script>

</html>
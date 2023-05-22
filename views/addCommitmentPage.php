<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contas a Pagar - Novo Compromissos</title>
    <link rel="stylesheet" href="./style/index.css">
    <link rel="stylesheet" href="./style/addCommitimentPage.css">
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
                <div class="head-info">
                    <h1>Compromissos</h1>
                    <a href="./commitments.php">
                        <input id="close-button" type="button" value="Fechar">
                    </a>
                </div>

                <form action="./" method="POST">
                    <div>
                        <label for="cod-pedido">Código do Pedido
                            <input type="text" value="" id="cod-pedido" name="cod-pedido">
                        </label>

                        <label for="fornecedor">Fornecedor
                            <select name="" id=""></select>
                        </label>

                        <div class="col">
                            <label for="valor">Valor
                                <input type="number" value="" id="valor" name="valor" step="0.01">
                            </label>
                            <label for="dt-vencimento">Vencimento
                                <input type="date" value="" id="dt-vencimento" name="dt-vencimento">
                            </label>
                        </div>

                        <label for="valor-pago">Valor Pago
                            <input type="number" value="" id="valor-pago" name="valor-pago" step="0.01">
                        </label>

                        <label for="dt-pagamento">Data de Pagamento
                            <input type="date" value="" id="dt-pagamento" name="dt-pagamento">
                        </label>

                        <label for="tipo-compromisso">Tipo do Compromisso
                            <select name="" id=""></select>
                        </label>

                        <label for="observacoes">Observação
                            <textarea name="observacoes" id="observacoes"></textarea>
                        </label>
                    </div>
                    <input type="submit" value="Cadastrar">
                </form>
            </div>
        </section>
    </main>
</body>

</html>
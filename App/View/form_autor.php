<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistemas Biblioteca - Cadastro de Autores </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
    <div>
        <?php include VIEWS . '/Includes/menu.php' ?>
        <h1> Lista de Autores </h1>
        <a href="/autor/cadastro"> Novo Autor </a>
        <?= $model->getErrors() ?>
        <table class ="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">CPF</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($model->rools as $autor): ?>
                <tr>
                    <td><?= $autor->Id ?> </td>
                    <td><a href="/autor/cadastro?id=<?=Id ?>"><?= $autor->Nome ?> </a> </td>
                    <td><?= $autor->Data_de_Nascimento ?> </td>
                    <td><?= $autor->CPF ?> </td>
                    <td><a href="/autor/delete?id=<?=$autor->Id ?>">Remover </a> </td>
                </tr>
                <?php endforeach ?>
                </tbody>
        </table>
    </div>

    <script scr="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
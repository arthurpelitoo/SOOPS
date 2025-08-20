<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Usuario</title>
</head>
<body>
    <h1>Listagem de Usuario:</h1>

    <table>

        <?php if(count($model->rows) > 0): ?>
            <tr>
                <th></th>
                <th>id</th>
                <th>nm_usuario</th>
                <th>email</th>
                <th>senha</th>
                <th>tipo_usuario</th>
                <th></th>
            </tr>
        <?php endif?>

        <?php foreach($model->rows as $item): ?>
            <tr>
                <td><a href="/usuario/delete?id=<?= $item->id ?>">X</a></td>
                <td><?= $item->id ?></td>
                <td><?= $item->nm_usuario ?></td>
                <td><?= $item->email ?></td>
                <td><?= $item->senha ?></td>
                <td><?= $item->tipo_usuario ?></td>
                <td><a href="/usuario/form?id=<?= $item->id ?>">Editar</a></td>
            </tr>
        <?php endforeach ?>

        <?php if(count($model->rows) == 0): ?>
            <tr>
                <td colspan="7">Nenhum registro foi encontrado.</td>
            </tr>
            <tr>
                <td colspan="7">
                    <a href="/usuario/form">
                        Deseja Cadastrar Usuario?
                    </a>
                </td>
            </tr>
        <?php elseif(count($model->rows) > 0): ?>
            <tr>
                <td colspan="7">
                    <a href="/usuario/form">
                        Deseja Cadastrar mais Usuarios?
                    </a>
                </td>
            </tr>
        <?php endif?>
    </table>
</body>
</html>
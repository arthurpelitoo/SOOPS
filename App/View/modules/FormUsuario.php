<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuario</title>
    <style>
        label, input{
            display: block;
            
        }
    </style>
</head>
<body>
    <fieldset>
        <legend>Cadastro de Usuario</legend>
        <!-- formulario com metodo post que aponta para uma rota do index.php-->
        <form method="post" action="/usuario/form/save">

            <input name="id" value="<?= $model->id ?>" type="hidden" />

            <label for="nome">
                Nome:
            </label>
            <input id="nome" name="nome" value="<?= $model->nm_usuario ?>" type="text" placeholder="Insira algum nome"/>

            <label for="email">
                Email:
            </label>
            <input id="email" name="email" value="<?= $model->email ?>" type="text" placeholder="Insira seu email"/>

            <label for="senha">
                Senha:
            </label>
            <input id="senha" name="senha" value="<?= $model->senha ?>" type="text" placeholder="Insira alguma senha forte"/>

            <button type="submit">Confirmar cadastro</button>

        </form>
    </fieldset>
</body>
</html>
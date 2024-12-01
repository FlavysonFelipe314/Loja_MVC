<form action="<?= BASE_DIR?>crud/crudEditar" method="POST">
    <input type="text" name="nome" value="<?= $nome?>">
    <input type="email" name="email" value="<?= $email?>">
    <input type="hidden" name="id" value="<?= $id?>">
    <button type="submit">Enviar</button>
</form>
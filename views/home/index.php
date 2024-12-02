<a href="<?= BASE_DIR?>add"><button>Cadastrar</button></a>

<table width="100%" style="text-align: center;" border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>


    <?php if (!empty($viewData)) : ?>
        <?php foreach ($viewData as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item->id) ?></td>
                <td><?= htmlspecialchars($item->nome) ?></td>
                <td><?= htmlspecialchars($item->email) ?></td>
                <td>
                    <a href="<?= BASE_DIR ?>crud/editar/<?= $item->id ?>">Editar</a> |
                    <a href="<?= BASE_DIR ?>crud/deletar/<?= $item->id ?>">Deletar</a>
                </td>
            </tr>
        <?php endforeach; ?>

    <?php else : ?> 
        <tr>
            <td colspan="4">Nenhum registro encontrado.</td>
        </tr>
    <?php endif; ?>
</table>


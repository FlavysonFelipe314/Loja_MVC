<h1>Produtos</h1>
<p><?= $user->getName()?></p>
<p><?= $user->getEmail()?></p>

<?php foreach($produtos as $produto):?>
    <hr>
    <p><?= $produto->getName()?></p>
    <p><?= $produto->getPrice()?></p>
    <p><?= $produto->getDescription()?></p>
    <a href="<?= BASE_DIR?>produto/<?= $produto->getId()?>">Comprar</a>
<?php endforeach;?>
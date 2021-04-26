<?php include $_SERVER['DOCUMENT_ROOT']. '/templates/header.php';
include $_SERVER['DOCUMENT_ROOT']. '/templates/nav.php';?>
<div class="visualContent">
    <?php if ($content):?>
    <h2><?= $content->title ?></h2>
    <div><?= $content->text ?></div>
</div>
    <form action=""></form>
    <?php else: ?>
        <div>К сожелению здесь ничего нет :(</div>
    <?php endif;?>
<?php include $_SERVER['DOCUMENT_ROOT']. '/templates/footer.php'; ?>

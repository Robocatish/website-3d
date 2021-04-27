<?php include $_SERVER['DOCUMENT_ROOT']. '/templates/header.php';
include $_SERVER['DOCUMENT_ROOT']. '/templates/nav.php';?>
<div class="visualContent">
    <?php if ($content):?>
    <h2><?= $content->title ?></h2>
    <hr>
    <div> <?= $content->text ?> </div>
</div>
<br>
    <a href="deleteContent.php?id=<?=$content->id?>" class="deleteBtn"
    onclick="return confirm('вы действительно хотите удалить материал?');">
        удалить материал
    </a>
    <a href="editContent.php?id=<?=$content->id?>" class="editBtn">
        изменить статью
    </a>
    <?php else: ?>
        <div>К сожелению здесь ничего нет :(</div>
    <?php endif;?>
<?php include $_SERVER['DOCUMENT_ROOT']. '/templates/footer.php'; ?>

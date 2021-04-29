<?php
include $_SERVER['DOCUMENT_ROOT']. "/templates/header.php";
include $_SERVER['DOCUMENT_ROOT']. "/templates/navDefault.php";?>

<div>
    <table class="adminTable">
        <tr>
            <th>картинка</th>
            <th>название контента</th>
            <th>текст</th>
            <th>создатель</th>
            <th>дата создания</th>
        </tr>

        <?php foreach ($contents as $content):?>
        <tr>
            <td><img src="../img/<?=($Image=$dataContent->getOneImageFromContent($content->id))->image?>" alt=""></td>
            <td><a href="/contents/oneContent.php?id=<?=$content->id?>"><?=$content->title?></a></td>
            <td><?=$content->text?></td>
            <td><?=$content->nickname?></td>
            <td><?=$content->created_at?></td>
        </tr>
        <?php endforeach;?>
    </table>
</div>
<?php include $_SERVER['DOCUMENT_ROOT']. "/templates/footer.php";?>

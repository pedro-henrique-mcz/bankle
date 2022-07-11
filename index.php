<?php
    require_once("templates/header.php");

?>
    <div class="card-grid">
        <?php foreach($paintings as $painting): ?>
            <div class="card">
                <div class="card-header card-image">
                    <img src="<?= $settings->getUrl()?>/img/uploads/<?=$painting['image']?>" alt="">
                </div>
                <div class="card-body">
                    <p class="name"><?= $painting['name'] ?></p>
                    <p class="author"><?= $painting['author'] ?></p>
                    <p class="descp"><?= $painting['description'] ?></p>
                </div>
                <div class="card-footer">
                    <a href="<?= $settings->getUrl()?>/show.php?id=<?= $painting["id"] ?>"><button class="btn">Detalhes</button></a>
                </div>
            </div>
        <?php endforeach; ?>  
    </div>
<?php
    require_once("templates/footer.php");
?>
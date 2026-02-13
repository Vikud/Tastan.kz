<?php
session_start();
require_once "vendor/autoload.php";
use App\DB;

$db = new DB();
if (isset($_GET["category_id"])) {
$goods = $db->get_filtered_goods($_GET["category_id"]);
}
else {
    $goods = $db->get_all_goods();
}

$categories = $db->get_categories();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tastan.kz</title>
    <link rel="stylesheet" href="assets/css/common.css">
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>

    <?php include "html/header.php"; ?>

<?php include "html/popup_message.php"; ?>

    <main>
        <div class="menu-wrapper">
            <div class="nav-trigger">
                <img class="drop-img" src="assets/image/menu-icon.svg" alt="МЕНЮ">
            </div>
            <nav class="dropdown-nav">
                <ol>
                    <li>
                        <a href="index.php">Все категории</a>
                        <ol>
                            <?php foreach ($categories as $category): ?>
                                <li>
                                    <a href="?category_id=<?= $category["Id"] ?>">
                                        <?= $category["Name"] ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="new goods">
            <?php foreach ($goods as $good): ?>
                <a href="good.php?id=<?= $good["Id"] ?>" class="good">
                    <div class="image">
                        <img src="assets/goods/<?= $good["Cover"] ?>" alt="">
                    </div>
                    <p class="name"><?= $good["Name"] ?></p>
                    <p class="price"><?= number_format($good["Price"], 0, null, " ") ?>&nbsp;тг.</p>
                </a>
            <?php endforeach; ?>
        </div>
    </main>

    <?php include "html/footer.html"; ?>

    <script src="assets/js/common.js"></script>
    <script src="assets/js/index.js"></script>
</body>

</html>
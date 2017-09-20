<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/debug.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/database.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/functions.php";

    global $database;

    $COUNT_PER_PAGE = 12;
    $count = $database->getValue("posts", "count(*)");
    $query = "SELECT id, title, description, createdOn FROM posts ORDER BY createdOn DESC LIMIT $COUNT_PER_PAGE";

    if(isset($_REQUEST["page"]) && is_numeric($_REQUEST["page"])) {
        $page = $_GET["page"];
        if($page > 1 && $page - 1 <= floor($count / $COUNT_PER_PAGE)) {
            $query .= " OFFSET " . (($page - 1) * $COUNT_PER_PAGE);
        }
    }

    $posts = $database->rawQuery($query);
?>

<html>
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT']."/configurations/head.php"; ?>
    </head>
    <body>
        <?php include $_SERVER['DOCUMENT_ROOT']."/configurations/navigation.php"; ?>
        <main>
            <div class="container-fluid">
                <div class="row cards">
                    <?php
                        foreach($posts as $post) {
                    ?>
                        <div class="card col-sm-4">
                            <div class="card-hr" style="background-color: #df691a;"></div>
                            <div class="card-block">
                                <h3 class="card-title"><?= $post["title"] ?></h4>
                                <p class="card-text" style="font-size: 12pt;"><?= $post["description"] ?></p>
                            </div>
                            <div class="card-actions">
                                <a href="view-post.php?id=<?= $post["id"]; ?>" class="card-link">Read more</a>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </main>
        <footer>
            <div class="row">
                <ul class="col-sm-12 pagination">
                    <?php
                        $pagesCount = floor(($count / $COUNT_PER_PAGE) + 1);

                        if($pagesCount == 1) {
                            echo "<li class='disabled'><a href='/index.php?page=1'>1</a></li>";
                        } else {

                            $activePage = 1;

                            if(isset($_REQUEST["page"]) && is_numeric($_REQUEST["page"])) {
                                $page = $_GET["page"];
                                if($page > 1 && $page - 1 < $pagesCount) {
                                    $activePage = $page;
                                }
                            }

                            echo "<li class='" . ($activePage == 1 ? "disabled" : "") . "'><a " . ($activePage == 1 ? "disabled" : "") . " href='/index.php?page=" . ($activePage - 1) . "'>&larr;</a></li>";
                            if($pagesCount <= 10) {
                                for($i = 1; $i <= $pagesCount; $i++) {
                                    echo "<li class='" . ($activePage == $i ? "active" : "") . "'><a href='/index.php?page=$i'>$i</a></li>";
                                }
                            } else {
                                $startPage = $activePage - 4;
                                $endPage = $activePage + 4;

                                if ($startPage <= 0) {
                                    $endPage -= ($startPage - 1);
                                    $startPage = 1;
                                }

                                if ($endPage > $pagesCount) {
                                    $endPage = $pagesCount;
                                }

                                if ($startPage > 1) {
                                    echo "<li class='" . ($activePage == 1 ? "active" : "") . "'><a href='/index.php?page=1'>1</a></li>";
                                    if($startPage > 2) {
                                        echo "...";
                                    }
                                }
                                for($i = $startPage; $i <= $endPage; $i++) {
                                    echo "<li class='" . ($activePage == $i ? "active" : "") . "'><a href='/index.php?page=$i'>$i</a></li>";
                                }
                                if ($endPage < $pagesCount) {
                                    if($endPage < $pagesCount - 1) {
                                        echo "...";
                                    }
                                    echo "<li class='" . ($activePage == $i ? "active" : "") . "'><a href='/index.php?page=$i'>$i</a></li>";
                                }
                            }
                            echo "<li class='" . ($activePage == $pagesCount ? "disabled" : "") . "'><a " . ($activePage == $pagesCount ? "disabled" : "") . " href='/index.php?page=" . ($activePage + 1) . "'>&rarr;</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </footer>
    </body>
</html>

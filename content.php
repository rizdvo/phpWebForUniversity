<div class="container mt-5 mb-3">

    <p><a href=".">← На головну </a></p>

    <?php
    $result = $mysqli->query("
            SELECT pages.*, categories.name AS category_name 
            FROM pages 
            LEFT JOIN categories ON pages.category = categories.id 
            WHERE pages.id = $page_id
        ");
    $row = $result->fetch_assoc();
    if ($row):
        ?>

        <div class="row">
            <div class="col mb-5">
                <h1 class="mb-4"><?php echo $row['title']; ?></h1>
                <p><?php echo preg_replace("/\n\n|\r\n\r\n/", "<p>", $row['content']); ?>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h2 class="mb-3">Фотоальбом</h2>
                <div class="card-deck">
                    <?php
                    $photoResult = $mysqli->query("SELECT * FROM photos ORDER BY rand() LIMIT 8");
                    while ($photo = $photoResult->fetch_assoc()) :
                        ?>

                        <div class="col-12 col-sm-6 col-lg-4 col-xl-3 p-3">
                            <div class="card m-0">
                                <img src="images/<?php echo $photo['file']; ?>" class="card-img-top" alt="">
                            </div>
                        </div>

                    <?php
                    endwhile;
                    ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col bg-light border p-2 pl-3 m-3 mt-4">
                <strong>Розділ сайту:</strong>
                <?php echo htmlspecialchars($row['category_name']);?>
            </div>
        </div>

    <?php
    else:
        include "404.php";
    endif;
    ?>
</div>



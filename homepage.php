<div class="container-fluid">
    <div class="row justify-content-center bg-secondary">
        <div class="col-md-8 text-white text-center">
            <h4 class="m-4">Animalia Linnaeus</h4>
            <div class="input-group mt-4 mb-5">
                <label class="w-100">
                    <input class="form-control form-control-lg" type="text" placeholder="Шукати...">
                </label>
                <div class="input-group-append">
                    <button class="btn btn-light" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col text-center pt-5">
            <?php  $class = ($cat_id == 0) ? 'btn-primary' : 'btn-dark'; ?>
            <a class="btn m-1 <?php echo $class; ?>" href="." role="button">Усі</a>

            <?php
                $result = $mysqli->query("SELECT * FROM categories ORDER BY ordered");
                while ( $row = $result->fetch_assoc() ) :
                    $class = ( $cat_id == $row['id'] ) ? 'btn-primary' : 'btn-dark';
            ?>

            <a class="btn m-1 <?php echo $class; ?>" href="?cat=<?php echo $row['id']; ?>" role="button"><?php echo $row['name']; ?></a>

            <?php
                endwhile;
            ?>
        </div>
    </div>
</div>


<div class="container mt-5">
    <div class="card-columns">
        <?php
            $sql = "SELECT * FROM pages";
            if ( $cat_id ) $sql .= " WHERE category=$cat_id";

            $result = $mysqli->query( $sql );

            while ( $row = $result->fetch_assoc() ) :
        ?>

        <div class="card">
            <a href="?page=<?php echo $row['id']; ?>"><img src="images/<?php echo $row['image']; ?>" class="card-img-top" alt=""></a>
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['title']; ?></h5>
                <p class="card-text"><?php echo $row['description']; ?></p>
                <p><a href="?page=<?php echo $row['id']; ?>">Далі &rarr;</a>
            </div>
        </div>


        <?php
            endwhile;
        ?>
    </div>

</div>

<div class="container-fluid mt-5">
    <div class="row justify-content-center bg-light">
        <div class="col-md-4 text-center m-4">
            <h4 class="border-bottom pb-3 mb-4">Є що додати?</h4>
            <p><a href="https://t.me/psvvm" class="btn btn-primary btn-lg">Написати</a></p>
        </div>
    </div>
</div>

<?php
    $result = $mysqli->query( "SELECT * FROM interestings ORDER by rand() LIMIT 1" );
    $row = $result->fetch_assoc();
?>


<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h4 class="border-bottom pb-3 mb-4">Чи знаєте ви, що?</h4>
            <p><?php echo $row['text']; ?></p>
        </div>
        <div class="col-md-6 bg-light p-4">
            <img src="interface/idea.png" class="img-fluid" alt="">
        </div>
    </div>
</div>

<div class="bg-light">
    <div class="container-fluid mt-5">
        <div class="row justify-content-center bg-light">
            <div class="col-4 text-center m-4">
                <h4 class="border-bottom pb-3 mb-4">Фотоальбом</h4>
            </div>
        </div>
    </div>


    <div class="container pb-5">
        <div class="row">
            <?php
            $result = $mysqli->query( "SELECT * FROM photos ORDER BY rand() LIMIT 8" );
            while ( $row = $result->fetch_assoc() ) :
                ?>

                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 p-3">
                    <div class="card m-0">
                        <img src="images/<?php echo $row['file']; ?>" class="card-img-top" alt="">
                    </div>
                </div>

            <?php
            endwhile;
            ?>
        </div>
    </div>
</div>

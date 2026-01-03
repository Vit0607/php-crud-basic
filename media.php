<?php
session_start();
require 'functions.php';

$title = 'Загрузка аватара';

$user_id = $_GET['id'];

check_the_editing_rights($user_id);

$user = get_user_by_id($user_id);

?>

<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>
    <?php include 'nav.php'; ?>

    <main id="js-page-content" role="main" class="page-content mt-3">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-image'></i> Загрузить аватар
            </h1>

        </div>
        <form action="media-handler.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xl-6">
                    <div id="panel-1" class="panel">
                        <div class="panel-container">
                            <div class="panel-hdr">
                                <h2>Текущий аватар</h2>
                            </div>
                            <div class="panel-content">
                                <input type="hidden" name="user_id" value="<?= $user_id; ?>" />
                                <div class="form-group">
                                    <img src="<?= !empty($user['image']) ? $user['image'] : 'img/demo/authors/no_image.png' ?>"
                                        alt="" class="img-responsive" width="200">
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="example-fileinput">Выберите аватар</label>
                                    <input type="file" id="example-fileinput" class="form-control-file" name="image">
                                </div>


                                <div class="col-md-12 mt-3 d-flex flex-row-reverse">
                                    <button class="btn btn-warning" type="submit">Загрузить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <!-- BEGIN Page Footer -->
    <?php include 'footer.php'; ?>
</body>

</html>
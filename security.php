<?php
session_start();
require 'functions.php';

$title = 'Безопасность';

check_the_editing_rights($_GET['id']);

$user = get_user_by_id($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>
    <?php include 'nav.php'; ?>

    <main id="js-page-content" role="main" class="page-content mt-3">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-lock'></i> Безопасность
            </h1>

        </div>
        <form action="security-handler.php" method="POST">
            <div class="row">
                <div class="col-xl-6">
                    <?php display_flash_message('danger'); ?>
                    <div id="panel-1" class="panel">
                        <div class="panel-container">
                            <div class="panel-hdr">
                                <h2>Обновление эл. адреса и пароля</h2>
                            </div>
                            <div class="panel-content">
                                <!-- email -->
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Email</label>
                                    <input type="text" id="simpleinput" class="form-control" name="email"
                                        value="<?= $user['email']; ?>">
                                </div>

                                <!-- password -->
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Пароль</label>
                                    <input type="password" id="simpleinput" class="form-control" name="password">
                                </div>

                                <!-- id hidden -->
                                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">

                                <!-- password confirmation-->
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Подтверждение пароля</label>
                                    <input type="password" id="simpleinput" class="form-control">
                                </div>


                                <div class="col-md-12 mt-3 d-flex flex-row-reverse">
                                    <button class="btn btn-warning" type="submit">Изменить</button>
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
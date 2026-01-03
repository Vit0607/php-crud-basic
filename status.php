<?php
session_start();
require 'functions.php';

$title = 'Установка статуса';

check_the_editing_rights($_GET['id']);

$user = get_user_by_id($_GET['id']);

$statuses = [
    'success' => 'Онлайн',
    'warning' => 'Отошел',
    'danger' => 'Не беспокоить'
]

?>

<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>
    <?php include 'nav.php'; ?>

    <main id="js-page-content" role="main" class="page-content mt-3">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-sun'></i> Установить статус
            </h1>

        </div>
        <form action="status-handler.php" method="POST">
            <div class="row">
                <div class="col-xl-6">
                    <div id="panel-1" class="panel">
                        <div class="panel-container">
                            <div class="panel-hdr">
                                <h2>Установка текущего статуса</h2>
                            </div>
                            <div class="panel-content">
                                <div class="row">
                                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                                    <div class="col-md-4">
                                        <!-- status -->
                                        <div class="form-group">
                                            <label class="form-label" for="example-select">Выберите статус</label>
                                            <select class="form-control" id="example-select" name="status">
                                                <?php foreach ($statuses as $key => $value): ?>
                                                <option value="<?= $key ?>" <? echo $key===$user['status'] ? 'selected'
                                                    : '' ; ?>>
                                                    <?= $value ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3 d-flex flex-row-reverse">
                                        <button class="btn btn-warning" type="submit">Set Status</button>
                                    </div>
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
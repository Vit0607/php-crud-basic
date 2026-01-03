<?php $tile = 'О проекте | Учебный PHP-проект'; ?>

<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body class="mod-bg-1 mod-nav-link">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-primary-gradient">
        <a class="navbar-brand d-flex align-items-center fw-500" href="#"><img alt="logo"
                class="d-inline-block align-top mr-2" src="img/logo.png"> Учебный проект</a> <button
            aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"
            data-target="#navbarColor02" data-toggle="collapse" type="button"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="#">Главная</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Войти</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Выйти</a>
                </li>
            </ul>
        </div>
    </nav>
    <main id="js-page-content" role="main" class="page-content mt-3">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-user'></i> О проекте
            </h1>
        </div>
        <div class="row">
            <div class="col-lg-6 col-xl-6 m-auto">
                <div class="card mb-g rounded-top">
                    <div class="row no-gutters row-grid">
                        <div class="col-12">
                            <div class="d-flex flex-column align-items-center justify-content-center p-4">
                                <p>Данный проект представляет собой <strong>полнофункциональное веб-приложение</strong>
                                    для управления пользователями, разработанное на чистом PHP с использованием
                                    процедурного подхода (на функциях).</p>
                                <p>Это <strong>учебный проект</strong>, основной целью которого является глубокая
                                    практическая отработка ключевых концепций и технологий бэкенд-разработки.</p>

                                <h2>Цели проекта</h2>
                                <ul>
                                    <li>Практическое освоение языка PHP без использования фреймворков.</li>
                                    <li>Реализация полного цикла <strong>CRUD</strong> (Create, Read, Update, Delete)
                                        операций с данными.</li>
                                    <li>Построение надежной системы <strong>аутентификации и авторизации</strong>
                                        пользователей (регистрация, вход, защита сессий).</li>
                                    <li>Работа с реляционной базой данных (MySQL) через расширение PDO.</li>
                                    <li>Структурирование кода, разделение логики и представления, создание многофайловой
                                        архитектуры.</li>
                                    <li>Получение опыта, который можно транслировать на разработку других сущностей
                                        (товары, статьи, заказы и т.д.).</li>
                                </ul>
                                <br /><br />
                                <h2>Функциональность проекта</h2>
                                <ul>
                                    <li><strong>Публичная часть:</strong>
                                        <ul>
                                            <li>Регистрация новых пользователей (<code>page_register.php</code>).</li>
                                            <li>Вход в систему (<code>page_login.php</code>).</li>
                                            <li>Страница "О проекте".</li>
                                        </ul>
                                    </li>
                                    <li><strong>Защищенная часть (доступ после авторизации):</strong>
                                        <ul>
                                            <li>Просмотр и редактирование своего профиля (<code>page_profile.php</code>,
                                                <code>edit.php</code>).
                                            </li>
                                            <li>Просмотр списка всех пользователей (<code>users.php</code>).</li>
                                            <li>Создание новых пользователей администратором
                                                (<code>create_user.php</code>).</li>
                                            <li>Удаление пользователей (<code>delete.php</code>).</li>
                                            <li>Управление статусами пользователей (<code>status.php</code>).</li>
                                        </ul>
                                    </li>
                                    <li><strong>Системные механизмы:</strong>
                                        <ul>
                                            <li>Защита от неавторизованного доступа (<code>security.php</code>).
                                            </li>
                                            <li>Хеширование паролей.</li>
                                            <li>Валидация входных данных.</li>
                                            <li>Работа с сессиями.</li>
                                            <li>Вынос общей логики в подключаемые файлы (<code>functions.php</code>).
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <br /><br />
                                <h2>Технологический стек</h2>
                                <ul class="tech-list">
                                    <li class="tech-item">PHP 7.4+</li>
                                    <li class="tech-item">MySQL (PDO)</li>
                                    <li class="tech-item">HTML5 / CSS3</li>
                                    <li class="tech-item">Сессии и Cookies</li>
                                    <li class="tech-item">Веб-сервер (Apache/Nginx)</li>
                                </ul>
                                <br /><br />
                                <h2>Что демонстрирует проект</h2>
                                <p>Этот проект является <strong>наглядным доказательством</strong> следующих навыков
                                    разработчика:</p>
                                <ul>
                                    <li>Понимание <strong>жизненного цикла</strong> веб-запроса в PHP.</li>
                                    <li>Умение проектировать и работать с <strong>базой данных</strong> (создание
                                        таблиц, связи, запросы).</li>
                                    <li>Способность реализовывать <strong>безопасные</strong> системы работы с
                                        пользователями.</li>
                                    <li>Навык создания <strong>интуитивного интерфейса</strong> для взаимодействия с
                                        данными.</li>
                                    <li>Понимание принципов <strong>чистого кода</strong> и базовой архитектуры
                                        приложения.</li>
                                    <li>Готовность разбираться в задачах, искать информацию и применять её на практике.
                                    </li>
                                </ul>
                                <br />
                                <p><strong>Примечание:</strong> Динамическая функциональность реализована поверх готовой
                                    HTML-вёрстки, что позволило сосредоточиться на освоении backend-разработки без
                                    отвлечения на задачи вёрстки.
                                </p>

                                <p>Данный проект служит <strong>фундаментальной основой</strong> и может быть
                                    масштабирован для управления любыми другими сущностями (блог, каталог товаров,
                                    задачами), что делает полученный опыт крайне ценным для коммерческой разработки.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>

</html>
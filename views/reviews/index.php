<?php include_once ROOT.'/views/layouts/header.php'; ?>
<?php echo isset($message)? $message: '' ;?>
<?php foreach ($reviewsList as $reviews): ?>
    <div class="container" style="text-align: center">
        <?php
    echo '</br>' . $reviews['name'];
    echo '</br>' . $reviews['surname'];
    echo '</br>' . $reviews['content'] . '</br>';
        ?>
    </div>
    <?php endforeach;?>
    <div class="container" style="text-align: center">
    <button class="btn btn-primary" name="submit" type="submit">Оставить отзыв</button>
    </div>

    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../../assets/images/img.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../../assets/images/img.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../../assets/images/img.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <img width="100px" height="100px"  src="../../assets/images/img.jpg" alt="Third slide">
                        <p>Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

            <form  action="add" method="post" id="needs-validation" novalidate enctype=multipart/form-data>
                <div class="row justify-content-md-center">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom01">Ваше имя</label>
                        <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="Имя" required>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Ваша фамилия</label>
                        <input type="text" name="surname" class="form-control" id="validationCustom02" placeholder="Фамилия" required>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom01">Ваш e-mail</label>
                        <input type="email" name="email" class="form-control" id="validationCustom01" placeholder="Е-mail" required>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Введите сообщение</label>
                        <textarea type="text" name="content" class="form-control" id="validationCustom02" placeholder="Сообщение" rows="3" required></textarea>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <label for="exampleFormControlFile1"></label>
                    <input type="file" name="avatar" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="row justify-content-md-center">
                    <button class="btn btn-primary" name="submit" type="submit">Оставить отзыв</button>
                </div>
            </form>
    </div>
<?php include_once ROOT.'/views/layouts/footer.php';?>
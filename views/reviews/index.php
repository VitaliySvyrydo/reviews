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
        <form  id="needs-validation" novalidate>
            <div class="row justify-content-md-center">
                <div class="col-md-6 mb-3">
                    <label for="validationCustom01">First name</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-6 mb-3">
                    <label for="validationCustom02">Last name</label>
                    <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </form>
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
    <form action="add" method="post"">
            <div class="col-md-6 mb-3">
                <label for="validationDefault01">Ваше имя</label>
                <input type="text" name="name" class="form-control" id="validationDefault01" placeholder="Ваше имя" value="" required>
            </div>
        <div class="col-md-6 mb-3">
            <label for="validationDefault02">Ваша фамилия</label>
            <input type="text" name="surname" class="form-control" id="validationDefault02" placeholder="Ваша фамилия" value="" required>
        </div>
            <div class="col-md-6 mb-3">
                <label for="inputEmail3">Ваша почта</label>
                <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="E-mail" required>
            </div>
        <div class="col-md-6 mb-3">
            <label for="exampleFormControlTextarea1">Сообщение</label>
            <textarea class="form-control" name="content" id="exampleFormControlTextarea1" placeholder="Введите сообщение" rows="3"></textarea>
        </div>

        <button class="btn btn-primary" name="submit" type="submit">Оставить отзыв</button>

    </form>
    </div>

<?php include_once ROOT.'/views/layouts/footer.php';?>
<?php include_once ROOT. "/views/layouts/header.php";?>
<body>
<!-- About Us Section Start -->
<section id="about" class="split section">
    <!-- Container Starts -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="images">
                    <img class="rounded-circle mx-auto d-block" height="300px" width="auto" src="/template/images/logo2.jpg" alt="">
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-xs-12" >
                <div class="content-inner text-center">
                    <h2 class="title">Что такое Lorem Ipsum?</h2>
                    <p class="lead">Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Container Ends -->
</section>
<!-- About Us Section Ends -->
<!-- Testimonial Section -->
<section id="testimonial" class="section">
    <!-- Container Starts -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="testimonial-item" class="owl-carousel">
                    <?php foreach ($reviewsList as $reviews): ?>
                    <div class="item">
                        <div class="testimonial-inner">
                            <div class="testimonial-images col-xs-7">
                                <img width="100px" height="100px" class="rounded-circle mx-auto d-block" src="<?php echo $reviews['image']?>" alt="">
                            </div>
                            <div class="testimonial-content text-center">
                                <p>
                                    <?php echo $reviews['content']; ?>
                                </p>
                            </div>
                            <div class="testimonial-footer text-center">
                                <i class="fa fa-quote-left"></i>
                                <?php echo $reviews['name'] . ' ' . $reviews['surname'];?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div><!-- Container Ends -->
</section>
<!-- Testimonial Section End -->
<section id="testimonial-send" class="section">
    <!-- Container Starts -->
    <div class="container">
<?php if(isset($_GET['status'])):?>
        <div class="row">
            <div class="col-sm-12">
                <?php if($_GET['status'] = 1):?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_GET['message'];?>
                </div>
                <?php else:?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_GET['message']; ?>
                </div>
                <?php endif;?>
            </div>
        </div>
    <?php endif ?>
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
            </div></br>
            <div class="row justify-content-md-center">
                <div class="g-recaptcha" data-sitekey="6LcyyDEUAAAAAMXRlW-P_IWRKutA-6ACQ18Ff23U"></div>
            </div>
            <div class="row justify-content-md-center">
                <button class="btn btn-primary" name="submit" type="submit">Оставить отзыв</button>
            </div>

        </form>
    </div><!-- Container Ends -->
</section>
<?php include_once ROOT. "/views/layouts/footer.php";?>
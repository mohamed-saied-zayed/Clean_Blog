<?php require_once "inc/header.php";?>
<?php require_once "inc/banner.php";?>

        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    <div class="post-preview">
                            <h1 class="post-title"><?=$post['title']?></h1>
                            <p class="post-subtitle"><?=$post['content'];?></p>
                            <!-- Image Display -->
                            <div>
                                <img src="<?= htmlspecialchars(BASE_URL."admin/".$post['image_path']); ?>" alt="Image" class="img-fluid" />
                            </div>
                            <p class="post-meta">
                                Posted by
                                <a href="#!">Start Bootstrap</a>
                                on <?=date("F , d , y", strtotime($post["created_at"]));?>
                            </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
                </div>
            </div>
        </div>

<?php require_once "inc/footer.php";?>
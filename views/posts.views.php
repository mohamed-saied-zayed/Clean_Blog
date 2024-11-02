<?php require_once("inc/header.php"); ?>
<?php require_once("inc/banner.php"); ?>

<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <?php foreach($posts as $post) : ?>
            <!-- Post preview-->
            <div class="post-preview">
                <a href="<?php echo "index.php?page=post&id=".$post['id'];?>">
                    <h2 class="post-title"><?= $post['title']?></h2>
                    <h3 class="post-subtitle"><?= substr($post['content'], 0, 250); ?></h3>
                </a>
                <div>
                    <img src="<?= htmlspecialchars(BASE_URL."admin/".$post['image_path']); ?>" alt="Image" class="img-fluid" />
                </div>
                <p class="post-meta">
                    Posted by <a href="#!">Start Bootstrap</a> on <?= date("F , d , y", strtotime($post["created_at"])); ?>
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            <?php endforeach; ?>

            <!-- Pagination-->
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?= $page_number == 1 ? "disabled" : "" ?>">
                        <a class="page-link" href="index.php?page=posts&pagee=<?= $page_number - 1; ?>" aria-label="Previous">
                            &laquo; Previous
                        </a>
                    </li>
                    
                    <?php for($i = 1; $i <= $page_numbers; $i++) : ?>
                        <li class="page-item <?= $page_number == $i ? "active" : "" ?>">
                            <a class="page-link" href="index.php?page=posts&pagee=<?= $i; ?>" aria-label="Go to page <?= $i; ?>">
                                <?= $i; ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                    
                    <li class="page-item <?= $page_number == $page_numbers ? "disabled" : "" ?>">
                        <a class="page-link" href="index.php?page=posts&pagee=<?= $page_number + 1; ?>" aria-label="Next">
                            Next &raquo;
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<?php require_once("inc/footer.php"); ?>

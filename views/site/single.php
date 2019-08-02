<?

use yii\helpers\Url;

?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post">
                    <div class="post-thumb">
                        <img src="<?= $article->getImage(); ?>" alt="">
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6>
                                <a href="<?= Url::toRoute(['site/category', 'id' => $article->category->id]) ?>"><?= $article->category->title; ?></a>
                            </h6>

                            <h1 class="entry-title"><?= $article->title; ?>
                            </h1>


                        </header>
                        <div class="entry-content">
                            <?= str_replace("\n", "<br>", $article->content); ?>
                        </div>
                        <div class="decoration">
                            <!--                            <a href="#" class="btn btn-default">Decoration</a>-->
                            <!--                            <a href="#" class="btn btn-default">Decoration</a>-->
                        </div>

                        <div class="social-share">
							<span
                                    class="social-share-title pull-left text-capitalize">By <?= $article->getUserName() ?> On <?= $article->getDate(); ?></span>
                            <ul class="text-center pull-right">
                                <li><a class="s-facebook" href="https://www.facebook.com/vovka.poptsov" target="_blank"><i
                                                class="fa fa-facebook"></i></a></li>
                                <li><a class="s-linkedin" href="https://www.linkedin.com/in/vladymyr-poptsov-b9754512a"
                                       target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <li><a class="s-instagram" href="https://www.instagram.com/vovkapoptsov/"
                                       target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <li><a class="s-github" href="https://github.com/Vladymyr1989/" target="_blank"><i
                                                class="fa fa-github"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </article>
                <!--top comment-->
                <!--                <div class="top-comment">-->
                <!--                    <img src="/public/images/comment.jpg" class="pull-left img-circle" alt="">-->
                <!--                    <h4>Rubel Miah</h4>-->
                <!---->
                <!--                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy hello ro mod tempor-->
                <!--                        invidunt ut labore et dolore magna aliquyam erat.</p>-->
                <!--                </div>-->
                <!--top comment end-->
                <div class="row"><!--blog next previous-->
                    <div class="col-md-6">
                        <div class="single-blog-box">
                            <a href="<?= Url::toRoute(['site/view', 'id' => $previousArticle->id]); ?>">
                                <img src="<?= $previousArticle->getImage() ?>" alt="">

                                <div class="overlay">

                                    <div class="promo-text">
                                        <p><i class=" pull-left fa fa-angle-left"></i></p>
                                        <h5>Previous post</h5>
                                    </div>
                                </div>


                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-blog-box">
                            <a href="<?= Url::toRoute(['site/view', 'id' => $nextArticle->id]); ?>">
                                <img src="<?= $nextArticle->getImage() ?>" alt="">

                                <div class="overlay">
                                    <div class="promo-text">
                                        <p><i class=" pull-right fa fa-angle-right"></i></p>
                                        <h5>Next post</h5>

                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div><!--blog next previous end-->
                <div class="related-post-carousel"><!--related post carousel-->
                    <div class="related-heading">
                        <h4>You might also like</h4>
                    </div>
                    <div class="items">
                        <? foreach ($relatedArticles as $relatedArticle): ?>
                            <div class="single-item" style="margin: 2%">
                                <a href="<?= Url::toRoute(['site/view', 'id' => $relatedArticle->id]); ?>">
                                    <img src="<?= $relatedArticle->getImage() ?>" alt="">

                                    <p><?= $relatedArticle->title ?></p>
                                </a>
                            </div>
                        <? endforeach; ?>
                    </div>
                </div>
                <?= $this->render('/partials/comment', [
                    'comments' => $comments,
                    'pagination' => $pagination,
                    'article' => $article,
                    'commentForm' => $commentForm,
                ]); ?>
            </div>
            <?= $this->render('/partials/sidebar', [
                'popular' => $popular,
                'recent' => $recent,
                'categories' => $categories,
            ]); ?>
        </div>
    </div>
</div>
<!-- end main content-->
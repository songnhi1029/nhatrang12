

 <!-- BEGIN .content -->
    <section class="content">
        <div class="wrapper">

            <div class="content-block has-sidebar">
                <!-- BEGIN .content-block-single -->
                <div class="content-block-single">
                    <?php 
                        $sql5907 = "SELECT * FROM tintuc WHERE duyet = 1 AND id = '$idtintuc'";
                        $qr5907 = $db->query($sql5907);
                        while ( $news = mysqli_fetch_assoc($qr5907)) :
                            $idloaitin123 = $news['idloaitin'];
                            $sql2312 = "SELECT * FROM loaitin WHERE id = '$idloaitin123'";
                            $qr3213 = $db->query($sql2312);
                            $loaitin3443 = mysqli_fetch_assoc($qr3213);
                     ?>
                    <!-- BEGIN .content-panel -->
                    <div class="content-panel">
                        <div class="content-panel-body article-header">
                            
                            <strong class="category-link">
                               <h3><a href="index.php?p=loaitin&idLT=<?=$loaitin3443['id']; ?>"><?= $loaitin3443['tenloaitin']; ?></a></h3>
                            </strong>
                            <h2><?= $news['tieudetin']; ?></h2>
                            <div class="article-meta">
                                
                                <a href="#" class="meta-item"><?= $news['ngaydangtin']; ?></a>
                                
                            </div>
                        </div>
                        <div class="content-panel-body shortcode-content">
                            <p><?= $news['noidung']; ?></p>
                        </div>
                        <!-- END .content-panel -->
                    </div>
                <?php endwhile; ?>


                    <!-- BEGIN .content-panel -->
                    <div class="content-panel">
                        <div class="content-panel-body article-main-share">
                            <span class="share-front"><i class="fa fa-share-alt"></i>Share</span>
                            <a href="#" class="article-main-share-button"><strong class="hover-color-facebook">Facebook</strong><i>2.1k</i></a>
                            <a href="#" class="article-main-share-button"><strong class="hover-color-twitter">Twitter</strong><i>1.4k</i></a>
                            <a href="#" class="article-main-share-button"><strong class="hover-color-google-plus">Google+</strong><i>603</i></a>
                        </div>
                        <!-- END .content-panel -->
                    </div>

                    <?php 

                        $aray = array();

                        $sql342 = "SELECT * FROM tintuc WHERE duyet = 1 AND id = '$idtintuc'";
                        $qr8574 = $db->query($sql342);
                        $tagnew = mysqli_fetch_assoc($qr8574);

                        $aray = explode(',', $tagnew['keyword']);

                     ?>
                    <!-- BEGIN .content-panel -->
                    <div class="content-panel">
                        <div class="content-panel-body article-main-tags">
                            <span class="tags-front"><i class="fa fa-tags"></i>Tags</span>
                            <?php 
                                foreach ($aray as $key => $value){
                                    echo  '<a href="index.php?p=loaitin&idLT='.$tagnew['idloaitin'].'">'.$value.'</a>';
                                }
                            ?>     
                        </div>
                        <!-- END .content-panel -->
                    </div>

                    <?php 
                        $sql1 = "SELECT * FROM quangcao ORDER BY id ASC LIMIT 2,3";
                        $qr1 = $db->query($sql1);
                        $qc = mysqli_fetch_array($qr1);

                    ?>

                    <!-- BEGIN .content-panel -->
                    <div class="content-panel" style="margin-top: -20px; height: 150px; ">
                        <div class="content-panel-body do-space">
                            <a href="<?= $qc['link']; ?>" target="_blank"><img style="height: 150px; " src="images/photos/<?= $qc['urlanh']; ?>" /></a>
                        </div>
                        <!-- END .content-panel -->
                    </div>

                    <!-- BEGIN .content-panel -->
                    <div class="content-panel" style="margin-top: 20px;">
                        <div class="content-panel-title">
                            <a href="index.php?p=loaitin&idLT=<?= $loaitin3443['id']; ?>" class="right">Xem thêm</a>
                            <h2>Thuộc Loại Tin <?= $loaitin3443['tenloaitin']; ?></h2>
                        </div>
                        <!-- BEGIN .top-slider-body -->
                        <div class="top-slider-body" data-top-slider-timeout="6000" data-top-slider-autostart="false">
                            <div class="top-slider-controls">
                                <button class="left" data-top-slider-dir="left"><i class="fa fa-caret-left"></i></button>
                                <button class="right" data-top-slider-dir="right"><i class="fa fa-caret-right"></i></button>
                            </div>
                            <div class="top-slider-content">

                                <!-- BEGIN .top-slider-content-wrap -->
                                <div class="top-slider-content-wrap active">

                                    <!-- BEGIN .item -->
                                    <?php 
                                        $idloaitin2132 = $loaitin3443['id'];
                                        $sql543 = "SELECT * FROM tintuc WHERE duyet = 1 AND idloaitin = '$idloaitin2132' ORDER BY id ASC LIMIT 0,3";
                                        $qr4325 = $db->query($sql543);
                                        while ($newsoftin = mysqli_fetch_assoc($qr4325)):
                                     ?>
                                    <div class="item">
                                        <div class="item-header">
                                            <a href="index.php?p=tintuc&idtintuc=<?= $newsoftin['id']; ?>">
                                                <span class="read-more-wrapper"><span class="read-more">Xem thêm<i></i></span></span>
                                                <img src="<?= $linkimage.$newsoftin['anh']; ?>" alt="" />
                                            </a>
                                        </div>
                                        <div class="item-content">
                                            <h3><a href="#"><?= $newsoftin['tieudetin']; ?></a></h3>
                                        </div>
                                        <!-- END .item -->
                                    </div>
                                <?php endwhile; ?>

                                    <!-- END .top-slider-content-wrap -->
                                </div>

                                <!-- BEGIN .top-slider-content-wrap -->
                                <div class="top-slider-content-wrap">
                                    <?php 
                                        $idloaitin2132 = $loaitin3443['id'];
                                        $sql5431 = "SELECT * FROM tintuc WHERE duyet = 1 AND idloaitin = '$idloaitin2132' ORDER BY id ASC LIMIT 3,3";
                                        $qr43251 = $db->query($sql5431);
                                        while ($newsoftin6 = mysqli_fetch_assoc($qr43251)):
                                     ?>
                                    <div class="item">
                                        <div class="item-header">
                                            <a href="index.php?p=tintuc&idtintuc=<?= $newsoftin6['id']; ?>">
                                                <span class="read-more-wrapper"><span class="read-more">Xem thêm<i></i></span></span>
                                                <img src="<?= $linkimage.$newsoftin6['anh']; ?>" alt="<?= $newsoftin6['tieudetin']; ?>" />
                                            </a>
                                        </div>
                                        <div class="item-content">
                                            <h3><a href="#"><?= $newsoftin6['tieudetin']; ?></a></h3>
                                        </div>
                                        <!-- END .item -->
                                    </div>
                                <?php endwhile; ?>    

                                </div>

                            </div>
                            <!-- END .top-slider-body -->
                        </div>
                        <!-- END .content-panel -->
                    </div>
                    <!-- END .content-block-single -->
                </div>
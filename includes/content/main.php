<!-- BEGIN .content -->
    <section class="content">
        <div class="wrapper">
         
            <div class="content-block has-sidebar">

                <!-- BEGIN .content-block-single -->
                <div class="content-block-single">
                <!-- slite -->
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                        <ol class="carousel-indicators">
                          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                          <li data-target="#myCarousel" data-slide-to="1"></li>
                          <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <?php
                                $q1 = "SELECT * FROM tintuc WHERE duyet = 1 AND noibat = 1 ORDER BY id DESC LIMIT 0,3" ;
                                $qr1 = $db->query($q1);
                                $stt = 0;
                                while ($tinnoibat = mysqli_fetch_assoc($qr1)): 
                                ?>    
                                        <div class="item <?php if($stt==0){ echo 'active';}?>">
                                            <img src="<?= $linkimage.$tinnoibat['anh']; ?>" alt="" style="width:100%; height: 300px;">
                                            <div class="carousel-caption">
                                            </div>
                                      </div>
                                <?php $stt++; endwhile;?>
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                   



                        


                        <?php 
                            $sql5875358 = "SELECT * FROM loaitin WHERE tenloaitin LIKE '%đào tạo%'" ;
                            $qr543750 = $db->query($sql5875358);

                            $LTdaotao = mysqli_fetch_assoc($qr543750);

                        ?>
                        <div class="popular-articles-middle" style="margin-top: 20px; ">
                            <div class="content-panel-title">
                                <a href="index.php?p=loaitin&idLT=<?= $LTdaotao['id']; ?>" class="right">Đọc thêm...</a>
                                <h2 style="color: #005d83;">Đào Tạo</h2>
                            </div>
                            <!-- BEGIN .top-slider-body -->
                            <div class="top-slider-body" data-top-slider-timeout="15000" data-top-slider-autostart="false">
                                <div class="top-slider-controls">
                                    <button class="left" data-top-slider-dir="left"><i class="fa fa-caret-left"></i></button>
                                    <button class="right" data-top-slider-dir="right"><i class="fa fa-caret-right"></i></button>
                                </div>
                                <div class="top-slider-content">

                                    <!-- BEGIN .top-slider-content-wrap -->
                                    <div class="top-slider-content-wrap active">
                                    <?php 
                                        // sql lấy tin 3 tin từ đào tạo
                                        $sql142543 = "SELECT * FROM tintuc WHERE duyet = 1 AND idloaitin = 16 OR idloaitin = 17 ORDER BY id DESC LIMIT 0,3 ";
                                        $qr45344 = $db->query($sql142543);

                                        while ($slite_daotao3 = mysqli_fetch_assoc($qr45344)) :
                                        $idloaitin2321 = $slite_daotao3['idloaitin'];
                                        
                                        $sql587345 = "SELECT * FROM loaitin WHERE id = '$idloaitin2321'";
                                        $qr44156142 = $db->query($sql587345);

                                        $loaitin_daotao = mysqli_fetch_assoc($qr44156142);

                                     ?>    

                                        <!-- BEGIN .item -->
                                        <div class="item">
                                            <div class="item-header">
                                                <a href="index.php?p=tintuc&idtintuc=<?= $slite_daotao3['id']; ?>">
                                                    <span class="read-more-wrapper"><span class="read-more">xem thêm<i></i></span></span>
                                                    <img src="<?= $linkimage.$slite_daotao3['anh']; ?>" alt="<?= $slite_daotao3['tieudetin']; ?>" />
                                                </a>
                                            </div>
                                            <!-- END .item -->
                                        </div>
                                        <?php endwhile; ?>
                        
                    
                                        <!-- END .top-slider-content-wrap -->
                                    </div>

                                    <!-- BEGIN .top-slider-content-wrap -->
                                    <div class="top-slider-content-wrap">

                                        <?php 
                                        // sql lấy tin 3 tin từ đào tạo
                                        $sql14253233 = "SELECT * FROM tintuc WHERE duyet = 1 AND idloaitin = 16 OR idloaitin = 17 ORDER BY id DESC LIMIT 3,3 ";
                                        $qr4534344 = $db->query($sql14253233);

                                        while ($slite_daotao6 = mysqli_fetch_assoc($qr4534344)) :
                                        $idloaitin23211 = $slite_daotao6['idloaitin'];
                                        
                                        $sql5873451 = "SELECT * FROM loaitin WHERE id = '$idloaitin23211'";
                                        $qr441561421 = $db->query($sql5873451);

                                        $loaitin_daotao6 = mysqli_fetch_assoc($qr441561421);

                                     ?>    

                                        <!-- BEGIN .item -->
                                        <div class="item">
                                            <div class="item-header">
                                                <a href="index.php?p=tintuc&idtintuc=<?= $slite_daotao6['id']; ?>">
                                                    
                                                    <span class="read-more-wrapper"><span class="read-more">xem thêm<i></i></span></span>
                                                    <img src="<?= $linkimage.$slite_daotao6['anh']; ?>" alt="<?= $slite_daotao6['tieudetin'];?>" />
                                                </a>
                                            </div>
                                            <!-- END .item -->
                                        </div>
                                        <?php endwhile; ?>                               
                                       
                                      <!-- END .top-slider-content-wrap -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php 
                        $sql59684 = "SELECT * FROM loaitin WHERE tenloaitin LIKE '%tin hoạt động%' ";
                        $qr576 = $db->query($sql59684);
                        $LTinHoatDong = mysqli_fetch_assoc($qr576);
                     ?>
                    <!-- BEGIN .content-panel -->
                    <div class="content-panel" style="margin-top: -10px; ">
                        <div class="content-panel-title">
                            <a href="index.php?p=loaitin&idLT=<?= $LTinHoatDong['id']; ?>" class="right">Đọc thêm...</a>
                            <h2><a href="index.php?p=loaitin&idLT=<?= $LTinHoatDong['id']; ?>" style="color: #005d83; "><?=$LTinHoatDong['tenloaitin']; ?></a></h2>
                        </div>

                          
                        <div class="content-panel-body split-article-slide">
                            <div class="split-article-slide-left">
                                <!-- BEGIN .top-slider-body -->
                                <div class="top-slider-body" data-top-slider-timeout="12000" data-top-slider-autostart="false">
                                    <div class="top-slider-controls">
                                        <button class="left" data-top-slider-dir="left"><i class="fa fa-chevron-left"></i></button>
                                        <button class="right" data-top-slider-dir="right"><i class="fa fa-chevron-right"></i></button>
                                    </div>
                                    <div class="top-slider-content">

                                        <!-- BEGIN .top-slider-content-wrap -->
                                        <div class="top-slider-content-wrap active">
                                         <?php 
                                            // lấy tin hoạt động đã duyệt , và lấy từ 0 và lấy 3 tin mới đăng mới nhất thuộc tin hoạt động dựa trên id
                                            $sql3 = "SELECT * FROM tintuc WHERE duyet = 1 AND idloaitin = 9 OR idloaitin = 10 ORDER BY id DESC LIMIT 0,3";
                                            $qr3 = $db->query($sql3);


                                          ?>          
                                         <?php while ($slite_tinhoatdong3 = mysqli_fetch_assoc($qr3)): ?>
                                            <!-- BEGIN .item -->
                                            <div class="item">
                                                <div class="item-header">
                                                    <a href="index.php?p=tintuc&idtintuc=<?= $slite_tinhoatdong3['id'];?>">
                                                        <span class="read-more-wrapper"><span class="read-more">xem thêm<i></i></span></span>
                                                        <img src="<?= $linkimage.$slite_tinhoatdong3['anh'] ;?>" alt="" />
                                                    </a>
                                                </div>
                                               
                                                <!-- END .item -->
                                            </div>
                                        <?php endwhile; ?>

                                        <!-- END .top-slider-content-wrap -->
                                        </div>

                                        <!-- BEGIN .top-slider-content-wrap -->
                                        <div class="top-slider-content-wrap">

                                        <?php 
                                            // lấy tin hoạt động đã duyệt , và lấy từ 3 và lấy 3 tin mới đăng mới nhất thuộc tin hoạt động dựa trên id 
                                            $sql4 = "SELECT * FROM tintuc WHERE duyet = 1 AND idloaitin = 9 OR idloaitin = 10  ORDER BY id DESC LIMIT 3,3";
                                            $qr4= $db->query($sql4);


                                        ?>    
                                        <?php while ($slite_tinhoatdong6 = mysqli_fetch_assoc($qr4)): ?>
                                            <!-- BEGIN .item -->
                                            <div class="item">
                                                <div class="item-header">
                                                    <a href="index.php?p=tintuc&idtintuc=<?= $slite_tinhoatdong6['id'];?>">
                                                        
                                                        <span class="read-more-wrapper"><span class="read-more">xem thêm<i></i></span></span>
                                                        <img src="<?= $linkimage.$slite_tinhoatdong6['anh'] ;?>" alt="<?= $slite_tinhoatdong6['tieudetin'] ;?>" />
                                                    </a>
                                                </div>
                                                
                                                <!-- END .item -->
                                            </div>
                                        <?php endwhile; ?>

                        
                                            <!-- END .top-slider-content-wrap -->
                                        </div>

                                    </div>
                                    <!-- END .top-slider-body -->
                                </div>
                            </div>
                            <div class="split-article-slide-right">
                               <?php 
                                    // sql lấy tin có số lượt xem nhiều nhất thuộc tin hoạt động
                                    $sql65489 = "SELECT * FROM tintuc WHERE idloaitin = 9 OR idloaitin = 10 ORDER BY id DESC LIMIT 0,1";
                                    $qr15454 = $db->query($sql65489);

                                    while ( $newhot = mysqli_fetch_assoc($qr15454)) :
                                ?>
                                <div class="item">
                                    <div class="item-header">
                                        <a href="index.php?p=tintuc&idtintuc=<?= $newhot['id'];?>">
                                            
                                            <span class="read-more-wrapper"><span class="read-more">Xem thêm<i></i></span></span>
                                            <img src="<?= $linkimage.$newhot['anh']; ?>" alt="<?= $newhot['tieudetin'];  ?>" />
                                        </a>
                                    </div>

                                    <div class="item-content">
                                        <h3><a href="index.php?p=tintuc&idtintuc=<?= $newhot['id'];?>"><?= $newhot['tieudetin'];  ?></a></h3>
                                        <span class="item-meta">
                                            <i class="fa fa-clock-o"></i><?= $newhot['ngaydangtin'] ;?>
                                        </span>
                                        <p><?= $newhot['tomtattin'];  ?></p>
                                        <a href="index.php?p=tintuc&idtintuc=<?= $newhot['id'];?>" class="read-more-button">xem thêm<i class="fa fa-mail-forward"></i></a>
                                    </div>
                                    
                                </div>
                                <?php endwhile; ?>

                            </div>
                        </div>


                        <!-- END .content-panel -->

                        <?php $sql3432 = "SELECT * FROM loaitin WHERE id = 20;" ;
                              $qr5456 = $db->query($sql3432);
                              $VBCN = mysqli_fetch_assoc($qr5456);
                              

                        ?>
                        <div class="content-panel" style="margin-top: -20px;">
                        <div class="content-panel-title">
                            <a href="index.php?p=loaitin&idLT=<?= $VBCN['id']; ?>" class="right">Xem Thêm...</a>
                            <h2><a href="index.php?p=loaitin&idLT=<?= $VBCN['id']; ?>" style="color: #005d83"><?=$VBCN['tenloaitin']; ?></a></h2>
                        </div>
                        <?php
                              $sql454654 = "SELECT * FROM tintuc WHERE duyet = 1 AND idloaitin = 20 ORDER BY id DESC LIMIT 0,8";
                              $qr5687 = $db->query($sql454654);

                              
                              
                         ?>
                        <div>
                            <ul>
                            <?php while($vabcn = mysqli_fetch_assoc($qr5687)) : ?>
                            <li><i class="fa fa-book"><a href="index.php?p=tintuc&idtintuc=<?= $vabcn['id']; ?>"> <?= $vabcn['tieudetin']; ?></a></i></li>
                            <?php endwhile; ?>
                            </ul>
                        <div class="slide-holder">
                                
                            <div class="slide-pager">
                                    
                            </div>
                            <div class="slide-container">
                                    <div class="slide-stage">
                                        <div class="slide-image"><img class="pull-left" src="http://ttcntt.stttt.khanhhoa.gov.vn/kcitc/images/banners/qc-truongY.jpg" ></div>
                                            <div class="slide-image"><img class="pull-left" src="http://ttcntt.stttt.khanhhoa.gov.vn/kcitc/images/logo/1.png" ></div>
                                            <div class="slide-image"><img class="pull-left" src="http://ttcntt.stttt.khanhhoa.gov.vn/kcitc/images/logo/2.png" ></div>
                                            <div class="slide-image"><img class="pull-left" src="http://ttcntt.stttt.khanhhoa.gov.vn/kcitc/images/logo/3.png" ></div>
                                            <div class="slide-image"><img class="pull-right" src="http://ttcntt.stttt.khanhhoa.gov.vn/kcitc/images/logo/4.png" ></div>
                                            <div class="slide-image"><img class="pull-left" src="http://ttcntt.stttt.khanhhoa.gov.vn/kcitc/images/logo/5.png" ></div>
                                            <div class="slide-image"><img class="pull-left" src="http://ttcntt.stttt.khanhhoa.gov.vn/kcitc/images/banners/qc-hoi-nong-dan-nhatrang.jpg" ></div>
                                            <div class="slide-image"><img class="pull-right" src="http://ttcntt.stttt.khanhhoa.gov.vn/kcitc/images/banners/QC-KKTvanphong.jpg" ></div>
                                            <div class="slide-image"><img class="pull-right" src="http://ttcntt.stttt.khanhhoa.gov.vn/kcitc/images/banners/qc-CHICUCLUUTRU.jpg" ></div>
                                            <div class="slide-image"><img class="pull-left" src="http://ttcntt.stttt.khanhhoa.gov.vn/kcitc/images/banners/qc-ctyDT.jpg" ></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    
                     </div>


                    </div>
                    <!-- END .content-block-single -->
                </div>

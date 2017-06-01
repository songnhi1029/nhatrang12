

<!-- BEGIN .content -->
    <section class="content">
        

        <!-- BEGIN .content -->
        <section class="content">

            <!-- BEGIN .wrapper -->
            <div class="wrapper">

                <div class="content-block">

                    <!-- BEGIN .content-block-single -->
                    <div class="content-block-single">
                    <?php

                        $sql5470 = "SELECT * FROM loaitin WHERE id = '$idLT'" ;
                        $qr4325 =$db->query($sql5470);
                        $typeofnews = mysqli_fetch_assoc($qr4325);
                     ?>
                        <!-- BEGIN .content-panel -->
                        <div class="content-panel">
                            <div class="content-panel-title">
                                <a href="index.php" class="right">QUAY LẠI TRANG CHỦ</a>
                                <h2 style="color: #005d83;"><?= $typeofnews['tenloaitin']; ?></h2>
                            </div>
                            
                            <div class="content-panel-body photo-gallery-blocks">
                                   <?php  

                                    if ($typeofnews['capcha'] == 0) {
                                        $id343 = $typeofnews['id'];
                                        $sql4343 = "SELECT * FROM loaitin WHERE capcha = '$id343'";
                                        $qr937 = $db->query($sql4343);
                                        while($loaitin_chung = mysqli_fetch_assoc($qr937)){

                                           $idlt2 = $loaitin_chung['id'];    

                                            $sql4553 = "SELECT * FROM tintuc WHERE idloaitin = '$idlt2' AND duyet = 1 ORDER BY id DESC LIMIT 0,8 ";
                                            $qr5897 = $db->query($sql4553);
                                            while ($newlt = mysqli_fetch_assoc($qr5897)): 
                                                $idlt334 = $newlt['idloaitin'];
                                                $sql190 = "SELECT * FROM loaitin WHERE id = '$idlt334'";
                                                $qr23243 = $db->query($sql190);
                                                $tenlt = mysqli_fetch_assoc($qr23243);
                                            ?>
                                                
                                               <!-- BEGIN .item -->
                                                <div class="item">
                                                    <div class="item-header">
                                                        <a href="index.php?p=tintuc&idtintuc=<?= $newlt['id'];?>">
                                                            <span class="read-more-wrapper"><span class="read-more">Xem thêm<i></i></span></span>
                                                            <img style=" height: 180px;" src="<?= $linkimage.$newlt['anh']; ?>" alt="<?= $newlt['tieudetin']; ?>" />
                                                        </a>
                                                    </div>
                                                    <div class="item-content">
                                                        <h3><a href="index.php?p=tintuc&idtintuc=<?= $newlt['id']; ?>"><?= $newlt['tieudetin']; ?></a></h3>
                                                        <strong class="category-link"><a href="index.php?p=loaitin&idLT=<?= $newlt['idloaitin'];?>"><?= $tenlt['tenloaitin']; ?></a></strong>
                                                        <a href="index.php?p=tintuc&idtintuc=<?= $newlt['id']; ?>" class="read-more-button"> Xem thêm<i class="fa fa-mail-forward"></i></a>
                                                    </div>
                                                    <!-- BEGIN .item -->
                                                </div>  
                                            <?php endwhile;  
                                            
                                        }   
                                    }else if($typeofnews['capcha'] != 0){

                                        $sql4385 = "SELECT * FROM tintuc WHERE idloaitin = '$idLT' AND duyet = 1 ORDER BY id DESC LIMIT 0,8";                                   
                                        $qr5897 = $db->query($sql4385);
                                        while ($newlt = mysqli_fetch_assoc($qr5897)): ?>
                                             <!-- BEGIN .item -->
                                                <div class="item">
                                                    <div class="item-header">
                                                        <a href="index.php?p=tintuc&idtintuc=<?= $newlt['id'];?>">
                                                            <span class="read-more-wrapper"><span class="read-more">Xem thêm<i></i></span></span>
                                                            <img style=" height: 180px;" src="<?= $linkimage.$newlt['anh']; ?>" alt="<?= $newlt['tieudetin']; ?>" />
                                                        </a>
                                                    </div>
                                                    <div class="item-content">
                                                        <h3><a href="index.php?p=tintuc&idtintuc=<?= $newlt['id']; ?>"><?= $newlt['tieudetin']; ?></a></h3>
                                                        <strong class="category-link"><a href="index.php?p=loaitin&idLT=<?= $typeofnews['id'];?>"><?= $typeofnews['tenloaitin']; ?></a></strong>
                                                        <a href="index.php?p=tintuc&idtintuc=<?= $newlt['id']; ?>" class="read-more-button"> Xem thêm<i class="fa fa-mail-forward"></i></a>
                                                    </div>
                                                    <!-- BEGIN .item -->
                                                </div>         
                                        <?php endwhile;

                                    }
                                ?>
                            </div>
                            <!-- END .content-panel -->
                        </div>
                
                        <!-- END .content-block-single -->
                    </div>

                </div>


                <!-- END .wrapper -->
            </div>

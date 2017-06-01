<?php

    $sql = "SELECT * FROM loaitin WHERE capcha = 0";
    $menuquery = $db->query($sql);

 ?>

            <nav class="main-menu" style="margin-top: -28px; ">
                <a href="#dat-menu" class="dat-menu-button"><i class="fa fa-bars"></i>Menu</a>
                <div class="main-menu-placeholder">
                        <div class="menu-search-thing">
                                            <form action="#">
                                                <input type="text" placeholder="Tìm kiếm.." />
                                                <input type="submit" value="Search" />
                                            </form>
                                            <button><i class="fa fa-search"></i></button>
                                        </div>
                        <div class="main-menu-wrapper">

                        <ul class="top-main-menu load-responsive" rel="Main Menu">
                            <li><a href="index.php">Trang Chủ</a></li>
                            <?php 

                                while($menu = mysqli_fetch_assoc($menuquery)): 
    
                                  $parent_id = $menu['id'];
                                  $sql2 = "SELECT * FROM loaitin WHERE capcha ='$parent_id'";
                                  $cquery = $db->query($sql2);
                            ?>   
                            <li><a href="index.php?p=loaitin&idLT=<?= $menu['id'];?>"><span><?= $menu['tenloaitin'] ?></span></a>
                                <ul class="sub-menu">
                                    <?php while($child = mysqli_fetch_assoc($cquery)) : ?>
                                    <li><a href="index.php?p=loaitin&idLT=<?=$child['id'];?>"><?php echo $child['tenloaitin']; ?></a></li>
                                    <?php endwhile; ?>
                                </ul>
                            </li>
                        <?php endwhile; ?>
                            <li><a href="index.php?p=quanba">Liên Hệ</a></li>
                        </ul>
                    </div>
            </nav>
            <!-- END .wrapper -->
        </div>

        <!-- END .header -->
    </header>
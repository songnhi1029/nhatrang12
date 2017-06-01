 <!-- BEGIN .sidebar -->
 
                <aside class="sidebar" style="margin-top: -20px; ">

                    <div class="widget" style="margin-bottom: 20px; ">
                        <h3>THÔNG BÁO</h3>
                        <ul>
                       
                        <?php 
                            
                            $sql54354 = "SELECT * FROM tintuc WHERE duyet = 1 AND thongbao = 1 ORDER BY id DESC LIMIT 0,3";
                            $qr72163 = $db->query($sql54354);

                            while ($thongbao = mysqli_fetch_assoc($qr72163)):
                         ?>
                        
                              
                            
                                <li><i class="fa fa-bullhorn" aria-hidden="true"></i><a href="index.php?p=tintuc&idtintuc=<?= $thongbao['id'];?>"> <?= $thongbao['tieudetin']; ?></a></li>
                            
                        
                        <?php endwhile; ?>
                        

                        <?php 
                            $sql98 = "SELECT * FROM loaitin WHERE tenloaitin LIKE '%thông báo%' AND capcha = 888 ";
                            $qr98 = $db->query($sql98);
                            $TLthongbao = mysqli_fetch_assoc($qr98);
                         ?>
                         </ul>
                        <a href="index.php?p=loaitin&idTL=<?= $TLthongbao['id'];?>" class="button-read-more">Xem thêm...</a>
                        
                    </div>



                   
                    <?php 
                        $sql349574 = "SELECT * FROM quangcao ORDER BY id ASC LIMIT 0,1";
                        $qri735 = $db->query($sql349574);
                        $qc2 = mysqli_fetch_assoc($qri735); 
                     ?>
                    <!-- right box -->
                    <div class="widget" style="height: 200px; margin-top: 20px;  ">
                        <div class="do-space">
                            <a href="<?= $qc2['link']; ?>" target="_blank"><img style="height: 200px;" src="images/photos/<?= $qc2['urlanh'];?>" alt="" /></a>
                        </div>
                    </div>

                    <?php 
                        $sql349574 = "SELECT * FROM quangcao ORDER BY id ASC LIMIT 1,2";
                        $qri735 = $db->query($sql349574);
                        $qc2 = mysqli_fetch_assoc($qri735); 
                     ?>
                    <!-- right box -->
                    <div class="widget" style="height: 200px; ">
                        <div class="do-space">
                            <a href="<?= $qc2['link']; ?>" target="_blank"><img style="height: 200px; " src="images/photos/<?= $qc2['urlanh'];?>" alt="" /></a>
                        </div>
                    </div>

                    <div class="widget">
                        <h3>THEO DÕI CHÚNG TÔI</h3>
                        <div class="social-widget">
                            <div class="social-squares">
                                <a href="#" target="_blank" class="hover-color-facebook"><i class="fa fa-facebook"></i></a>
                                <a href="#" target="_blank" class="hover-color-twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" target="_blank" class="hover-color-google-plus"><i class="fa fa-google-plus"></i></a>
                                <a href="#" target="_blank" class="hover-color-youtube"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="widget">
                        <h3>CÁC WEBSITES LIÊN KẾT VỚI CHÚNG TÔI.</h3>
                        <div class="social-widget">
                            <ul>
                                <li><i class="fa fa-fire" aria-hidden="true"></i> <a href="http://khanhhoa.gov.vn/">Cổng thông tin điện tử Khánh Hòa.</a></li>
                                <li><i class="fa fa-fire" aria-hidden="true"></i> <a href="http://stttt.khanhhoa.gov.vn/">Sở thông tin và truyền thông Khánh Hòa.</a></li>
                                <li><i class="fa fa-fire" aria-hidden="true"></i> <a href="http://mic.gov.vn/Pages/trangchu.aspx">Bộ thông tin và truyền thông.</a></li>
                                <li><i class="fa fa-fire" aria-hidden="true"></i> <a href="https://www.vnnic.vn/">Trung Tâm internet Việt Nam.</a></i></li>
                                <li><i class="fa fa-fire" aria-hidden="true"></i> <a href="http://aita.gov.vn/">Cục tin họa hóa.</a></i></li>
                                <li><i class="fa fa-fire" aria-hidden="true"></i> <a href="http://www.niics.gov.vn/">Chiến lược thông tin và truyền thông.</a></li>
                                <li><i class="fa fa-fire" aria-hidden="true"></i> <a href="http://vncert.gov.vn/">Trung tâm ứng cứu khẩn cấp máy tính Việt Nam - VNCERT.</a></li>
                                <li><i class="fa fa-fire" aria-hidden="true"></i> <a href="http://ictvietnam.vn/">Tạp chí CNTT và truyền thông. </a></li>
                             </ul>
                        </div>
                    </div>


                    <div class="widget">
                        <h3>THỐNG KÊ TRUY CẬP</h3>
                        <div class="widget-instagram-photos">
                            <p><b>Hôm nay:</b> 1<br/>
                            <b>Tháng này:</b> 19<br/>
                            <b>Lượt truy cập:</b> 3<br/>
                            <b>Trực tuyến:</b> 01 Khách</p>
                        </div>
                    </div>


                    <!-- END .sidebar -->
                </aside>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>

        </div>
    </section>


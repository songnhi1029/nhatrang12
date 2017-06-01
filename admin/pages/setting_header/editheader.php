
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cài đặt Header
        <small>thay đổi nội dung header</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-eye"></i>Menu chính</a></li>
        <li><a href="#">Cài đặt header</a></li>
        <li>Logo</li>
        
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
                  <?php
                    //luu mau cua header
                    if(isset($_POST['LuuColor'], $_POST['colorHeader']) && $_POST['colorHeader'] != ""){
                      $qrColor="UPDATE `qlheader` SET `colorheader`= '".$_POST['colorHeader']."' WHERE `id`=1";
                      if ($conn->query($qrColor) === TRUE) {
                          //header("location: ?view=editlogo");
                          echo "<script> alert('Thành công!');</script>";
                      } else {
                          echo "Error updating record: " . $conn->error;
                      }
                    }else{}
                    if(isset($_POST['LuuSlogan'])){
                      $qrSlogan = "UPDATE `qlheader` SET `slogan`='".$_POST['Slogan1']."', `slogan2`='".$_POST['Slogan2']."', `lienhe`='".$_POST['lienhe']."', `colorheader`='".$_POST['Clienhe']."', `colorslogan1`='".$_POST['Cslogan1']."', `colorslogan2`='".$_POST['Cslogan2']."'";
                      if ($conn->query($qrSlogan) === TRUE) {
                          //header("location: ?view=editlogo");
                          echo "<script> alert('Thành công!');</script>";
                      } else {
                          echo "Error updating record: " . $conn->error;
                      }

                    }else{}
                      //lay du lieu tu cho header main
                      $sqlHeader = "SELECT * FROM qlheader";
                      if(isset($_POST['Cslogan1']) && $_POST['Cslogan1']!=""){
                        $cslogan1 = $_POST['Cslogan1']; 
                      }
                      $kqHeader = $conn->query($sqlHeader);
                      if($kqHeader->num_rows > 0) {
                        while ($kq=$kqHeader->fetch_row()){
                          $link_img = "dist/img/";
                          echo   '<div id="div-header-main" class="col-sm-12 header-main" style="background-color: '.$kq[5].'">
                                    <div class="header-main-logo"">
                                        <div class="col-sm-2">
                                            <h1 style="text-align: center; "><a href="index.php " ><img id="anhlogo" style="height: '.$kq[6].'px; width: '.$kq[7].'px" src="'.$link_img.$kq[1].'"  data-ot-retina="images/logo@2x.png" /></a>
                                            </h1>
                                        </div>
                                        <div class="col-sm-7" >
                                            <h3 style="text-align: left; margin-left: 3px"><a style="color:'.$kq[8].'" id="HSlogan1" href="index.php">'.$kq[2].'</a></h3><h4"><small style="color: '.$kq[9].'" id="HSlogan2">'.$kq[3].'</small></h4>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5 style="color:'.$kq[10].'" id="HLienhe">'.$kq[4].'</h5>
                                        </div>
                                    </div>
                                  </div>';
                                     }
                      }else {
                        echo "Error ".$conn->error;
                      }
                    

                  ?>
                      <!-- END .header-main -->        
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <br/>
      <!-- /.row -->
      <div class="row">
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Logo</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Ảnh logo</label>
                  <div id="kv-avatar-errors-2" class="center-block"></div>
                  <div  class="kv-avatar center-block">
                    <input id="avatar-2" name="anh-chinh" type="file" class="file-loading">
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Height</label>
                    <input type="text" name="hlogo" class="form-control" placeholder="90">px
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Width</label>
                    <input type="text" name ="wlogo" class="form-control"  placeholder="170">px
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="button" id="LogoXem" name="LogoXem" class="btn btn-primary">Xem</button>
                <button type="submit" name="LogoLuu" class="btn btn-primary">Lưu</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Slogan & Liên hệ</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Slogan 1</label>
                  <input type="text" id="Slogan1" name="Slogan1" class="form-control" placeholder="Trung tâm Công nghệ thông tin & Truyền thông Khánh Hòa">
                  <input type="color" name="Cslogan1" id="Cslogan1" value="#3bcc1e">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Slogan 2</label>
                  <input type="text" id="Slogan2" name="Slogan2" class="form-control" placeholder="Khanh Hoa Center Of Information Technology & Communications">
                  <input type="color" name="Cslogan2" id="Cslogan2" value="#777">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Liên hệ</label>
                  <input type="text" id="lienhe" name="lienhe" class="form-control" placeholder="Hotline: (058) 3563028 - (058) 3820825">
                  <input type="color" name="Clienhe" id="Clienhe" value="#777">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="button" id="XemSlogan" class="btn btn-primary">Xem</button>
                <button type="submit" name="LuuSlogan" class="btn btn-primary">Lưu</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Màu sắc Header</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post">
              <div class="box-body">
                <div class="form-group">
                  <input id="colorHeader" name="colorHeader" type="color" value="#ffffff">
                  <img />
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="button" id="Xemcolor" name="Xemcolor" class="btn btn-primary">Xem</button>
                <button type="submit" name="LuuColor" class="btn btn-primary">Lưu</button>
              </div>
            </form>
          </div>
        </div>

      </div>
      <!-- /.row -->

    </section>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/fullcalendar/fullcalendar.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex: 1070,
          revert: true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        });

      });
    }

    ini_events($('#external-events div.external-event'));

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week: 'week',
        day: 'day'
      },
      //Random default events
      events: [
        {
          title: 'All Day Event',
          start: new Date(y, m, 1),
          backgroundColor: "#f56954", //red
          borderColor: "#f56954" //red
        },
        {
          title: 'Long Event',
          start: new Date(y, m, d - 5),
          end: new Date(y, m, d - 2),
          backgroundColor: "#f39c12", //yellow
          borderColor: "#f39c12" //yellow
        },
        {
          title: 'Meeting',
          start: new Date(y, m, d, 10, 30),
          allDay: false,
          backgroundColor: "#0073b7", //Blue
          borderColor: "#0073b7" //Blue
        },
        {
          title: 'Lunch',
          start: new Date(y, m, d, 12, 0),
          end: new Date(y, m, d, 14, 0),
          allDay: false,
          backgroundColor: "#00c0ef", //Info (aqua)
          borderColor: "#00c0ef" //Info (aqua)
        },
        {
          title: 'Birthday Party',
          start: new Date(y, m, d + 1, 19, 0),
          end: new Date(y, m, d + 1, 22, 30),
          allDay: false,
          backgroundColor: "#00a65a", //Success (green)
          borderColor: "#00a65a" //Success (green)
        },
        {
          title: 'Click for Google',
          start: new Date(y, m, 28),
          end: new Date(y, m, 29),
          url: 'http://google.com/',
          backgroundColor: "#3c8dbc", //Primary (light-blue)
          borderColor: "#3c8dbc" //Primary (light-blue)
        }
      ],
      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar !!!
      drop: function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject');

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject);

        // assign it the date that was reported
        copiedEventObject.start = date;
        copiedEventObject.allDay = allDay;
        copiedEventObject.backgroundColor = $(this).css("background-color");
        copiedEventObject.borderColor = $(this).css("border-color");

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove();
        }

      }
    });

    /* ADDING EVENTS */
    var currColor = "#3c8dbc"; //Red by default
    //Color chooser button
    var colorChooser = $("#color-chooser-btn");
    $("#color-chooser > li > a").click(function (e) {
      e.preventDefault();
      //Save color
      currColor = $(this).css("color");
      //Add color effect to button
      $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
    });
    $("#add-new-event").click(function (e) {
      e.preventDefault();
      //Get value and make sure it is not null
      var val = $("#new-event").val();
      if (val.length == 0) {
        return;
      }

      //Create events
      var event = $("<div />");
      event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
      event.html(val);
      $('#external-events').prepend(event);

      //Add draggable funtionality
      ini_events(event);

      //Remove event from text input
      $("#new-event").val("");
    });
  });
</script>
<script src="plugins/fileinput/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>  
<script src="plugins/fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>  
<script src="plugins/fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
<script src="plugins/fileinput/js/fileinput.min.js"></script>
<script type="text/javascript">
    var btnCust = '<button type="button" class="btn btn-default" title="Add picture tags" ' + 
      'onclick="alert(\'Call your custom code here.\')">' +
      '<i class="glyphicon glyphicon-tag"></i>' +
      '</button>'; 
  $("#avatar-2").fileinput({
    overwriteInitial: true,
    maxFileSize: 1500,
    showClose: false,
    showCaption: false,
    showBrowse: false,
    browseOnZoneClick: true,
    removeLabel: '',
    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
    removeTitle: 'Cancel or reset changes',
    elErrorContainer: '#kv-avatar-errors-2',
    msgErrorClass: 'alert alert-block alert-danger',
    defaultPreviewContent: '<img src="dist/img/anh-chinh.png" alt="Ảnh chính" style="width:30%"><h6 class="text-muted">Click chọn ảnh</h6>',
    layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
    allowedFileExtensions: ["jpg", "png", "gif"]
  });
</script>
<script type="text/javascript">
  //Xem mau cua header
  $('#Xemcolor').click(function(){
    var x = document.getElementById("colorHeader").value;
    //alert(x);
    $('#div-header-main').css("background-color", x);
  });
  //Xem Slogan1 và 2
  $('#XemSlogan').click(function(){
    var x1 = document.getElementById("Slogan1").value;
    var c1 = document.getElementById("Cslogan1").value;
    var x2 = document.getElementById("Slogan2").value;
    var c2 = document.getElementById("Cslogan2").value;
    var x3 = document.getElementById("lienhe").value;
    var c3 = document.getElementById("Clienhe").value;
    //alert(x1+x2+x3);
    if(x1!=""){
      $('#HSlogan1').html(x1);
    }else{}
    $('#HSlogan1').css("color", c1);
    if(x2!=""){
      $('#HSlogan2').html(x2);
    }else{}
    $('#HSlogan2').css("color", c2);
    if(x3!=""){
      $('#HLienhe').html(x3);
    }else{}
    $('#HLienhe').css("color", c3);

  });
</script>
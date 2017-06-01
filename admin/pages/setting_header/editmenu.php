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

    <?php 

    function display_errors($errors){
		$display = '<ul class="bg-danger">';
		foreach ($errors as $error) {
			$display.= '<li class="text-danger">'.$error.'</li>';
		}
		$display.='</ul>';
		return $display;
	}

	function sanitize($dirty){
		return htmlentities($dirty,ENT_QUOTES,"UTF-8");
	}

	$sql = "SELECT * FROM loaitin WHERE capcha = 0 ";
	$result = $conn->query($sql);
	$errors = array();
	$tenloaitin = '' ;
	$post_capcha='';

	//Sua Tenloaitin
	if (isset($_GET['edit']) && !empty($_GET['edit'])) {
		$edit_id = (int)$_GET['edit'];
		$edit_id = sanitize($edit_id);
		$edit_sql= "SELECT * FROM loaitin WHERE id = '$edit_id'";
		$edit_result = $conn->query($edit_sql);
		$edit_loaitin = mysqli_fetch_assoc($edit_result);
		

	}
	

	//delete category
	if (isset($_GET['delete']) && !empty($_GET['delete'])) {
		$delete_id =(int) $_GET['delete'];
		$delete_id = sanitize($delete_id);
		$sqldelete = "SELECT * FROM loaitin WHERE id = '$delete_id'";
		$delete_result = $conn->query($sqldelete);
		$loaitin = mysqli_fetch_assoc($delete_result);
		if ($loaitin['capcha'] == 0) {
			$sql = "DELETE FROM loaitin WHERE capcha = '$delete_id'";
			$conn->query($sql);
		}
		$dsql = "DELETE FROM loaitin WHERE id = '$delete_id'";
		$conn->query($dsql);
		//header('Location: index.php?view=editmenu');
	}

	//orocess Form
	if (isset($_POST) && !empty($_POST) ){
		$post_capcha = sanitize($_POST['capcha']);
		$tenloaitin = sanitize($_POST['tenloaitin']);
		$sqlform = "SELECT * FROM loaitin WHERE tenloaitin = '$tenloaitin' AND capcha = '$post_capcha'";
		if (isset($_GET['edit'])) {
			$id = $edit_loaitin['id'];
			$sqlform = "SELECT * FROM loaitin WHERE tenloaitin = '$tenloaitin' AND capcha = '$post_capcha' AND id != '$id'";
		}
		$fresult = $conn->query($sqlform);
		$count = mysqli_num_rows($fresult);

		if ($tenloaitin == '') {
			$errors[] .= 'Không được bỏ trống tên loại tin.';

		}

		//If exists int the datebase
		if ($count > 0) {
			$errors[] .= $tenloaitin.' đã tồn tại. hãy chọn tên loại tin khác!';
		}


		//Display Errors or Update Database
		if (!empty($errors)) {
			$display = display_errors($errors);
		?>
		
		<script type="text/javascript">
			jQuery('document').ready(function() {
				jQuery('#errors').html('<?=$display; ?>');
			});
		</script>
		<?php 

		}else{
			//update database
			$updatesql = "INSERT INTO loaitin (tenloaitin,capcha) VALUES ('$tenloaitin','$post_capcha')";
			if (isset($_GET['edit'])) {
				$updatesql="UPDATE loaitin SET tenloaitin = '$tenloaitin', capcha='$post_capcha' WHERE id = '$edit_id' ";
			}
			$conn->query($updatesql);
			//header('Location: index.php?view=editmenu');
		}

	}

	
	$tenloaitin_value='';
	$capcha_value = '' ;

	if (isset($_GET['edit'])) {
		$tenloaitin_value = $edit_loaitin['tenloaitin'];
		$capcha_value = $edit_loaitin['capcha'];
	}else{
		if (isset($_POST)) {
			$tenloaitin_value = $tenloaitin ;
			$capcha_value = $post_capcha ;
		}
	}
 	
	
 ?>
 <!-- Main content -->
 <section class="content">
 <div class="row">
 <div class="col-md-12">
    <div class="box box-primary">
	
		
		<!-- loaitin Form -->
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<form class="form" action="?view=editmenu&<?=((isset($_GET['edit']))?'edit='.$edit_id:''); ?>" method="POST" role="form">
				<legend class="text-center"><?=((isset($_GET['edit']))?'Sửa':'Thêm') ;?>Loại tin</legend>
				<div id="errors"></div>
				<div class="form-group">
					<label for="capcha">Cấp Cha</label>
					<select name="capcha" class="form-control" id="capcha">
						<option value="0" <?=(($capcha_value == 0)?'selected="selected"':''); ?>>Cấp Cha</option>
						<?php while($capcha = mysqli_fetch_assoc($result)): ?>
							<option value="<?=$capcha['id'];?>" <?=(($capcha_value == $capcha['id'])?'selected="selected"':''); ?>><?=$capcha['tenloaitin'];?></option>
						<?php endwhile; ?>
					</select>
				</div>
				
				<div class="form-group">

					<label for="tenloaitin">Tên loại tin</label>
					<input type="text" name="tenloaitin" id="tenloaitin" class="form-control" value="<?=$tenloaitin_value;?>">
				</div>
				
				<div class="form-group">
					<input type="submit" name="" value="<?=((isset($_GET['edit'])))?'Sửa':'Thêm'; ?> loại tin" class="btn btn-success">
				</div>
			
				
			</form>
		</div>

		<!-- loaitin Table -->
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<table class="table table-bordred">
				<thead>
					<th>Tên Loại Tin</th><th>Cấp cha</th><th></th>
				</thead>
				<tbody>
					<?php
					$sql333 = "SELECT * FROM loaitin WHERE capcha = 0 ";
					$result434 = $conn->query($sql333);

					 while($parent = mysqli_fetch_assoc($result434)):
						$parent_id = (int)$parent['id'];
						$sql2 = "SELECT * FROM loaitin WHERE capcha = '$parent_id'";
						$cresult = $conn->query($sql2); 
					 ?>
					<tr class="bg-primary">
						<td><?=$parent['tenloaitin']; ?></td>
						<td>Cấp Cha</td>
						<td>
							<a href="?view=editmenu&edit=<?= $parent['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
							<a href="?view=editmenu&delete=<?= $parent['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove-sign"></span></a>
						</td>
					</tr>
					<?php while ($child = mysqli_fetch_assoc($cresult)):?>
					<tr class="bg-info">
						<td><?=$child['tenloaitin']; ?></td>
						<td><?=$parent['tenloaitin']; ?></td>
						<td>
							<a href="?view=editmenu&edit=<?=$child['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
							<a href="?view=editmenu&delete=<?=$child['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove-sign"></span></a>
						</td>
					</tr>
					<?php endwhile;?>
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>

	</div>
	</div>
</div>
</section>
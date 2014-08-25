<?php
include '../defaults.php';
include '../functions.php';
session_start ();
if (! isset ( $_SESSION ['validate'] )) {
    Redirect ( ADDRESS . 'e-admin/error.php' );
} else {
    require_once str_replace ( '\\', '/', dirname ( dirname ( __FILE__ ) ) ) . '/inc/m-category.php';
    $myCats = new category ();
    if (isset ( $_GET ['del'] )) {
        $myCats->DeleteC ( $_GET ['del'] );
        Redirect ( ADDRESS . 'e-admin/category.php' );
    }
    if (isset ( $_GET ['newcat'] )) {
        $myCats->CreateC ( $_GET ['newcat'] );
        Redirect ( ADDRESS . 'e-admin/category.php' );
    }
    if (isset ( $_GET ['edit'] )) {
        $selCat = $myCats->getCat ( $_GET ['edit'] );
        $currentCat = $selCat [0] ['name'];
    }
    if (isset ( $_GET ['update'] )) {
        $selCat = $myCats->UpdateC($_GET['update'], $_GET['id']);
        Redirect ( ADDRESS . 'e-admin/category.php' );
    }
    
    ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<link href="css/bootstrap.rtl.css" rel="stylesheet" />
<link href="css/font-awesome.css" rel="stylesheet" />
<link href="assets/js/dataTables/dataTables.bootstrap.css"
	rel="stylesheet" />

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php echo TITLE?> Category Manager</title>
<?php require_once 'side.php';?>
		<div id="page-wrapper">
			<div id="page-inner">
				<div class="col-md-12">
					<h2>مدیریت موضوعات</h2>
					<div class="row">
						<div class="panel panel-default"
							style="height: 60px; padding: 10px;">
							<form action="" method="get">
								<div class="col-xs-3">
							<?php
if (isset ( $_GET ['edit'] )) {
        echo '<input type="text" class="form-control" name="update" value="' . $currentCat . '"></input>';
        echo '<input type="text" style="display:none;" class="form-control" name="id" value="' .  $_GET ['edit']  . '"></input>';
    } else {
        echo '<input type="text" class="form-control" placeholder="نام موضوع جدید" name="newcat"></input>';
    }
    ?>							
							</div>
								<button type="submit" id="send" class="btn btn-primary">ایجاد</button>
							</form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">لیست موضوعات</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover"
										id="dataTables-example">
										<thead>
											<tr>
												<th>Id</th>
												<th>نام</th>
												<th>حذف</th>
												<th>ویرایش</th>
											</tr>
										</thead>
										<tbody>
                                    <?php
    $Cats = $myCats->ReadC ();
    foreach ( $Cats as $Cat )
        echo '<tr class="odd gradeX"><td>' . $Cat ['id'] . '</td><td>' . $Cat ['name'] . '</td><td>' . '<a href="category.php?del=' . $Cat ['id'] . '"><i style="color:red;" class="fa fa-times"></i></a>' . '</td><td>' . '<a href="category.php?edit=' . $Cat ['id'] . '"><i class="fa fa-pencil-square-o"></i></a>' . '</td></tr>';
    ?></tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/js/jquery-1.10.2.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.metisMenu.js"></script>
	<script src="assets/js/dataTables/jquery.dataTables.js"></script>
	<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
	<script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
	<script src="assets/js/custom.js"></script>
</body>
</html>
<?php
}
?>
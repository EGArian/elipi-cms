<?php
include '../defaults.php';
include '../functions.php';
session_start ();
if (! isset ( $_SESSION ['validate'] )) {
    Redirect ( ADDRESS . 'e-admin/error.php' );
} else {
    require_once str_replace ( '\\', '/', dirname ( dirname ( __FILE__ ) ) ) . '/inc/m-member.php';
    $members = new member ();
    if (isset($_GET['del'])){
        $members->Remove($_GET['del']);
        Redirect ( ADDRESS . 'e-admin/users.php' );
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
<title><?php echo TITLE?> User Manager</title>
<?php require_once 'side.php';?>
		<div id="page-wrapper">
	<div id="page-inner">
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
										<th>نام کاربری</th>
										<th>رمز عبور</th>
										<th>نام</th>
										<th>ایمیل</th>
										<th>تاریخ عضویت</th>
										<th>سمت</th>
										<th>حذف</th>
										<th>ویرایش</th>
									</tr>
								</thead>
								
								<?php
    
$allMembers = $members->ViewAllMember ();
    foreach ( $allMembers as $member ) {
($member['mod']==0? $role='کاربر معمولی' :$role='مدیر');
        echo '<tr><td>' . $member['id'] . '</td><td>' . $member['username'] . '</td><td>' . $member['password'] . '</td><td>' . $member['name'] . '</td><td>' . $member['email'] . '</td><td>' . $member['date'] . '</td><td>' . $role . '</td><td>' . '<a href="users.php?del=' . $member['id'] . '"><i style="color:red;" class="fa fa-times"></i></a>' . '</td><td>' . '<a href="users.php?edit=' . $member['id'] . '"><i class="fa fa-pencil-square-o"></i></a>'. '</td></tr>';
    }
    
    ?>

								<tbody>

								</tbody>
							</table>
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
<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar.php'); ?>
<?php
$query=mysqli_query($connection,"select * from students where student_id='$session_id'")or die(mysqli_error($connection));
$row=mysqli_fetch_array($query);
 ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">
				<?php include('head.php'); ?>
			<div class="span3">
			</div>
			
				<div class="span7">
						<form class="form-horizontal" method="post">
							<div class="control-group">
								<label class="control-label" for="inputEmail">New Password</label>
								<div class="controls">
								<input type="text" name="np" id="inputEmail" placeholder="New Password">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Re-type Password</label>
								<div class="controls">
								<input type="password" name="rp" id="inputPassword" placeholder="Re-type Password">
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
								<button type="submit" name="update" class="btn btn-success">Update</button>
								</div>
								<br>
								<br>
			<?php
			
						if (isset($_POST['update'])){
						$np = $_POST['np'];
						$rp = $_POST['rp'];			
						if($np!=$rp){
						?>
						<div class="alert alert-danger">Password Dont Match</div>
						<?php
						}else{
						mysqli_query($connection,"update students set password = '$np' where student_id = '$session_id' ")or die(mysql_error); ?>
						<div class="alert alert-success">Password Change</div>
						<?php }}?>
							</div>
						</form>
				</div>
				

	
			
			</div>
		</div>
    </div>
<?php include('footer.php') ?>
	<div id="edit_student<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-info">Add Grade</div>
			<form class="form-horizontal" method="post">
			<input type="hidden" name="school_year" value="<?php echo $school_year; ?>" /> 
			<input type="hidden" name="grade_id" value="<?php echo $id; ?>" /> 
			<div class="control-group">
				<?php
				
		$student_query = mysqli_query($connection,"select * from students where student_id = '$get_id' ");
		$student_row = mysqli_fetch_array($student_query);
		$student_course_id = $student_row['course'];
		$term = $student_row['term'];
		
		$course_query = mysqli_query($connection,"select * from course where code = '$student_course_id'")or die(mysqli_error($connection));
		$course_row = mysqli_fetch_array($course_query);
		$course_id =  $course_row['course_id'];
	?>	
				<input type="hidden" value="<?php echo $term ?>"  name="term">
				<label class="control-label" for="inputEmail">Subject Code</label>
				<div class="controls">
			
				
				<input type="hidden" name="code" value="<?php echo $subject_row['subject_id'];  ?>">
				<strong><?php echo $subject_row['code'];  ?></strong>
				
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">Gen Ave</label>
				<div class="controls">
				<select name="ave" required>
				<option><?php echo $row['gen_ave']; ?></option>
				<option>1.00</option>
				<option>1.25</option>
				<option>1.50</option>
				<option>1.75</option>
				<option>2.00</option>
				<option>2.25</option>
				<option>2.50</option>
				<option>2.75</option>
				<option>3.00</option>
				<option>5.00</option>
				<option>0</option>
				<option>DRP</option>
				<option>INC</option>
				<option>PASS</option>
				</select>
				</div>
			</div>
			<!--
			
					<div class="control-group">
				<label class="control-label" for="inputEmail">Semester</label>
				<div class="controls">
				<select name="semester" >
					<option><?php echo $row['semester']; ?></option>
					<option>1st</option>
					<option>2nd</option>
					<option>Summer</option>
				</select>
				</div>
			</div>
					<div class="control-group">
				<label class="control-label" for="inputEmail">School Year</label>
				<div class="controls">
				<select name="sy" >
				<option><?php echo $row['school_year']; ?></option>
				<option>First Year</option>
				<option>Second Year</option>
				<option>Third Year</option>
				<option>Fourth Year</option>
				</select>
				</div>
			</div>
			-->
			
				
					
	
			
			<div class="control-group">
				<div class="controls">
				<button name="edit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Save</button>
				</div>
			</div>
    </form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </div>
	
	<?php
	if (isset($_POST['edit'])){
	$school_year=$_POST['school_year'];
	$grade_id=$_POST['grade_id'];
	$code=$_POST['code'];
	$ave=$_POST['ave'];
	$term=$_POST['term'];
	
/* 	$sy=$_POST['sy']; */
/* 	$semester=$_POST['semester']; */

	 if ($ave  == '1.00'){ 
	mysqli_query($connection,"update grade set subject_id = '$code' , gen_ave = '$ave' , school_year = '$school_year'  ,semester = '$term' , remarks = 'Excellent'  where grade_id = '$grade_id' ") or die(mysqli_error($connection));
	 } else if($ave == '1.25'){
	mysqli_query($connection,"update grade set subject_id = '$code' , gen_ave = '$ave' , school_year = '$school_year'  ,semester = '$term' , remarks = 'Very Good'  where grade_id = '$grade_id' ") or die(mysqli_error($connection));
	 }else if($ave == '1.50'){
	mysqli_query($connection,"update grade set subject_id = '$code' , gen_ave = '$ave' , school_year = '$school_year'  ,semester = '$term' , remarks = 'Very Good'  where grade_id = '$grade_id' ") or die(mysqli_error($connection));
	 }else if($ave == '1.75'){
	mysqli_query($connection,"update grade set subject_id = '$code' , gen_ave = '$ave' , school_year = '$school_year'  ,semester = '$term' , remarks = 'Very Good'  where grade_id = '$grade_id' ") or die(mysqli_error($connection));
	 } else if($ave ==  '2.00'){
	mysqli_query($connection,"update grade set subject_id = '$code' , gen_ave = '$ave' , school_year = '$school_year'  ,semester = '$term' , remarks = 'Satisfactory'  where grade_id = '$grade_id' ") or die(mysqli_error($connection));
	 } else if($ave == '2.25'){
	mysqli_query($connection,"update grade set subject_id = '$code' , gen_ave = '$ave' , school_year = '$school_year'  ,semester = '$term' , remarks = 'Satisfactory'  where grade_id = '$grade_id' ") or die(mysqli_error($connection));
	 } else if($ave == '2.55'){
	mysqli_query($connection,"update grade set subject_id = '$code' , gen_ave = '$ave' , school_year = '$school_year'  ,semester = '$term' , remarks = 'Satisfactory'  where grade_id = '$grade_id' ") or die(mysqli_error($connection));
	 } else if($ave == '2.75'){
	mysqli_query($connection,"update grade set subject_id = '$code' , gen_ave = '$ave' , school_year = '$school_year'  ,semester = '$term' , remarks = 'Fair'  where grade_id = '$grade_id' ") or die(mysqli_error($connection));
	 }else if($ave == '3.00'){
	mysqli_query($connection,"update grade set subject_id = '$code' , gen_ave = '$ave' , school_year = '$school_year'  ,semester = '$term' , remarks = 'Fair'  where grade_id = '$grade_id' ") or die(mysqli_error($connection));
	 }else if($ave == '5.00'){
	mysqli_query($connection,"update grade set subject_id = '$code' , gen_ave = '$ave' , school_year = '$school_year'  ,semester = '$term' , remarks = 'Failed'  where grade_id = '$grade_id' ") or die(mysqli_error($connection));
	 }else if($ave == '0'){
	mysqli_query($connection,"update grade set subject_id = '$code' , gen_ave = '$ave' , school_year = '$school_year'  ,semester = '$term' , remarks = 'Failed'  where grade_id = '$grade_id' ") or die(mysqli_error($connection));
	 }else if($ave == 'INC'){
	mysqli_query($connection,"update grade set subject_id = '$code' , gen_ave = '$ave' , school_year = '$school_year'  ,semester = '$term' , remarks = 'Incomplete'  where grade_id = '$grade_id' ") or die(mysqli_error($connection));
	 }else if($ave == 'DRP'){
	mysqli_query($connection,"update grade set subject_id = '$code' , gen_ave = '$ave' , school_year = '$school_year'  ,semester = '$term' , remarks = 'Officially Dropped'  where grade_id = '$grade_id' ") or die(mysqli_error($connection));
	 }else if($ave == 'PASS'){
	mysqli_query($connection,"update grade set subject_id = '$code' , gen_ave = '$ave' , school_year = '$school_year'  ,semester = '$term' , remarks = 'PASS'  where grade_id = '$grade_id' ") or die(mysqli_error($connection));
	 } 


		?>

<script>
   window.location = "view_grade.php<?php echo '?id='.$get_id;  ?>";    
</script>
<?php		
	}
	?>
	
	
	<div id="add_grade_advance1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-info">Add Subject</div>
	<form class="form-horizontal" method="post">
	<input type="hidden" name="student_id" value="<?php echo $get_id; ?>" /> 
	<?php
		$student_query = mysqli_query($connection,"select * from students where student_id = '$get_id' ");
		$student_row = mysqli_fetch_array($student_query);
		$student_course_id = $student_row['course'];
		$year = $student_row['year_level'];
		$term = $student_row['term'];
	
		
		$course_query = mysqli_query($connection,"select * from course where code = '$student_course_id'")or die(mysqli_error($connection));
		$course_row = mysqli_fetch_array($course_query);
		$course_id =  $course_row['course_id'];
	?>
	
	
	<?php
/* 	$user_query=mysqli_query($connection,"select * from grade where remarks = 'Failed' and	student_id = '$get_id'  ")or die(mysqli_error($connection));
	$count  = mysqli_num_rows($user_query);
	while($row = mysqli_fetch_array($user_query)){
	
	$sub_id = $row['subject_id'];
	
	$subject = mysqli_query($connection,"select * from  subject where subject_id = '$sub_id'")or die(mysqli_error($connection));
	$subject_row  = mysqli_fetch_array($subject);
	
	$code =  $subject_row['code'];

	} */
	?>
	
			<div class="control-group">
			<input type="hidden" name="year" value="<?php echo $year; ?>">
			<input type="hidden" name="term" value="<?php echo $term; ?>">
				<label class="control-label" for="inputEmail">Subject Code</label>
				<div class="controls">
				<select name="code" required>
				<option></option>
				<?php  
				$query = mysqli_query($connection,"select * from subject where course_id = '$course_id' and pre_requisites = '' ")or die(mysqli_error($connection));
				while($row = mysqli_fetch_array($query)){ ?>
				<option value="<?php echo $row['subject_id']; ?>"><?php echo $row['code']; ?></option>
				
				
				<?php
				}
				?>
				</select>

				</div>
			</div>
			
				<div class="control-group">
		
				<label class="control-label" for="inputEmail">GEN AVE:</label>
				<div class="controls">
				
				
				<select  class="span1" name="ave" required>
		
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
				<label class="control-label" for="inputPassword">Gen Ave</label>
				<div class="controls">
				<select name="ave" >
				<option></option>
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
				<!-- <input type="text" name="ave"  placeholder="Gen Ave" required> 
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="inputEmail">Term</label>
				<div class="controls">
				<select name="semester" >
					<option></option>
					<option>1st</option>
					<option>2nd</option>
					<option>Summer</option>
				</select>
				</div>
			</div>
					<div class="control-group">
				<label class="control-label" for="inputEmail">Year Level</label>
				<div class="controls">
				<select name="sy" >
				<option></option>
				<option>First Year</option>
				<option>Second Year</option>
				<option>Third Year</option>
				<option>Fourth Year</option>
				</select>
				</div>
			</div>
			
			-->
			
			<!--
			<div class="control-group">
				<label class="control-label" for="inputEmail">Remarks</label>
				<div class="controls">
				<select name="remarks" required>
					<option></option>
					<option>Pass</option>
					<option>Fail</option>
					<option>INC</option>
					<option>DROP</option>
				</select>
				</div>
			</div>
			-->
			
			<div class="control-group">
				<div class="controls">
				<button name="submit11" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Save</button>
				</div>
			</div>
    </form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </div>
	
	<?php
	if (isset($_POST['submit11'])){
	$student_id=$_POST['student_id'];
	
	$year=$_POST['year'];
	$term=$_POST['term'];
	
	$code=$_POST['code'];
	$ave=$_POST['ave'];
	
	
		$subject_query  = mysqli_query($connection,"select * from subject where subject_id = '$code' ")or die(mysqli_error($connection));
	$subject_row = mysqli_fetch_array($subject_query);
	
	$unit =  $subject_row['unit'];
	
	
			$result = mysqli_query($connection,"SELECT sum(unit) FROM grade  where student_id = '$get_id' and school_year = '$school_year' and semester = '$term'") or die(mysqli_error($connection));
						$rows = mysqli_fetch_array($result);
						$units = $rows['sum(unit)'];
                        $total_units  = $units + $unit;	
						
						
	

	
	$query = mysqli_query($connection,"select * from  grade where  subject_id = '$code' and student_id = '$student_id' and school_year = '$year' and semester = '$term'
	or subject_id = '$code' and student_id = '$student_id' and school_year = '$year' and semester = '$term' and remarks 
	or subject_id = '$code' and student_id = '$student_id' and school_year = '$year' and semester = '$term' and remarks 
	
	" )or die(mysqli_error($connection));
	$count = mysqli_num_rows($query);
	
	$query1 = mysqli_query($connection,"select * from  grade where  subject_id = '$code' and student_id = '$student_id' and school_year = '$year' and semester = '$term' and remarks = 'Failed' ")or die(mysqli_error($connection));
	$count1 = mysqli_num_rows($query1);
	
	
	if ($count > 0){ ?>
	<script>
	alert('Subject Already Added');
	</script>
		<?php
	}else if($total_units  > 23){ ?>
	 <script>alert('Cannot add new grade  you cannot exide 23 units');</script>
	<?php
	}else{ 
	
	
	 if ($ave  == '1.00'){ 
	 mysqli_query($connection,"insert into grade (subject_id,student_id,school_year,semester,unit,gen_ave,remarks) values('$code','$student_id','$year','$term','$unit','$ave','Excellent')")or die(mysqli_error($connection)); 
	 } else if($ave == '1.25'){
	 mysqli_query($connection,"insert into grade (subject_id,student_id,school_year,semester,unit,gen_ave,remarks) values('$code','$student_id','$year','$term','$unit','$ave','Very Good')")or die(mysqli_error($connection));
	 }else if($ave == '1.50'){
	mysqli_query($connection,"insert into grade (subject_id,student_id,school_year,semester,unit,gen_ave,remarks) values('$code','$student_id','$year','$term','$unit','$ave','Very Good')")or die(mysqli_error($connection));
	 }else if($ave == '1.75'){
	mysqli_query($connection,"insert into grade (subject_id,student_id,school_year,semester,unit,gen_ave,remarks) values('$code','$student_id','$year','$term','$unit','$ave','Very Good')")or die(mysqli_error($connection));
	 } else if($ave ==  '2.00'){
	mysqli_query($connection,"insert into grade (subject_id,student_id,school_year,semester,unit,gen_ave,remarks) values('$code','$student_id','$year','$term','$unit','$ave','Satisfactory')")or die(mysqli_error($connection));	 
	 } else if($ave == '2.25'){
	mysqli_query($connection,"insert into grade (subject_id,student_id,school_year,semester,unit,gen_ave,remarks) values('$code','$student_id','$year','$term','$unit','$ave','Satisfactory')")or die(mysqli_error($connection));
	 } else if($ave == '2.55'){
	mysqli_query($connection,"insert into grade (subject_id,student_id,school_year,semester,unit,gen_ave,remarks) values('$code','$student_id','$year','$term','$unit','$ave','Satisfactory')")or die(mysqli_error($connection));
	 } else if($ave == '2.75'){
	mysqli_query($connection,"insert into grade (subject_id,student_id,school_year,semester,unit,gen_ave,remarks) values('$code','$student_id','$year','$term','$unit','$ave','Fair')")or die(mysqli_error($connection));
	 }else if($ave == '3.00'){
	mysqli_query($connection,"insert into grade (subject_id,student_id,school_year,semester,unit,gen_ave,remarks) values('$code','$student_id','$year','$term','$unit','$ave','Fair')")or die(mysqli_error($connection));
	 }else if($ave == '5.00'){
	mysqli_query($connection,"insert into grade (subject_id,student_id,school_year,semester,unit,gen_ave,remarks) values('$code','$student_id','$year','$term','$unit','$ave','Failed')")or die(mysqli_error($connection));
	 }else if($ave == '0'){
	mysqli_query($connection,"insert into grade (subject_id,student_id,school_year,semester,unit,gen_ave,remarks) values('$code','$student_id','$year','$term','$unit','$ave','Failed')")or die(mysqli_error($connection));
	 }else if($ave == 'INC'){
	mysqli_query($connection,"insert into grade (subject_id,student_id,school_year,semester,unit,gen_ave,remarks) values('$code','$student_id','$year','$term','$unit','$ave','Incomplete')")or die(mysqli_error($connection));
	 }else if($ave == 'DRP'){
	mysqli_query($connection,"insert into grade (subject_id,student_id,school_year,semester,unit,gen_ave,remarks) values('$code','$student_id','$year','$term','$unit','$ave','Officially Dropped')")or die(mysqli_error($connection));
	 }else if($ave == 'PASS'){
	mysqli_query($connection,"insert into grade (subject_id,student_id,school_year,semester,unit,gen_ave,remarks) values('$code','$student_id','$year','$term','$unit','$ave','PASS')")or die(mysqli_error($connection));
	 } 
	 

	}	 
	}
	?>
	<div id="add_subject" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">

	<form class="form-horizontal" method="post">
		<div class="control-group">
				<label class="control-label" for="inputPassword">Year Level</label>
				<div class="controls">
				<select name="year" required>
				<option></option>
				<option>First Year</option>
				<option>Second Year</option>
				<option>Third Year</option>
				<option>Fourth Year</option>
				</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">Term</label>
				<div class="controls">
				<select name="term" required>
					<option></option>
					<option>1st</option>
					<option>2nd</option>
					<!-- <option>Third</option>
					<option>Fourth</option> -->
				</select>
				</div>
			</div>	
			<div class="control-group">
				<label class="control-label" for="inputEmail">Code</label>
				<div class="controls">
				<input type="text"  name="code" placeholder="Code" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">Subject Title</label>
				<div class="controls">
				<input type="text" name="title"  placeholder="Subject Title" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">Unit</label>
				<div class="controls">
				<input type="text" name="unit" id="inputPassword" placeholder="Unit" required>
				</div>
			</div>
		
				<div class="control-group">
				<label class="control-label" for="inputPassword">PRE-REQUISITE(S)</label>
				<div class="controls">
				<input type="text" name="pre_requisites" id="inputPassword" placeholder="PRE-REQUISITE(S)">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">Course</label>
				<div class="controls">
						<select name="course" required>
									<option></option>
									<?php 
									$course_query = mysqli_query($connection,"select * from course") or die(mysqli_error($connection));
									while($course_row = mysqli_fetch_array($course_query)){
									?>
									<option value="<?php echo $course_row['course_id']; ?>"><?php echo $course_row['code']; ?></option>
									<?php  } ?>
									</select>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
				<button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Save</button>
				</div>
			</div>
    </form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </div>
	
	<?php
	if (isset($_POST['submit'])){
	$code=$_POST['code'];
	$title=$_POST['title'];
	$unit=$_POST['unit'];
	$year=$_POST['year'];
	$term=$_POST['term'];
	$course=$_POST['course'];
	$pre_requisites=$_POST['pre_requisites'];
	
	mysqli_query($connection,"insert into subject (code,title,unit,year,term,pre_requisites,course_id) 
	values('$code','$title','$unit','$year','$term','$pre_requisites','$course')")or die(mysqli_error($connection,));
	}
	?>
<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dasboard.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
			   <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Students Table</strong>
                                </div>
								<label><h4>FILTER by:</h4></label>
								<form method = "POST" class="form-inline" action="sort_students.php">
									Course 
									<select name="course" required>
									<option></option>
									<?php 
									$course_query = mysqli_query($connection,"select * from course") or die(mysqli_error($connection));
									while($course_row = mysqli_fetch_array($course_query)){
									?>
									<option><?php echo $course_row['code']; ?></option>
									<?php  } ?>
									</select>
									&nbsp;&nbsp;&nbsp;&nbsp;
									Year Level
									<select name="year_level" required>
									<option></option>
									<option>First</option>
									<option>Second</option>
									<option>Third</option>
									<option>Fourth</option>
									</select>
								
									<button type="submit" name="sort_students" class="btn"><i class="icon-check icon-large"></i>&nbsp;Submit</button>
								</form>
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
                             
								<p><a href="add_student.php" class="btn btn-success"><i class="icon-plus"></i>&nbsp;Add Student</a></p>
							
                                <thead>
                                    <tr>
                                        <th>Student_No</th>
                                      <!--  <th>Password</th>  -->                                
                                        <th>Name</th>                                 
                                        <th>Course</th>                                 
                                        <th>Photo</th>    
										<th>Year Level</th>     										
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								 
								 <?php if (isset($_POST['sort_students'])){
									$course = $_POST['course'];
									$year_level = $_POST['year_level'];
								 ?>
								 
								 
                                  <?php  $user_query=mysqli_query($connection,"select * from students where year_level = '$year_level' and course = '$course' ")or die(mysqli_error($connection));
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['student_id'];  ?>
									<tr class="del<?php echo $id ?>">
                                    <td><?php echo $row['student_no']; ?></td> 
                                    <!-- <td><?php echo $row['password']; ?></td>  -->                           
                                    <td><?php echo $row['firstname']." ".$row['lastname']; ?></td> <td width="80"><?php echo $row['course']; ?> </td> 
									
									<?php	
                              /*       <td><?php echo $row['gender']; ?></td> 
                                    <td><?php echo $row['address']; ?></td> 
                                    <td><?php echo $row['contact']; ?></td>  */
									
									?>
                              
                                    <td width="60"><img src="<?php echo $row['photo']; ?>" width="60" height="60" class="img-circle"></td> 
									 <td width="80"><?php echo $row['year_level']; ?></td> 
									<?php include('toolttip_edit_delete.php'); ?>
                                    <td width="150">
                                        <a rel="tooltip"  title="Delete" id="<?php echo $id; ?>" href="#delete_student<?php echo $id; ?>" data-toggle="modal"    class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                        <?php include('delete_student_modal.php'); ?>
										<a  rel="tooltip"  title="Edit" id="e<?php echo $id; ?>" href="edit_student.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
										<a  rel="tooltip"  title="View Grade" id="v<?php echo $id; ?>"  href="view_grade.php<?php echo '?id='.$id; ?>" class="btn btn-info"><i class="icon-list icon-large"></i></a>
                                    </td>
									
                                    </tr>
									<?php  }  ?>
									<?php  }  ?>
                           
                                </tbody>
                            </table>
							
			
			</div>		
			</div>
		</div>
    </div>
<?php include('footer.php') ?>
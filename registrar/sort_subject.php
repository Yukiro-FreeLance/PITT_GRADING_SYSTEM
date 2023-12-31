<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dasboard.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span2">			     
										<ul class="nav nav-tabs nav-stacked">
											<li>
											<a href="#add_subject" data-toggle="modal" ><i class="icon-plus icon-large"></i>&nbsp;<strong>Add Subject</strong></a>
											</li>
										</ul>
										
										 
     <!-- Modal add user -->
	<?php include('modal_add_subject.php'); ?>
										
			</div>
			<div class="span10">
			
			 <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Subject Table</strong>
                                </div>
			
			
									<label><h4>FILTER by:</h4></label>
									<form  method = "POST" class="form-inline" action="sort_subject.php">
									
									Year Level
									<select name="year">
									<option></option>
									<option>First Year</option>
									<option>Second Year</option>
									<option>Third Year</option>
									<option>Fourth Year</option>
									</select>
									&nbsp;&nbsp;&nbsp;&nbsp;
									Term 
									<select name="term">
									<option></option>
									<option>1st</option>
									<option>2nd</option>
									</select>
												&nbsp;&nbsp;&nbsp;&nbsp;
									Course 
									<select name="course_id" required>
									<option></option>
										<?php
										$query=mysqli_query($connection,"select * from course") or die(mysqli_error($connection));
										while($row=mysqli_fetch_array($query)){ ?>
										<option value="<?php echo $row['course_id']; ?>"><?php echo $row['code']; ?></option>
										<?php } ?>
									<!-- <option>Third</option>
									<option>Fourth</option> -->
									</select>
									
								
								
								
									<button type="submit" name="sort_subject" class="btn"><i class="icon-check icon-large"></i>&nbsp;Submit</button>
									<br>
									<br>
									<a type="submit" href="subject.php" name="sort_subject" class="btn btn-info"><i class="icon-search icon-large"></i>&nbsp;View All</a>
								</form>
									
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
                               
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Subject Title</th>                                 
                                        <th>Unit</th>                                 
                                        <th>Year Level</th>                                 
                                        <th>Term</th>                                 
                                        <th>Pre-Requisites</th>                                 
                                        <th>Course</th>                                 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								 <?php 
								 if (isset($_POST['sort_subject'])){
								 $year = $_POST['year'];
								 $term = $_POST['term'];
								 $course_id = $_POST['course_id'];
								 
								 ?>
                                  <?php $user_query=mysqli_query($connection,"select * from subject where term = '$term' and year = '$year' and course_id ='$course_id' ")or die(mysqli_error($connection));
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['subject_id']; 
									$course_id=$row['course_id']; 
									
									$course_query = mysqli_query($connection,"select * from course where course_id = '$course_id' ")or die(mysqli_error($connection));
									$course_row = mysqli_fetch_array($course_query);
									
									?>
									

									 <tr class="del<?php echo $id ?>">
                                    <td><?php echo $row['code']; ?></td> 
                                    <td><?php echo $row['title']; ?></td> 
                                    <td><?php echo $row['unit']; ?></td> 
                                    <td><?php echo $row['year']; ?></td> 
                                    <td><?php echo $row['term']; ?></td> 
                                    <td><?php echo $row['pre_requisites']; ?></td> 
                                    <td><?php echo $course_row['code']; ?></td> 
                                    <td width="100">
                                        <a  href="#delete_subject<?php echo $id; ?>" data-toggle="modal"  class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
										<?php include('delete_subject_modal.php'); ?>
                                        <a rel="tooltip"  title="Edit" id="e<?php echo $id; ?>" href="#edit<?php echo $id; ?>" data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
                                    	<?php include('modal_edit_subject.php'); ?>
									</td>
									
									     <!-- Modal edit user -->
								
                                    </tr>
									<?php } ?>
									<?php } ?>
                           
                                </tbody>
                            </table>
							

			
			</div>		
			</div>
		</div>
    </div>
<?php include('footer.php') ?>
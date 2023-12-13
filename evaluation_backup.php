<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar.php'); ?>
<?php
$query=mysqli_query($connection,"select * from students where student_id='$session_id'")or die(mysqli_error($connection));
$row=mysqli_fetch_array($query);
$course  = $row['course'];
$year_level = $row['year_level'];

 ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">
				<?php include('head.php'); ?>
				<div class="span12">
				<div class="grade">
					<?php include('grade_option_evaluation.php'); ?>
				
				</div>
				</div>
				<div class="span2">
					<?php include('user_sidebar.php'); ?>
				</div>
				<div class="span10">
			
				           <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
                               
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Subject Title</th>                                 
                                        <th>Unit</th>                                 
                                        <th>Year Level</th>                                 
                                        <th>Term</th>                                 
                                        <th>Pre-Requisites</th>                                 
                                        <th></th>                                 
                                                              
                                 
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php 

                                  	$courses = mysqli_query($connection,"select * from course where code = '$course'  LIMIT 1 ")or die(mysqli_error($connection));
                                  	$course_id =mysqli_fetch_array($courses)['course_id'];
									
                                  	$user_query=mysqli_query($connection,"select * from subject where course_id = $course_id and year = '$year_level' ")or die(mysqli_error($connection));
									while($row1=mysqli_fetch_array($user_query))
									{
										$id=$row1['subject_id']; 
										$course_id=$row1['course_id']; 
										
										$course_query = mysqli_query($connection,"select * from course where course_id = $course_id ")or die(mysqli_error($connection));
										$course_row = mysqli_fetch_array($course_query);
									
									?>
									

									 <tr class="del<?php echo $id ?>">
                                    <td><?php echo $row1['code']; ?></td> 
                                    <td><?php echo $row1['title']; ?></td> 
                                    <td><?php echo $row1['unit']; ?></td> 
                                    <td><?php echo $row1['year']; ?></td> 
                                    <td><?php echo $row1['term']; ?></td> 
									
									 <td><?php echo $row1['pre_requisites']; ?>
											<?php $pre = $row1['pre_requisites']; ?>	
													
									 </td> 
									 
									 	<td width="150">
									<?php
									
									
									$t = mysqli_query($connection,"select * from subject where code  = '$pre'")or die(mysqli_error($connection));
									$trow = mysqli_fetch_array($t);
							
									$test_id = $trow['subject_id'];
									/* echo  $test_id;
									echo  $session_id; */
									
									$grade_query = mysqli_query($connection,"select * from grade where subject_id = '$test_id' and student_id = '$session_id' and remarks = 'Failed' or 
									subject_id = '$test_id' and student_id = '$session_id' and remarks = 'DROP' or
									subject_id = '$test_id' and student_id = '$session_id' and remarks = 'INC'
									
									")or die(mysqli_error($connection));
									$grade_row = mysqli_fetch_array($grade_query);
									$count = mysqli_num_rows($grade_query);
								
									
									
									

							
								
								if ($count > 0){
									
									?>
									 	<strong class="red">Cannot Enroll in this Subject you   	<?php echo $grade_row['remarks']; ?> in <?php echo $pre; ?> </strong>
								<?php } ?>
									</td>
							
                                   
                         
							
                                
									
									     <!-- Modal edit user -->
								
                                    </tr>
									<?php } ?>
                           
                                </tbody>
                            </table>
				</div>

				
				
			</div>
		</div>
    </div>
<?php include('footer.php') ?>
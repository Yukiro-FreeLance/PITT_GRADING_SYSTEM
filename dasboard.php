<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar.php'); ?>
<?php
$query=mysqli_query($connection,"select * from students where student_id='$session_id'")or die(mysqli_error($connection));
$row=mysqli_fetch_array($query);
$year_level = $row['year_level'];
$term = $row['term'];
$status = $row['student_status'];
$school_year = $row['year_level'];
 ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">
				<?php include('head.php'); ?>
				<div class="span12">
				<div class="grade">
					<?php include('grade_option.php'); ?>
				</div>
				</div>
				<div class="span2">
					<?php include('user_sidebar.php'); ?>
				</div>
				<div class="span10">
			
				          <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">                      
                                <thead>
                                    <tr>
                                        <th width="100">Code</th>
                                        <th  width="300">Subject</th>
                                        <th  width="50">Units</th>                                 
                                        <th>Gen Ave.</th>                                                                                 
                                        <th>Term</th>                                                                                 
                                        <th>Year Level</th>                                                                                 
                                        <th>Remarks</th>                                                                                 
                                  
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php  $user_query=mysqli_query($connection,"select * from grade where student_id = '$session_id' and school_year = '$year_level'
								  and semester = '$term'
								  ")or die(mysqli_error($connection));
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['grade_id'];
									$remarks = $row['remarks'];
									$subject_id = $row['subject_id'];
									/* subject */
									$subject_query = mysqli_query($connection,"select * from subject where subject_id = '$subject_id'")or die(mysqli_error($connection));
									while($subject_row=mysqli_fetch_array($subject_query)){
									?>
									<tr>
                                    <td><?php echo $subject_row['code']; ?></td> 
                                    <td><?php echo $subject_row['title']; ?></td> 
                                    <td><?php echo $subject_row['unit']; ?></td>                                 
                                    <td><?php echo $row['gen_ave']; ?></td>                                                                              
                                    <td><?php echo $row['semester']; ?></td>                                                                              
                                    <td><?php echo $row['school_year']; ?></td>    
										
									
								 	<?php if ($remarks == 'Very Good'){ ?>
									<td><span class="very_good"><?php echo $row['remarks']; ?></span></td>   
									<?php }else if($remarks == 'Excellent'){ ?>
									<td><span class="Excellent"><?php echo $row['remarks']; ?></span></td>   
									<?php }else if($remarks == 'Satisfactory'){ ?>  
									<td><span class="sat"><?php echo $row['remarks']; ?></span></td> 
									<?php }else if($remarks == 'Fair'){ ?>
									<td><span class="fair"><?php echo $row['remarks']; ?></span></td> 
									<?php }else if($remarks == 'Failed'){ ?>
									<td><span class="failed"><?php echo $row['remarks']; ?></span></td> 
									<?php }else if($remarks == 'Incomplete'){ ?>
									<td><span class="failed"><?php echo $row['remarks']; ?></span></td> 
									<?php }else if($remarks == 'Officially Dropped'){ ?>
									<td><span class="drop"><?php echo $row['remarks']; ?></span></td> 
									<?php }else if($remarks == 'PASS'){ ?>
									<td><span class="Excellent"><?php echo $row['remarks']; ?></span></td> 
									<?php }else if ($remarks == ''){ ?> 
										<td><?php echo $row['remarks']; ?></td> 
									 <?php } ?>
                                                                                                       
								
                             
									
                                    </tr>
									<?php  }}  ?>
                           
                                </tbody>
                            </table>
								<?php include('units_table.php'); ?>
								<?php include('gwa_table.php'); ?>
								<?php include('cwa_table.php'); ?>
				</div>
			
				<?php include('grading_system.php') ?>
				
				
			</div>
		</div>
    </div>
<?php include('footer.php') ?>
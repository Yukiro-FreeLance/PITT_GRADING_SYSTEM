<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dasboard.php'); ?>
<?php 
	$get_id = $_GET['id']; 
	$school_year = $_POST['school_year'];
	$semester = $_POST['semester'];

	

	$student_id = $get_id;
	$get_id = $student_id;
?>
    <div class="container">
		<div class="logo_Sti"></div>
		<div class="margin-top">
			<div class="row">	
			<div class="span12">
			<?php
			$student_query=mysqli_query($connection,"select * from students where student_id = '$student_id'")or die(mysqli_error($connection));
			$row = mysqli_fetch_array($student_query);
				$school_year = $row['year_level'];
			$term = $row['term'];
			$student_status = $row['student_status'];
			?>
	
				<div class="name">
				<span>STUDENT NUMBER:<strong><?php echo $row['student_no']; ?></strong></span>
				<span>STUDENT NAME:<strong><?php echo $row['firstname']." ".$row['lastname']; ?></strong></span>
				<span>COURSE:<strong><?php echo $row['course']; ?></strong></span>
				<span id="print_right">
				<span><?php echo $row['year_level']; ?> :<strong> <?php echo $row['term']; ?> &nbsp; term</strong></span>
				<span>Status:<strong><?php echo $row['student_status']; ?> </strong></span>
				</span>
			</div>
			<hr>
			<?php include('grade_option.php'); ?>	
			<hr>
			</div>
			<div class="span2">
			<div id="add">
							
							<?php include('add_grade_button.php'); ?>
			</div>
			</div>
			<div class="span10">
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">                      
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Subject</th>
                                        <th>Units</th>                                 
                                        <th>Gen Ave.</th>                                                                                                                                                                    
                                        <th>Remarks</th>                                                                                                                                                                    
                                        <th class="act"></th>                                                                                                                                                                    
                                                                                                          
                                  
                                    </tr>
                                </thead>
                                <tbody>
								 
                                 <?php  $user_query=mysqli_query($connection,"select * from grade where student_id = '$get_id' and school_year = '$school_year'
									and semester = '$semester'
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
                                    <td width="100">
										<?php echo $row['gen_ave']; ?>
									</td>      
									<!--									
                                    <td><?php echo $row['semester']; ?></td>                                                                              
                                    <td><?php echo $row['school_year']; ?></td>    
									-->
									
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
									<?php }else if($remarks == ''){ ?>
									<td><?php echo $row['remarks']; ?></td> 
									<?php } ?>
									
									<!-- <td><?php echo $row['remarks']; ?></td> -->
									<?php include('toolttip_edit_delete.php'); ?>
                                
										
                                    <td class="act" width="100">
									
                                        <a rel="tooltip"  title="Delete" id="<?php echo $id; ?>" href="#delete_student<?php echo $id; ?>" data-toggle="modal"    class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                        <?php include('delete_grade_modal.php'); ?>
										<a href="#edit_student<?php echo $id; ?>" data-toggle="modal"   rel="tooltip"  title="Edit" id="e<?php echo $id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
										<?php include('edit_grade.php'); ?>
                                    </td>
                                    </tr>
									<?php  }}  ?>
                           
                                </tbody>
									<tfoot>
									<?php include('sort_unit_table.php'); ?>
									<?php include('sort_gwa_table.php'); ?>
									<?php include('cwa_table.php'); ?>
						
								</tfoot>
                            </table>
									
			
			</div>		
			</div>
		</div>
    </div>
<?php include('footer.php') ?>
<?php include('grading.php'); ?>

			<div class="registrar">
			<p>Maelyn Tabujara</p>
			<p>Associate Registrar</p>
			</div>
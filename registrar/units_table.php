		<tr>
								   <td></td> 
								   <td class="numberu">Number of Units:</td> 
								   <td> 					
								   <?php
                            $result = mysqli_query($connection,"SELECT sum(unit) FROM grade  where student_id = '$get_id' and school_year = '$school_year' and semester = '$term'") or die(mysqli_error($connection));
                            while ($rows = mysqli_fetch_array($result)) {
                                ?>
						
								 <?php echo $rows['sum(unit)']; ?>
							
                            <?php } ?>
							
									</td> 
								   <td></td> 
								   <td></td> 
								   <td></td> 
								</tr>
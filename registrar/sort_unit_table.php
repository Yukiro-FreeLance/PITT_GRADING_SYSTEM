						<tr>
								   <td></td> 
								   <td class="numberu">Number of Units:</td> 
								   <td> 					
								   <?php
                            $result = mysqli_query($connection,"SELECT sum(unit) FROM grade  where student_id = '$student_id' and school_year like '%$school_year%' and semester like '%$semester%'") or die(mysqli_error($connection));
                            while ($rows = mysqli_fetch_array($result)) {
                                ?>
						
								 <?php echo $rows['sum(unit)']; ?>
							
                            <?php } ?>
							
									</td> 
								   <td></td> 
								   <td></td> 
								   <td></td> 
								</tr>
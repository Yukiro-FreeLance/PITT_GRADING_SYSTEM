	<tr>
								   <td></td> 
								   <td class="numberu"></td> 
								   <td>GWA:</td> 
								   <td>
								   						<?php
							
                            $result = mysqli_query($connection,"SELECT sum(gen_ave) FROM grade  where student_id = '$get_id' and school_year = '$school_year' and semester = '$term'") or die(mysqli_error($connection));
                            
							
							
							
							$test_count=mysqli_query($connection,"select * from grade where gen_ave <> '' and student_id = '$get_id' and school_year = '$school_year' and semester = '$term' ")or die(mysqli_error($connection));
							$count_gen = mysqli_num_rows($test_count);
							
							while ($rows = mysqli_fetch_array($result)) {
							
							
							
                                ?>
						
									<?php if ($count_gen  <= 0){ ?>
									
							<?php }else{ ?>
								 <?php $ave = $rows['sum(gen_ave)']; 
											  $equal = $ave / $count_gen;
											  echo round($equal , 2);
									?>
						
                            <?php } }?>
								   
								   </td> 
								   <td></td> 
								   <td></td> 
								</tr>
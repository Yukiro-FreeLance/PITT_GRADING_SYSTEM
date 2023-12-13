
							
							
									    <table cellpadding="0" cellspacing="0" border="0" class="table  " id="example">                      
                                <thead>
                                    <tr>
                                        <th width="100"></th>
                                        <th class="numberu" width="300"></th>
                                        <th width="50">
										GWA:
										</th>                                 
                                        <th>
										
															<?php
							
                            $result = mysqli_query($connection,"SELECT sum(gen_ave) FROM grade  where student_id = '$session_id' and school_year = '$school_year' and semester = '$term'") or die(mysqli_error($connection));
                            
							
							
							
							$test_count=mysqli_query($connection,"select * from grade where gen_ave <> '' and student_id = '$session_id' and school_year = '$school_year' and semester = '$term' ")or die(mysqli_error($connection));
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
										
										</th>       
                                        <th></th>       
                                        <th class="act"></th>       
									           
								
											   
                                        <th></th>
										
									
                                    </tr>
                             
                            </table>
							

									    <table cellpadding="0" cellspacing="0" border="0" class="table  " id="example">                      
                                <thead>
                                    <tr>
                                        <th width="100"></th>
                                        <th class="numberu" width="300"></th>
                                        <th width="50">
										CWA: 
										</th>                                 
                                        <th>
										      <?php
							
                            $result1 = mysqli_query($connection,"SELECT sum(gen_ave) FROM grade  where student_id = '$session_id'") or die(mysqli_error($connection));
                            
							
							
							
							$test_count1=mysqli_query($connection,"select * from grade where gen_ave <> '' and student_id = '$session_id'  ")or die(mysqli_error($connection));
							$count_gen1 = mysqli_num_rows($test_count1);
							
							while ($rows1 = mysqli_fetch_array($result1)) {
							
							
							
                                ?>
						
									<?php if ($count_gen1  <= 0){ ?>
									 
							<?php }else{ ?>
									<?php $ave1 = $rows1['sum(gen_ave)']; 
											  $equal1 = $ave1 / $count_gen1;
											  echo round($equal1 , 2);
									?>
						
                            <?php } }?>
										</th>       
                                        <th></th>       
                                        <th class="act"></th>       
									           
								
											   
                                        <th></th>
										
									
                                    </tr>
                             
                            </table>
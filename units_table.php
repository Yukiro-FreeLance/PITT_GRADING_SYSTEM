    <table cellpadding="0" cellspacing="0" border="0" class="table  " id="example">                      
                                <thead>
                                    <tr>
                                        <th width="100"></th>
                                        <th class="numberu" width="300">	Number of Units:</th>
                                        <th width="50">
											<?php
                            $result = mysqli_query($connection,"SELECT sum(unit) FROM grade  where student_id = '$session_id' and school_year = '$school_year' and semester = '$term'") or die(mysqli_error($connection));
                            while ($rows = mysqli_fetch_array($result)) {
                                ?>
						
								 <?php echo $rows['sum(unit)']; ?>
							
                            <?php } ?>
										
										</th>                                 
                                        <th></th>       
                                        <th></th>       
                                        <th class="act"></th>                                                                             
                                        <th></th>
										
									
                                    </tr>
                             
                            </table>
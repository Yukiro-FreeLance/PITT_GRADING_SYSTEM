  		
	<?php include('tooltip.php'); ?>			
	<div class="navbar navbar-fixed-top navbar-inverse">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="nav-collapse collapse">
					<ul class="nav">
				
					
					<?php				
					if (!isset($_SESSION['id'])){ ?>
							<!-- script -->
							
                                    <!-- end script -->
                                    <!-- script -->
                                
                                    <!-- end script -->
						  <li class="divider-vertical"></li>
								<li class="">
								<a  rel="tooltip"  data-placement="bottom" title="Home" id="home"   href="index.php"><i class="icon-home icon-large"></i>&nbsp;Home</a> 
								</li>
						  <li class="divider-vertical"></li>
								<li class="">
								<a rel="tooltip"  data-placement="bottom" title="Click Here to Login" id="login" href="#student"  data-toggle="modal"><i class="icon-signin icon-large"></i>&nbsp;Login</a> 
								</li>
						
						  
						<li class="divider-vertical"></li>
							<li class="">
							<a rel="tooltip"  data-placement="bottom" title="Click Here to Confirm Account" id="signup" href="signup.php"><i class="icon-signin icon-large"></i>&nbsp;Confirm Account</strong></a> 
							</li>
						<li class="divider-vertical"></li>
						<li class="signup"><span class="sg"></span></li>
					
						
		
					<?php }else{ ?>
					<?php
					include('dbcon.php');
					$query=mysqli_query($connection,"select * from students where student_id='$session_id'")or die(mysqli_error($connection));
					$row=mysqli_fetch_array($query);
					?>
					
					<li class="active">
						<a href=""  data-toggle="dropdown" ><i class="icon-cog icon-large"></i></a>

					<ul class="dropdown-menu">
					<li><a href="change_password.php"><i class="icon-pencil icon-large"></i>&nbsp;Change Password</a></li>
					<li><a href="logout.php"><i class="icon-signout icon-large"></i>&nbsp;Logout</a></li>
					</ul>
   

					</li>	
					<li class="active"><a  rel="tooltip"  data-placement="bottom" title="Home" id="home1"  href="dasboard.php"><i class="icon-home icon-large"></i></a></li>
					<li>
						<a href="">Welcome:&nbsp;<img height="30" class=""  width="30" src="registrar/<?php echo $row['photo']; ?>">
						<strong class="name1"><?php echo $row['firstname']." ".$row['lastname']; ?></strong></a>
					</li>
					   
					<li>
									
						
						<?php $course_id  = $row['course']; ?>
						
						<?php
						$query_course = mysqli_query($connection,"select * from course where code = '$course_id' ")or die(mysqli_error($connection));
						$query_row = mysqli_fetch_array($query_course);
						
						
						echo '<a>Course:&nbsp;'.$query_row['code'].'</a>';
						
						?>
					
						
					</li>
							<li><a><?php echo $row['year_level']; ?></a></li>
							<li><a><?php echo $row['term']; ?> Term</a></li>
							<li><a>Status:&nbsp;<?php echo $row['student_status']; ?></a></li>
					<?php } ?>
			
					</ul>
					 
                        
			<?php if (!isset($_SESSION['id'])){ ?>		
		    <form class="navbar-search pull-right">
			<input type="text" class="search-query" placeholder="Search">
			</form>
			<?php } ?>
                    
						

                    </div>
                </div>
            </div>
        </div>
    <!-- Modal student login -->
	<div id="student" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header"><div class="alert alert-info">Please Enter Required Details Below.</div></div>
		<div class="modal-body">
			<form class="form-horizontal" method="post" action="login.php">
				<div class="control-group">
					<label class="control-label" for="inputEmail">ID Number</label>
					<div class="controls">
					<input type="text" id="inputEmail" name="student_no" placeholder="ID Number" required>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputPassword">Password</label>
					<div class="controls">
					<input type="password" id="inputPassword" name="password" placeholder="Password" required>
				</div>
				</div>
				<div class="control-group">
					<div class="controls">
					<button type="submit" name="login" class="btn btn-success"><i class="icon-signin icon-large"></i>&nbsp;Login</button>
				</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </div>
	     	
<div id="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					<?php echo $lessons[0]->lessonName; ?>
				</h1>
			</div>
		</div>

		<div class="row">
			<div class="ibox">

				<div class="clients-list">

					<?php for($i=0;$i<sizeof($slides);$i++) { ?>
					<div class="tab-content">
						<div id="tab-<?php echo ($i+1); ?>" class="tab-pane <?php if($i==0){echo 'active';} ?>">
							<div class="col-lg-12">
								<h2>
									<small><?php echo $slides[$i]->slideTitle; ?></small>
								</h2>
								<div class="panel-group" id="accordion">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title"><a class="accordion-toggle" data-toggle=
												"collapse" href="#collapseOne<?php if($i>0){echo ($i+1);} ?>">Readings</a></h4>
											</div>

											<div id="collapseOne<?php if($i>0){echo ($i+1);} ?>" class="panel-collapse collapse in">
												<div class="panel-body">
													<?php echo $slides[$i]->slideContent; ?>
												</div>
											</div>
										</div>

										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title"><a class="accordion-toggle collapsed"
													data-toggle="collapse" href="#collapseTwo<?php if($i>0){echo ($i+1);} ?>">Quiz</a></h4>
												</div>

												<div id="collapseTwo<?php if($i>0){echo ($i+1);} ?>" class="panel-collapse collapse" style="height: 0px;">
													<div class="panel-body">
														<div id="container">
															<div id="title">
																<h1><?php echo $lessons[0]->lessonName; ?> Quiz</h1>
															</div><br />

															<div id="quiz" style="display: block;">
																<div id="question">
																	<h1>Question 1:</h1>

																	<p>What is 2*5?</p>

																	<ul>
																		<li><input type="radio" name="answer" value="0" />2</li>

																		<li><input type="radio" name="answer" value="1" />5</li>

																		<li><input type="radio" name="answer" value="2" />10</li>

																		<li><input type="radio" name="answer" value="3" />15</li>
																	</ul>
																</div>
															</div>

															<div class="button btn btn-primary" id="next<?php if($i>0){echo ($i+1);} ?>">
																<a href="#">Next</a>
															</div>

															<div class="button btn btn-primary" id="prev<?php if($i>0){echo ($i+1);} ?>" style="display: none;">
																<a href="#">Prev</a>
															</div>

                   <!-- <button class='' id='next'>Next</a></button>
                                                        <button class='' id='prev'>Prev</a></button>
                                                        <button class='' id='start'> Start Over</a></button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                        	<div class="panel-heading">
                                        		<h4 class="panel-title"><a class="accordion-toggle collapsed"
                                        			data-toggle="collapse" href="#collapseThree<?php if($i>0){echo ($i+1);} ?>">Interactive Task</a></h4>
                                        		</div>

                                        		<div id="collapseThree<?php if($i>0){echo ($i+1);} ?>" class="panel-collapse collapse" style=
                                        			"height: 0px;">
                                        			<div class="panel-body">
                                        				<div id="header">
                                        					<p>Your Email Client</p>
                                        					<img src="<?php echo base_url('assets/img/dummy-pic.png'); ?>" height="50"/>
                                        				</div>
                                        				<div id="sidebar">
                                        					<h1>INBOX</h1>
                                        					<ul id="one">
                                        						<li><a class="selected">All</a></li>
                                        						<li><a>Unread</a></li>
                                        						<li><a>To me</a></li>
                                        						<li><a>Flagged</a></li>
                                        					</ul>
                                        					<ul id="two">
                                        						<a><li id="mail1<?php if($i>0){echo ($i+1);} ?>">
                                        							<p><strong>From:</strong> Library Support</p>
                                        							<p><strong>Sent:</strong> 7/05/2015</p>
                                        							<p><strong>Subject:</strong> Library Account</p>
                                        						</li></a>
                                        						<a><li id="mail2<?php if($i>0){echo ($i+1);} ?>">
                                        							<p><strong>From:</strong> John Smith</p>
                                        							<p><strong>Sent:</strong> 6/05/2015</p>
                                        							<p><strong>Subject:</strong> Fishing Trip</p>
                                        						</li></a>
                                        						<a><li id="mail3<?php if($i>0){echo ($i+1);} ?>">
                                        							<p><strong>From:</strong> UQ Support Centre</p>
                                        							<p><strong>Sent:</strong> 5/05/2015</p>
                                        							<p><strong>Subject:</strong> Upgrade your mailbox storage</p>
                                        						</li></a>
                                        					</ul>
                                        				</div>
                                        				<div id="content" class="content">
                                        					<div id="options" class="content option">
                                        						<ul>
                                        							<li id = "reply"><a>Reply</a></li>
                                        							<li><a>Reply All</a></li>
                                        							<li><a>Forward</a></li>
                                        							<li id="delete"><a>Delete</a></li>
                                        						</ul>
                                        					</div>
                                        					<div id="options2" class="content option">
                                        						<ul>
                                        							<li id = "cancel"><a>Cancel</a></li>
                                        							<li id = "send"><a>Send</a></li>
                                        						</ul>
                                        					</div>
                                        					<div id="text1" class="email content">
                                        						<ul class = "info">
                                        							<li><strong>From:</strong> Library Support</li>
                                        							<li><strong>Sent:</strong> 7/05/2015</li>
                                        							<li><strong>To:</strong> You</li>
                                        							<li><strong>Subject:</strong> Library Account</li>
                                        						</ul>
                                        						
                                        						<p>Dear User,</p>
                                        						<p>Your library account has expired, therefore you must reactivate it immediately or it will be closed automatically. If you intend to use this service in the future, you must take action at once!</p>
                                        						<p>To reactivate your account, copy and paste the following into your reply with your current username and password.</p>
                                        						<ul>
                                        							<li>Username: 'REPLACE THIS WITH YOUR USERNAME'</li>
                                        							<li>Password: 'REPLACE THIS WITH YOUR PASSWORD'</li>
                                        						</ul>
                                        						<p>Sincerely,</p>
                                        						<ul>
                                        							<li>Rosalyn Pearson</li>
                                        							<li>Access Services Assistant</li>
                                        							<li>UQ Library</li>
                                        							<li>The University of Queensland</li>
                                        						</ul>
                                        					</div>
                                        					<div id="text2"class="email content">
                                        						<ul class = "info">
                                        							<li><strong>From:</strong> John Smith</li>
                                        							<li><strong>Sent:</strong> 6/05/2015</li>
                                        							<li><strong>To:</strong> You</li>
                                        							<li><strong>Subject:</strong> Fishing Trip</li>
                                        						</ul>
                                        						<p>Hey dude,</p>
                                        						<p>You excited for our fishing trip? I'll have everything ready, so don't even worry about anything. See you soon,</p>
                                        						<p>John</p>
                                        					</div>
                                        					<div id="text3"class="email content">
                                        						<ul class = "info">
                                        							<li><strong>From:</strong> UQ Support Centre</li>
                                        							<li><strong>Sent:</strong> 5/05/2015</li>
                                        							<li><strong>To:</strong> You</li>
                                        							<li><strong>Subject:</strong> Upgrade your mailbox storage</li>
                                        						</ul>
                                        						<p>Dear User,</p>
                                        						<p>You are about to run out of space in your mailbox. Please go to the following link to verify your account and upgrade your storage. <a id = "link">Link</a></p>
                                        						<p>Sincerely,</p>
                                        						<p>UQ Support Centre</p>
                                        					</div>
                                        					<div id="txtreply" class="email content">
                                        						<p>To: rosalyn.pearson@uq.edu.in</p>
                                        						<p>Here are my details.</p>
                                        						<ul>
                                        							<li>Username: <input type="text" value = "'REPLACE THIS WITH YOUR USERNAME'" size="40"></li>
                                        							<li>Password: <input type="text" value = "'REPLACE THIS WITH YOUR PASSWORD'" size="40"></li>
                                        						</ul>
                                        					</div>
                                        				</div>
                                        				<div id="dialog-correct1" title="Well Done!">
                                        					<p>Good job! You did the right thing and deleted that email. Even though it said they were 'Rosalyn Pearson' you can't be sure. That person may have good intentions for your login details but as a general rule you should never give your username or password away.</p>
                                        				</div>
                                        				<div id="dialog-correct2" title="Well Done!">
                                        					<p>Good job! You did the right thing and deleted that email. You will never need to verify your account.</p>
                                        				</div>
                                        				<div id="dialog-wrong1" title="Wrong!">
                                        					<p>Whoops! You just sent your private login details to someone in that email. Even though it said that they were 'Rosalyn Pearson' you can't be sure. That person may have good intentions for your login details but as a general rule you should never give your username or password away.</p>
                                        				</div>
                                        				<div id="dialog-wrong2" title="Wrong!">
                                        					<p>Whoops! You just clicked that link to verify your account. You will never need to verify an existing account. That link took you to a site that looked exactly the same as the normal UQ site. Entering your details would just send them to the scammer.</p>
                                        				</div>
                                        			</div>
                                        		</div>
                                        	</div>
                                        	
                                        </div>
                                        <?php if ($i == sizeof($slides)-1) { ?>
                                        <a href="<?php echo site_url('course') ?>" class="btn btn-default  btn-success">Finish</a>
                                        <?php } else { ?>
                                        <a data-toggle="tab" href="#tab-<?php echo ($i+2);?>" class="btn btn-default  btn-warning">Next</a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/csstest/js/jquery.js'); ?>"></script>
<script src="<?php echo base_url('assets/csstest/js/quiz.js'); ?>"></script>
<script src="<?php echo base_url('assets/csstest/js/ui/jquery-ui.js'); ?>"></script>
<script src="<?php echo base_url('assets/csstest/js/dash.js'); ?>"></script>
<script src="<?php echo base_url('assets/csstest/js/email.js'); ?>"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets/csstest/js/bootstrap.min.js'); ?>"></script>



</body>

</html>

<link rel="stylesheet" href="<?php echo includeCss("hstyle") ?>"/>
<link rel="stylesheet" href="<?php echo includeCss("rstyle") ?>"/>

<div class="containers">
	 
	<div class="rows">
			
			<div class="col-md-5 text-center">
				<div class="logo">
					<img src="<?php echo base_url() ."assets/images/atilogos.png" ?>"/>
				</div>
					<br>
				<!--<div>
					<span>Technology Partner:</span><span class='blue'><img src="<?php echo asset_url("images/atilogos.png") ?>" width="55" height="40"/><b>American Technologies Inc.</b></span>
				</div>-->
				
			</div>
			
			
			<div class="col-md-7">
					<div class="">
						<div class="panel panel-warning">
							<div class="panel-heading">
								<div class="panel-title">Registration</div>
							</div>
							
							<div class="panel-body">
								<div class="spacer">
								
									<div class="alert text-center hide">
										<strong></strong>
									</div>
									
									<form role="form">
										
									<!--	<div class="form-group has-feedback">
											<input type="text" class="form-control" placeholder="Salutation" id="txtSal"  required autofocus />
											<span class="glyphicon form-control-feedback hide"></span>
										</div>  -->
										
										<div class="row">
													<div class="col-xs-6 col-md-6">
														<div class="form-group has-feedback">
															<input class="form-control" placeholder="First Name" type="text" id="txtFN" required autofocus />
															<span class="glyphicon form-control-feedback hide"></span>
														</div>
													</div>
													 
													<div class="col-xs-6 col-md-6">
														<div  class="form-group has-feedback">
															<input class="form-control" placeholder="Last Name" type="text" id="txtLN" required />
															<span class="glyphicon form-control-feedback hide"></span>
														</div>
													</div>
										</div>	
										<div class="form-group has-feedback">
												<input type="text" class="form-control" placeholder="Position" id="txtDesignation"  required/>
												<span class="glyphicon form-control-feedback hide"></span>
										</div>
							<!--  <div class="form-group has-feedback">
												<input type="text" class="form-control" placeholder="PRC" id="txtPRC"  required/>
												<span class="glyphicon form-control-feedback hide"></span>
										</div>
										
										<div class="form-group has-feedback">
												<input type="text" class="form-control" placeholder="OR" id="txtOR"  required/>
												<span class="glyphicon form-control-feedback hide"></span>
										</div>
										-->
										<div class="form-group has-feedback">
												<input type="text" class="form-control" placeholder="Company" id="txtCompany"  required/>
												<span class="glyphicon form-control-feedback hide"></span>
										</div>
										
										<div class="form-group has-feedback">
												<input type="text" class="form-control" placeholder="Email" id="txtEmail"  required/>
												<span class="glyphicon form-control-feedback hide"></span>
										</div>
										
										
										
										<div class="form-group has-feedback">
												<input type="text" class="form-control" placeholder="Business Phone" id="txtBP"  required/>
												<span class="glyphicon form-control-feedback hide"></span>
										</div>
										
										<div class="form-group has-feedback">
												<input type="text" class="form-control" placeholder="Mobile No." id="txtMobile"  required/>
												<span class="glyphicon form-control-feedback hide"></span>
										</div>
										
								<!--		<div class="form-group has-feedback">
												<input type="text" class="form-control" placeholder="Province" id="txtProvince"  required/>
												<span class="glyphicon form-control-feedback hide"></span>
										</div>
										
										<div class="form-group has-feedback">
												<input type="text" class="form-control" placeholder="City/Municipality" id="txtCity"  required/>
												<span class="glyphicon form-control-feedback hide"></span>
										</div>-->
										<div class="form-group has-feedback">
										<label>How Did you find out about UAP Event?</label><br/>
												<select>
													<option>Newspaper</option>
													<option>Social Media</option>
													<option>Billboards/flyers</option>
												</select>
										</div>

										<div class="hide">
										&nbsp;(<label>KIT</label>&nbsp;&nbsp;<input type="checkbox" id="cbKIT"/>)
										
										<div class="form-group has-feedback">
											(<label>Present</label>&nbsp;&nbsp;<input type="checkbox" id="cbPresent" checked/>)
											
											
											&nbsp;
											&nbsp;
											&nbsp;<input type="radio" id="rDelegate" value="Delegate" name="rad" checked/>Delegate
											&nbsp; </div>
											&nbsp;(<label>VIP</label>&nbsp;&nbsp;<input type="checkbox" id="cbVIP"/>) 
											&nbsp;<input type="radio" id="rExhibitor" value="Exhibitor" name="rad"/>Exhibitor
											&nbsp;
											&nbsp;<input type="radio" id="rSponsor" value="Sponsor" name="rad"/>Sponsor
											&nbsp;
											&nbsp;<input type="radio" id="rCon" value="Concessionaires" name="rad"/>Concessionaires
											&nbsp;<input type="radio" id="rsVIP" value="sVIP" name="rad"/>sVIP
											&nbsp;  
										</div>
										
									</form>
									
									<button class="btn btn-lg btn-success btn-block btn-Save"><i class="fa fa-floppy-o" aria-hidden="true"></i>
										&nbsp;Save
									</button>
								</div>
							</div>
							
						</div>
					</div>
					
					<div class="col-md-2 loadersposition save">
						<img src="<?php echo asset_url("images/ajax-loader.gif") ?>"/>
					</div>
					
				</div>
	</div>
</div>

 

<script type="text/javascript" src="<?php echo includeJs("rscript") ?>"></script>
<script type="text/javascript" src="<?php echo includeJs("jquery.redirect.min") ?>"></script>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta charset="utf-8">
		<script type="text/javascript" src="<?php echo includeJs("jquery-2.2.3.min") ?>"></script>
		<script type="text/javascript" src="<?php echo includeJs("local") ?>"></script>
	</head>
		<body>
			<script type="text/javascript" src="<?php echo includeJs("jquery.textfill.min") ?>"></script>
			<link rel="stylesheet" href="<?php echo includeCss("id") ?>">
				<div class="idcontainer">
				<?php 
				$res = "res1";
				$details = "details1";
				$company = "company1";
				
			 	if($VType == "Delegate" ){
					$res = "res";
					$details = "details";
					$company = "company";
				}else{ 
					$res = "res1";
					$details = "details1";
				} 
				
			?>
					<div class="<?php echo $res ?>">
					
						<span>
							<?php
							//	if($VType == "Delegate" || $VType == "SVIP"){
									echo " " .$FN ." " .$LN;//comment everything except this
									//echo $LN;
							//	}else{ 
							//		echo $Company;
							//	}
							?> 
						</span>
					</div>		
					<div class="<?php echo $details ?>" style="font-size:25px">
						<span>
							<?php 
								//	if($VType == "Delegate" || $VType == "SVIP"){
										//echo "".$FN ."<br/>";
										echo $Company; //comment everything except this//used to be $company
								//	}else {
								//		echo $VType;
								//	}
								?>
						</span>
					</div>
					<div class="<?php echo $company?>">
					<span>
							<?php
								//echo $Company."<br/>";
							?>
						</span>
					</div>
				<!--	 <?php  if($VType == "Delegate"){ ?>
						  <div class="barcode">
							<img src="data:image/png;base64, <?php echo $BarcodeID  ?>" width="240" height="50"/>
						</div> 
						<div class="code">
							<span>
								 
									<?php	echo $Code; ?>
								 
							</span>
						</div>
					 <?php  } ?> -->
				</div>
			<a href="<?php echo base_url() ."registration" ?>">BACK</a>
			<script type="text/javascript" src="<?php echo includeJs("id") ?>"></script>
		</body>
</html>
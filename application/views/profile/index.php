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
				$res;
				$details;
										// erase the || $VType == null to bring back the printing without barcode
				if($VType == "Delegate" || $VType == null){
					$res = "res";
					$details = "details";
				}else{ 
					$res = "res1";
					$details = "details1";
				}
				
			?>
				<div class="<?php echo $res ?>">
						<span>
							<?php
								if($VType == "Delegate" || $VType == "sVIP" || $VType == null){
								//	echo "" .$FirstName ." " .substr($MidName, 0, 1) ." " .$LastName;
								//}else{ 
									//echo $CompanyName; //uncomment this to go back to original format
									echo "" .$FirstName ." " .$LastName;
								}
							?> 
						</span>
				</div>
				<?php if($VType == "Sponsor" || $VType == "Exhibitor") { ?>
				<div class="company">
					<span>
						<?php echo $CompanyName; ?>
					</span>
				</div>
				<?php } ?>
				<div class="<?php echo $details ?>" style="font-size:25px">
					<span>
							<?php 
									if($VType == "Delegate" || $VType == "sVIP" || $VType == null){
										echo "".$CompanyName;
									}else {
										echo $VType;
									}
								?>
					</span>
				</div>
											<!-- erase the || $VType == null to bring back the printing without barcode-->	
			<!--	<?php if($VType == "Delegate" || $VType == null){ ?>
					<div class="barcode">
						<img src="data:image/png;base64, <?php echo $Barcode  ?>" width="240" height="40"/>
					</div>
					<div class="code">
						<span>
								<?php echo $Code ?>
						</span>
					</div>
				<?php } ?> -->
				
			</div>
			
			<script type="text/javascript" src="<?php echo includeJs("id") ?>"></script>
		</body>
</html>
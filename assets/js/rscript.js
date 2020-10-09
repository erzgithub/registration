$(function(){
	
	$(".save").hide();
	
	 $(".btn-Save").click(function(){
		 Save();
	 });
	 
	 $("input[type=text]").keyup(function(e){
			if(e.keyCode == 13){
				Save();
			}
	 });
	 
	 function Save(){
		 var SAL = $("#txtSal").val();
		  var FN = $("#txtFN").val();
		  var LN = $("#txtLN").val();
		  var Designation = $("#txtDesignation").val();
		  var Email = $("#txtEmail").val();
		  var BusinessPhone = $("#txtBP").val();
		  var MobileNo = $("#txtMobile").val();
		  var Province = $("#txtProvince").val();
		  var City = $("#txtCity").val();
		  var Company = $("#txtCompany").val();
		  var Present = false;
		  var PRC = $("#txtPRC").val();
		  var OR = $("#txtOR").val();
		  var VIP;
		  var VType;
		  var KIT;
		  
		  if($("#cbPresent").is(":checked")){
			  Present = true;
		  }else{ 
			Present = false;
		  }
		  
		  if($("#cbVIP").is(":checked")){
			  VIP = "VIP";
		  }else {
			  VIP = null;
		  }
		  
		  if($("#cbKIT").is(":checked")){
			  KIT = true;
		  }else{ 
			KIT = false;
		  }
		  
		  if($("#rDelegate").is(":checked")){
			  VType = $("#rDelegate").val();
		  }
		  
		  if($("#rExhibitor").is(":checked")){
			  VType = $("#rExhibitor").val();
		  }
		  
			if($("#rSponsor").is(":checked")){
			  VType = $("#rSponsor").val();
		  }
		  
		  if($("#rCon").is(":checked")){
			  VType = $("#rCon").val();
		  }
		  
		   if($("#rsVIP").is(":checked")){
			  VType = $("#rsVIP").val();
		  }
 
		  $.ajax({
			  type:"POST",
			  url: BaseURL + "/registration/save",
			  data: {SAL:SAL, FN:FN, LN:LN, Designation:Designation, Email:Email, BusinessPhone:BusinessPhone,
			  MobileNo:MobileNo, Province:Province,City:City, Company:Company, Present:Present, PRC:PRC, OR:OR, VIP:VIP, VType:VType, KIT:KIT},
			  async: true,
			  beforeSend: function(){
				  $(".save").show();
			  },
			  success: function(html){
				  switch(parseInt(html)){
					  case 0:
							$(".alert").empty().append("<strong></strong>");
							$(".alert").find("strong").next().remove();
							$(".alert").find("strong").prev().remove();
							$(".alert").removeClass("hide alert-warning alert-danger").addClass("alert-success").find("strong").text("Success : ").after("<i> Registration Completed!</i>");
							$(".alert").find("strong").before("<span class='glyphicon glyphicon-ok'></span>&nbsp;");
							$("input[type=text], input[type=password]").val("");
							$("input[type=text], input[type=password]").parent().removeClass("has-error has-warning has-success");
							$("input[type=text], input[type=password]").next().addClass("hide");
							$("#txtFN").focus();
							$().redirect(BaseURL + "/records/printid", {SAL:SAL, FN:FN, LN:LN, Company:Company, Designation:Designation, VType:VType, VIP:VIP});
							break;
					  case -4:
							InvalidEmail();
							break;
					  case -2:
							checkValidation();
							break;
					  default:
							alert(html);
				  }
			  },
			  complete: function(){
				  $(".save").hide();
			  }
		  });
	 }
	 
	 
	 function InvalidEmail(){
		 $("#txtEmail").parent().addClass("has-warning");
				$("#txtEmail").next().removeClass("hide").addClass("glyphicon-warning-sign");
				$(".alert").empty().append("<strong></strong>");
				 $(".alert").find("strong").next().remove();
				 $(".alert").find("strong").prev().remove();
				$(".alert").removeClass("hide alert-danger").addClass("alert-warning").find("strong").text("Warning : ").after("<i> Invalid Email!</i>");
				$(".alert").find("strong").before("<span class='glyphicon glyphicon-alert'></span>&nbsp;");
		 $("#txtEmail").focus();
	 }
	 
	 $("#rExhibitor").click(function(){
		  if($(this).is(":checked")){
			 $("#cbKIT").attr("disabled", true).attr("checked", false);
			  $("#cbVIP").attr("disabled", true).attr("checked", false);
		  }
	 });
	 
	 $("#rDelegate").click(function(){
		  if($(this).is(":checked")){
			   $("#cbKIT").attr("disabled", false);
			  $("#cbVIP").attr("disabled", false);
		  }
	 });
	 
	function checkValidation(){
	
		 $("input[type=text], input[type=password]").each(function(val, text){
			 if(!$.trim($(this).val())){
				 $("#" + this.id).parent().addClass("has-error");
				$("#" + this.id).next().removeClass("hide").addClass("glyphicon-exclamation-sign");
			 }
		 });
		 $(".alert").empty().append("<strong></strong>");
		 $(".alert").find("strong").next().remove();
		 $(".alert").find("strong").prev().remove();
		$(".alert").removeClass("hide alert-warning").addClass("alert-danger").find("strong").text("Error : ").after("<i> Fields are Empty!</i>");
		$(".alert").find("strong").before("<span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;");
		 
	 }
	 
	 $("input[type=text], input[type=password]").keyup(function(){
			if($.trim($("#" + this.id).val())){
				$("#" + this.id).parent().removeClass("has-error has-warning has-success");
				$("#" + this.id).next().addClass("hide").removeClass("glyphicon-exclamation-sign glyphicon-warning-sign glyphicon-ok");
			}else{ 
				
				$("#" + this.id).parent().removeClass("has-warning").addClass("has-error");
				$("#" + this.id).next().removeClass("hide glyphicon-warning-sign").addClass("glyphicon-exclamation-sign");
			}
	 });
	 
	 $("input[type=text], input[type=password]").focusout(function(){
			if($.trim($("#" + this.id).val())){
				$("#" + this.id).parent().addClass("has-success");
				$("#" + this.id).next().removeClass("hide").addClass("glyphicon-ok");
			}
	 });
	
});
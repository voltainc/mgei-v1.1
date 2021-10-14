function create_employee(){
var employee_name = $.trim($("#employee_name").val());
var employee_company = $.trim($("#employee_company").attr('value'));
var employee_dob = $.trim($("#employee_dob").val());
var employee_civil_id = $.trim($("#employee_civil_id").val());
var employee_salary_basic = $.trim($("#employee_salary_basic").val());
var employee_passport = $.trim($("#employee_passport").val());
var employee_joining_date = $.trim($("#employee_joining_date").val());
var employee_visa_date = $.trim($("#employee_visa_date").val());
var employee_visa_expire = $.trim($("#employee_visa_expire").val());
var employee_insurance_date = $.trim($("#employee_insurance_date").val());
var employee_insurance_expire = $.trim($("#employee_insurance_expire").val());
var employee_designation = $.trim($("#employee_designation").val());

if(employee_name!='' && employee_company!='' && employee_dob!='' && employee_civil_id!='' && employee_salary_basic!='' && employee_passport!='' && employee_joining_date!='' && employee_visa_date!='' && employee_visa_expire!='' && employee_designation!='')
					{
							var dataString = "act=create_employee&emlpoyee="+employee_name+"&company="+employee_company+"&passport="+employee_passport+"&visa_date="+employee_visa_date+"&visa_expire="+employee_visa_expire+"&dob="+employee_dob+"&joined="+employee_joining_date+"&cid="+employee_civil_id+"&basic_salary="+employee_salary_basic+"&designation="+employee_designation+"&employee_insurance_date="+employee_insurance_date+"&employee_insurance_expire="+employee_insurance_expire;

							$.ajax	
										(
												{
														type: "POST",
														url: "assets/ajax/proc.php",
														data: dataString,
														cache: false,
														success: function(result)
														{
															var result = jQuery.parseJSON(result);
															if(result['status']=="success"){
																
																	/*$("#employee_create_msgbox").html("<div class='alert alert-success block'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Sucess!</strong>"+result['message']+"</div>");*/
																	
														var redirect = window.location.href;
																	window.location.href=redirect;
															
															}else if(result['status']=="error"){
															
																$("#employee_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
															
															}else{
																$("#employee_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
															}
															
														}
												}
										);
					}else{
					
						$("#employee_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error :</strong> Fields with * required</div></div>");
					
					}
								
}


function create_vehicle(){
	
var company = $.trim($("#company").val());
var vehicle_model = $.trim($("#vehicle_model").val());
var vehicle_registration_number = $.trim($("#vehicle_registration_number").val());
var malkiya_date = $.trim($("#malkiya_date").val());
var vehicle_insurance_date = $.trim($("#vehicle_insurance_date").val());
var vehicle_color = $.trim($("#vehicle_color").val());
var vehicle_value = $.trim($("#vehicle_value").val());
var malkiya_expire = $.trim($("#malkiya_expire").val());
var vehicle_insurance_expire = $.trim($("#vehicle_insurance_expire").val());


if(company!='' && vehicle_model!='' && vehicle_registration_number!='' && malkiya_date!='' && vehicle_insurance_date!='' && vehicle_color!='' && vehicle_value!='' && malkiya_expire!='' && vehicle_insurance_expire!='')
					{
							var dataString = "act=create_vehicle&company="+company+"&vehicle_model="+vehicle_model+"&vehicle_registration_number="+vehicle_registration_number+"&malkiya_date="+malkiya_date+"&vehicle_insurance_date="+vehicle_insurance_date+"&vehicle_color="+vehicle_color+"&vehicle_value="+vehicle_value+"&malkiya_expire="+malkiya_expire+"&vehicle_insurance_expire="+vehicle_insurance_expire;

							$.ajax	
										(
												{
														type: "POST",
														url: "assets/ajax/proc.php",
														data: dataString,
														cache: false,
														success: function(result)
														{
															var result = jQuery.parseJSON(result);
															if(result['status']=="success"){
																
																	var redirect = window.location.href;
																	window.location.href=redirect;
															
															}else if(result['status']=="error"){
															
																$("#vehicle_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
															
															}else{
																$("#vehicle_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
															}
															
														}
												}
										);
					}else{
					
						$("#vehicle_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error :</strong> Fields with * required</div></div>");
					
					}
								
}
function create_supplier(){
	
var company = $.trim($("#company").val());
var name = $.trim($("#name").val());
var address = $.trim($("#address").val());
var phone = $.trim($("#phone").val());
var fax = $.trim($("#fax").val());
var email = $.trim($("#email").val());
var supplier_company = $.trim($("#supplier_company").val());
var remarks = $.trim($("#remarks").val());

if(company!='' && name!='' && phone!='')
					{
							var dataString = "act=create_supplier&company="+company+"&name="+name+"&address="+address+"&phone="+phone+"&fax="+fax+"&email="+email+"&supplier_company="+supplier_company+"&remarks="+remarks;

							$.ajax	
										(
												{
														type: "POST",
														url: "assets/ajax/proc.php",
														data: dataString,
														cache: false,
														success: function(result)
														{
															var result = jQuery.parseJSON(result);
															if(result['status']=="success"){
																
																	var redirect = window.location.href;
																	window.location.href=redirect;
															
															}else if(result['status']=="error"){
															
																$("#vehicle_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
															
															}else{
																$("#vehicle_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
															}
															
														}
												}
										);
					}else{
					
						$("#supplier_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error :</strong> Fields with * required</div></div>");
					
					}
								
}


function create_customer(){
	
var company = $.trim($("#company").val());
var name = $.trim($("#name").val());
var address = $.trim($("#address").val());
var phone = $.trim($("#phone").val());
var fax = $.trim($("#fax").val());
var email = $.trim($("#email").val());
var supplier_company = $.trim($("#customer_company").val());
var remarks = $.trim($("#remarks").val());

if(company!='' && name!='' && phone!='')
					{
							var dataString = "act=create_customer&company="+company+"&name="+name+"&address="+address+"&phone="+phone+"&fax="+fax+"&email="+email+"&customer_company="+supplier_company+"&remarks="+remarks;

							$.ajax	
										(
												{
														type: "POST",
														url: "assets/ajax/proc.php",
														data: dataString,
														cache: false,
														success: function(result)
														{
															var result = jQuery.parseJSON(result);
															if(result['status']=="success"){
																
																	var redirect = window.location.href;
																	window.location.href=redirect;
															
															}else if(result['status']=="error"){
															
																$("#supplier_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
															
															}else{
																$("#supplier_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
															}
															
														}
												}
										);
					}else{
					
						$("#supplier_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error :</strong> Fields with * required</div></div>");
					
					}
								
}


function create_unit(){
	
var company = $.trim($("#company").val());
var name = $.trim($("#name").val());

if(company!='' && name!='')
					{
							var dataString = "act=create_unit&company="+company+"&name="+name;

							$.ajax	
										(
												{
														type: "POST",
														url: "assets/ajax/proc.php",
														data: dataString,
														cache: false,
														success: function(result)
														{
															var result = jQuery.parseJSON(result);
															if(result['status']=="success"){
																
																	var redirect = window.location.href;
																	window.location.href=redirect;
															
															}else if(result['status']=="error"){
															
																$("#unit_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
															
															}else{
																$("#unit_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
															}
															
														}
												}
										);
					}else{
					
						$("#supplier_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error :</strong> Fields with * required</div></div>");
					
					}
								
}

function create_item(){
	
var company = $.trim($("#swap_company").val());
var name = $.trim($("#name").val());
var quantity = $.trim($("#quantity").val());
var volume = $.trim($("#volume").val());
var unit = $.trim($("#unit").val());
var price_per_unit = $.trim($("#price_per_unit").val());
var type = $.trim($("#type").val());

if(company!='' && name!='' && quantity!='' && volume!='' && unit!='' && price_per_unit!='' && type!='')
					{
							var dataString = "act=create_item&company="+company+"&name="+name+"&quantity="+quantity+"&volume="+volume+"&unit="+unit+"&price_per_unit="+price_per_unit+"&type="+type;

							$.ajax	
										(
												{
														type: "POST",
														url: "assets/ajax/proc.php",
														data: dataString,
														cache: false,
														success: function(result)
														{
															var result = jQuery.parseJSON(result);
															if(result['status']=="success"){
																
																	var redirect = window.location.href;
																	window.location.href=redirect;
															
															}else if(result['status']=="error"){
															
																$("#item_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
															
															}else{
																$("#item_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
															}
															
														}
												}
										);
					}else{
					
						$("#item_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error :</strong> Fields with * required</div></div>");
					
					}
								
}

function create_item_purchase(){
	
var company = $.trim($("#swap_company").val());
var name = $.trim($("#name").val());


if(name!='')
					{
							var dataString = "act=create_item_purchase&company="+company+"&name="+name;

							$.ajax	
										(
												{
														type: "POST",
														url: "assets/ajax/proc.php",
														data: dataString,
														cache: false,
														success: function(result)
														{
															var result = jQuery.parseJSON(result);
															if(result['status']=="success"){
																
																	var redirect = window.location.href;
																	window.location.href=redirect;
															
															}else if(result['status']=="error"){
															
																$("#item_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
															
															}else{
																$("#item_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
															}
															
														}
												}
										);
					}else{
					
						$("#item_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error :</strong> Fields with * required</div></div>");
					
					}
								
}


function create_purchase_invoice(){
	
var item = $("#selected_item").attr("item");;
var company = $.trim($("#company").val());
var supplier = $.trim($("#supplier").val());
var qty = $.trim($("#qty").val());
var price = $.trim($("#price").val());
var paid = $.trim($("#paid").val());
var transaction_type = $.trim($("#transaction_type").val());
var discount = $.trim($("#discount").val());



if(item!='' && company!='' && supplier!='' && quantity!='' && price!='' && paid!='' && transaction_type!='')
					{
							var dataString = "act=create_purchase_invoice&item="+item+"&company="+company+"&supplier="+supplier+"&qty="+qty+"&price="+price+"&paid="+paid+"&transaction_type="+transaction_type+"&discount="+discount;

							$.ajax	
										(
												{
														type: "POST",
														url: "assets/ajax/proc.php",
														data: dataString,
														cache: false,
														success: function(result)
														{
															var result = jQuery.parseJSON(result);
															if(result['status']=="success"){
																
																	
																	window.location.href="purcahse_invoice_detail?inv="+result['message'];
															
															}else if(result['status']=="error"){
															
																$("#purchase_invoice_notify").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
															
															}else{
																$("#purchase_invoice_notify").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
															}
															
														}
												}
										);
					}else{
					
						$("#purchase_invoice_notify").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error :</strong> Fields with * required</div></div>");
					
					}
								
}

function create_payment_voucher(arg){
	
				switch(arg){
					
					
						case "cash":
								var company = $.trim($("#swap_company").val());
								var pv_number = $.trim($("#pv_number").val());
								var issue_date = $.trim($("#issue_date").val());
								var issue_to = $.trim($("#issue_to").val());
								var cash_amount = $.trim($("#cash_amount").val());
								var description = $.trim($("#description").val());
								
								var dataString = "act=create_payment_voucher&method=cash&company="+company+"&pv_number="+pv_number+"&issue_date="+issue_date+"&issue_to="+issue_to+"&cash_amount="+cash_amount+"&description="+description;

								$.ajax	
										(
												{
														type: "POST",
														url: "assets/ajax/proc.php",
														data: dataString,
														cache: false,
														success: function(result)
														{
															var result = jQuery.parseJSON(result);
															if(result['status']=="success"){
																
																	var redirect = window.location.href;
																	window.location.href=redirect;
															
															}else if(result['status']=="error"){
															
																$("#voucher_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
															
															}else{
																$("#voucher_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
															}
															
														}
												}
										);
					
						
						
						break;
						
						
						case "cheque":
								var company = $.trim($("#swap_company").val());
								var pv_number = $.trim($("#pv_number").val());
								var issue_date = $.trim($("#issue_date").val());
								var issue_to = $.trim($("#issue_to").val());
								var bank = $.trim($("#bank").val());
								var cheque_number = $.trim($("#cheque_number").val());
								var cheque_amount = $.trim($("#cheque_amount").val());
								var cheque_date = $.trim($("#cheque_date").val());
								var description = $.trim($("#description").val());
								
								var dataString = "act=create_payment_voucher&method=cheque&company="+company+"&pv_number="+pv_number+"&issue_date="+issue_date+"&issue_to="+issue_to+"&bank="+bank+"&cheque_number="+cheque_number+"&cheque_amount="+cheque_amount+"&cheque_date="+cheque_date+"&description="+description;

								$.ajax	
										(
												{
														type: "POST",
														url: "assets/ajax/proc.php",
														data: dataString,
														cache: false,
														success: function(result)
														{
															var result = jQuery.parseJSON(result);
															if(result['status']=="success"){
																
																	var redirect = window.location.href;
																	window.location.href=redirect;
															
															}else if(result['status']=="error"){
															
																$("#voucher_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
															
															}else{
																$("#voucher_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
															}
															
														}
												}
										);
					
						
						
						break;
					
					
					
					
				}

							
								
}function create_receive_voucher(arg){					switch(arg){																case "cash":								var company = $.trim($("#swap_company").val());								var rv_number = $.trim($("#rv_number").val());								var issue_date = $.trim($("#issue_date").val());								var issue_from = $.trim($("#issue_from").val());								var cash_amount = $.trim($("#cash_amount").val());								var description = $.trim($("#description").val());																var dataString = "act=create_receive_voucher&method=cash&company="+company+"&rv_number="+rv_number+"&issue_date="+issue_date+"&issue_from="+issue_from+"&cash_amount="+cash_amount+"&description="+description;								$.ajax											(												{														type: "POST",														url: "assets/ajax/proc.php",														data: dataString,														cache: false,														success: function(result)														{															var result = jQuery.parseJSON(result);															if(result['status']=="success"){																																	var redirect = window.location.href;																	window.location.href=redirect;																														}else if(result['status']=="error"){																															$("#voucher_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");																														}else{																$("#voucher_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");															}																													}												}										);																							break;																		case "cheque":								var company = $.trim($("#swap_company").val());								var rv_number = $.trim($("#rv_number").val());								var issue_date = $.trim($("#issue_date").val());								var issue_from = $.trim($("#issue_from").val());								var bank = $.trim($("#bank").val());								var cheque_number = $.trim($("#cheque_number").val());								var cheque_amount = $.trim($("#cheque_amount").val());								var cheque_date = $.trim($("#cheque_date").val());								var description = $.trim($("#description").val());																var dataString = "act=create_receive_voucher&method=cheque&company="+company+"&rv_number="+rv_number+"&issue_date="+issue_date+"&issue_from="+issue_from+"&bank="+bank+"&cheque_number="+cheque_number+"&cheque_amount="+cheque_amount+"&cheque_date="+cheque_date+"&description="+description;								$.ajax											(												{														type: "POST",														url: "assets/ajax/proc.php",														data: dataString,														cache: false,														success: function(result)														{															var result = jQuery.parseJSON(result);															if(result['status']=="success"){																																	var redirect = window.location.href;																	window.location.href=redirect;																														}else if(result['status']=="error"){																															$("#voucher_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");																														}else{																$("#voucher_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");															}																													}												}										);																							break;																								}															}

function create_bank_account(){
var bank_account_name = $.trim($("#bank_account_name").val());
var bank_account_company = $.trim($("#company").attr('value'));
var bank_account_address = $.trim($("#bank_account_address").val());
var bank_account_number = $.trim($("#bank_account_number").val());

if(bank_account_name!='' && bank_account_company!='' && bank_account_address!='' && bank_account_number!='' )
					{
							var dataString = "act=create_bank_account&name="+bank_account_name+"&company="+bank_account_company+"&address="+bank_account_address+"&account="+bank_account_number;

							$.ajax	
										(
												{
														type: "POST",
														url: "assets/ajax/proc.php",
														data: dataString,
														cache: false,
														success: function(result)
														{
															var result = jQuery.parseJSON(result);
															if(result['status']=="success"){
																
																	/*$("#employee_create_msgbox").html("<div class='alert alert-success block'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Sucess!</strong>"+result['message']+"</div>");*/
																	
																	var redirect = window.location.href;
																	window.location.href=redirect;
															
															}else if(result['status']=="error"){
															
																$("#bank_account_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
															
															}else{
																$("#bank_account_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
															}
															
														}
												}
										);
					}else{
					
						$("#employee_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error :</strong> Fields with * required</div></div>");
					
					}
								
}

function add_salary(emp_id,emp_salary){

$("#notify_"+emp_id).html("<i class='fa fa-circle-thin'></i>");

var dataString = "act=add_salary&emp_id="+emp_id+"&emp_salary="+emp_salary+"&month="+$("#month").val()+"&year="+$("#year").val();

							$.ajax	
										(
												{
														type: "POST",
														url: "assets/ajax/salary.php",
														data: dataString,
														cache: false,
														success: function(result)
														{
															var result = jQuery.parseJSON(result);
															if(result['status']=="success"){
																
																$("#notify_"+emp_id).html("<i class='fa fa-check-circle text-primary'> "+result['message']+"");
															
															}else if(result['status']=="error"){
																$("#notify_"+emp_id).html("<i class='fa fa-times-circle text-danger'> "+result['message']+"");
															}else{
																$("#notify_"+emp_id).html("<i class='fa fa-times-circle text-danger'> "+result['message']+"");
															}
															
														}
												}

										);
}

function toggle_cols(pointer){

	$("."+pointer).toggle();
	var months = '';
	$("input[type='checkbox']").each(function(){
		if($(this).is(':checked')){months+=$(this).attr('id')+',';}
	});
	months = months.replace(/,+$/,'');
	var dataString = 'act=toggle_cols&months='+months+'&company_id='+$("#cid").attr('value');
	$.ajax	
										(
												{
														type: "POST",
														url: "assets/ajax/salary.php",
														data: dataString,
														cache: false,
														success: function(result)
														{
															var result = jQuery.parseJSON(result);
															if(result['status']=="success"){
															
																for(var i=0; i<result['message'].length;i++){
																	$("td[name='"+result['message'][i]['name']+"']").html(result['message'][i]['value']);
																}
																$("td[name='total']").html(result['total']);
															}
															
														}
												}

										);
}


$("#swap_company").change(function(){
	var x= $("#swap_company").val();
	window.location='?salt='+x;
	});
	
function recent_activities(){
	
		$("#recent_activities").html("");
		
		$.ajax	
										(
												{
														type: "POST",
														url: "assets/ajax/proc.php",
														data: 'act=recent_activities',
														cache: false,
														success: function(result)
														{
															
															$("#recent_activities").html(result);
															
														}
												}

										);
}

function recent_activities_esp(){
	
			
				var company = $("#company").attr("value");
				var dataString = "act=recent_activities_esp&company="+company;
			
					$.ajax	
											(
													{
															type: "POST",
															url: "assets/ajax/proc.php",
															data: dataString,
															cache: false,
															success: function(result)
															{
																
																$("#recent_activities").html(result);
																
															}
													}

											);
					
			
			
			
		
	
		
}

function notifications(){
	
		$("#notifications").html("");
		
		$.ajax	
										(
												{
														type: "POST",
														url: "assets/ajax/proc.php",
														data: 'act=notifications',
														cache: false,
														success: function(result)
														{
															
															$("#notifications").html(result);
															
														}
												}

										);
}

function OpenInNewTab(url) {
  var win = window.open(url, '_blank');
  win.focus();
}

function postman(url,employee,dataString){
$.ajax	
										(
												{
														type: "POST",
														url: url,
														data: dataString,
														cache: false,
														success: function(result)
														{
															var result = jQuery.parseJSON(result);
															
															if(result['status']=="success"){
				
																	$('#notify_'+employee).html("<label class='label label-success label-xs pull-left'><i class='fa fa-check-circle'></i> "+result['message']+"</label>");
																	
																}else if(result['status']=='error'){
																	$('#notify_'+employee).html("<label class='label label-danger label-xs pull-left'><i class='fa fa-times-circle'></i> "+result['message']+"</label>");
																}else{
																	$('#notify_'+employee).html("<label class='label label-success label-xs pull-left'><i class='fa fa-check-circle'></i> An error occured please contact admin</label>");
																}
														}
												}

										);


}

function create_attendance(){

		var company = $("#swap_company").val();
		var year = $("#years").val();
		var month = $("#months").val();
		
		$("input[name='mutlidates']").each(function(){
		
			var employee = $(this).attr('id');
			var days = $(this).val();
			
			var dataString = 'act=create_attendace&company='+company+'&employee='+employee+'&year='+year+'&month='+month+'&days='+days;
			postman('assets/ajax/proc.php',employee,dataString);
			$(this).val('');
				
		
		}); 
			
		
		
		
}

function view_years(){
		
		var company = $("#swap_company").val();
		var year = $("#years_view").val();
		
		var dataString = "act=attendance_view_months&company="+company+"&year="+year;
		
		$.ajax	
										(
												{
														type: "POST",
														url: 'assets/ajax/proc.php',
														data: dataString,
														cache: false,
														success: function(result)
														{
															
															$("#months_view_container").html(result);
															
														}
												}

										);

}

function view_attendance(){

		var company = $("#swap_company").val();
		var year = $("#years_view").val();
		var month = $("#months_view").val();
		
		var dataString = "act=view_attendace&company="+company+"&year="+year+"&month="+month;
		
		$.ajax	
										(
												{
														type: "POST",
														url: 'assets/ajax/proc.php',
														data: dataString,
														cache: false,
														success: function(result)
														{
															
															$("#view_attendance").html(result);
															
														}
												}

										);
		
}

function view_attendance_esp(){

		var company = $("#swap_company").val();
		var year = $("#years_view").val();
		var month = $("#months_view").val();
		
		var dataString = "act=view_attendace_esp&company="+company+"&year="+year+"&month="+month;
		
		$.ajax	
										(
												{
														type: "POST",
														url: 'assets/ajax/proc.php',
														data: dataString,
														cache: false,
														success: function(result)
														{
															
															$("#view_attendance").html(result);
															
														}
												}

										);
		
}
function refresh_view_attendance_years(){
	
	$("#months_view_container").html("<input type='text' class='form-control' disabled='disabled' placeholder='Select Year to enable this field' />");
	$("#view_attendance").html("<blockquote>Empty</blockquote>");
	$("#sheet").html("<blockquote>Empty</blockquote>");
	
	var company = $("#swap_company").val();
	var dataString = "act=refresh_view_attendance_years&company="+company;
	$.ajax	
										(
												{
														type: "POST",
														url: 'assets/ajax/proc.php',
														data: dataString,
														cache: false,
														success: function(result)
														{
															
															$("#refresh_view_attendance_years").html(result);
															
														}
												}

										);
	
}



function clipovertime(emp_day){
	
	$("#overtime_dialogue_notify").html("");
	
	$("#overtime_clip_emp").attr("onclick","append_overtime('"+emp_day+"')");
	var x = $("b[emp_day='"+emp_day+"']").attr('hrs_mins');
	
	if(typeof x === "undefined" || x===''){
			
			$("#overtime_hrs").val('');
			$("#overtime_mins").val('');
			
	}else{
			var data = x.split('_');
			$("#overtime_hrs").val(data[0]);
			$("#overtime_mins").val(data[1]);
	}
	
}

function append_overtime(emp_day){
	
	$("#overtime_dialogue_notify").html("");
	var hrs  = $.trim($("#overtime_hrs").val());
	var mins  = $.trim($("#overtime_mins").val());
	
	if(typeof hrs === "" || mins===""){
			$("#overtime_dialogue_notify").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Error!</strong> All fields are required</div>");
	}else{
			
			
			$("b[emp_day='"+emp_day+"']").attr("hrs_mins",hrs+"_"+mins);
			
			var company = $("#swap_company").val();
			var year = $("#years_view").val();
			var month = $("#months_view").val();
			var data = emp_day.split('_');
			var emp = data[0];
			var day = data[1];
			
			var dataString = 'act=create_overtime&company='+company+'&employee='+emp+'&year='+year+'&month='+month+'&day='+day+'&hrs='+hrs+'&mins='+mins;
			
			
		$.ajax	
					
				(
						{
								type: "POST",
								url: 'assets/ajax/proc.php',
								data: dataString,
								cache: false,
								success: function(result)
								{
									
									var result = jQuery.parseJSON(result);
									
									if(result['status']=='success'){
									$("#overtime_dialogue_notify").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Success!</strong> "+result['message']+"</div>");
									$("b[emp_day='"+emp_day+"']").html("<i class='fa fa-check-circle' title='"+result['message']+"'></i>");
									}else{
										$("#overtime_dialogue_notify").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Error!</strong> "+result['message']+"</div>");
										$("b[emp_day='"+emp_day+"']").html("<i class='fa fa-exclamation-circle' title='"+result['message']+"'></i>");
									}
								}
						}

				);
			
			
			
			
	}
	
	
}

function get_overview(arg){

	switch(arg){
			
			
			
			case "years":
				$("#overview_results").html("<blockquote>Empty</blockquote>");
				var company = $("#swap_company").val();
				var dataString = "act=overview_getyears&company="+company;
			
				$.ajax	
					
				(
						{
								type: "POST",
								url: 'assets/ajax/proc.php',
								data: dataString,
								cache: false,
								success: function(result)
								{
									$("#overview_years").html(result);
									$("#overview_months").html("<label>Select Month*</label><input type='text' class='form-control' disabled='disabled' placeholder='Select Year to enable this field' />");
									$("#overview_days").html("<label>Select Day*</label><input type='text' class='form-control' disabled='disabled' placeholder='Select months to enable this field' />");
								}
						}

				);
			
			break;
			
			case "months":
			
				var company = $("#swap_company").val();
				var year = $("#overview_years_val").val();
				var dataString = "act=overview_getmonths&company="+company+"&year="+year;
			
				$.ajax	
					
				(
						{
								type: "POST",
								url: 'assets/ajax/proc.php',
								data: dataString,
								cache: false,
								success: function(result)
								{
									$("#overview_months").html(result);
									$("#overview_days").html("<label>Select Day*</label><input type='text' class='form-control' disabled='disabled' placeholder='Select months to enable this field' />");
								}
						}

				);
			
			break;
			
			case "days":
			
				var company = $("#swap_company").val();
				var year = $("#overview_years_val").val();
				var month = $("#overview_months_val").val();
				var dataString = "act=overview_getdays&company="+company+"&year="+year+"&month="+month;
			
				$.ajax	
					
				(
						{
								type: "POST",
								url: 'assets/ajax/proc.php',
								data: dataString,
								cache: false,
								success: function(result)
								{
									$("#overview_days").html(result);
								}
						}

				);
			
			break;
			
			case "overview_results":
			
				var company = $("#swap_company").val();
				var year = $("#overview_years_val").val();
				var month = $("#overview_months_val").val();
				var day = $("#overview_days_val").val();
				var dataString = "act=overview_results&company="+company+"&year="+year+"&month="+month+"&day="+day;
			
				$.ajax	
					
				(
						{
								type: "POST",
								url: 'assets/ajax/proc.php',
								data: dataString,
								cache: false,
								success: function(result)
								{
									$("#overview_results").html(result);
								}
						}

				);
			
			break;
	}

	
}

function salary(arg){
	
	
	switch(arg){
		
		case "sheet":
			
			var company = $("#swap_company").val();
			var year = $("#years_view").val();
			var month = $("#months_view").val();
			
			var dataString = "act=sheet&company="+company+"&year="+year+"&month="+month;
			
			$.ajax	
											(
													{
															type: "POST",
															url: 'assets/ajax/proc.php',
															data: dataString,
															cache: false,
															success: function(result)
															{
																
																$("#sheet").html(result);
																
															}
													}

											);
		break;
	}
	
}
function create_salary(emp){
	var company = $("#swap_company").val();
	var year = $("#years_view").val();
	var month = $("#months_view").val();
	var alw = $.trim($("input[name='"+emp+"_alw']").val());
	var otralw = $.trim($("input[name='"+emp+"_otralw']").val());
	var adv = $.trim($("input[name='"+emp+"_adv']").val());
	var otrded = $.trim($("input[name='"+emp+"_otrded']").val());
	
	if( alw!='' && otralw!='' && adv!='' && otrded!=''){
			var dataString = "act=create_salary&company="+company+"&employee="+emp+"&year="+year+"&month="+month+"&alw="+alw+"&otralw="+otralw+"&adv="+adv+"&otrded="+otrded;
			$.ajax	
											(
													{
															type: "POST",
															url: 'assets/ajax/proc.php',
															data: dataString,
															cache: false,
															success: function(result)
															{
																
																var result = jQuery.parseJSON(result);
																if(result['status']=='success'){
																			
																			$("#notify").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong><i class='fa fa-check-circle'></i> Success!</strong> "+result['message']+".</div>");
																			
																}else if(result['status']=='error'){
																			
																			$("#notify").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong><i class='fa fa-times-circle'></i> Error!</strong> "+result['message']+".</div>");
																	
																}
																
															}
													}

											);

	}else{
		$("#notify").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong><i class='fa fa-times-circle'></i> Error!</strong> All fields required.</div>");
	}
	
	
}

function get_salary(arg){


			switch(arg){
			
			
				case "years":
						
						$("#salary_view_months").html("<label>Month*</label><input type='text' class='form-control' disabled='disabled' placeholder='Select year to enable this field' />");
						$("#salary_sheet_results").html("<blockquote>Empty</blockquote>");
						
						var company = $("#swap_company").val();
						
						var dataString = "act=salary_years&company="+company;
						
						$.ajax	
											(
													{
															type: "POST",
															url: 'assets/ajax/proc.php',
															data: dataString,
															cache: false,
															success: function(result)
															{
																
																$("#salary_view_years").html(result);
																
															}
													}

											);
				
				
				break;
				
				case "months":
						
						
						var company = $("#swap_company").val();
						var year = $("#view_salary_years").val();
						
						var dataString = "act=salary_months&company="+company+"&year="+year;
						
						$.ajax	
											(
													{
															type: "POST",
															url: 'assets/ajax/proc.php',
															data: dataString,
															cache: false,
															success: function(result)
															{
																
																$("#salary_view_months").html(result);
																
															}
													}

											);
				
				
				break;
				
				case "view_stored_sheet":
						
						
						var company = $("#swap_company").val();
						var year = $("#view_salary_years").val();
						var month = $("#view_salary_months").val();
						
						var dataString = "act=view_stored_sheet&company="+company+"&year="+year+"&month="+month;
						
						$.ajax	
											(
													{
															type: "POST",
															url: 'assets/ajax/proc.php',
															data: dataString,
															cache: false,
															success: function(result)
															{
																
																$("#salary_sheet_results").html(result);
																
															}
													}

											);
				
				
				break;
			
			
			
			}


}

function payment_method(){
	
		var selected_method = $("#payment_method").val();
		var dataString = "act=payment_method&method="+selected_method;
			
			$.ajax	
											(
													{
															type: "POST",
															url: 'assets/ajax/proc.php',
															data: dataString,
															cache: false,
															success: function(result)
															{
																
																$("#voucher_form").html(result);
																
															}
													}

											);
				
}function receive_method(){			var selected_method = $("#receive_method").val();		var dataString = "act=receive_method&method="+selected_method;						$.ajax												(													{															type: "POST",															url: 'assets/ajax/proc.php',															data: dataString,															cache: false,															success: function(result)															{																																$("#voucher_form").html(result);																															}													}											);				}


function clip_value(id,value){

	$("#"+id).attr('value',value);
	
}


function retrieve(arr){
	
	switch(arr['act']){
		
		case "selected_item":
			
			$("#selected_item").attr('item',arr['value']['id']);
			$("#selected_item").attr('value',arr['value']['name']);
			
		break;
		
		case "add_list_purchase":
			
			
			
			
			var dataString = "assets/ajax/proc.php?act=ret_unit_type"
				$.ajax	
					(
						{
							type:"POST",
							url:dataString,
							cache:false,
							success:function(result)
							{
								result = jQuery.parseJSON(result);
								
								if(result['status']=='success'){
											
									var unit = result['message']['unit'];
									var type = result['message']['type'];
									
									var rows = $('#tbl tr').length;
					
									var item = $.trim($("#item").val());
									var tbl = "<tr item='"+item+"'><td>"+item+"</td><td><input type='number' placeholder='Enter Volume' class='form-control pur_trig'></td><td>"+unit+"</td><td><input type='text' placeholder='Enter Quantity' class='form-control pur_trig'></td><td><input type='number' item='"+item+"' name='price[]' placeholder='Enter Price' class='form-control pur_trig'></td><td>"+type+"</td><td><button class='btn btn-xs btn-danger' onclick=retrieve({'act':'rm_curr_item','item':this})><i class='fa fa-times'></i></button></td></tr>"
									if(item!=""){
										$("#tbl").append(tbl);
									}
									
									retrieve({'act':'pur_trig'});
									
											
								}else{
											
								    $("#notify").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong><i class='fa fa-times-circle'></i> Error!</strong> "+result['message']+".</div>");
								}
							}
						}

					);
			
			
			
		break;
		
		case "add_list_sale":
			
			var item = parseFloat($.trim($("#item").val()));
			
			if(($('#tbl tr[item="'+item+'"]').length)>0){
				
					if(retrieve({'act':'sale_row_verify'})){
							
							var qty = parseFloat(retrieve({'act':'simple_xhr','url':'assets/ajax/proc.php?act=item_qty&item='+item}));
							
							$('tr[item="'+item+'"]').each(function(){
										
								var sum = retrieve({'act':'sale_row_qty_verify','item':item,'qty':qty});
									
									if(sum['status']==true){
										
										var calc = qty-sum['sum'];
										
										$("#tbl").append(retrieve({'act':'sale_row','item':item,'qty':calc}));
											
										
									}
								
										
							});
							
							
							
							
							
						
					}else{
						alert("row");
					}
					
				
			}else{
				alert('row');
					var qty = parseFloat(retrieve({'act':'simple_xhr','url':'assets/ajax/proc.php?act=item_qty&item='+item}));
					$("#tbl").append(retrieve({'act':'sale_row','item':item,'qty':qty}));
				
			}
					
				
				
			
		break;
		
		case "sale_row":
			
			var tbl = "<tr item='"+arr['item']+"'><td>"+arr['item']+"</td><td><input type='number' placeholder='Enter Quantity' class='form-control pur_trig'></td><td>"+arr['qty']+"</td><td><button class='btn btn-xs btn-danger' onclick=retrieve({'act':'rm_curr_item','item':this})><i class='fa fa-times'></i></button></td></tr>";
			
			return tbl;
			
		break;
		
		case "simple_xhr":
		
				jQuery.extend({
					getValues: function(url) {
						var result = null;
						$.ajax({
							url: url,
							type: 'get',
							dataType: 'html',
							async: false,
							success: function(data) {
								result = data;
							}
						});
					   return result;
					}
				});
				
				var results = $.getValues(arr['url']);
				return results;
				
		break;
		
		case "sale_row_verify":
			
			var check = true;
			
				$("#tbl tr").each(function(){
					
							
						var field = parseFloat($.trim($(this).find('input').val()));
							
						if(!field || field<=0){
							
							$(".help_text").remove();	
							$(this).find('input').after("<span class='help_text red'>Required</span>");
							check = false;
							
						}else{
							$(".help_text").remove();	
						}
				});
				
				return check;
				
				
			
		break;
		
		case "sale_row_qty_verify":
		alert();
			var qty = parseFloat(arr['qty']);
			var check = true;
			var sum = [];
			
				$('tr[item="'+arr['item']+'"]').each(function(){
					
						var field = parseFloat($(this).find('input').val());
						sum.push(field);
						
						var calc = eval(sum.join("+"));
						if(calc>qty){
							$(".help_text").remove();	
							$(this).find('input').after("<span class='help_text red'>Cannot exceed stocks</span>");
							check = false;
						}else{
							$(".help_text").remove();
						}
						
				});
				
				sum = eval(sum.join("+"));
				return ({'status':check,'sum':sum});
				
				
		break;
		
		
		case "reset":
		
		
		case "rm_curr_item":
				
				var item = arr['item'];
				
				
				$(item).parent().parent().remove()
				
				retrieve({'act':'purchase_reset'});
				
				retrieve({'act':'pur_trig'});
			
		
		break;
		
		case "pur_trig":
		
			$(".pur_trig").keyup(function() {

				retrieve({'act':'purchase_reset'});

			});
		
		break;
		
		case "purchase_reset":
		
				$("#net").val('');
				$("#tot").val('');
				
				
				retrieve({'act':'pur_tog_btn','toggle':'calculate'});
		break;
		
		case "pur_tog_btn":
				
				switch(arr['toggle']){
					
					
						case "calculate":
							
							$("#pur_proc").html("CALCULATE");
							$("#pur_proc").attr("class","btn btn-info col-md-12");
							$("#pur_proc").attr("onclick","retrieve({'act':'verify_purchase'})");
							
						break;
					
						case "complete":
							
							$("#pur_proc").html("COMPLETE");
							$("#pur_proc").attr("class","btn btn-success col-md-12");
							$("#pur_proc").attr("onclick","retrieve({'act':'complete_purchase'})");
							
						break;
				}
			
			
		break;
		
		// case "retrieve_purchase_list":
				
			// var dataString = "assets/ajax/proc.php?act=retrieve_purchase_list&sesh=purchase"
				// $.ajax	
					// (
						// {
							// type:"POST",
							// url:dataString,
							// cache:false,
							// success:function(result)
							// {
								// $("#tbl").html(result);
							// }
						// }

					// );
		// break;
		
		// case "edit_sesh_list":
				
			// var key = arr['key'];
			// var sesh = arr['sesh'];
			// var dataString = "assets/ajax/proc.php?act=edit_sesh_list&sesh="+sesh+"&key="+key
				// $.ajax	
					// (
						// {
							// type:"POST",
							// url:dataString,
							// cache:false,
							// success:function(result)
							// {
								// retrieve({'act':'retrieve_purchase_list'})
							// }
						// }

					// );
		// break;
		
		case "complete_purchase":
				
				var discount = $("#discount").val();
				var paid = $("#paid").val();
				var supplier = $("#supplier").val();
				var array = [];
				var company = $("#swap_company").val();
				$('#tbl tr').each(function() {

					var values = [];

					$(this).find("input,select").each(function(){
						 values.push($(this).val());
					});
					
					
					
					
					array.push({'item':$(this).attr('item'),'values':values});

				});
				var item = {'item':array};
				var aux = {'aux':{'discount':discount,'supplier':supplier,'paid':paid,'company':company}};
				var data = {'item':item,'aux':aux};
				
				
				var dataString = "assets/ajax/proc.php?act=create_purchase_invoice&data="+encodeURIComponent(JSON.stringify(data))
				$.ajax	
					(
						{
							type:"POST",
							url:dataString,
							cache:false,
							success:function(result)
							{
								result = jQuery.parseJSON(result);
								
								if(result['status']=="success"){
									window.location = "purchase_invoice_detail?inv="+result['message'];
								}else{
									
								}
							}
						}

					);
								
				
			
		break;
		
		case "verify_purchase":
				
				if($("#tbl tr").length){
					
					var check = true;
					
						$('#tbl tr td').each(function() {
					
					$(this).find("input").each(function(){
						 
							if(($(this).val()).length <= 0){
								
								$(".help_text").remove();	
								$(this).after("<span class='help_text red'>Required</span>");
								check = false;
								return false;
								
							}else{
									$(".help_text").remove();
									
							}
					});
					
					if(check==false){return false;}
					
				});
				
				if(check==true){
								retrieve({'act':'calc_pur_amt'});
								
						}else{
							retrieve({'act':'purchase_reset'});
							retrieve({'act':'pur_tog_btn','toggle':'calculate'});
						}
						
					
				}
					
		break;
		
		
		case "verify_sale":
				
				if($("#tbl tr").length){
					
					var check = true;
					
				$('#tbl tr td').each(function() {
					
					$(this).find("input").each(function(){
						 
							if(($(this).val()).length <= 0){
								
								$(".help_text").remove();	
								$(this).after("<span class='help_text red'>Required</span>");
								check = false;
								return false;
								
							}else{
									$(".help_text").remove();
									
							}
					});
					
					if(check==false){return false;}
					
				});
				
				if(check==true){
								retrieve({'act':'calc_sale_amt'});
								
						}else{
							retrieve({'act':'purchase_reset'});
							retrieve({'act':'pur_tog_btn','toggle':'calculate'});
						}
						
					
				}
					
		break;
		
		case "calc_pur_amt":
				
				var calc = null;
				
				$('#tbl tr').each(function() {
					
					calc+=($(this).find("input:eq(1)").val()*$(this).find("input:eq(2)").val());
				});
				
				
				var discount = parseFloat($("#discount").val())
				
				
				
				if(discount!="" && discount>0){
					$("#net").val(calc);
					calc = calc - (calc*discount/100)
					$("#tot").val(calc);	
				}else{
					$("#net").val(calc);
					$("#tot").val(calc);	
				}
				
				var paid = $.trim($("#paid").val());
				
				if(paid>calc){
					$("#paid").after("<span id='help_text' class='red'>Cannot exceed Total amount</span>");
				}else{
					$("#help_text").remove();
					retrieve({'act':'pur_tog_btn','toggle':'complete'});
				}
				
				
				
				
		break;
		
		
		case "calc_sale_amt":
				
				
				
				
				
		break;
		
		case "pur_rem_item":
			
				$.ajax	
							(
									{
											type: "POST",
											url: "assets/ajax/proc.php?act=pur_rem_item&item="+arr['item'],
											
											cache: false,
											success: function(result)
											{
												var result = jQuery.parseJSON(result);
												if(result['status']=="success"){
													
														
														var redirect = window.location.href;
														window.location.href=redirect;
												
												}else{
													
												}
												
											}
									}
							);
					
			
		break;
		
		case "pur_rem_paid":
			
				$.ajax	
							(
									{
											type: "POST",
											url: "assets/ajax/proc.php?act=pur_rem_paid&paid="+arr['paid'],
											
											cache: false,
											success: function(result)
											{
												var result = jQuery.parseJSON(result);
												if(result['status']=="success"){
													
														
														var redirect = window.location.href;
														window.location.href=redirect;
												
												}else{
													
												}
												
											}
									}
							);
					
			
		break;
		
		
		case "pur_discard_inv":
			
				$.ajax	
							(
									{
											type: "POST",
											url: "assets/ajax/proc.php?act=pur_discard_inv&inv="+arr['inv'],
											
											cache: false,
											success: function(result)
											{
												var result = jQuery.parseJSON(result);
												if(result['status']=="success"){
														window.location.href='purchase';
												
												}else{
													
												}
												
											}
									}
							);
					
			
		break;
		
		case "pur_add_paid":
			
			
			var amt = $.trim($("#pur_paid_amt").val());
			
			var remaining = parseFloat(arr['remaining'])
			
			
			
			if(amt>remaining){
					 
					 $("#notify").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong><i class='fa fa-times-circle'></i> Error!</strong> Payment cannot exceed remaining amount.</div>");
					 
			}else{
				
				$.ajax	
							(
									{
											type: "POST",
											url: "assets/ajax/proc.php?act=pur_add_paid&inv="+arr['inv']+"&paid="+amt,
											
											cache: false,
											success: function(result)
											{
												var result = jQuery.parseJSON(result);
												if(result['status']=="success"){
														var redirect = window.location.href;
														window.location.href=redirect;
												}
											}
									}
							);
					
				
			}
			
				
			
		break;
		
		case "create_grouping":
			
			
			var name= $.trim($("#name").val());
			var qty= $.trim($("#quantity").val());
			var company = $.trim($("#swap_company").val());
			
				$.ajax	
							(
									{
											type: "POST",
											url: "assets/ajax/proc.php?act=create_grouping"+"&company="+company+"&name="+name+"&qty="+qty,
											
											cache: false,
											success: function(result)
											{
												var result = jQuery.parseJSON(result);
												if(result['status']=="success"){
														window.location.href='grouping';
												
												}else{
													
												}
												
											}
									}
							);
					
			
		break;
		
		case "rem_sale_item":
		
				$.ajax	
							(
									{
											type: "POST",
											url: "assets/ajax/proc.php?act=rem_sale_item"+"&item="+arr['item'],
											
											cache: false,
											success: function(result)
											{
												var result = jQuery.parseJSON(result);
												if(result['status']=="success"){
														window.location='sale-item'+location.search;
												}else{
													$("#notify").html(arr['message']);
												}
												
											}
									}
							);
				
			
		
		break;
		
		case "rem_purchase_item":
		
				$.ajax	
							(
									{
											type: "POST",
											url: "assets/ajax/proc.php?act=rem_purchase_item"+"&item="+arr['item'],
											
											cache: false,
											success: function(result)
											{
												var result = jQuery.parseJSON(result);
												if(result['status']=="success"){
														window.location='purchase-item'+location.search;
												}else{
													$("#notify").html(arr['message']);
												}
												
											}
									}
							);
				
			
		
		break;
		
		case "edit_sale_item_qty":
		
		$("#curr_qty").val(arr['qty']);
		
		$("#up_sale_qty").attr('onclick',"retrieve({'act':'up_sale_item_qty','item':'"+arr['item']+"'})");
			
		
		break;
		
		case "edit_purchase_item_qty":
		
		$("#curr_qty").val(arr['qty']);
		
		$("#up_sale_qty").attr('onclick',"retrieve({'act':'up_purchase_item_qty','item':'"+arr['item']+"'})");
			
		
		break;
		
		case "up_sale_item_qty":
		
			var qty = $.trim($("#curr_qty").val());
		
				$.ajax	
							(
									{
											type: "POST",
											url: "assets/ajax/proc.php?act=up_sale_item_qty"+"&item="+arr['item']+"&qty="+qty,
											
											cache: false,
											success: function(result)
											{
												var result = jQuery.parseJSON(result);
												if(result['status']=="success"){
														window.location='sale-item'+location.search;
												}else{
													$("#notify").html(arr['message']);
												}
												
											}
									}
							);
				
			
		
		break;
		
		case "up_purchase_item_qty":
		
			var qty = $.trim($("#curr_qty").val());
		
				$.ajax	
							(
									{
											type: "POST",
											url: "assets/ajax/proc.php?act=up_purchase_item_qty"+"&item="+arr['item']+"&qty="+qty,
											
											cache: false,
											success: function(result)
											{
												var result = jQuery.parseJSON(result);
												if(result['status']=="success"){
														window.location='purchase-item'+location.search;
												}else{
													$("#notify").html(arr['message']);
												}
												
											}
									}
							);
				
			
		
		break;
		
	}
}
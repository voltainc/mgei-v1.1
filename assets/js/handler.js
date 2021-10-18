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

var company = $.trim($("#swap_company").val());
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
															
																$("#supplier_notify").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
															
															}else{
																$("#supplier_notify").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
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


function addCustomer(){
	
var company = $.trim($("#custParentCompany").val());
var name = $.trim($("#custName").val());
var address = $.trim($("#custAddress").val());
var phone = $.trim($("#custPhone").val());
var fax = $.trim($("#custFax").val());
var email = $.trim($("#custEmail").val());
var customer_company = $.trim($("#custCompany").val());
var remarks = $.trim($("#custRemarks").val());

if(company!='' && name!='' && phone!='')
					{
							var dataString = "act=create_customer&company="+company+"&name="+name+"&address="+address+"&phone="+phone+"&fax="+fax+"&email="+email+"&customer_company="+customer_company+"&remarks="+remarks;

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


// function getCustomerDDL()
// {
	// $.ajax	
		// (
			// {
				// type: "POST",
				// url: "assets/ajax/proc.php?act=getCustomerDDL",
				// cache: false,
				// success: function(result)
				// {
					// $("#customer").html(result);
				// }
			// }
		// );
// }

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
var sale_item_desc = $.trim($("#sale_item_desc").val());


	if(company!='' && name!='' && quantity!='' && volume!='' && unit!='' && price_per_unit!='')
	{
				
		var fields = {
			'act':'create_item',
			'company':company,
			'name':name,
			'quantity':quantity,
			'volume':volume,
			'unit':unit,
			'price_per_unit':price_per_unit,
			'sale_item_desc':sale_item_desc
		};

		var payload = {
			
			'type':'POST',
			'url':'assets/ajax/proc.php',
			'data':fields
		}					
		
		var result = jQuery.parseJSON(fetch(payload));
		
		if(result['status']=="success"){
														
				var redirect = window.location.href;
				window.location.href=redirect;
		
		}else if(result['status']=="error"){
		
			$("#item_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
		
		}else{
			$("#item_create_msgbox").html("<div class='col-md-12'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'aria-hidden='true'>×</button><strong>Error : </strong>"+result['message']+"</div></div>");
		}
		
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
				//$('#tbl tr').children('td').css('background-color','');
				if(retrieve({'act':'sale_row_verify'})){
							
							if($('tr[item="'+item+'"]').length>0){
								
								var details = jQuery.parseJSON(retrieve({'act':'simple_xhr','url':'assets/ajax/proc.php?act=sale_item_qty_price&item='+item}));
								
								var calc_stock = retrieve({'act':'calc_sale_stock','item':item,'stock':details['qty']});
								
								if(calc_stock>0){
									
									var grouping = retrieve({'act':'simple_xhr','url':'assets/ajax/proc.php?act=ret_grouping'});
								
									$("#tbl").append(retrieve({'act':'sale_row','item':item,'qty':calc_stock,'price':details['price'],'grouping':grouping}));
								
									retrieve({'act':'sale_trig'});
									retrieve({'act':'sale_reset'});
									
									var state = window.location.pathname.split("/").pop();
									
									if(state=="sale-cash"){
											
											retrieve({'act':'toggle_span'});
											
									}
									
									
								}else{
									alert("0");
								}
								
								
							}else{
								$('#tbl tr[item="'+item+'"]').children('td').css('background-color','');
								
								var details = jQuery.parseJSON(retrieve({'act':'simple_xhr','url':'assets/ajax/proc.php?act=sale_item_qty_price&item='+item}));
								
								var grouping = retrieve({'act':'simple_xhr','url':'assets/ajax/proc.php?act=ret_grouping'});
								$("#tbl").append(retrieve({'act':'sale_row','item':item,'qty':details['qty'],'price':details['price'],'grouping':grouping}));
								
								retrieve({'act':'sale_trig'});
								retrieve({'act':'sale_reset'});
								
								var state = window.location.pathname.split("/").pop();
								if(state=="sale-cash"){
											
											retrieve({'act':'toggle_span'});
											
								}
							}
						
				}
		break;
		
		
		
		case "sale_row":
			
			var tbl = "<tr item='"+arr['item']+"'><td>"+arr['item']+"</td><td><input type='number' placeholder='Enter Quantity' class='form-control sale_trig'></td><td>"+arr['grouping']+"</td><td><span class='s_price' value='"+arr['price']+"'>"+arr['price']+"</span></td><td><span value='"+arr['qty']+"'>"+arr['qty']+"</span></td><td><button class='btn btn-xs btn-danger' onclick=retrieve({'act':'sale_rm_curr_item','item':this})><i class='fa fa-times'></i></button></td></tr>";
			
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
						var grouping = parseFloat($.trim($(this).find('select').length));
							
						if(!field || field<=0){
							
							$(".help_text").remove();	
							$(this).find('input').after("<span class='help_text red'>Required</span>");
							check = false;
							return false;
							
						}else{
							$(".help_text").remove();	
						}
						
						if(!grouping || grouping<=0){
							
							$(".help_text").remove();	
							$(this).find('td:eq(2)').html("<span class='help_text red'>Required</span>");
							check = false;
							return false;
							
						}else{
							$(".help_text").remove();	
						}
				});
				
				return check;
				
				
			
		break;
		
		
		
		case "sale_row_qty_verify":
		
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
		
		
		case "calc_sale_stock":
			
			var qty = []
			var stock = parseFloat(arr['stock']);
			
				$('tr[item="'+arr['item']+'"]').each(function(){
					
						qty.push(parseFloat($(this).find('input').val())*parseFloat($('option:selected', this).attr('value')));
						if(eval(qty.join("+"))>stock){
							
							$(".help_text").remove();	
							$(this).find('input').after("<span class='help_text red'>Cannot exceed stocks</span>");
							return false;
						}
						
				});
				
				
				qty = eval(qty.join("+"));
				return (stock-qty);
				
				
		break;
		
		
		
		case "reset":
		
		
		case "rm_curr_item":
				
				var item = arr['item'];
				
				
				$(item).parent().parent().remove()
				
				retrieve({'act':'purchase_reset'});
				
				retrieve({'act':'pur_trig'});
			
		
		break;
		
		case "sale_rm_curr_item":
				
				var item = arr['item'];
				
				
				$(item).parent().parent().remove()
				
				retrieve({'act':'reorder_sale_rows'})
				
				retrieve({'act':'sale_reset'});
				
				retrieve({'act':'sale_trig'});
			
		
		break;
		
		case "pur_trig":
		
			$(".pur_trig").keyup(function() {

				retrieve({'act':'purchase_reset'});

			});
		
		break;
		
		case "sale_trig":
		
			$(".sale_trig").keyup(function() {

				retrieve({'act':'sale_reset'});

			});
		
		break;
		
		case "sale_trig":
		
			$(".sale").keyup(function() {

				retrieve({'act':'sale_reset'});

			});
		
		break;
		
		case "purchase_reset":
		
				$("#net").val('');
				$("#tot").val('');
				
				
				retrieve({'act':'pur_tog_btn','toggle':'calculate'});
		break;
		
		case "sale_reset":
		
				$("#net").val('');
				$("#tot").val('');
				
				
				retrieve({'act':'sale_tog_btn','toggle':'calculate'});
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
		
		
		case "sale_tog_btn":
				
				switch(arr['toggle']){
					
					
						case "calculate":
							
							$("#sale_proc").html("CALCULATE");
							$("#sale_proc").attr("class","btn btn-info col-md-12");
							$("#sale_proc").attr("onclick","retrieve({'act':'verify_sale'})");
							
						break;
					
						case "complete":
							
							$("#sale_proc").html("COMPLETE");
							$("#sale_proc").attr("class","btn btn-success col-md-12");
							$("#sale_proc").attr("onclick","retrieve({'act':'complete_sale'})");
							
						break;
				}
			
			
		break;
		
		case "toggle_span":
			
				$('.s_price').click(function () {
					
						var value = $(this).attr('value');
						var data = "<input class='form-control i_price' value='"+value+"' />";
						$(this).after(data);
						$(this).remove("span[class='s_price']");
						retrieve({'act':'toggle_input'});
						retrieve({'act':'sale_reset'});
				});
				
		break;
		
		case "toggle_input":
			
				$('.i_price').blur(function () {
					
						var value = $(this).val();
						var data = "<span class='s_price' value='"+value+"'>"+value+"</span>";
						$(this).after(data);
						$(this).remove();
						retrieve({'act':'toggle_span'});
						retrieve({'act':'sale_reset'});
				});
				
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
				var discount_type = $("#discount_type").val();
				var paid = $("#paid").val();
				var supplier = $("#supplier").val();
				var array = [];
				var company = $("#swap_company").val();
				var date = $("#date").val();
				$('#tbl tr').each(function() {

					var values = [];

					$(this).find("input,select").each(function(){
						 values.push($(this).val());
					});
					
					
					
					
					array.push({'item':$(this).attr('item'),'values':values});

				});
				var item = {'item':array};
				var aux = {'aux':{'discount':discount,'discount_type':discount_type,'supplier':supplier,'paid':paid,'company':company,'date':date}};
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
		
			case "complete_sale":
				
				var discount = $("#discount").val();
				var discount_type = $("#discount_type").val();
				var paid = $("#paid").val();
				var customer = $("#customer").val();
				var aging = $("#aging").val();
				var array = [];
				var company = $("#swap_company").val();
				var date = $("#date").val();
				var order = $("input[name='order']:checked").val();
				var remarks = $("#remarks").val();
				var state = window.location.pathname.split("/").pop();
				
					
				switch(state){
					
					case "sale-cash":
					
						state = "cash";
						
					break;
					
					case "sale":
					
						state = "credit";
						
					break;
					
					default:
					
						state = "credit";
						
					break;
					
				}	
					
				
				$('#tbl tr').each(function() {

					var values = [];

					$(this).find("input").each(function(){
						 values.push($(this).val());
					});
					
					var type = [];
					
					$(this).find("select").each(function(){
						 type.push($('option:selected', this).attr('src'));
					});
					
					var item_id = [];
						 
						 item_id.push($(this).attr('item'));
					
					var price_per_unit = [];
						 
						 price_per_unit.push($(this).find('span:eq(0)').attr('value'));
					
					
					array.push({'item':$(this).attr('item'),'values':values,'type':type,'item_id':item_id,'price':price_per_unit});
					


				});
				
				var item = {'item':array};
				var aux = {'aux':{'discount':discount,'discount_type':discount_type,'customer':customer,'aging':aging,'paid':paid,'company':company,'state':state,'date':date,'order':order,'remarks':remarks}};
				var data = {'item':item,'aux':aux};
				
				
				var dataString = "assets/ajax/proc.php?act=create_sale_invoice&data="+encodeURIComponent(JSON.stringify(data))
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
									switch(state){
											
											case "credit":
												window.location = "sale_invoice_detail?inv="+result['message'];
											break;
											
											case "cash":
												window.location = "sale_cash_invoice_detail?inv="+result['message'];
											break;
									}
									
								}else{
									
								}
							}
						}

					);
								
				
			
		break;
		
		case "inv_sale_up_remarks":
		
			var status = $("input[name='stored_status']:checked").val();
			var remarks = $("#stored_remarks").val();
			var dta = retrieve({'act':'simple_xhr','url':'assets/ajax/proc.php?act=inv_sale_up_remarks&inv='+arr['inv']+"&status="+status+"&remarks="+remarks});
			$("#sale_status_remarks").html(dta);
			
			var redirect = window.location.href;
			window.location.href=redirect;
		
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
				
				var tbl = $("#tbl tr").length;
				if(tbl){
					if(retrieve({'act':'sale_row_verify'})){
						retrieve({'act':'reorder_sale_rows'})
						retrieve({'act':'calc_sale_amt'});
						
					}else{
						retrieve({'act':'sale_reset'});
						retrieve({'act':'sale_tog_btn','toggle':'calculate'});
					}
				}else{
					$("#item_exists").modal("toggle");
				}
				
				
					
		break;
		
	
		
		case "calc_pur_amt":
				
				var calc = null;
				
				$('#tbl tr').each(function() {
					
					calc+=($(this).find("input:eq(1)").val()*$(this).find("input:eq(2)").val());
				});
				
				var discount = parseFloat($("#discount").val())
				var discount_type = $.trim($("#discount_type").val());
				
				
				
				if(discount!="" && discount>0){
						switch(discount_type){
							
							case "fixed":
							
								$("#net").val(calc);
								calc = (calc - discount);
								$("#tot").val(calc);
							
							break;
							
							case "percentage":
							
								$("#net").val(calc);
								calc = calc - (calc*discount/100);
								$("#tot").val(calc);
							
							break;
							
						}
							
					}else{
						$("#net").val(calc);
						$("#tot").val(calc);	
					}
				
				var paid = $.trim($("#paid").val());
				
				if(paid>calc){
					$("#help_text").remove();
					$("#paid").after("<span id='help_text' class='red'>Cannot exceed Total amount</span>");
				}else{
					$("#help_text").remove();
					retrieve({'act':'pur_tog_btn','toggle':'complete'});
				}
				
				
				
				
		break;
		
		
		case "reorder_sale_rows":
				
				
				var tot_stock = [];
				
				var items = [];
				$("#tbl tr").each(function(){
						
						var x = parseFloat($(this).attr('item'));
						items.push(x);
					
				});
				
				var unique = items.filter(function(itm, i, a) {
				return i == a.indexOf(itm);
				});
				
				
				$.each(unique, function (index, value) {
					
					var details = jQuery.parseJSON(retrieve({'act':'simple_xhr','url':'assets/ajax/proc.php?act=sale_item_qty_price&item='+value}));
					
					
					
					$("#tbl tr[item='"+value+"']:first").each(function(){
							
							$(this).find("span:eq(1)").attr('value',details['qty']).html(details['qty']);
							
							var qty = parseFloat($(this).find('input').val());
							
							var grp = parseFloat($('option:selected', this).attr('value'));
							
							var stock = details['qty'];
							
							
							tot_stock[value]= stock-(qty*grp);
							
					});
					
				});
				
				
				
				
				
				$.each(unique, function (index, value) {
					
					$("#tbl tr[item='"+value+"']:not(:first)").each(function(){
						
						
						$(this).find("span:eq(1)").attr("value",tot_stock[value]).html(tot_stock[value]);
						
						var qty = parseFloat($(this).find('input').val());
					
						var grp = parseFloat($('option:selected', this).attr('value'));
					
						var stock = parseFloat(tot_stock[value]);
						
						tot_stock[value] = parseFloat(stock-(qty*grp));
						
						
						
						
					});
					
				});
				
				
				
				
				
			
		break;
		
		case "calc_sale_amt":
				//$('#tbl tr').children('td').css('background-color','');
				var check = true;
				var calc = [];
				
				$('#tbl tr').each(function() {
					
					var stock = parseFloat(($(this).find("span:eq(1)").attr('value')));
					var price = parseFloat(($(this).find("span:eq(0)").attr('value')));
					var type = parseFloat(($(this).find("select").val()));
					var qty = parseFloat($(this).find("input").val());
					
					tot_qty = parseFloat(qty*type);
					
					if(Number.isInteger(qty)){
								
								if(tot_qty>stock){
									
									$(".help_text").remove();	
									
									$(this).find('input').after("<span class='help_text red'>Quantity cannot exceed stock</span>");
									
									check = false;
									
									return false;
									
								}else{
										calc.push(price*(qty*type));
								}
								
							}else{
								$(".help_text").remove();	
									
									$(this).find('input').after("<span class='help_text red'>Invalid Quantity</span>");
									
									check = false;
									
									return false;
							}
							
					
				});
				
				
				if(check==true){
					
					calc = eval(calc.join("+"));
					
					var discount = parseFloat($("#discount").val())
					var discount_type = $.trim($("#discount_type").val());
					
					if(discount!="" && discount>0){
						switch(discount_type){
							
							case "fixed":
							
								$("#net").val(calc);
								calc = (calc - discount);
								$("#tot").val(calc);
							
							break;
							
							case "percentage":
							
								$("#net").val(calc);
								calc = calc - (calc*discount/100);
								$("#tot").val(calc);
							
							break;
							
						}
							
					}else{
						$("#net").val(calc);
						$("#tot").val(calc);	
					}
					
					var paid = $.trim($("#paid").val());
					
					if(paid>calc){
						$("#help_text").remove();
						$("#paid").after("<span id='help_text' class='red'>Cannot exceed Total amount</span>");
					}else{
						$("#help_text").remove();
						retrieve({'act':'sale_tog_btn','toggle':'complete'});
					}
					
				}
				
				
				
				
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
		
		
		case "sale_rem_paid":
			
				$.ajax	
							(
									{
											type: "POST",
											url: "assets/ajax/proc.php?act=sale_rem_paid&paid="+arr['paid'],
											
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
		
		case "sale_discard_inv":
			
				$.ajax	
							(
									{
											type: "POST",
											url: "assets/ajax/proc.php?act=sale_discard_inv&inv="+arr['inv'],
											
											cache: false,
											success: function(result)
											{
												var result = jQuery.parseJSON(result);
												if(result['status']=="success"){
														window.location.href='sale';
												
												}else{
													
												}
												
											}
									}
							);
					
			
		break;
		
		case "pur_add_paid":
			
			
			var payment_type = $("#payment_type").val();
			
			switch(payment_type){
				
				
				case "cash":
				
					var amt = $.trim($("#pur_paid_amt").val());
					var remaining = parseFloat(arr['remaining'])
					var desc = $.trim($("#description").val());
					
					if(!amt || amt=="" || amt==null){
						 $("#payment_add_notify").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong><i class='fa fa-times-circle'></i> Error!</strong> Amount cannot be empty</div>");
					}else
					{
						
						if(amt>remaining)
						{
						 
							 $("#payment_add_notify").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong><i class='fa fa-times-circle'></i> Error!</strong> Payment cannot exceed remaining amount.</div>");
							 
						}else
						{
							$.ajax	
										(
												{
														type: "POST",
														url: "assets/ajax/proc.php?act=pur_add_paid&inv="+arr['inv']+"&paid="+amt+"&payment_type="+payment_type+"&desc="+desc,
														
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
						
					}
					
				
				break;
				
				
				case "cheque":
				
					var issue_to = $.trim($("#issue_to").val());
					var bank = $.trim($("#bank").val());
					var c_number = $.trim($("#number").val());
					var amt = $.trim($("#sale_paid_amt").val());
					var remaining = parseFloat(arr['remaining']);
					var dated = $.trim($("#date").val());
					var desc = $.trim($("#description").val());
					
					if(!issue_to || !bank || !c_number || !amt || !dated){
						 $("#payment_add_notify").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong><i class='fa fa-times-circle'></i> Error!</strong> Fields with * cannot be empty</div>");
					}else
					{
						
						if(amt>remaining)
						{
						 
							 $("#payment_add_notify").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong><i class='fa fa-times-circle'></i> Error!</strong> Payment cannot exceed remaining amount.</div>");
							 
						}else
						{
							$.ajax	
										(
												{
														type: "POST",
														url: "assets/ajax/proc.php?act=pur_add_paid&inv="+arr['inv']+"&paid="+amt+"&payment_type="+payment_type+"&issue_to="+issue_to+"&bank="+bank+"&c_number="+c_number+"&dated="+dated+"&desc="+desc,
														
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
						
					}
					
					
						
						
						
						
				
				break;
				
				
			}
			
			
			
			
			
			
			
			
			
			
				
			
		break;
		
		case "sale_add_paid":
			
			
			var payment_type = $("#payment_type").val();
			
			switch(payment_type){
				
				
				case "cash":
				
					var amt = $.trim($("#sale_paid_amt").val());
					var remaining = parseFloat(arr['remaining'])
					var desc = $.trim($("#description").val());
					
					if(!amt || amt=="" || amt==null){
						 $("#payment_add_notify").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong><i class='fa fa-times-circle'></i> Error!</strong> Amount cannot be empty</div>");
					}else
					{
						
						if(amt>remaining)
						{
						 
							 $("#payment_add_notify").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong><i class='fa fa-times-circle'></i> Error!</strong> Payment cannot exceed remaining amount.</div>");
							 
						}else
						{
							$.ajax	
										(
												{
														type: "POST",
														url: "assets/ajax/proc.php?act=sale_add_paid&inv="+arr['inv']+"&paid="+amt+"&payment_type="+payment_type+"&desc="+desc,
														
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
						
					}
					
				
				break;
				
				
				case "cheque":
				
					var issue_to = $.trim($("#issue_to").val());
					var bank = $.trim($("#bank").val());
					var c_number = $.trim($("#number").val());
					var amt = $.trim($("#sale_paid_amt").val());
					var remaining = parseFloat(arr['remaining']);
					var dated = $.trim($("#date").val());
					var desc = $.trim($("#description").val());
					
					if(!issue_to || !bank || !c_number || !amt || !dated){
						 $("#payment_add_notify").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong><i class='fa fa-times-circle'></i> Error!</strong> Fields with * cannot be empty</div>");
					}else
					{
						
						if(amt>remaining)
						{
						 
							 $("#payment_add_notify").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong><i class='fa fa-times-circle'></i> Error!</strong> Payment cannot exceed remaining amount.</div>");
							 
						}else
						{
							$.ajax	
										(
												{
														type: "POST",
														url: "assets/ajax/proc.php?act=sale_add_paid&inv="+arr['inv']+"&paid="+amt+"&payment_type="+payment_type+"&issue_to="+issue_to+"&bank="+bank+"&c_number="+c_number+"&dated="+dated+"&desc="+desc,
														
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
						
					}
					
					
						
						
						
						
				
				break;
				
				
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
														redir = window.location.href;
														window.location = redir;
												
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
		
		
		case "rem_expense":
		
				$.ajax	
							(
									{
											type: "POST",
											url: "assets/ajax/proc.php?act=rem_expense"+"&expense="+arr['id'],
											
											cache: false,
											success: function(result)
											{
												var result = jQuery.parseJSON(result);
												if(result['status']=="success"){
														window.location='expenses';
												}else{
													$("#notify").html(arr['message']);
												}
												
											}
									}
							);
				
			
		
		break;
		
		
		case "purchase_add_usage":
		
		$("#curr_qty").attr('value',arr['qty']);
		$("#curr_qty").html(arr['qty']);
		
		$("#exec_purchase_usage").attr('onclick',"retrieve({'act':'exec_purchase_usage','item':'"+arr['item']+"'})");
			
		
		break;
		
		
		case "add_sale_item_qty":
		
		
		$("#add_curr_qty").html("Current: "+arr['qty']);
		
		$("#add_sale_qty").attr('onclick',"retrieve({'act':'up_add_sale_item_qty','item':'"+arr['item']+"'})");
			
		
		break;
		
		
		case "item_transfer_warehouse":
		
		
		$("#add_curr_qty_wh").html("Current: "+arr['qty']);
		$("#add_curr_qty_wh").attr("value",+arr['qty']);
		
		$("#add_sale_qty_wh").attr('onclick',"retrieve({'act':'exec_tranfer','item':'"+arr['item']+"'})");
			
		
		break;
		
		case "item_return_warehouse":
		
		
		$("#add_curr_qty_wh").html("Current: "+arr['qty']);
		$("#add_curr_qty_wh").attr("value",+arr['qty']);
		
		$("#add_sale_qty_wh").attr('onclick',"retrieve({'act':'exec_return','item':'"+arr['item']+"'})");
			
		
		break;
		
		
		
		
		case "edit_sale_item_qty":
		
		
			var fields = {
					'act':'fetch_sale_item_data',
					'item':arr['item'],
				}
			
				var payload = {
					
					'type':'POST',
					'url':'assets/ajax/proc.php',
					'data':fields
				}					
				
				var result = jQuery.parseJSON(fetch(payload));
				
				if(result['status']=='success'){
					
					$("#edit_curr_name").val($.trim(result['itemDetail']['name']));
					$("#edit_curr_qty").val($.trim(result['itemDetail']['quantity']));
					$("#edit_curr_volume").val($.trim(result['itemDetail']['volume']));
					$("#edit_curr_unit_container").html($.trim(result['unitsList']));
					$("#edit_curr_price_per_unit").val($.trim(result['itemDetail']['price_per_unit']));
					$("#edit_curr_desc").val($.trim(result['itemDetail']['sale_item_desc']));
					
					$("#edit_sale_qty").attr('onclick',"retrieve({'act':'up_edit_sale_item_qty','item':'"+arr['item']+"'})");
					
					$("#edit_quantity").modal('show');
					$("#edit_curr_unit").selectize();
					
				}else{
					
					$("#edit_notify").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fa fa-times-circle'></i></button><strong> Error!</strong>"+result['message']+"</div>");
				}
		
		break;
		
		case "up_add_sale_item_qty":
		
			var qty = $.trim($("#add_qty").val());
		
				$.ajax	
							(
									{
											type: "POST",
											url: "assets/ajax/proc.php?act=add_sale_item_qty"+"&item="+arr['item']+"&qty="+qty,
											
											cache: false,
											success: function(result)
											{
												var result = jQuery.parseJSON(result);
												if(result['status']=="success"){
														redir = window.location.href;
														window.location = redir;
												}else{
													
													$("#add_notify").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fa fa-times-circle'></i></button><strong> Error!</strong>"+result['message']+"</div>");
												}
												
											}
									}
							);
				
			
		
		break;
		
		
		case "exec_tranfer":
		
			var company = $.trim($("#swap_company").val());
			var curr_qty = parseFloat($.trim($("#add_curr_qty_wh").attr('value')));
			var qty = parseFloat($.trim($("#add_qty_wh").val()));
			
			if(qty){
				if(qty<=curr_qty)
				{
				
				$.ajax	
					(
							{
									type: "POST",
									url: "assets/ajax/proc.php?act=tranfer_item"+"&company="+company+"&item="+arr['item']+"&qty="+qty,
									
									cache: false,
									success: function(result)
									{
										var result = jQuery.parseJSON(result);
										if(result['status']=="success"){
												redir = window.location.href;
												window.location = redir;
										}else{
											
											$("#add_notify").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fa fa-times-circle'></i></button><strong> Error!</strong>"+result['message']+"</div>");
										}
										
									}
							}
					);
				}
				else{
					$("#tranfer_noify").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fa fa-times-circle'></i></button><strong> Error!</strong>Cannot exceed curent quantity</div>");
				}
			}else{
				$("#tranfer_noify").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fa fa-times-circle'></i></button><strong> Error!</strong>Cannot be empty</div>");
			}
			
			
		
		break;
		
		
		case "exec_return":
		
			
			var curr_qty = parseFloat($.trim($("#add_curr_qty_wh").attr('value')));
			var qty = parseFloat($.trim($("#add_qty_wh").val()));
			
			if(qty){
				if(qty>curr_qty)
				{
					$("#return_noify").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fa fa-times-circle'></i></button><strong> Error!</strong>Cannot exceed curent quantity</div>");
				}	
				else{
				
					$.ajax	
						(
							{
								type: "POST",
								url: "assets/ajax/proc.php?act=return_item_warehouse"+"&item="+arr['item']+"&qty="+qty,
								cache: false,
								success: function(result)
								{
									var result = jQuery.parseJSON(result);
									if(result['status']=="success"){
											redir = window.location.href;
											window.location = redir;
									}else{
										
										$("#return_noify").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fa fa-times-circle'></i></button><strong> Error!</strong>"+result['message']+"</div>");
									}
									
								}
							}
						);
				}
			}else{
				$("#return_noify").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fa fa-times-circle'></i></button><strong> Error!</strong>Cannot be empty</div>");
			}
			
			
		
		break;
		
		case "up_edit_sale_item_qty":
		
			var name = $.trim($("#edit_curr_name").val());
			var qty = $.trim($("#edit_curr_qty").val());
			var volume = $.trim($("#edit_curr_volume").val());
			var unit = $.trim($("#edit_curr_unit").val());
			var price_per_unit = $.trim($("#edit_curr_price_per_unit").val());
			var desc = $.trim($("#edit_curr_desc").val());
		
			
			var fields = {
					'act':'edit_sale_item_qty',
					'item':arr['item'],
					'name':name,
					'qty':qty,
					'volume':volume,
					'unit':unit,
					'price_per_unit':price_per_unit,
					'desc':desc
				}
			
				var payload = {
					
					'type':'POST',
					'url':'assets/ajax/proc.php',
					'data':fields
				}					
				
				var result = jQuery.parseJSON(fetch(payload));
		
				
				if(result['status']=='success'){
					
					redir = window.location.href;
					window.location = redir;
					
				}else{
					$("#edit_notify").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fa fa-times-circle'></i></button><strong> Error!</strong>"+result['message']+"</div>");
				}
				
		
		break;
		
		case "exec_purchase_usage":
			var company = $.trim($("#swap_company").val());
			var usage_qty = parseFloat($.trim($("#usage_qty").val()));
			var curr_qty = parseFloat($.trim($("#curr_qty").attr('value')));
			var usage_remarks = $("#usage_remarks").val();
			
			
			if(usage_qty!="" && usage_remarks!=""){
				if(usage_qty>curr_qty){
				
				$("#notify_purchase_usage").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fa fa-times-circle'></i></button><strong> Error!</strong> Cannot exceed Max quantity</div>");
				
				}else{
					
					$.ajax	
							(
									{
											type: "POST",
											url: "assets/ajax/proc.php?act=exec_purchase_usage"+"&item="+arr['item']+"&curr_qty="+curr_qty+"&usage_qty="+usage_qty+"&usage_remarks="+usage_remarks+"&company="+company,
											
											cache: false,
											success: function(result)
											{
												var result = jQuery.parseJSON(result);
												if(result['status']=="success"){
														redir = window.location.href;
														window.location = redir;
												}else{
													$("#notify_purchase_usage").html(arr['message']);
												}
												
											}
									}
							);
					
				}
			}else{
				$("#notify_purchase_usage").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fa fa-times-circle'></i></button><strong> Error!</strong> All fields required</div>");
				
			}

			
			
				
				
			
		
		break;
		
		case "return_item":
		
			
			var qty = $.trim($("#return_item_qty").val());
			var remarks = $.trim($("#return_item_remarks").val());
			
			if(qty && remarks){
				
				qty = parseFloat(qty);
				
				if(qty>arr['max']){
					$("#notify_return").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fa fa-times-circle'></i></button><strong> Error!</strong> Cannot exceed total quantity</div>");
				}else{
					
					
					
						$.ajax	
							(
									{
											type: "POST",
											url: "assets/ajax/proc.php?act=return_item"+"&item="+arr['item']+"&qty="+qty+"&remarks="+remarks,
											
											cache: false,
											success: function(result)
											{
												var result = jQuery.parseJSON(result);
												if(result['status']=="success"){
													var redirect = window.location.href;
													window.location.href=redirect;
												}else{
													$("#notify_return").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fa fa-times-circle'></i></button><strong> Error!</strong> "+result['message']+"</div>");
												}
												
											}
									}
							);
				}
			}else{
				$("#notify_return").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fa fa-times-circle'></i></button><strong> Error!</strong> Cannot be empty</div>");
			}
		
		break;
		
		case "payment_type":
		
			var toggle = $("#payment_type").val();
			
			$.ajax	
				(
					{
							type: "POST",
							url: "assets/ajax/proc.php?act=payment_type"+"&toggle="+toggle,
							
							cache: false,
							success: function(result)
							{
								$("#payment_type_body").html(result);
								
								
							}
					}
				);
		
		break;
		
		case "cheque_detail":
		
			var url = 'assets/ajax/proc.php?act=cheque_detail&inv='+arr['inv']+'&sale_paid_id='+arr['sale_paid_id'];
			var dta = retrieve({'act':'simple_xhr','url':url});
			$("#cheque_detail_data").html(dta);
		
		break;
		
		case "purchase_cheque_detail":
		
			var url = 'assets/ajax/proc.php?act=purchase_cheque_detail&inv='+arr['inv']+'&purchase_paid_id='+arr['purchase_paid_id'];
			var dta = retrieve({'act':'simple_xhr','url':url});
			$("#cheque_detail_data").html(dta);
		
		break;
		
		// case "rep-sale-inv-stats":
		
			// var company = $.trim($("#curr_company").val());
			// var from = $.trim($("#from").val());
			// var to = $.trim($("#to").val());
			
			// $.ajax	
				// (
					// {
						// type: "POST",
						// url: "assets/ajax/proc.php?act=rep-sale-inv-stats"+"&company="+company+"&from="+from+"&to="+to,
						// cache: false,
						// success: function(result)
						// {
							// result = jQuery.parseJSON(result);
							// if(result['status']=='success'){
									
									// var tot_invoices = [];
									
									// var reg_date = [];
									
									// $.each(result['message'], function (index, value) {
										// tot_invoices.push(parseFloat(value['tot_invoices']));
										// reg_date.push(value['reg_date']);
										
									// });
									
								// console.log(tot_invoices);
								// console.log("----------------------");
								// console.log(reg_date);
								
								// Highcharts.chart('rep_sale_inv_stats', {
									// chart: {
										// type: 'line'
									// },
									// credits: {
										// enabled: false
									// },
									// title: {
										// text: 'Invoices'
									// },
									// subtitle: {
										// text: "From: "+from+" |  To: "+to
									// },
									// xAxis: {
										// categories: reg_date
									// },
									// yAxis: {
										// title: {
											// text: 'Sales'
										// }
									// },
									// plotOptions: {
										// line: {
											// dataLabels: {
												// enabled: true
											// },
											// enableMouseTracking: false
										// }
									// },
									// series: [{
										// name: '',
										// data: tot_invoices
									// }]
								// });
								
								
							// }else{
								// $("#rep_sale_inv_stats").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fa fa-times-circle'></i></button><strong> Error! </strong>"+result['message']+"</div>");
							// }
							
						// }
					// }
				// );
			
		
		// break;
		
		case "fetch_report":
		
			
			var company = $.trim($("#curr_company").val());
			var customer = $.trim($("#customer").val());
			var report_type = $.trim($("#report_type").val());
			var from = $.trim($("#from").val());
			var to = $.trim($("#to").val());
			
			if(company!="" && report_type!="" && from!="" && to!="" ){
				var url = "assets/ajax/proc.php?act=reports"+"&customer="+customer+"&report_type="+report_type+"&from="+from+"&to="+to+"&company="+company;
				var dta = retrieve({'act':'simple_xhr','url':url});
				if(dta!=""){
					$("#report_data").html(dta);
				}else{
					$("#report_data").html("<blockquote class='pull-left'>Empty</blockquote>");	
				}
			}else{
				$("#report_data").html("<blockquote class='pull-left'>All fields required</blockquote>");	
			}
			
			
			
			
			
		
		break;
		
		
			case "fetch_report_wh":
		
			
			var company = $.trim($("#curr_company").val());
			var customer = $.trim($("#customer").val());
			var report_type = "sale";
			var from = $.trim($("#from").val());
			var to = $.trim($("#to").val());
			
			if(company!="" && report_type!="" && from!="" && to!="" ){
				var url = "assets/ajax/proc.php?act=reports_wh"+"&customer="+customer+"&report_type="+report_type+"&from="+from+"&to="+to+"&company="+company;
				var dta = retrieve({'act':'simple_xhr','url':url});
				if(dta!=""){
					$("#report_data").html(dta);
				}else{
					$("#report_data").html("<blockquote class='pull-left'>Empty</blockquote>");	
				}
			}else{
				$("#report_data").html("<blockquote class='pull-left'>All fields required</blockquote>");	
			}
			
			
			
			
			
		
		break;
		
		case "fetch_report_sale_return":
		
			
			var company = $.trim($("#curr_company").val());
			var from = $.trim($("#from").val());
			var to = $.trim($("#to").val());
			
			if(company!="" && from!="" && to!="" ){
				var url = "assets/ajax/proc.php?act=report_sale_return"+"&customer="+customer+"&from="+from+"&to="+to+"&company="+company;
				var dta = retrieve({'act':'simple_xhr','url':url});
				if(dta!=""){
					$("#report_data").html(dta);
				}else{
					$("#report_data").html("<blockquote class='pull-left'>Empty</blockquote>");	
				}
			}else{
				$("#report_data").html("<blockquote class='pull-left'>All fields required</blockquote>");	
			}
			
			
			
			
			
		
		break;
		
		
		case "fetch_report_sale_p_l":
		
			
			var company = $.trim($("#curr_company").val());
			var from = $.trim($("#from").val());
			var to = $.trim($("#to").val());
			
			if(company!="" && from!="" && to!="" ){
				var url = "assets/ajax/proc.php?act=report_sale_p_l"+"&customer="+customer+"&from="+from+"&to="+to+"&company="+company;
				var dta = retrieve({'act':'simple_xhr','url':url});
				if(dta!=""){
					$("#report_data").html(dta);
				}else{
					$("#report_data").html("<blockquote class='pull-left'>Empty</blockquote>");	
				}
			}else{
				$("#report_data").html("<blockquote class='pull-left'>All fields required</blockquote>");	
			}
			
		break;
		
		
		case "fetch_report_sale_p_l_wh":
		
			
			var company = $.trim($("#curr_company").val());
			var from = $.trim($("#from").val());
			var to = $.trim($("#to").val());
			
			if(company!="" && from!="" && to!="" ){
				var url = "assets/ajax/proc.php?act=report_sale_p_l_wh"+"&customer="+customer+"&from="+from+"&to="+to+"&company="+company;
				var dta = retrieve({'act':'simple_xhr','url':url});
				if(dta!=""){
					$("#report_data").html(dta);
				}else{
					$("#report_data").html("<blockquote class='pull-left'>Empty</blockquote>");	
				}
			}else{
				$("#report_data").html("<blockquote class='pull-left'>All fields required</blockquote>");	
			}
			
		break;
		
		case "fetch_report_sale_return_wh":
		
			
			var company = $.trim($("#curr_company").val());
			var from = $.trim($("#from").val());
			var to = $.trim($("#to").val());
			
			if(company!="" && from!="" && to!="" ){
				var url = "assets/ajax/proc.php?act=report_sale_return_wh"+"&customer="+customer+"&from="+from+"&to="+to+"&company="+company;
				var dta = retrieve({'act':'simple_xhr','url':url});
				if(dta!=""){
					$("#report_data").html(dta);
				}else{
					$("#report_data").html("<blockquote class='pull-left'>Empty</blockquote>");	
				}
			}else{
				$("#report_data").html("<blockquote class='pull-left'>All fields required</blockquote>");	
			}
			
			
			
			
			
		
		break;
		
		
		
		
		
		case "toggle_cust_supp":
		
			var cust_supp = $("#report_type").val();
			var url = "assets/ajax/proc.php?act=toggle_cust_supp"+"&selected="+cust_supp;
			var dta = retrieve({'act':'simple_xhr','url':url});
				if(dta!=""){
					$("#cust_supp_data").html(dta);
				}
			cust_supp == "sale" ? $("#cust_supp_txt").html("Select Customer") : $("#cust_supp_txt").html("Select Supplier");
			
			$('#customer').selectize();
		
		break;
		
		
		case "tabletools-reports":
			
			
			var printCounter = 0;
					
			$('.datatable').DataTable( {
				dom: 'lBfrtip',
				buttons: [
            {
                extend: 'print',
				title: "<center>"+arr['title']+"<br /><small style='margin-top:10px;'>P.O. BOX 673, Postal Code 611, NIZWA INDL AREA</small><br/><small>Contact No. +96896455040 / +96899666367</small></center><hr />",
				customize: function ( win ) {
                  
                    
						$(win.document.body).prepend("<b style='float:right'>Date: 2019/05/05</b><br />");
						$(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
				
				,
				footer: true,
                messageTop: arr['tagline'],
            },
			{
                extend: 'copyHtml5',
				footer: true,
                messageTop: arr['tagline'],
            },
			{
                extend: 'excelHtml5',
				footer: true,
                messageTop: arr['tagline'],
            },
            {
                extend: 'csvHtml5',
				footer: true,
				messageTop: arr['tagline'],
                
            },
            {
                extend: 'pdfHtml5',
				footer: true,
                messageTop: arr['tagline'],
                
            }

				]
			});
			 
			 
		break;
		
		case "create_expense":
						
						
						var company = $("#swap_company").val();
						var name = $("#name").val();
						var amount = $("#amount").val();
						var place = $("#place").val();
						
						var dataString = "act=create_expense&company="+company+"&name="+name+"&amount="+amount+"&place="+place;
						
						$.ajax	
											(
													{
															type: "POST",
															url: 'assets/ajax/proc.php',
															data: dataString,
															cache: false,
															success: function(result)
															{
																result = jQuery.parseJSON(result);
																if(result['status']=="success"){
																	
																	var redirect = window.location.href;
																	window.location.href=redirect;
																	
																}else{
																	$("#expenses_create_msgbox").html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong><i class='fa fa-times-circle'></i> Error!</strong> "+result['message']+"</div>");
																}
																
																
															}
													}

											);
				
				
				break;
		
		
	}
	
}

function fetch(arr){
	var tmp = null;
	$.ajax({
		type: arr['type'],
		url: arr['url'],
		data: arr['data'],
		async: false,
		success: function(result){
			tmp = result;
		}
	});
	return tmp;
}
<?php require_once('../funcs.php');
$obj = new main();

$obj->connect_db();
$member = new member();

if(isset($_REQUEST['act'])){

	
	switch($_REQUEST['act']){
	
	
				case "create_employee":
					
					$employee = $_REQUEST['emlpoyee'];
					
					$company = $_REQUEST['company'];
					
					$passport = $_REQUEST['passport'];
					
					$visa_date = $_REQUEST['visa_date'];
					
					$visa_expire = $_REQUEST['visa_expire'];
					
					$dob = $_REQUEST['dob'];
					
					$joined = $_REQUEST['joined'];
					
					$cid = $_REQUEST['cid'];
					
					$created_by = $_SESSION['clerk']['id'];
					
					$basic_salary = $_REQUEST['basic_salary'];
					
					$basic_allowance = $_REQUEST['basic_allowance'];
					
					$designation = $_REQUEST['designation'];
					
					$insurance_date = $_REQUEST['employee_insurance_date'];
					
					$insurance_expire = $_REQUEST['employee_insurance_expire'];
					
					$salt = $member->saltish("employee",5);
					
					$status = "active";
					
					$val_dates = $member->verify_dates_emp($visa_date,$visa_expire,$insurance_date,$insurance_expire);
					 
					 if($val_dates['status']=="success"){

							echo $member->create_employee($employee,$company,$passport,$visa_date,$visa_expire,$dob,$joined,$cid,$basic_salary,$designation,$insurance_date,$insurance_expire,$created_by,$salt,$status);
					
					 }else{
					 
							echo json_encode($val_dates);
					 
					 }
					
					
					
				break;
				
				case "create_vehicle":
					$company = trim(@$_REQUEST['company']);					$model = trim(@$_REQUEST['vehicle_model']);					$registration_number = trim(@$_REQUEST['vehicle_registration_number']);					$malkiya_date = trim(@$_REQUEST['malkiya_date']);					$insurance_date = trim(@$_REQUEST['vehicle_insurance_date']);					$color = trim(@$_REQUEST['vehicle_color']);					$value = trim(@$_REQUEST['vehicle_value']);					$malkiya_expire = trim(@$_REQUEST['malkiya_expire']);					$insurance_expire = trim(@$_REQUEST['vehicle_insurance_expire']);					$salt = $member->saltish("vehicle",5);
					if(!empty($company) AND !empty($model) AND !empty($registration_number) AND !empty($malkiya_date) AND !empty($insurance_date) AND !empty($color) AND !empty($value) AND !empty($malkiya_expire) AND !empty($insurance_expire)){											$q = mysql_query("select * from  vehicle where registration_number='{$registration_number}'");						if(mysql_num_rows($q)>0){																echo json_encode(array("status"=>"error","message"=>"Another vehicle with similar regisration number exists"));												}else{																														$val_dates = $member->verify_dates_veh($malkiya_date,$malkiya_expire,$insurance_date,$insurance_expire);					 										 if($val_dates['status']=="success"){												echo $member->create_vehicle($company,$model,$registration_number,$malkiya_date,$insurance_date,$color,$value,$malkiya_expire,$insurance_expire,$salt);										 }else{												echo json_encode($val_dates);										 }												}											}else{											echo json_encode(array("status"=>"error","message"=>"Fields with * required"));										}
					break;
					
					case "create_supplier":
					
					$name = trim(@$_REQUEST['name']);
					$phone = trim(@$_REQUEST['phone']);
					
					
					if(!empty($name) AND !empty($phone))
					{
						$q = mysql_query("select * from supplier where name = '{$name}' and phone = '{$phone}' ");
						if(mysql_num_rows($q)>0)
						{
							echo json_encode(array("status"=>"error","message"=>"Another supplier with similar credentials exists"));
						}else
						{	
								$payload = array
				
								(
									"id"=>"",
									"company"=>($member->ret_by("company","salt",trim(@$_REQUEST['company']),"id")),
									"created_by"=>$_SESSION['clerk']['id'],
									"name"=>trim(@$_REQUEST['name']),
									"address"=>trim(@$_REQUEST['address']),
									"phone"=>trim(@$_REQUEST['phone']),
									"fax"=>trim(@$_REQUEST['fax']),
									"email"=>trim(@$_REQUEST['email']),
									"supplier_company"=>trim(@$_REQUEST['supplier_company']),
									"remarks"=>trim(@$_REQUEST['remarks']),
									"salt"=>$member->saltish("supplier",5),
									"status"=>true,
									"reg_date"=>date("Y-m-d H:i:s")
								);
								$member->crud(array("act"=>"insert","table"=>"supplier","fields"=>$payload));
								echo json_encode(array("status"=>"success","message"=>"Supplier Created"));
								
						}
					}else
					{
						echo json_encode(array("status"=>"error","message"=>"Fields with * required"));
					}
					break;
					
					case "create_customer":
					$company = trim(@$_REQUEST['company']);
					$name = trim(@$_REQUEST['name']);
					$address = trim(@$_REQUEST['address']);
					$phone = trim(@$_REQUEST['phone']);
					$fax = trim(@$_REQUEST['fax']);
					$email = trim(@$_REQUEST['email']);
					$customer_company = trim(@$_REQUEST['customer_company']);
					$remarks = trim(@$_REQUEST['remarks']);
					$salt = $member->saltish("customer",5);
					if(!empty($name) AND !empty($phone))
					{
						$q = mysql_query("select * from customer where name='{$name}' and phone='{$phone}'");
						if(mysql_num_rows($q)>0)
						{
							echo json_encode(array("status"=>"error","message"=>"Another customer with similar credentials exists"));
						}else
						{	
								echo $member->create_customer($company,$name,$address,$phone,$fax,$email,$customer_company,$remarks,$salt);
						}
					}else
					{
						echo json_encode(array("status"=>"error","message"=>"Fields with * required"));
					}
					break;
					
					case "getCustomerDDL":
					
						$q = mysql_query("select * from customer where status <> false order by id DESC");
						if(mysql_num_rows($q)){
							
							$ddl="";
							
							while($result = mysql_fetch_assoc($q)){
								
								$ddl.="<option value='{$result['id']}'>".ucwords($result['name'])."</option>";
								
							}
							
							echo $ddl;
							
						}else{
							echo "<option>Add Customer</option>";
						}
					
					
					break;
					
					case "create_unit":
					
					$company = trim(@$_REQUEST['company']);
					$name = trim(@$_REQUEST['name']);
					
					if(!empty($name))
					{
						$q = mysql_query("select * from unit where name='{$name}' and company = '{$company}' and created_by='{$_SESSION['clerk']['id']}'");
						if(mysql_num_rows($q)>0)
						{
							echo json_encode(array("status"=>"error","message"=>"Already exists"));
						}else
						{	
							echo $member->create_unit($company,$name);
						}
					}else
					{
						echo json_encode(array("status"=>"error","message"=>"Fields with * required"));
					}
					break;
					
					case "ret_unit_type":
					
					$unit = $type = NULL;
					
							
							$q = mysql_query('select * from unit where status=true');
							if(mysql_num_rows($q)){
									
									while($result = mysql_fetch_assoc($q)){
										$unit.="<option value='{$result['id']}'>{$result['name']}</option>";
									}
									
									$q = mysql_query('select * from grouping where status=true');
									if(mysql_num_rows($q)){
										
										while($result = mysql_fetch_assoc($q))
										{
											$type.="<option value='{$result['id']}'>{$result['name']}</option>";
										}
											
											$unit = "<select class='form-control col-md-12'>{$unit}</select>";
											$type = "<select class='form-control'>{$type}</select>";
											echo json_encode(['status'=>'success','message'=>['unit'=>$unit,'type'=>$type,]]);
										
									}else{
										echo json_encode(['status'=>'error','message'=>'An error occured while processing']);
									}
							}else{
								echo json_encode(['status'=>'error','message'=>'An error occured while processing']);
							}
							
						
						
					break;
					
					case "ret_grouping":
					
					$dta=null;
					
						$q = mysql_query("select * from grouping where status=1");
						if(mysql_num_rows($q)){
							
								while($result = mysql_fetch_assoc($q)){
									
										$dta.="<option src = '{$result['id']}' value='{$result['qty']}'>{$result['name']}</option>";
									
								}
							echo  "<select class='form-control' onchange=retrieve({'act':'sale_reset'})>{$dta}</select>";
						}
					
					break;
					
					case "sale_item_qty_price":
					
						$item = trim(@$_REQUEST['item']);
								
						$q = mysql_query("select * from item where id='{$item}'");
						$result = mysql_fetch_assoc($q);
						
						echo json_encode(['qty'=>$result['quantity'],'price'=>$result['price_per_unit']]);
						
						
						
					break;
					
					case "sale_wh_item_qty_price":
					
						$item = trim(@$_REQUEST['item']);
								
						$q = mysql_query("select * from item_warehouse where id='{$item}'");
						$result = mysql_fetch_assoc($q);
						
						echo json_encode(['qty'=>$result['quantity'],'price'=>$result['price_per_unit']]);
						
						
						
					break;
					
					case "create_grouping":
					
					$company = trim(@$_REQUEST['company']);
					$name = trim(@$_REQUEST['name']);
					$qty = trim(@$_REQUEST['qty']);
					
					if(!empty($name) AND !empty($qty) AND !empty($company))
					{
							
						$company = $member->ret_by("company","salt",trim($company),"id");
						
						$q = mysql_query("select * from grouping where name='{$name}' and company = '{$company}' and created_by='{$_SESSION['clerk']['id']}' and status=true");
						if(mysql_num_rows($q)>0)
						{
							echo json_encode(array("status"=>"error","message"=>"Already exists"));
						}else
						{	
							$payload = array
					
							(
								"id"=>"",
								"company"=>$company,
								"created_by"=>trim($_SESSION["clerk"]['id']),
								"name"=>trim($name),
								"qty"=>trim($qty),
								"status"=>true,
								"reg_date"=>date("Y-m-d H:i:s")
							);
					
							$member->crud(array("act"=>"insert","table"=>"grouping","fields"=>$payload));
							echo json_encode(array("status"=>"success"));
							
						}
					}else
					{
						echo json_encode(array("status"=>"error","message"=>"Fields with * required"));
					}
					break;
					
					case "create_item":
					
					
					$company = trim(@$_REQUEST['company']);
					$name = trim(@$_REQUEST['name']);
					$quantity = trim(@$_REQUEST['quantity']);
					$volume = trim(@$_REQUEST['volume']);
					$unit = trim(@$_REQUEST['unit']);
					$price_per_unit = trim(@$_REQUEST['price_per_unit']);
					$sale_item_desc = trim(@$_REQUEST['sale_item_desc']);
					
					
					if(!empty($name) AND !empty($quantity) AND !empty($volume) AND !empty($unit) AND !empty($price_per_unit))
					{
						$company = $member->ret_by("company","salt",$company,"id");
						
						$q = mysql_query("select * from item where company={$company} and created_by={$_SESSION['clerk']['id']} and name='{$name}' and volume={$volume} and quantity={$quantity} and unit={$unit} and price_per_unit={$price_per_unit}");
						if(mysql_num_rows($q)>0)
						{
							echo json_encode(array("status"=>"error","message"=>"Another item with similar credentials exists"));
						}else
						{	
						$payload = array
					
						(
							"id"=>"",
							"company"=>$company,
							"created_by"=>trim($_SESSION["clerk"]['id']),
							"name"=>$name,
							"quantity"=>$quantity,
							"volume"=>$volume,
							"unit"=>$unit,
							"price_per_unit"=>$price_per_unit,
							"sale_item_desc"=>$sale_item_desc,
							"status"=>true,
							"reg_date"=>date("Y-m-d H:i:s")
						);
					
						$inv = $member->crud(array("act"=>"insert","table"=>"item","fields"=>$payload));
						
						echo json_encode(['status'=>'success']);
						
						}
					}else
					{
						echo json_encode(array("status"=>"error","message"=>"Fields with * required"));
					}
					break;
					
					case "create_item_purchase":
					
					
					$company = trim(@$_REQUEST['company']);
					$name = trim(@$_REQUEST['name']);
					
					
					if(!empty($name))
					{
						$company = $member->ret_by("company","salt",$company,"id");
						
						$q = mysql_query("select * from item_purchase where company={$company} and created_by={$_SESSION['clerk']['id']} and name='{$name}' and status=true");
						if(mysql_num_rows($q)>0)
						{
							echo json_encode(array("status"=>"error","message"=>"Another item with similar credentials exists"));
						}else
						{	
						$payload = array
					
						(
							"id"=>"",
							"company"=>$company,
							"created_by"=>trim($_SESSION["clerk"]['id']),
							"name"=>$name,
							"status"=>true,
							"reg_date"=>date("Y-m-d H:i:s")
						);
					
						$inv = $member->crud(array("act"=>"insert","table"=>"item_purchase","fields"=>$payload));
						
						echo json_encode(['status'=>'success']);
						
						}
					}else
					{
						echo json_encode(array("status"=>"error","message"=>"Fields with * required"));
					}
					break;
					
					
					case "create_expense":
					
					
					$company = trim(@$_REQUEST['company']);
					$name = trim(@$_REQUEST['name']);
					$amount = trim(@$_REQUEST['amount']);
					$place = trim(@$_REQUEST['place']);
					
					
					if(!empty($name) AND !empty($amount))
					{
						$company = $member->ret_by("company","salt",$company,"id");
						
							
						$payload = array
					
						(
							"id"=>"",
							"company"=>$company,
							"created_by"=>trim($_SESSION["clerk"]['id']),
							"name"=>$name,
							"amount"=>$amount,
							"place"=>$place,
							"reg_date"=>date("Y-m-d H:i:s")
						);
					
						$inv = $member->crud(array("act"=>"insert","table"=>"expenses","fields"=>$payload));
						
						echo json_encode(['status'=>'success']);
						
						
					}else
					{
						echo json_encode(array("status"=>"error","message"=>"All Fields required"));
					}
					break;
					
					
					case "rem_sale_item":
						
							
							$item  = trim(@$_REQUEST['item']);
							if(!empty($item)){
								if(mysql_query("update item set status=false where id = '{$item}'")){
									echo json_encode(['status'=>'success']);
								}else{
									echo json_encode(['status'=>'error','message'=>'An error occured while processing']);
								}
								
							}
							
						
					break;
					
					case "rem_purchase_item":
						
							
							$item  = trim(@$_REQUEST['item']);
							if(!empty($item)){
								if(mysql_query("update item_purchase set status=false where id = '{$item}'")){
									echo json_encode(['status'=>'success']);
								}else{
									echo json_encode(['status'=>'error','message'=>'An error occured while processing']);
								}
								
							}
							
						
					break;
					
					case "rem_expense":
						
							
							$expense  = trim(@$_REQUEST['expense']);
							if(!empty($expense)){
								if(mysql_query("delete from expenses where id = '{$expense}'")){
									echo json_encode(['status'=>'success']);
								}else{
									echo json_encode(['status'=>'error','message'=>'An error occured while processing']);
								}
								
							}
							
						
					break;
					
					case "add_sale_item_qty":
						
							
							$item  = trim(@$_REQUEST['item']);
							$qty  = trim(@$_REQUEST['qty']);
							
							if(!empty($item) AND !empty($qty)){
								
								$qty = $qty + ($member->ret_by("item","id",$item,"quantity"));
								
								
								if(mysql_query("update item set quantity={$qty} where id = {$item}")){
									echo json_encode(['status'=>'success']);
								}else{
									echo json_encode(['status'=>'error','message'=>'An error occured while processing']);
								}
								
							}else{
								echo json_encode(['status'=>'error','message'=>'Cannot be empty']);
							}
							
						
					break;
					
					
					case "tranfer_item":
						
							// print_r($_REQUEST);
							// exit();
							
							$item  = trim(@$_REQUEST['item']);
							$qty  = trim(@$_REQUEST['qty']);
							$company  = $member->ret_by("company","salt",trim(@$_REQUEST['company']),"id");
							
							
							
							
							if(!empty($item) AND !empty($qty)){
								
								$curr_qty = $member->ret_by("item","id",$item,"quantity");
								
								$tot_qty = $curr_qty-$qty;
								
								mysql_query("update item set quantity='{$tot_qty}' where id='{$item}' and status=true");
								
								$item_wh_verify = $member->retrieve(['act'=>'sale_item_wh_details','item'=>$item]);
								 
								if($item_wh_verify){
									
									mysql_query("update item_warehouse set quantity=".($item_wh_verify['quantity']+$qty)." where item = {$item} and status=true");
									echo json_encode(['status'=>'success']);
								}else{
									
									$payload = $member->retrieve(['act'=>'sale_item_details','item'=>$item]);
									
									$payload['item'] = $payload['id'];
									$payload['quantity'] = $qty;
									$payload['id'] = "";
									
									$create_wh_item = $member->crud(array("act"=>"insert","table"=>"item_warehouse","fields"=>$payload));
									
									if($create_wh_item){
										echo json_encode(['status'=>'success','message'=>$create_wh_item]);
									}else{
										echo json_encode(['status'=>'error','message'=>'An error occured while processing your request']);
									}
									
								}
								
							}else{
								echo json_encode(['status'=>'error','message'=>'Cannot be empty']);
							}
							
						
					break;
					
					
					case "return_item_warehouse":
						
							
							$item  = trim(@$_REQUEST['item']);
							$qty  = trim(@$_REQUEST['qty']);
							
							if(!empty($item) AND !empty($qty)){
								
								$itmdtls = $member->retrieve(['act'=>'item_wh_details','item'=>$item]);
								
								$tot_qty = $itmdtls['quantity']-$qty;
								
								mysql_query("update item_warehouse set quantity='{$tot_qty}' where id='{$item}' and status=true");
								
								$item_sale_verify = $member->retrieve(['act'=>'sale_item_details','item'=>$itmdtls['item']]);
								
								if($item_sale_verify){
									
									mysql_query("update item set quantity=".($item_sale_verify['quantity']+$qty)." where id = {$item_sale_verify['id']}");
									echo json_encode(['status'=>'success']);
								}else{
									echo json_encode(['status'=>'error','message'=>'Unable to locate item']);
								}
							}else{
								echo json_encode(['status'=>'error','message'=>'Cannot be empty']);
							}
							
						
					break;
					
					case "fetch_sale_item_data":
					
					
						$q = mysql_query("select * from item where id='{$_REQUEST['item']}'");
						$result = mysql_fetch_assoc($q);
						$unitsList = $member->unitsListForEdit(['id'=>$result['unit'],'company'=>$result['company'],'created_by'=>$_SESSION['clerk']['id']]);
						
						echo json_encode(['status'=>'success','itemDetail'=>$result,'unitsList'=>$unitsList]);
					
					break;
					
					case "edit_sale_item_qty":
						
							$rcv = 
								[
									"item"=>trim(@$_REQUEST['item']),
									"name"=>trim(@$_REQUEST['name']),
									"qty"=>trim(@$_REQUEST['qty']),
									"volume"=>trim(@$_REQUEST['volume']),
									"unit"=>trim(@$_REQUEST['unit']),
									"price_per_unit"=>trim(@$_REQUEST['price_per_unit']),
									"desc"=>trim(@$_REQUEST['desc'])
								];
								
							
							$verify = $member->retrieve(['act'=>'item_sale_verify','name'=>$rcv['name'],'item'=>$rcv['item']]);
							if(!empty($verify)){
								echo json_encode(['status'=>'error','message'=>'Item already exists']);
							}else{
								$item_details = $member->retrieve(['act'=>'sale_item_details','item'=>$rcv['item']]);
								
								$payload = 
									[
								
										"id"=>'',
										"tbl"=>'item',
										"entity_id"=>$rcv['item'],
										"data_before"=>json_encode($item_details),
										"data_after"=>json_encode($rcv),
										"status"=>true,
										"reg_date"=>date("Y-m-d H:i:s")
									];
								
								$member->updateItem($rcv);
								$member->create_update_log($payload);
								
								echo json_encode(['status'=>'success','message'=>'Item Updated']);
							}
							
							
						
					break;
					
					case "exec_purchase_usage":
						
						$company  = $member->ret_by("company","salt",trim(@$_REQUEST['company']),"id");
						$item = trim(@$_REQUEST['item']);
						$curr_qty = trim(@$_REQUEST['curr_qty']);
						$usage_qty = trim(@$_REQUEST['usage_qty']);
						$usage_remarks = trim(@$_REQUEST['usage_remarks']);
						$tot_qty = $curr_qty - $usage_qty;
						
						$payload = [
									
										"id"=>"",
										"company"=>$company,
										"created_by"=>$_SESSION['clerk']['id'],
										"stock_item"=>$item,
										"quantity"=>$usage_qty,
										"remarks"=>$usage_remarks,
										"status"=>true,
										"reg_date"=>date("Y-m-d H:i:s")
									];
									
						$member->crud(array("act"=>"insert","table"=>"purchase_usage","fields"=>$payload));
						
						mysql_query("update purchase_stock set quantity = '{$tot_qty}' where id='{$item}'");
						
						echo json_encode(['status'=>'success']);
						
					break;
					
					// case "prep_list":
							
							// $item = trim(@$_REQUEST['item']);
							// $sesh = trim(@$_REQUEST['sesh']);
							// if(isset($_SESSION[$sesh]) AND !empty($sesh) AND !empty($item)){
								
								
								// array_push($_SESSION[$sesh],$item);
								
									
							// }else{
								
								// $_SESSION[$sesh] = array($item);
								
							// }
							
							// $_SESSION[$sesh] = array_values($_SESSION[$sesh]);
							
							// $data = "";
							// $x=1;
							// for ($i=0;$i<count($_SESSION[$sesh]);$i++){
								
								// $data.= 
									
									// "<tr id='pur{$i}'>
										// <td>{$x}</td>
										// <td>{$_SESSION[$sesh][$i]}</td>
										// <td>
											// <input type='number' item='{$i}' name='quantity[]' placeholder='Enter Quantity' class='form-control'>
										// </td>
										// <td>
											// <input type='number' item='{$i}' name='price[]' placeholder='Enter Price' class='form-control'>
										// </td>
										// <td>
											// <button class='btn btn-xs btn-danger' onclick=retrieve({'act':'edit_sesh_list','sesh':'purchase','key':'{$i}'})><i class='fa fa-times'></i></button>
										// </td>
									// </tr>";
									// $x++;
							// }
							
							// echo $data;
							
						
					// break;
					
					// case "edit_sesh_list":
						
							
						// $key = trim(@$_REQUEST['key']);
						// $sesh = trim(@$_REQUEST['sesh']);
						// unset($_SESSION[$sesh][$key]);
						// $_SESSION[$sesh] = array_values($_SESSION[$sesh]);
							
					
					// break;
					
					// case "retrieve_purchase_list":
					
						// $sesh = trim(@$_REQUEST['sesh']);
						// $_SESSION[$sesh] = array_values($_SESSION[$sesh]);
						// $data = NULL;
						// $x=1;	
						
						// for ($i=0;$i<count($_SESSION[$sesh]);$i++){
								// $data.= 
									
									// "<tr id='pur{$i}'>
										// <td>{$x}</td>
										// <td>{$_SESSION[$sesh][$i]}</td>
										// <td>
											// <input type='number' item='{$i}' name='quantity[]' placeholder='Enter Quantity' class='form-control'>
										// </td>
										// <td>
											// <input type='number' item='{$i}' name='price[]' placeholder='Enter Price' class='form-control'>
										// </td>
										// <td>
											// <button class='btn btn-xs btn-danger' onclick=retrieve({'act':'edit_sesh_list','sesh':'purchase','key':'{$i}'})><i class='fa fa-times'></i></button>
										// </td>
									// </tr>";
									// $x++;
							// }
							
							// echo $data;
						
					// break;
					
					case "create_purchase_invoice":
					
					
					// echo "<pre>";
					// print_r(json_decode($_REQUEST['data'],true));
					// echo "</pre>";
					// exit();
					$data = json_decode($_REQUEST['data'],true);
					// $aux = $data['aux'];
					// $dta = $data['aux'];
					$aux = $data['aux']['aux'];
					$item = $data['item']['item'];
					// echo "<pre>";
					// print_R($item);
					// echo "</pre>";
					// exit();
					// foreach($data['aux'] as $val){
						// print_r($val);
					// }
					// echo "</pre>";
					// exit();
					
					if (DateTime::createFromFormat('Y-m-d', trim(@$aux["date"])) == FALSE) {
					  $reg_date = date("Y-m-d h:i:s");
					}else{
					  $reg_date = date("Y-m-d",strtotime(trim(@$aux["date"])));
					}
					
					$payload_inv = array
					
						(
							"id"=>"",
							"company"=>($member->ret_by("company","salt",trim($aux["company"]),"id")),
							"created_by"=>trim($_SESSION["clerk"]['id']),
							"supplier"=>trim($aux["supplier"]),
							"discount"=>trim($aux["discount"]),
							"discount_type"=>trim($aux["discount_type"]),
							"reg_date"=>$reg_date
						);
					
					$inv = $member->crud(array("act"=>"insert","table"=>"purchase_invoice","fields"=>$payload_inv));
					
					$payload = array
					
						(
							"id"=>"",
							"inv"=>$inv,
							"paid"=>trim($aux["paid"]),
							"reg_date"=>date("Y-m-d H:i:s")
						);
					
					$member->crud(array("act"=>"insert","table"=>"purchase_paid","fields"=>$payload));
					
					foreach($item as $val){
						
						// print_r($val);
						$payload = array
					
						(
							"id"=>"",
							"inv"=>$inv,
							"item"=>$val['item'],
							"quantity"=>$val['values']['2'],
							"volume"=>$val['values']['0'],
							"unit"=>$val['values']['1'],
							"price"=>$val['values']['3'],
							"type"=>$val['values']['4'],
							"reg_date"=>date("Y-m-d H:i:s")
						);
						
					$member->crud(array("act"=>"insert","table"=>"purchase_item","fields"=>$payload));
					

					$grouping_qty = $member->ret_by("grouping","id",$payload['type'],"qty");
					$tot_stock_qty = ($payload['quantity']*$grouping_qty);
					

					$compare_purchase_stock = $member->retrieve(['act'=>'compare_purchase_stock','item'=>$payload['item'],'volume'=>$payload['volume'],'unit'=>$payload['unit']]);
					
					
					if($compare_purchase_stock){
						$curr_stock_qty = ($compare_purchase_stock['quantity']+$tot_stock_qty);
						mysql_query("update purchase_stock set quantity='{$curr_stock_qty}' where id='{$compare_purchase_stock['id']}'");
						
					}else{
						
						$payload_x = array
					
						(
							"id"=>"",
							"company"=>$payload_inv['company'],
							"created_by"=>$payload_inv['created_by'],
							"item"=>$val['item'],
							"quantity"=>$tot_stock_qty,
							"volume"=>$val['values']['0'],
							"unit"=>$val['values']['1'],
							"status"=>true,
							"reg_date"=>date("Y-m-d H:i:s")
						);
						$member->crud(array("act"=>"insert","table"=>"purchase_stock","fields"=>$payload_x));
					
					}
					
					$member->crud(array("act"=>"insert","table"=>"purchase_stock","fields"=>$payload));
						
					}
					
						echo json_encode(['status'=>'success','message'=>$inv]);
					
					break;
					
					case "payment_type":
						
							
							$toggle = trim(@$_REQUEST['toggle']);
							switch($toggle){
								
								case "cash":
										
									?>
									
										<div class="form-group">
										  <label>Amount</label>
										  <input id="sale_paid_amt" type="number" class="form-control" placeholder="Enter Payment">
										</div>
										<div class="form-group">
											<label>Description</label>
											<textarea type="text" id="description" class="form-control" placeholder="Enter Description"></textarea>
										</div>
										
									<?php
									
									
								break;
								
								case "cheque":
										
									?>
										<div class="form-group">
											<label>To</label>
											<input id="issue_to" type="text" class="form-control" placeholder="Enter To"/>
										</div>
										<div class="form-group">
											<label>Bank</label>
											<input id="bank" type="text" class="form-control" placeholder="Enter Bank"/>
										</div>
										<div class="form-group">
											<label>Cheque Number</label>
											<input id="number" type="text" class="form-control" placeholder="Enter cheque number"/>
										</div>
										<div class="form-group">
											<label>Check Amount</label>
											<input id="sale_paid_amt" type="number" class="form-control" placeholder="Enter cheque amount"/>
										</div>
										<div class="form-group">
											<label>Cheque Date</label>
											<input id="date" name="datepicker" type="text" name="datepicker" class="form-control" placeholder="Enter cheque date"/>
										</div>
										<div class="form-group">
											<label>Description</label>
											<textarea type="text" id="description" class="form-control" placeholder="Enter Description"></textarea>
										</div>
										
										<script>$( 'input[name=datepicker]' ).datetimepicker({timepicker:false,format:'Y-m-d'});</script>
								
										
									<?php
									
									
								break;
								
								
								default:
									echo "<blockquote>Empty</blockquote>";
								break;
								
							}
						
					
					
					break;
					
					case "create_sale_invoice":
					
					// echo "<pre>";
					// print_r(json_decode($_REQUEST['data'],true));
					// echo "</pre>";
					// exit();
					$data = json_decode($_REQUEST['data'],true);
					// $aux = $data['aux'];
					// $dta = $data['aux'];
					$aux = $data['aux']['aux'];
					$item = $data['item']['item'];
					// echo "<pre>";
					// print_R($item);
					// echo "</pre>";
					// exit();
					// foreach($data['aux'] as $val){
						// print_r($val);
					// }
					// echo "</pre>";
					// exit();
					if (DateTime::createFromFormat('Y-m-d', trim(@$aux["date"])) == FALSE) {
					  $reg_date = date("Y-m-d h:i:s");
					}else{
					  $reg_date = date("Y-m-d",strtotime(trim(@$aux["date"])));
					}
					
					$payload = array
					
						(
							"id"=>"",
							"company"=>($member->ret_by("company","salt",trim($aux["company"]),"id")),
							"created_by"=>trim($_SESSION["clerk"]['id']),
							"customer"=>trim($aux["customer"]),
							"discount"=>trim($aux["discount"]),
							"discount_type"=>trim($aux["discount_type"]),
							"aging"=>trim($aux["aging"]),
							"type"=>trim($aux["state"]),
							"status"=>true,
							"reg_date"=>$reg_date
						);
					
					$inv = $member->crud(array("act"=>"insert","table"=>"sale_invoice","fields"=>$payload));
					
					
					$payload_order = array
					
						(
							"id"=>"",
							"company"=>$payload['company'],
							"created_by"=>$payload['created_by'],
							"inv"=>$inv,
							"status"=>trim($aux['order']),
							"remarks"=>trim($aux['remarks']),
							"reg_date"=>$reg_date
						);
						
					$inv_order = $member->crud(array("act"=>"insert","table"=>"sale_inv_order","fields"=>$payload_order));
					
					$payload = array
					
						(
							"id"=>"",
							"inv"=>$inv,
							"paid"=>trim($aux["paid"]),
							"reg_date"=>date("Y-m-d H:i:s")
						);
					
					if($aux['paid']>0){
							
						$member->crud(array("act"=>"insert","table"=>"sale_paid","fields"=>$payload));
							
					}
					
					
					foreach($item as $val){
						
						//item detail
						
						$item_details = $member-> retrieve(['act'=>'sale_item_details','item'=>$val['item']]);
						
						$grouping_detail = $member-> retrieve(['act'=>'grouping_detail','grouping'=>$val['type'][0]]);
						
						// print_r($val);
						$payload = array
					
						(
							"id"=>"",
							"inv"=>$inv,
							"item_id"=>$val['item_id'][0],
							"item"=>$item_details['name'],
							"quantity"=>$val['values']['0'],
							"volume"=>$item_details['volume'],
							"unit"=>$item_details['unit'],
							"price_per_unit"=>$val['price']['0'],
							"grouping"=>$grouping_detail['name'],
							"grouping_qty"=>$grouping_detail['qty'],
							"returned"=>false,
							"reg_date"=>date("Y-m-d H:i:s")
						);
						
						// print_r($payload);
						// exit();
					$member->crud(array("act"=>"insert","table"=>"sale_item","fields"=>$payload));
					
					
					$sale_qty = $member->retrieve(['act'=>'proc_sale_qty','qty'=>$payload['quantity'],'type'=>$payload['grouping_qty']]);
					
					
					
					$curr_qty = $member->ret_by("item","id",$val['item'],"quantity");
					
					
					$tot_sale_qty = $curr_qty - $sale_qty;
					
					mysql_query("update item set quantity='{$tot_sale_qty}' where id='{$val['item']}'");
					
						
					}
					
						echo json_encode(['status'=>'success','message'=>$inv]);
					
					break;
					
					case "create_sale_invoice_wh":
					
					// echo "<pre>";
					// print_r(json_decode($_REQUEST['data'],true));
					// echo "</pre>";
					// exit();
					$data = json_decode($_REQUEST['data'],true);
					// $aux = $data['aux'];
					// $dta = $data['aux'];
					$aux = $data['aux']['aux'];
					$item = $data['item']['item'];
					// echo "<pre>";
					// print_R($item);
					// echo "</pre>";
					// exit();
					// foreach($data['aux'] as $val){
						// print_r($val);
					// }
					// echo "</pre>";
					// exit();
					if (DateTime::createFromFormat('Y-m-d', trim(@$aux["date"])) == FALSE) {
					  $reg_date = date("Y-m-d h:i:s");
					}else{
					  $reg_date = date("Y-m-d",strtotime(trim(@$aux["date"])));
					}
					
					$payload = array
					
						(
							"id"=>"",
							"company"=>($member->ret_by("company","salt",trim($aux["company"]),"id")),
							"created_by"=>trim($_SESSION["clerk-wh"]['id']),
							"customer"=>trim($aux["customer"]),
							"discount"=>trim($aux["discount"]),
							"discount_type"=>trim($aux["discount_type"]),
							"aging"=>trim($aux["aging"]),
							"type"=>trim($aux["state"]),
							"status"=>true,
							"reg_date"=>$reg_date
						);
					
					$inv = $member->crud(array("act"=>"insert","table"=>"sale_invoice_wh","fields"=>$payload));
					
					
					$payload_order = array
					
						(
							"id"=>"",
							"company"=>$payload['company'],
							"created_by"=>$payload['created_by'],
							"inv"=>$inv,
							"status"=>trim($aux['order']),
							"remarks"=>trim($aux['remarks']),
							"reg_date"=>$reg_date
						);
						
					$inv_order = $member->crud(array("act"=>"insert","table"=>"sale_inv_order_wh","fields"=>$payload_order));
					
					$payload = array
					
						(
							"id"=>"",
							"inv"=>$inv,
							"paid"=>trim($aux["paid"]),
							"reg_date"=>date("Y-m-d H:i:s")
						);
					
					if($aux['paid']>0){
							
						$member->crud(array("act"=>"insert","table"=>"sale_paid_wh","fields"=>$payload));
							
					}
					
					
					foreach($item as $val){
						
						//item detail
						
						$item_details = $member-> retrieve(['act'=>'sale_item_wh_details','item'=>$val['item']]);
						
						$grouping_detail = $member-> retrieve(['act'=>'grouping_detail','grouping'=>$val['type'][0]]);
						
						// print_r($val);
						$payload = array
					
						(
							"id"=>"",
							"inv"=>$inv,
							"item_id"=>$val['item_id'][0],
							"item"=>$item_details['name'],
							"quantity"=>$val['values']['0'],
							"volume"=>$item_details['volume'],
							"unit"=>$item_details['unit'],
							"price_per_unit"=>$val['price']['0'],
							"grouping"=>$grouping_detail['name'],
							"grouping_qty"=>$grouping_detail['qty'],
							"returned"=>false,
							"reg_date"=>date("Y-m-d H:i:s")
						);
						
						// print_r($payload);
						// exit();
					$member->crud(array("act"=>"insert","table"=>"sale_item_wh","fields"=>$payload));
					
					
					$sale_qty = $member->retrieve(['act'=>'proc_sale_qty','qty'=>$payload['quantity'],'type'=>$payload['grouping_qty']]);
					
					
					
					$curr_qty = $member->ret_by("item_warehouse","id",$val['item'],"quantity");
					
					
					$tot_sale_qty = $curr_qty - $sale_qty;
					
					mysql_query("update item_warehouse set quantity='{$tot_sale_qty}' where id='{$val['item']}'");
					
						
					}
					
						echo json_encode(['status'=>'success','message'=>$inv]);
					
					break;
					
					case "inv_sale_up_remarks":
						
						
						$status = trim(@$_REQUEST['status']);
						$remarks = trim(@$_REQUEST['remarks']);
						$inv = trim(@$_REQUEST['inv']);
					
						mysql_query("update sale_inv_order set status='{$status}',remarks='{$remarks}' where inv = {$inv}");
						
						?>
						
							<div class="form-group">
								<?php 
								
									switch($status){
										
										case "delivered":
										
											?>
											
											<input type="radio" name="stored_status" value="delivered" checked/> Delivered 
											<input type="radio" name="stored_status" value="nondelivered" /> Non Delivered
															
											
											<?php
										
										break;
										
										case "nondelivered":
										
											?>
											<input type="radio" name="stored_status" value="delivered" /> Delivered 
											<input type="radio" name="stored_status" value="nondelivered" checked /> Non Delivered
															
											
											<?php
										
										break;
										
										
									}
									
								
								?>
								
								
							</div>
							<div class="form-group">
								<textarea id="stored_remarks" class="form-control" ><?php echo $remarks; ?></textarea>
							</div>
						
						<?php
					
					break;
					
					
					case "inv_sale_up_remarks_wh":
						
						
						$status = trim(@$_REQUEST['status']);
						$remarks = trim(@$_REQUEST['remarks']);
						$inv = trim(@$_REQUEST['inv']);
					
						mysql_query("update sale_inv_order_wh set status='{$status}',remarks='{$remarks}' where inv = {$inv}");
						
						?>
						
							<div class="form-group">
								<?php 
								
									switch($status){
										
										case "delivered":
										
											?>
											
											<input type="radio" name="stored_status" value="delivered" checked/> Delivered 
											<input type="radio" name="stored_status" value="nondelivered" /> Non Delivered
															
											
											<?php
										
										break;
										
										case "nondelivered":
										
											?>
											<input type="radio" name="stored_status" value="delivered" /> Delivered 
											<input type="radio" name="stored_status" value="nondelivered" checked /> Non Delivered
															
											
											<?php
										
										break;
										
										
									}
									
								
								?>
								
								
							</div>
							<div class="form-group">
								<textarea id="stored_remarks" class="form-control" ><?php echo $remarks; ?></textarea>
							</div>
						
						<?php
					
					break;
					
					
					case "return_item":
					
						$item  = trim(@$_REQUEST['item']);
						$qty  = trim(@$_REQUEST['qty']);
						$remarks  = trim(@$_REQUEST['remarks']);
						
						
						if(!empty($item) AND !empty($qty) AND !empty($remarks)){
							
							$q = mysql_query("select * from sale_item where id='{$item}'");
							if(mysql_num_rows($q)){
									
									$result = mysql_fetch_assoc($q);
									$curr_qty = $member->ret_by("item","id",$result['item_id'],"quantity"); //main item's quantity
									$tot_qty = $curr_qty+$qty; //after adding total quantity of main item
									
									$tot_qty_sale_item = ($result['quantity']*$result['grouping_qty'])-$qty;
									
									//update item quantity
									mysql_query("update item set quantity='{$tot_qty}' where id='{$result['item_id']}'");
									
									if($result['grouping_qty']>1){ //if not indivisual
											
										if($tot_qty_sale_item>$result['grouping_qty']){
												
												$grp =(int) ($tot_qty_sale_item/$result['grouping_qty']);
												$indiv = $tot_qty_sale_item % $result['grouping_qty'];
												
												// $arx = ['group'=>$grp,'indivisual'=>$indiv];
												// print_r($arx);
												// exit()
												if($grp=="1"){
													
														mysql_query("update sale_item set grouping='indivisual',grouping_qty='1',quantity='{$tot_qty_sale_item}',returned=true where id='{$result['id']}'");
													
												}else{
														
														mysql_query("update sale_item set quantity='{$grp}',returned=true where id='{$result['id']}'");
														
												}
												
												
												
												if($indiv){
													
															
														$payload = array
														
															(
																"id"=>"",
																"inv"=>$result['inv'],
																"item_id"=>$result['item_id'],
																"item"=>$result['item'],
																"quantity"=>$indiv,
																"volume"=>$result['volume'],
																"unit"=>$result['unit'],
																"price_per_unit"=>$result['price_per_unit'],
																"grouping"=>"indivisual",
																"grouping_qty"=>"1",
																"returned"=>false,
																"reg_date"=>date("Y-m-d H:i:s")
															);
															$member->crud(array("act"=>"insert","table"=>"sale_item","fields"=>$payload));
															
															$payload = array
																		
															(
																"id"=>"",
																"inv"=>$result['inv'],
																"item_id"=>$result['item_id'],
																"sale_item_id"=>$result['item_id'],
																"item"=>$result['item'],
																"quantity"=>$qty,
																"volume"=>$result['volume'],
																"unit"=>$result['unit'],
																"price_per_unit"=>$result['price_per_unit'],
																"price_per_unit"=>$remarks,
																"reg_date"=>date("Y-m-d H:i:s")
															);
																
															$member->crud(array("act"=>"insert","table"=>"sale_item_returned","fields"=>$payload));
															echo json_encode(['status'=>'success']);
											
													
												}else{
													
													mysql_query("update sale_item set quantity='{$grp}',returned=true where id='{$result['id']}'");
										
													$payload = array
																
													(
														"id"=>"",
														"inv"=>$result['inv'],
														"item_id"=>$result['item_id'],
														"sale_item_id"=>$result['item_id'],
														"item"=>$result['item'],
														"quantity"=>$qty,
														"volume"=>$result['volume'],
														"unit"=>$result['unit'],
														"price_per_unit"=>$result['price_per_unit'],
														"remarks"=>$remarks,
														"reg_date"=>date("Y-m-d H:i:s")
													);
																	
													$member->crud(array("act"=>"insert","table"=>"sale_item_returned","fields"=>$payload));
													echo json_encode(['status'=>'success']);
													
												}
												
												
										}else{
											// echo "here3";exit();
												mysql_query("update sale_item set grouping='indivisual',grouping_qty='1',quantity='{$tot_qty_sale_item}',returned=true where id='{$result['id']}'");
												
												$payload = array
															
												(
													"id"=>"",
													"inv"=>$result['inv'],
													"item_id"=>$result['item_id'],
													"sale_item_id"=>$result['item_id'],
													"item"=>$result['item'],
													"quantity"=>$qty,
													"volume"=>$result['volume'],
													"unit"=>$result['unit'],
													"price_per_unit"=>$result['price_per_unit'],
													"remarks"=>$remarks,
													"reg_date"=>date("Y-m-d H:i:s")
												);
																
												$member->crud(array("act"=>"insert","table"=>"sale_item_returned","fields"=>$payload));
												echo json_encode(['status'=>'success']);
											
										}
									}else{
										// echo "here4";exit();
										mysql_query("update sale_item set quantity='{$tot_qty_sale_item}',returned=true where id='{$result['id']}'");
										
											$payload = array
														
											(
												"id"=>"",
												"inv"=>$result['inv'],
												"item_id"=>$result['item_id'],
												"sale_item_id"=>$result['item_id'],
												"item"=>$result['item'],
												"quantity"=>$qty,
												"volume"=>$result['volume'],
												"unit"=>$result['unit'],
												"price_per_unit"=>$result['price_per_unit'],
												"remarks"=>$remarks,
												"reg_date"=>date("Y-m-d H:i:s")
											);
															
											$member->crud(array("act"=>"insert","table"=>"sale_item_returned","fields"=>$payload));
											echo json_encode(['status'=>'success']);
									}
									
									 
									
									
									
									
									
									
									
							}else{
								echo json_encode(['status'=>'error','message'=>'An error occured while processing']);
								
							}
							
						}else{
							
								echo json_encode(['status'=>'error','message'=>'An error occured while processing']);
							
						}
					
				break;
				
				case "return_item_wh":

					
						$item  = trim(@$_REQUEST['item']);
						$qty  = trim(@$_REQUEST['qty']);
						$remarks  = trim(@$_REQUEST['remarks']);
						
						
						if(!empty($item) AND !empty($qty) AND !empty($remarks)){
							
							$q = mysql_query("select * from sale_item_wh where id='{$item}'");
							if(mysql_num_rows($q)){
									
									$result = mysql_fetch_assoc($q);
									$curr_qty = $member->ret_by("item_warehouse","id",$result['item_id'],"quantity"); //main item's quantity
									$tot_qty = $curr_qty+$qty; //after adding total quantity of main item
									
									$tot_qty_sale_item = ($result['quantity']*$result['grouping_qty'])-$qty;
									
									//update item quantity
									mysql_query("update item_warehouse set quantity='{$tot_qty}' where id='{$result['item_id']}'");
									
									if($result['grouping_qty']>1){ //if not indivisual
											
										if($tot_qty_sale_item>$result['grouping_qty']){
												
												$grp =(int) ($tot_qty_sale_item/$result['grouping_qty']);
												$indiv = $tot_qty_sale_item % $result['grouping_qty'];
												
												// $arx = ['group'=>$grp,'indivisual'=>$indiv];
												// print_r($arx);
												// exit()
												if($grp=="1"){
													
														mysql_query("update sale_item_wh set grouping='indivisual',grouping_qty='1',quantity='{$tot_qty_sale_item}',returned=true where id='{$result['id']}'");
													
												}else{
														
														mysql_query("update sale_item_wh set quantity='{$grp}',returned=true where id='{$result['id']}'");
														
												}
												
												
												
												if($indiv){
													
															
														$payload = array
														
															(
																"id"=>"",
																"inv"=>$result['inv'],
																"item_id"=>$result['item_id'],
																"item"=>$result['item'],
																"quantity"=>$indiv,
																"volume"=>$result['volume'],
																"unit"=>$result['unit'],
																"price_per_unit"=>$result['price_per_unit'],
																"grouping"=>"indivisual",
																"grouping_qty"=>"1",
																"returned"=>false,
																"reg_date"=>date("Y-m-d H:i:s")
															);
															$member->crud(array("act"=>"insert","table"=>"sale_item_wh","fields"=>$payload));
															
															$payload = array
																		
															(
																"id"=>"",
																"inv"=>$result['inv'],
																"item_id"=>$result['item_id'],
																"sale_item_id"=>$result['item_id'],
																"item"=>$result['item'],
																"quantity"=>$qty,
																"volume"=>$result['volume'],
																"unit"=>$result['unit'],
																"price_per_unit"=>$result['price_per_unit'],
																"price_per_unit"=>$remarks,
																"reg_date"=>date("Y-m-d H:i:s")
															);
																
															$member->crud(array("act"=>"insert","table"=>"sale_item_returned_wh","fields"=>$payload));
															echo json_encode(['status'=>'success']);
											
													
												}else{
													
													mysql_query("update sale_item_wh set quantity='{$grp}',returned=true where id='{$result['id']}'");
										
													$payload = array
																
													(
														"id"=>"",
														"inv"=>$result['inv'],
														"item_id"=>$result['item_id'],
														"sale_item_id"=>$result['item_id'],
														"item"=>$result['item'],
														"quantity"=>$qty,
														"volume"=>$result['volume'],
														"unit"=>$result['unit'],
														"price_per_unit"=>$result['price_per_unit'],
														"remarks"=>$remarks,
														"reg_date"=>date("Y-m-d H:i:s")
													);
																	
													$member->crud(array("act"=>"insert","table"=>"sale_item_returned_wh","fields"=>$payload));
													echo json_encode(['status'=>'success']);
													
												}
												
												
										}else{
											// echo "here3";exit();
												mysql_query("update sale_item_wh set grouping='indivisual',grouping_qty='1',quantity='{$tot_qty_sale_item}',returned=true where id='{$result['id']}'");
												
												$payload = array
															
												(
													"id"=>"",
													"inv"=>$result['inv'],
													"item_id"=>$result['item_id'],
													"sale_item_id"=>$result['item_id'],
													"item"=>$result['item'],
													"quantity"=>$qty,
													"volume"=>$result['volume'],
													"unit"=>$result['unit'],
													"price_per_unit"=>$result['price_per_unit'],
													"remarks"=>$remarks,
													"reg_date"=>date("Y-m-d H:i:s")
												);
																
												$member->crud(array("act"=>"insert","table"=>"sale_item_returned_wh","fields"=>$payload));
												echo json_encode(['status'=>'success']);
											
										}
									}else{
										// echo "here4";exit();
										mysql_query("update sale_item_wh set quantity='{$tot_qty_sale_item}',returned=true where id='{$result['id']}'");
										
											$payload = array
														
											(
												"id"=>"",
												"inv"=>$result['inv'],
												"item_id"=>$result['item_id'],
												"sale_item_id"=>$result['item_id'],
												"item"=>$result['item'],
												"quantity"=>$qty,
												"volume"=>$result['volume'],
												"unit"=>$result['unit'],
												"price_per_unit"=>$result['price_per_unit'],
												"remarks"=>$remarks,
												"reg_date"=>date("Y-m-d H:i:s")
											);
															
											$member->crud(array("act"=>"insert","table"=>"sale_item_returned_wh","fields"=>$payload));
											echo json_encode(['status'=>'success']);
									}
									
									 
									
									
									
									
									
									
									
							}else{
								echo json_encode(['status'=>'error','message'=>'An error occured while processing']);
								
							}
							
						}else{
							
								echo json_encode(['status'=>'error','message'=>'An error occured while processing']);
							
						}
					
				break;
				
					
					case "pur_rem_item":
					
						
						$item = trim(@$_REQUEST['item']);
						$q = mysql_query("delete from purchase_item where id='{$item}'");
						if($q){
							
								echo json_encode(["status"=>"success"]);
							
						}else{
								echo json_encode(["status"=>"success","message"=>"An error occured while processing"]);
						}
					
					break;
					
					case "pur_rem_paid":
					
						
						$paid = trim(@$_REQUEST['paid']);
						
						$q = mysql_query("delete from purchase_paid where id='{$paid}'");
						
						if($q){
							
								echo json_encode(["status"=>"success"]);
							
						}else{
								echo json_encode(["status"=>"success","message"=>"An error occured while processing"]);
						}
					
					break;
					
					case "sale_rem_paid":
					
						
						$paid = trim(@$_REQUEST['paid']);
						
						$q = mysql_query("delete from sale_paid where id='{$paid}'");
						
						if($q){
							
								echo json_encode(["status"=>"success"]);
							
						}else{
								echo json_encode(["status"=>"success","message"=>"An error occured while processing"]);
						}
					
					break;
					
					case "sale_rem_paid_wh":
					
						
						$paid = trim(@$_REQUEST['paid']);
						
						$q = mysql_query("delete from sale_paid_wh where id='{$paid}'");
						
						if($q){
							
								echo json_encode(["status"=>"success"]);
							
						}else{
								echo json_encode(["status"=>"success","message"=>"An error occured while processing"]);
						}
					
					break;
					
					
					
					case "pur_discard_inv":
					
						
						$inv = trim(@$_REQUEST['inv']);
						
						mysql_query("delete from purchase_invoice where id='{$inv}'");
						mysql_query("delete from purchase_item where inv='{$inv}'");
						mysql_query("delete from purchase_paid where inv='{$inv}'");
						
						echo json_encode(["status"=>"success"]);
					
					break;
					
					case "sale_discard_inv":
					
						
						$inv = trim(@$_REQUEST['inv']);
						
						mysql_query("delete from sale_invoice where id='{$inv}'");
						mysql_query("delete from sale_item where inv='{$inv}'");
						mysql_query("delete from sale_paid where inv='{$inv}'");
						
						echo json_encode(["status"=>"success"]);
					
					break;
					
					
					
					case "pur_add_paid":
					
						
						$inv = trim(@$_REQUEST['inv']);
						$paid = trim(@$_REQUEST['paid']);
						$payment_type = trim(@$_REQUEST['payment_type']);
					
						switch($payment_type){
							
							case "cash":
							
								$payload = array
				
								(
									"id"=>"",
									"inv"=>$inv,
									"type"=>"cash",
									"paid"=>$paid,
									"description"=>trim(@$_REQUEST['desc']),
									"reg_date"=>date("Y-m-d H:i:s")
								);
								$purchase_paid_id = $member->crud(array("act"=>"insert","table"=>"purchase_paid","fields"=>$payload));
								
								echo json_encode(['status'=>'success']);
								
							break;
							
							case "cheque":
							
								$payload = array
				
								(
									"id"=>"",
									"inv"=>$inv,
									"type"=>"cheque",
									"paid"=>$paid,
									"description"=>trim(@$_REQUEST['desc']),
									"reg_date"=>date("Y-m-d H:i:s")
								);
								
								
								
								$purchase_paid_id = $member->crud(array("act"=>"insert","table"=>"purchase_paid","fields"=>$payload));
								
								$payload = array
				
								(
									"id"=>"",
									"inv"=>$inv,
									"purchase_paid_id"=>$purchase_paid_id,
									"to_assigned"=>trim(@$_REQUEST['issue_to']),
									"bank"=>trim(@$_REQUEST['bank']),
									"c_number"=>trim(@$_REQUEST['c_number']),
									"dated"=>trim(date('Y-m-d',strtotime(@$_REQUEST['dated']))),
									"reg_date"=>date("Y-m-d H:i:s")
								);
								
								
								$member->crud(array("act"=>"insert","table"=>"purchase_paid_cheque","fields"=>$payload));
								
								echo json_encode(['status'=>'success']);
								
							break;
							
						}
						
					break;
					
					
					case "sale_add_paid":
					
					
						$inv = trim(@$_REQUEST['inv']);
						$paid = trim(@$_REQUEST['paid']);
						$payment_type = trim(@$_REQUEST['payment_type']);
					
						switch($payment_type){
							
							case "cash":
							
								$payload = array
				
								(
									"id"=>"",
									"inv"=>$inv,
									"type"=>"cash",
									"paid"=>$paid,
									"description"=>trim(@$_REQUEST['desc']),
									"reg_date"=>date("Y-m-d H:i:s")
								);
								$sale_paid_id = $member->crud(array("act"=>"insert","table"=>"sale_paid","fields"=>$payload));
								
								echo json_encode(['status'=>'success']);
								
							break;
							
							case "cheque":
							
								$payload = array
				
								(
									"id"=>"",
									"inv"=>$inv,
									"type"=>"cheque",
									"paid"=>$paid,
									"description"=>trim(@$_REQUEST['desc']),
									"reg_date"=>date("Y-m-d H:i:s")
								);
								
								
								
								$sale_paid_id = $member->crud(array("act"=>"insert","table"=>"sale_paid","fields"=>$payload));
								
								$payload = array
				
								(
									"id"=>"",
									"inv"=>$inv,
									"sale_paid_id"=>$sale_paid_id,
									"to_assigned"=>trim(@$_REQUEST['issue_to']),
									"bank"=>trim(@$_REQUEST['bank']),
									"c_number"=>trim(@$_REQUEST['c_number']),
									"dated"=>trim(date('Y-m-d',strtotime(@$_REQUEST['dated']))),
									"reg_date"=>date("Y-m-d H:i:s")
								);
								
								
								$member->crud(array("act"=>"insert","table"=>"sale_paid_cheque","fields"=>$payload));
								
								echo json_encode(['status'=>'success']);
								
							break;
							
						}
						
					break;
					
					case "sale_add_paid_wh":
					
					
					
						$inv = trim(@$_REQUEST['inv']);
						$paid = trim(@$_REQUEST['paid']);
						$payment_type = trim(@$_REQUEST['payment_type']);
					
						switch($payment_type){
							
							case "cash":
							
								$payload = array
				
								(
									"id"=>"",
									"inv"=>$inv,
									"type"=>"cash",
									"paid"=>$paid,
									"description"=>trim(@$_REQUEST['desc']),
									"reg_date"=>date("Y-m-d H:i:s")
								);
								$sale_paid_id = $member->crud(array("act"=>"insert","table"=>"sale_paid_wh","fields"=>$payload));
								
								echo json_encode(['status'=>'success']);
								
							break;
							
							case "cheque":
							
								$payload = array
				
								(
									"id"=>"",
									"inv"=>$inv,
									"type"=>"cheque",
									"paid"=>$paid,
									"description"=>trim(@$_REQUEST['desc']),
									"reg_date"=>date("Y-m-d H:i:s")
								);
								
								
								
								$sale_paid_id = $member->crud(array("act"=>"insert","table"=>"sale_paid_wh","fields"=>$payload));
								
								$payload = array
				
								(
									"id"=>"",
									"inv"=>$inv,
									"sale_paid_id"=>$sale_paid_id,
									"to_assigned"=>trim(@$_REQUEST['issue_to']),
									"bank"=>trim(@$_REQUEST['bank']),
									"c_number"=>trim(@$_REQUEST['c_number']),
									"dated"=>trim(date('Y-m-d',strtotime(@$_REQUEST['dated']))),
									"reg_date"=>date("Y-m-d H:i:s")
								);
								
								
								$member->crud(array("act"=>"insert","table"=>"sale_paid_cheque_wh","fields"=>$payload));
								
								echo json_encode(['status'=>'success']);
								
							break;
							
						}
						
					break;
					
					
					
					
					case "cheque_detail":
					
						$inv = trim(@$_REQUEST['inv']);
						$sale_paid_id = trim(@$_REQUEST['sale_paid_id']);
						$q = mysql_query("select * from sale_paid_cheque where inv='{$inv}' and sale_paid_id='{$sale_paid_id}'");
						if(mysql_num_rows($q)){
							
							$result  = mysql_fetch_assoc($q);
								
							?>
								<div class="form-group">
									<label>To</label>
									<input type="text" class="form-control" value='<?php echo ucwords($result['to_assigned']);?>' placeholder="Issued to" readonly/>
								</div>
								<div class="form-group">
									<label>Bank</label>
									<input type="text" class="form-control" value='<?php echo ucwords($result['bank']);?>' placeholder="Bank" readonly/>
								</div>
								<div class="form-group">
									<label>Cheque Number</label>
									<input type="text" class="form-control" value='<?php echo ucwords($result['c_number']);?>' placeholder="Cheque Number" readonly/>
								</div>
								<div class="form-group">
									<label>Cheque Date</label>
									<input type="text" class="form-control" value='<?php echo date("d, M Y",strtotime($result['dated']));?>' placeholder="Cheque dated" readonly/>									
								</div>
							<?php
						}
					
					break;
					
					case "cheque_detail_wh":
					
						$inv = trim(@$_REQUEST['inv']);
						$sale_paid_id = trim(@$_REQUEST['sale_paid_id']);
						$q = mysql_query("select * from sale_paid_cheque_wh where inv='{$inv}' and sale_paid_id='{$sale_paid_id}'");
						if(mysql_num_rows($q)){
							
							$result  = mysql_fetch_assoc($q);
								
							?>
								<div class="form-group">
									<label>To</label>
									<input type="text" class="form-control" value='<?php echo ucwords($result['to_assigned']);?>' placeholder="Issued to" readonly/>
								</div>
								<div class="form-group">
									<label>Bank</label>
									<input type="text" class="form-control" value='<?php echo ucwords($result['bank']);?>' placeholder="Bank" readonly/>
								</div>
								<div class="form-group">
									<label>Cheque Number</label>
									<input type="text" class="form-control" value='<?php echo ucwords($result['c_number']);?>' placeholder="Cheque Number" readonly/>
								</div>
								<div class="form-group">
									<label>Cheque Date</label>
									<input type="text" class="form-control" value='<?php echo date("d, M Y",strtotime($result['dated']));?>' placeholder="Cheque dated" readonly/>									
								</div>
							<?php
						}
					
					break;
					
					case "purchase_cheque_detail":
					
						$inv = trim(@$_REQUEST['inv']);
						$purchase_paid_id = trim(@$_REQUEST['purchase_paid_id']);
						$q = mysql_query("select * from purchase_paid_cheque where inv='{$inv}' and purchase_paid_id='{$purchase_paid_id}'");
						if(mysql_num_rows($q)){
							
							$result  = mysql_fetch_assoc($q);
								
							?>
								<div class="form-group">
									<label>To</label>
									<input type="text" class="form-control" value='<?php echo ucwords($result['to_assigned']);?>' placeholder="Issued to" readonly/>
								</div>
								<div class="form-group">
									<label>Bank</label>
									<input type="text" class="form-control" value='<?php echo ucwords($result['bank']);?>' placeholder="Bank" readonly/>
								</div>
								<div class="form-group">
									<label>Cheque Number</label>
									<input type="text" class="form-control" value='<?php echo ucwords($result['c_number']);?>' placeholder="Cheque Number" readonly/>
								</div>
								<div class="form-group">
									<label>Cheque Date</label>
									<input type="text" class="form-control" value='<?php echo date("d, M Y",strtotime($result['dated']));?>' placeholder="Cheque dated" readonly/>									
								</div>
							<?php
						}
					
					break;
					
					case "create_payment_voucher":
					
					switch(@$_REQUEST['method']){
						
						
						case "cash":
									
							$company = trim(@$_REQUEST['company']);
							$company = $member->ret_by("company","salt",$company,"id");
							$payment_method = "cash";
							$pv_number = trim(@$_REQUEST['pv_number']);
							$issue_date = trim(@$_REQUEST['issue_date']);
							$issue_to = trim(@$_REQUEST['issue_to']);
							$cash_amount = trim(@$_REQUEST['cash_amount']);
							$bank="";
							$cheque_number="";
							$cheque_amount="";
							$cheque_date="";
							$description = trim(@$_REQUEST['description']);
							$salt = $member->saltish("payment_voucher",5);
									
							echo $member->create_payment_voucher($company,$payment_method,$pv_number,$issue_date,$issue_to,$cash_amount,$bank,$cheque_number,$cheque_amount,$cheque_date,$description,$salt);
									
							
							break;
							
							case "cheque":
									
							$company = trim(@$_REQUEST['company']);
							$company = $member->ret_by("company","salt",$company,"id");
							$payment_method = "cheque";
							$pv_number = trim(@$_REQUEST['pv_number']);
							$issue_date = trim(@$_REQUEST['issue_date']);
							$issue_to = trim(@$_REQUEST['issue_to']);
							$cash_amount = "";
							$bank = trim(@$_REQUEST['bank']);
							$cheque_number=trim(@$_REQUEST['cheque_number']);
							$cheque_amount=trim(@$_REQUEST['cheque_amount']);
							$cheque_date=trim(@$_REQUEST['cheque_date']);
							$description = trim(@$_REQUEST['description']);
							$salt = $member->saltish("payment_voucher",5);
									
							echo $member->create_payment_voucher($company,$payment_method,$pv_number,$issue_date,$issue_to,$cash_amount,$bank,$cheque_number,$cheque_amount,$cheque_date,$description,$salt);
									
							
							break;
						
						
					}
					 
					
					
					
				break;
				
				
				
				case "create_receive_voucher":
					
					switch(@$_REQUEST['method']){
						
						
						case "cash":
									
							$company = trim(@$_REQUEST['company']);
							$company = $member->ret_by("company","salt",$company,"id");
							$payment_method = "cash";
							$rv_number = trim(@$_REQUEST['rv_number']);
							$issue_date = trim(@$_REQUEST['issue_date']);
							$issue_from = trim(@$_REQUEST['issue_from']);
							$cash_amount = trim(@$_REQUEST['cash_amount']);
							$bank="";
							$cheque_number="";
							$cheque_amount="";
							$cheque_date="";
							$description = trim(@$_REQUEST['description']);
							$salt = $member->saltish("receive_voucher",5);
									
							echo $member->create_receive_voucher($company,$payment_method,$rv_number,$issue_date,$issue_from,$cash_amount,$bank,$cheque_number,$cheque_amount,$cheque_date,$description,$salt);
									
							
							break;
							
							case "cheque":
									
							$company = trim(@$_REQUEST['company']);
							$company = $member->ret_by("company","salt",$company,"id");
							$payment_method = "cheque";
							$rv_number = trim(@$_REQUEST['rv_number']);
							$issue_date = trim(@$_REQUEST['issue_date']);
							$issue_from = trim(@$_REQUEST['issue_from']);
							$cash_amount = "";
							$bank = trim(@$_REQUEST['bank']);
							$cheque_number=trim(@$_REQUEST['cheque_number']);
							$cheque_amount=trim(@$_REQUEST['cheque_amount']);
							$cheque_date=trim(@$_REQUEST['cheque_date']);
							$description = trim(@$_REQUEST['description']);
							$salt = $member->saltish("payment_voucher",5);
									
							echo $member->create_receive_voucher($company,$payment_method,$rv_number,$issue_date,$issue_from,$cash_amount,$bank,$cheque_number,$cheque_amount,$cheque_date,$description,$salt);
									
							
							break;
						
						
					}
					 
					
					
					
				break;
				
				
				case "create_bank_account":
					
					$name = $_REQUEST['name'];
					
					$address = $_REQUEST['address'];
					
					$account = $_REQUEST['account'];
					
					$company = $_REQUEST['company'];
					
					$created_by = $_SESSION['clerk']['id'];
					
					$salt = $member->saltish("bank_account",15);
					
					
					echo $member->create_bank_account($name,$address,$account,$company,$created_by,$salt);
					
				break;
	
				default:
					
						echo json_encode(array("status"=>"error","message"=>"invalid action"));
				
				break;
				
				case "recent_activities":
				
					$member->recent_activities("company");
					$member->recent_activities("employee");
				
				break;
				
				case "recent_activities_esp":
				
					$member->recent_activities_esp("company",$_REQUEST['company']);
					$member->recent_activities("employee",$_REQUEST['company']);
				
				break;
				
				case "notifications":
				
					$member->notifications("visa");
					$member->notifications("insurance");
					$member->notifications("vehicle_malkiya");
					$member->notifications("vehicle_insurance");
					$member->notifications("sale-item-notif");
					$member->notifications("sale-item-notif-wh");
					$member->notifications("sale-invoice-aging");
					$member->notifications("sale-invoice-aging-wh");
					
				break;
				
				case "create_attendace":
					
					$company = trim(@$_REQUEST['company']);
					$employee = trim(@$_REQUEST['employee']);
					$year = trim(@$_REQUEST['year']);
					$month = trim(@$_REQUEST['month']);
					$days = trim(@$_REQUEST['days']);
					
					if(!empty($company) AND !empty($employee) AND !empty($year) AND !empty($month) AND !empty($days)){
							$company = $member->ret_by("company","salt",$company,"id");
								$q = mysql_query("select * from attendance where employee='{$employee}' and company='{$company}' and year='{$year}' and month='{$month}'");
								if(mysql_num_rows($q)>0){
								
									echo json_encode(array("status"=>"error","message"=>"Exists (?????) "));
								
								}else{
									$q = mysql_query("insert into attendance values ('','{$employee}','{$company}','{$year}','{$month}','{$days}','{$_SESSION['clerk']['id']}',(current_timestamp))");
									if($q){
										echo json_encode(array("status"=>"success","message"=>"Created (????) "));
									}else{
										echo json_encode(array("status"=>"success","message"=>"Fail (???) "));
									}
								}
								
						
					}else{
						echo json_encode(array("status"=>"error","message"=>"Required (?????) "));
					}
					 
					
				break;
				
				case "view_attendace":
					
					$company = trim(@$_REQUEST['company']);
					$company = $member->ret_by("company","salt",$company,"id");
					$year = trim(@$_REQUEST['year']);
					$month = trim(@$_REQUEST['month']);
					$month_days = date('t', mktime(0, 0, 0, $month, 1, $year))+1;
					$count=1;
					$q = mysql_query("select * from employee where company = '{$company}' and created_by='{$_SESSION['clerk']['id']}' order by id DESC");
					
					if(mysql_num_rows($q)>0){
					?>
					 <div class="row">
                        <div class="col-md-12">
                               
                                <div class="panel-body">
                                    <!--Table Wrapper Start-->
                                    <div class="table-responsive ls-table">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name (اسم) </th>
                                                <?php 
													for($i=1;$i<$month_days;$i++){
										
															echo "<th>{$i}</th>";
											
													}
												?>
                                            </tr>
                                            </thead>
                                            <tbody>
					<?php
						while($result = mysql_fetch_assoc($q)){
							
								?>
								
									
                                            <tr>
												<td><?php echo $count;$count++;?></td>
                                                <td><?php echo $result['name']; ?></td>
                                                <?php $member->ret_attendance($result['company'],$result['id'],$year,$month,$month_days); ?>
												
                                            </tr>
                                            
                                         
								
								<?php
						
						}
						?>
						   </tbody>
                                        </table>
                                    </div>
                                    <!--Table Wrapper Finish-->
                                </div>
                        </div>
                    </div>
						<?php
					
					}else{
						echo "<blockquote>Empty</blockquote>";
					}
					
				break;
				
				case "view_attendace_esp":
					
					$company = trim(@$_REQUEST['company']);
					$company = $member->ret_by("company","salt",$company,"id");
					$year = trim(@$_REQUEST['year']);
					$month = trim(@$_REQUEST['month']);
					$month_days = date('t', mktime(0, 0, 0, $month, 1, $year))+1;
					$count=1;
					$q = mysql_query("select * from employee where company = '{$company}' and created_by='{$_SESSION['clerk']['id']}' order by id DESC");
					
					if(mysql_num_rows($q)>0){
					?>
					 <div class="row">
                        <div class="col-md-12">
                               
                                <div class="panel-body">
                                    <!--Table Wrapper Start-->
                                    <div class="table-responsive ls-table">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <?php 
													for($i=1;$i<$month_days;$i++){
										
															echo "<th>{$i}</th>";
											
													}
												?>
                                            </tr>
                                            </thead>
                                            <tbody>
					<?php
						while($result = mysql_fetch_assoc($q)){
							
								?>
								
									
                                            <tr>
												<td><?php echo $count;$count++;?></td>
                                                <td><?php echo $result['name']; ?></td>
                                                <?php $member->ret_attendance_esp($result['company'],$result['id'],$year,$month,$month_days); ?>
												
                                            </tr>
                                            
                                         
								
								<?php
						
						}
						?>
						   </tbody>
                                        </table>
                                    </div>
                                    <!--Table Wrapper Finish-->
                                </div>
                        </div>
                    </div>
						<?php
					
					}else{
						echo "<blockquote>Empty</blockquote>";
					}
					
				break;
				
				case "attendance_view_months":
				
					$company = trim(@$_REQUEST['company']);
					$company = $member->ret_by("company","salt",$company,"id");
					$year = trim(@$_REQUEST['year']);
					
					$q = mysql_query("select distinct month from attendance where company ={$company} and year={$year} and created_by='{$_SESSION['clerk']['id']}'");
					if(mysql_num_rows($q)>0){
						?>
						<select id="months_view"  type="text" class="form-control">
						<?php
						$data = "";
						while($result = mysql_fetch_assoc($q)){
							
							$data.="<option value='{$result['month']}'>".date('F', mktime(0,0,0,$result['month'], 1, date('Y')))."</option>";
							
						}
						echo $data;
						?>
						</select>
						<?php
						
					}
				
				break;
				
					case "refresh_view_attendance_years":
				
					$company = trim(@$_REQUEST['company']);
					$company = $member->ret_by("company","salt",$company,"id");
					
					?>
					<select onchange="view_years()" id="years_view" type="text" class="form-control">
													
					<?php
														
						$q = mysql_query("select distinct year from attendance where company='{$company}' and created_by='{$_SESSION['clerk']['id']}'");
															
							if(mysql_num_rows($q)>0)
							{
							?>
							<option value=""></option>
							<?php
								while($result = mysql_fetch_assoc($q))
								{
									echo "<option value='{$result['year']}'>{$result['year']}</option>";
								}
																
							}
					?>
					</select>
					<?php
				
				break;
				
				case "create_overtime":
					
					$company = trim(@$_REQUEST['company']);
					$employee = trim(@$_REQUEST['employee']);
					$year = trim(@$_REQUEST['year']);
					$month = trim(@$_REQUEST['month']);
					$day = trim(@$_REQUEST['day']);
					$hrs = trim(@$_REQUEST['hrs']);
					$mins = trim(@$_REQUEST['mins']);
					
					if(!empty($company) AND !empty($employee) AND !empty($year) AND !empty($month) AND !empty($day) AND !empty($hrs) AND !empty($mins)){
							$company = $member->ret_by("company","salt",$company,"id");
							
					$q = mysql_query("select * from overtime where company = '{$company}' and created_by='{$_SESSION['clerk']['id']}' and employee='{$employee}' and year='{$year}' and month='{$month}' and day='{$day}'");
					
					if(mysql_num_rows($q)>0){
						
							echo json_encode(array("status"=>"error","message"=>"Overtime already added"));
						
					}else{
							
							$q = mysql_query("insert into overtime values ('','{$company}','{$_SESSION['clerk']['id']}','{$employee}','{$year}','{$month}','{$day}','{$hrs}','{$mins}',(current_timestamp))");
							if($q){
								echo json_encode(array("status"=>"success","message"=>"Overtime Added"));
							}else{
								echo json_encode(array("status"=>"error","message"=>"An error occured while adding overtime"));
							}
						
					}
								
						
					}else{
						echo json_encode(array("status"=>"error","message"=>"All fields are required"));
					}
					 
				
				break;
				
				case "overview_getyears":
				
					$company = trim(@$_REQUEST['company']);
					$company = $member->ret_by("company","salt",$company,"id");
					
					?>
					<label>Select Year*</label>
					<select onchange="get_overview('months')" id="overview_years_val" type="text" class="form-control">
													
					<?php
														
						$q = mysql_query("select distinct year from overtime where company='{$company}' and created_by='{$_SESSION['clerk']['id']}'");
															
							if(mysql_num_rows($q)>0)
							{
							?>
							<option value=""></option>
							<?php
								while($result = mysql_fetch_assoc($q))
								{
									echo "<option value='{$result['year']}'>{$result['year']}</option>";
								}
																
							}
					?>
					</select>
					<?php
				
				break;
				
				case "overview_getmonths":
				
					$company = trim(@$_REQUEST['company']);
					$company = $member->ret_by("company","salt",$company,"id");
					$year = trim(@$_REQUEST['year']);
					
					?>
					<label>Select Month*</label>
					<select onchange="get_overview('days')" id="overview_months_val" type="text" class="form-control">
													
					<?php
														
						$q = mysql_query("select distinct month from overtime where company ={$company} and year={$year} and created_by='{$_SESSION['clerk']['id']}'");
															
							if(mysql_num_rows($q)>0)
							{
							?>
							<option value=""></option>
							<?php
								$data="";
								while($result = mysql_fetch_assoc($q))
								{
									$data.="<option value='{$result['month']}'>".date('F', mktime(0,0,0,$result['month'], 1, date('Y')))."</option>";
								}
								echo $data;
																
							}
					?>
					</select>
					<?php
				
				break;
				
				case "overview_getdays":
				
					$company = trim(@$_REQUEST['company']);
					$company = $member->ret_by("company","salt",$company,"id");
					$year = trim(@$_REQUEST['year']);
					$month = trim(@$_REQUEST['month']);
					
					?>
					<label>Select Day*</label>
					<select onchange="get_overview('overview_results')" id="overview_days_val" type="text" class="form-control">
													
					<?php
														
						$q = mysql_query("select distinct day from overtime where company ={$company} and year={$year} and month={$month} and created_by='{$_SESSION['clerk']['id']}' order by day ASC");
															
							if(mysql_num_rows($q)>0)
							{
							?>
							<option value=""></option>
							<?php
								while($result = mysql_fetch_assoc($q))
								{
									echo "<option value='{$result['day']}'>{$result['day']}</option>";
								}
							}
					?>
					</select>
					<?php
				
				break;
				
				case "overview_results":
				
					$company = trim(@$_REQUEST['company']);
					$company = $member->ret_by("company","salt",$company,"id");
					$year = trim(@$_REQUEST['year']);
					$month = trim(@$_REQUEST['month']);
					$day = trim(@$_REQUEST['day']);
					
					?>
                                
                                <div class="panel-body">
                                    <!--Table Wrapper Start-->
                                    <div class="table-responsive ls-table">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th><strong>#</strong></th>
                                                <th><strong>Employee</strong></th>
                                                <th><strong>Hours</strong></th>
                                                <th><strong>Mins</strong></th>
                                            </tr>
                                            </thead>
                                            <tbody>
													
					<?php
														
						$q = mysql_query("select * from employee where company ={$company} and created_by='{$_SESSION['clerk']['id']}'");
															
							if(mysql_num_rows($q)>0)
							{
							?>
							<?php
								$count = 1;
								while($result = mysql_fetch_assoc($q))
								{
									?>
										<tr>
											<td><?php echo $count; $count++;?></td>
											<td><?php echo $result['name'];?></td>
											<?php 
												$member->val_emp_overtime($company,$result['id'],$year,$month,$day);
											?>
										</tr>
									<?php
								}
							}
					?>
											</tbody>
                                        </table>
                                    </div>
                                </div>
					<?php
				
				break;
			
				case "sheet":
						
						$company = trim(@$_REQUEST['company']);
						$company = $member->ret_by("company","salt",$company,"id");
						$year = trim(@$_REQUEST['year']);
						$month = trim(@$_REQUEST['month']);
						$count=1;
						$q = mysql_query("select * from employee where company = '{$company}' and created_by='{$_SESSION['clerk']['id']}' order by id DESC");
						
						if(mysql_num_rows($q)>0){
						?>
						 <div class="row">
							<div class="col-md-12">
								   
									<div class="panel-body">
										<span id='notify'></span>
										<!--Table Wrapper Start-->
										<div class="table-responsive ls-table">
											<table class="table table-bordered">
												<thead>
												<tr>
													<th><strong>#</strong></th>
													<th><strong>Name</strong></th>
													<th><strong>Allowance</strong></th>
													<th><strong>Other Allw.</strong></th>
													<th><strong>Adv Ded.</strong></th>
													<th><strong>Other Ded.</strong></th>
													<th><strong>Action</strong></th>
												</tr>
												</thead>
												<tbody>
							<?php
							while($result = mysql_fetch_assoc($q)){
								
									?>
												<tr>
													<td><?php echo $count;$count++;?></td>
													<td><?php echo $result['name']; ?></td>
													<?php 
														$member->val_emp_salary($company,$result['id'],$year,$month);
													?>
													
												</tr>
									
									<?php
							
							}
							?>
							   </tbody>
											</table>
										</div>
										<!--Table Wrapper Finish-->
									</div>
							</div>
						</div>
							<?php
						
						}else{
							echo "<blockquote>Empty</blockquote>";
						}
						
					break;
					
					case "create_salary":
					
						$company = trim(@$_REQUEST['company']);
						$company = $member->ret_by("company","salt",$company,"id");
						$employee = trim(@$_REQUEST['employee']);
						$year = trim(@$_REQUEST['year']);
						$month = trim(@$_REQUEST['month']);
						$month_days = date('t', mktime(0, 0, 0, $month, 1, $year));
						if(!empty($company) and !empty($employee) and !empty($year) and !empty($month)){
							
								$emp_info = $member->emp_info($employee,$company);
								if($emp_info['status']=="success"){
												
											$q = mysql_query("select * from salary where company = {$company} and created_by = '{$_SESSION['clerk']['id']}' and employee={$employee} and year={$year} and month={$month}");
											if(mysql_num_rows($q)>0){
													echo json_encode(array("status"=>"error","message"=>"Salary already added"));
													exit();
											}
											
											$salary_per_day = $emp_info['message']['basic_salary']/$month_days;
											$salary_per_min = $salary_per_day/540;
											
											
											$present = $member->emp_attendance($emp_info['message']['company'],$emp_info['message']['id'],$year,$month);
											$present_val =$present*$salary_per_day;
											
											
											$overtime = $member->emp_overtime($emp_info['message']['company'],$emp_info['message']['id'],$year,$month);
											if($overtime){
												$overtime = array_sum($member->emp_overtime($emp_info['message']['company'],$emp_info['message']['id'],$year,$month));
											}else{
												$overtime = 0;
											}
											$overtime_val=$overtime*$salary_per_min;
											
											$allowance = trim(@$_REQUEST['alw']);
											$other_allowance = trim(@$_REQUEST['otralw']);
											
											$advance = trim(@$_REQUEST['adv']);
											$other_deduction = trim(@$_REQUEST['otrded']);
											
											$gross_salary = $present_val+$overtime_val+$allowance+$other_allowance;
											$total_deduction = $advance+$loan+$other_deduction;
											$salary_to_be_paid = $gross_salary-$total_deduction;
											
											$q = mysql_query("insert into salary values('','{$company}','{$_SESSION['clerk']['id']}','{$emp_info['message']['id']}','{$year}','{$month}','{$present}','{$present_val}','{$overtime}','{$overtime_val}','{$allowance}','{$other_allowance}','{$gross_salary}','{$advance}','{$other_deduction}','{$total_deduction}','{$salary_to_be_paid}',(current_timestamp))");
											
											if($q){
													
													echo json_encode(array("status"=>"success","message"=>"Salary added for Employee : {$emp_info['message']['name']}"));
											}else{
													echo json_encode(array("status"=>"error","message"=>"An error occurred while creating salary"));
											}
											
											
											
											
									
								}else{
									
										echo json_encode(array("status"=>"error","message"=>$emp_info['message']));
									
								}
							
						}else{
							
								echo json_encode(array("status"=>"error","message"=>"All fields required"));
							
						}
						
						
						
					
					break;
					
					case "salary_years":
					
						$company = trim(@$_REQUEST['company']);
						$company = $member->ret_by("company","salt",$company,"id");
						
						$q = mysql_query("select distinct year from salary where company={$company} and created_by='{$_SESSION['clerk']['id']}'");
						
						if(mysql_num_rows($q)){
							?>
								<label>Year*</label>
								<select onchange="get_salary('months')" type="text" class="form-control" id="view_salary_years">
									<option value=""></option>
								
							<?php
								while($result = mysql_fetch_assoc($q)){
											
											?>
												<option value="<?php echo $result['year']; ?>"><?php echo $result['year']; ?></option>
											<?php 
											
								}
						?>
						
								</select>
							
						<?php						
						}else{
						
						}
					
					break;
					
					case "salary_months":
					
						$company = trim(@$_REQUEST['company']);
						$company = $member->ret_by("company","salt",$company,"id");
						$year = trim(@$_REQUEST['year']);
						
						$q = mysql_query("select distinct month from salary where company={$company} and created_by='{$_SESSION['clerk']['id']}' and year={$year}");
						
						if(mysql_num_rows($q)){
							?>
								<label>Month*</label>
								<select onchange="get_salary('view_stored_sheet')" type="text" class="form-control" id="view_salary_months">
									<option value=""></option>
								
							<?php
								while($result = mysql_fetch_assoc($q)){
											
											?>
												<option value="<?php echo $result['month']; ?>"><?php echo date('F', mktime(0,0,0,$result['month'], 1, date('Y'))); ?></option>
											<?php 
											
								}
						?>
						
								</select>
							
						<?php						
						}else{
						
						}
					
					break;
					
					case "view_stored_sheet":
					
						$company = trim(@$_REQUEST['company']);
						$company = $member->ret_by("company","salt",$company,"id");
						$year = trim(@$_REQUEST['year']);
						$month = trim(@$_REQUEST['month']);
						
						$q = mysql_query("select * from employee where company={$company} and created_by='{$_SESSION['clerk']['id']}'");
						
						if(mysql_num_rows($q)){
							
								?>
								
								<div class="panel-body">
										<span id='notify'></span>
										<!--Table Wrapper Start-->
										<div class="table-responsive ls-table">
											<table class="table table-bordered">
												<thead>
												<tr>
													<th><strong>#</strong></th>
													<th><strong>Name</strong></th>
													<th><strong>Basic Salary</strong></th>
													<th><strong>Present</strong></th>
													<th><strong>Present R.O</strong></th>
													<th><strong>O.time</strong></th>
													<th><strong>O.time R.O</strong></th>
													<th><strong>Allowance</strong></th>
													<th><strong>Other Allowance</strong></th>
													<th><strong>Gross Salary</strong></th>
													<th><strong>Adv.Ded</strong></th>
													<th><strong>Other Ded.</strong></th>
													<th><strong>Total Ded.</strong></th>
													<th><strong>Salary to be Paid</strong></th>
												</tr>
												</thead>
												<tbody>
							<?php
							$count=1;
							while($result = mysql_fetch_assoc($q)){
								
									?>
												<tr>
													<td><?php echo $count;$count++;?></td>
													<td><?php echo $result['name']; ?></td>
													<td><?php echo $result['basic_salary']; ?></td>
													<?php 
														$member->ret_salary_sheet($company,$result['id'],$year,$month);
													?>
													
												</tr>
									
									<?php
							
							}
							?>
							   </tbody>
											</table>
										</div>
										<!--Table Wrapper Finish-->
									</div>
								
								<?php 
							
						}else{
						
						}
					
					break;
					
					case "payment_method":
					
						$method = @$_REQUEST['method'];
						
						switch($method){
							
							case "cash":
							
								?>
								
													<div class="form-group">
														<label>PV Number</label>
														<input id="pv_number" class="form-control" placeholder="Enter PV number"/>
													</div>
													<div class="form-group">
														<label>Date</label>
														<input id="issue_date" name="datepicker" class="form-control" placeholder="Enter Date"/>
													</div>
													<div class="form-group">
														<label>To</label>
														<input id="issue_to" type="text" class="form-control" placeholder="Enter To"/>
													</div>
													<div class="form-group">
														<label>Cash Amount</label>
														<input type="number" id="cash_amount" class="form-control" placeholder="Enter Cash"/>
													</div>
													<div class="form-group">
														<label>Description</label>
														<textarea type="text" id="description" class="form-control" placeholder="Enter Description"></textarea>
													</div>
													<div class="form-group">
														<label>Action</label>
														<button onclick="create_payment_voucher('cash')" class="btn btn-primary full-width">Create Voucher</button>
													</div>
													<script>$( 'input[name=datepicker]' ).datetimepicker({timepicker:false,format:'Y-m-d'});</script>
										
								
								<?php
								
							break;
							
							case "cheque":
							
								?>
								
													<div class="form-group">
														<label>PV Number</label>
														<input id="pv_number" class="form-control" placeholder="Enter PV number"/>
													</div>
													<div class="form-group">
														<label>Date</label>
														<input id="issue_date" name="datepicker" class="form-control" placeholder="Enter Date"/>
													</div>
													<div class="form-group">
														<label>To</label>
														<input id="issue_to" type="text" class="form-control" placeholder="Enter To"/>
													</div>
													<div class="form-group">
														<label>Bank</label>
														<input id="bank" type="text" class="form-control" placeholder="Enter Bank"/>
													</div>
													<div class="form-group">
														<label>Cheque Number</label>
														<input id="cheque_number" type="text" class="form-control" placeholder="Enter cheque number"/>
													</div>
													<div class="form-group">
														<label>Check Amount</label>
														<input id="cheque_amount" type="number" class="form-control" placeholder="Enter cheque amount"/>
													</div>
													<div class="form-group">
														<label>Cheque Date</label>
														<input id="cheque_date" name="datepicker" type="text" name="datepicker" class="form-control" placeholder="Enter cheque date"/>
													</div>
													<div class="form-group">
														<label>Description</label>
														<textarea type="text" id="description" class="form-control" placeholder="Enter Description"></textarea>
													</div>
													
													<div class="form-group">
														<label>Action</label>
														<button onclick="create_payment_voucher('cheque')" class="btn btn-primary full-width">Create Voucher</button>
													</div>
													<script>$( 'input[name=datepicker]' ).datetimepicker({timepicker:false,format:'Y-m-d'});</script>
								
								<?php
								
							break;
							
							
						}
					
					
					break;
					
					case "receive_method":
					
						$method = @$_REQUEST['method'];
						
						switch($method){
							
							case "cash":
							
								?>
								
													<div class="form-group">
														<label>RV Number</label>
														<input id="rv_number" class="form-control" placeholder="Enter RV number"/>
													</div>
													<div class="form-group">
														<label>Date</label>
														<input id="issue_date" name="datepicker" class="form-control" placeholder="Enter Date"/>
													</div>
													<div class="form-group">
														<label>From</label>
														<input id="issue_from" type="text" class="form-control" placeholder="Enter From"/>
													</div>
													<div class="form-group">
														<label>Cash Amount</label>
														<input type="number" id="cash_amount" class="form-control" placeholder="Enter Cash"/>
													</div>
													<div class="form-group">
														<label>Description</label>
														<textarea type="text" id="description" class="form-control" placeholder="Enter Description"></textarea>
													</div>
													<div class="form-group">
														<label>Action</label>
														<button onclick="create_receive_voucher('cash')" class="btn btn-primary full-width">Create Voucher</button>
													</div>
													<script>$( 'input[name=datepicker]' ).datetimepicker({timepicker:false,format:'Y-m-d'});</script>
										
								
								<?php
								
							break;
							
							case "cheque":
							
								?>
								
													<div class="form-group">
														<label>RV Number</label>
														<input id="rv_number" class="form-control" placeholder="Enter RV number"/>
													</div>
													<div class="form-group">
														<label>Date</label>
														<input id="issue_date" name="datepicker" class="form-control" placeholder="Enter Date"/>
													</div>
													<div class="form-group">
														<label>From</label>
														<input id="issue_from" type="text" class="form-control" placeholder="Enter From"/>
													</div>
													<div class="form-group">
														<label>Bank</label>
														<input id="bank" type="text" class="form-control" placeholder="Enter Bank"/>
													</div>
													<div class="form-group">
														<label>Cheque Number</label>
														<input id="cheque_number" type="text" class="form-control" placeholder="Enter cheque number"/>
													</div>
													<div class="form-group">
														<label>Check Amount</label>
														<input id="cheque_amount" type="number" class="form-control" placeholder="Enter cheque amount"/>
													</div>
													<div class="form-group">
														<label>Cheque Date</label>
														<input id="cheque_date" name="datepicker" type="text" name="datepicker" class="form-control" placeholder="Enter cheque date"/>
													</div>
													<div class="form-group">
														<label>Description</label>
														<textarea type="text" id="description" class="form-control" placeholder="Enter Description"></textarea>
													</div>
													
													<div class="form-group">
														<label>Action</label>
														<button onclick="create_receive_voucher('cheque')" class="btn btn-primary full-width">Create Voucher</button>
													</div>
													<script>$( 'input[name=datepicker]' ).datetimepicker({timepicker:false,format:'Y-m-d'});</script>
								
								<?php
								
							break;
							
							
						}
					
					
					break;
					
					// case "rep-sale-inv-stats":
						
						
							// $company = trim(@$_REQUEST['company']);
							// $from = trim(@$_REQUEST['from']);
							// $to = trim(@$_REQUEST['to']);
						
							// if($company AND $from AND $to){
								
								// $q = mysql_query("SELECT COUNT(id) AS 'tot_invoices',DATE(reg_date) AS 'reg_date' FROM sale_invoice where reg_date BETWEEN '{$from}' AND '{$to}' GROUP BY DATE(reg_date) ORDER BY reg_date ASC;");
								
								// if(mysql_num_rows($q)){
									
									// $arr[] = null;

									// while($result = mysql_fetch_assoc($q)){
										// $result['reg_date'] = date("d/M/y",strtotime($result['reg_date']));
										// $arr[] = $result;
									// }
									
									// echo json_encode(['status'=>'success','message'=>array_filter($arr)]);
								// }else{
									// echo json_encode(['status'=>'error','message'=>'Empty']);
								// }
								
							// }else{
								// echo json_encode(['status'=>'error','message'=>'All fields required']);
							// }
							
							
						
							
						
					// break;
					
					case "reports":
					
						$company = trim(@$_REQUEST['company']);
						$selected = trim(@$_REQUEST['customer']);
						$report_type = trim(@$_REQUEST['report_type']);
						$from = trim(@$_REQUEST['from']);
						$to = trim(@$_REQUEST['to']);
						
						$payload = null;
						
						
						switch($report_type){
						
							case "purchase":
							
							
								$selected == "all" ? $payload = null : $payload = "AND supplier = '{$selected}'";
							
							break;
							
							
							case "sale":
							
							
								$selected == "all" ? $payload = null : $payload = "AND customer = '{$selected}'";
							
							break;
						
							
						}
						
						
						switch($report_type){
							
							
							case "sale":
								
								$q = mysql_query("SELECT * FROM sale_invoice where company='{$company}' AND reg_date BETWEEN '{$from}' AND '{$to}' and status=true {$payload}");
								
								if(mysql_num_rows($q)){
									
								?>
									<div class="table-responsive ls-table">
										<table class="table table-bordered datatable">
											<thead>
											<tr>
												<th><strong>#</strong></th>
												<th><strong>Type</strong></th>
												<th><strong>Amount</strong></th>
												<th><strong>Discount</strong></th>
												<th><strong>Paid</strong></th>
												<th><strong>Remainig</strong></th>
												<th><strong>Due</strong></th>
												<th><strong>Pass Due</strong></th>
												<th><strong>Created</strong></th>
											</tr>
											</thead>
											<tbody>
												<?php
												
												while($result = mysql_fetch_assoc($q)){
													$invdtls = $member->retrieve(['act'=>'sale_invoice_details','inv'=>$result['id'],'type'=>$result['type']]);
													$redir=null;
													$result['type']=="credit" ? $redir="sale_invoice_detail?inv={$result['id']}" : $redir="sale_cash_invoice_detail?inv={$result['id']}";
													
																									
													$calc_net[] = $invdtls['net'];
													$calc_sale_paid[] = $invdtls['tot_paid'];
													$calc_remaining[] = $invdtls['remaining'];
													
													
													
													?>
														<tr>
															<td><a href="<?php echo $redir?>"><?php echo str_pad($result['id'], 8, '0', STR_PAD_LEFT); ?></a></td>
															
															<td><?php echo ucwords($result['type']); ?></td>
															<td><?php echo $invdtls['net'];?></td>
															<td><?php echo $result['discount']; ?></td>
															<td><?php echo $invdtls['tot_paid']; ?></td>
															<td><?php echo $invdtls['remaining']; ?></td>
															<td>
																<?php 
																	$due_date = $member->retrieve(['act'=>'due_days','date'=>$result['reg_date'],'days'=>$result['aging']]);
																	echo date("d, M Y",strtotime($due_date));
																?>
															</td>
															<td><?php echo $member->retrieve(['act'=>'past_due_days','date'=>$due_date]) ?></td>
															<!--<td><?php echo date("d, M Y",strtotime($result['reg_date'])); ?></td>-->
															<td><?php echo date("d, M Y",strtotime($result['reg_date']));?></td>
															
														</tr>
														
													
													<?php
													
												}
												?>
											</tbody>
											<tfoot>
												<th>Total</th>
												<th>-</th>
												<th><?php echo array_sum($calc_net);?></th>
												<th>-</th>
												<th><?php echo array_sum($calc_sale_paid);?></th>
												<th><?php echo array_sum($calc_remaining);?></th>
												<th>-</th>
												<th>-</th>
												<th>-</th>
											</tfoot>
										</table>
										<script>
											retrieve({"act":"tabletools-reports","title":"Al Dakhliya Plastic(Factory)","tagline": "Customer Name : <?php echo ucwords($member->ret_by("customer","id",$selected,"name")); ?> <span style='float:right;'>Factory Sale Invoice Report From: <?php echo date("d, M Y",strtotime($from)); ?> to <?php echo date("d, M Y",strtotime($to)); ?></span>"})
										</script>
									</div>
								<?php	
								}else{
									echo "<blockquote>Empty</blockquote>";
									
								}
							
							
							break;
							
							
							
							
							
							
							case "purchase":
								
								$q = mysql_query("SELECT * FROM purchase_invoice where company='{$company}' AND reg_date BETWEEN '{$from}' AND '{$to}' {$payload}");
								
								if(mysql_num_rows($q)){
									
								?>
									<div class="table-responsive ls-table">
										<table class="table table-bordered datatable ">
											<thead>
											<tr>
												<th><strong>#</strong></th>
												<th><strong>Amount</strong></th>
												<th><strong>Discount</strong></th>
												<th><strong>Paid</strong></th>
												<th><strong>Remainig</strong></th>
												<th><strong>Date</strong></th>
											</tr>
											</thead>
											<tbody>
												<?php
												
												while($result = mysql_fetch_assoc($q)){
													$invdtls = $member->retrieve(['act'=>'purchase_invoice_details','inv'=>$result['id']]);
													
													// echo "<pre>";
													// print_r($invdtls);
													// echo "</pre>";
													// exit();
													
													$calc_net[] = $invdtls['net'];
													$calc_purchase_paid[] = $invdtls['paid'];
													$calc_remaining[] = $invdtls['remaining'];
													?>
														<tr>
															<td><a href='purchase_invoice_detail?inv=<?php echo $result['id']?>'><?php echo str_pad($result['id'], 8, '0', STR_PAD_LEFT); ?></a></td>
															<td><?php echo $invdtls['net'];?></td>
															<td><?php echo $result['discount']; ?></td>
															<td><?php echo $invdtls['paid']; ?></td>
															<td><?php echo $invdtls['remaining']; ?></td>
															<td><?php echo date("d, M Y",strtotime($result['reg_date'])); ?></td>
															
														</tr>
													
													<?php
												
												}
												?>
											</tbody>
											<tfoot>
												<th>Total</th>
												<th><?php echo array_sum($calc_net);?></th>
												<th>-</th>
												<th><?php echo array_sum($calc_purchase_paid);?></th>
												<th><?php echo array_sum($calc_remaining);?></th>
												<th>-</th>
											</tfoot>
										</table>
										<script>
											retrieve({"act":"tabletools-reports","title":"Al Dakhliya Plastic(Factory)","tagline": "Supplier Name : <?php echo ucwords($member->ret_by("supplier","id",$selected,"name")); ?> <span style='float:right;'>Purchase Invoice Report From: <?php echo date("d, M Y",strtotime($from)); ?> to <?php echo date("d, M Y",strtotime($to)); ?></span>"})
										</script>
									</div>
								<?php	
								}else{
									echo "<blockquote>Empty</blockquote>";
									
								}
							
							
							break;
							
							default:
							
								echo "<blockquote>Invalid Report Type</blockquote>";
							
							break;
							
						}
						
						
					
					
					break;
					
					
					case "reports_wh":
					
						$company = trim(@$_REQUEST['company']);
						$selected = trim(@$_REQUEST['customer']);
						$report_type = trim(@$_REQUEST['report_type']);
						$from = trim(@$_REQUEST['from']);
						$to = trim(@$_REQUEST['to']);
						
						$payload = null;
						
						
						switch($report_type){
						
							case "purchase":
							
							
								$selected == "all" ? $payload = null : $payload = "AND supplier = '{$selected}'";
							
							break;
							
							
							case "sale":
							
							
								$selected == "all" ? $payload = null : $payload = "AND customer = '{$selected}'";
							
							break;
						
							
						}
						
						
						switch($report_type){
							
							
							case "sale":
								
								$q = mysql_query("SELECT * FROM sale_invoice_wh where company='{$company}' AND reg_date BETWEEN '{$from}' AND '{$to}' and status=true {$payload}");
								
								if(mysql_num_rows($q)){
									
								?>
									<div class="table-responsive ls-table">
										<table class="table table-bordered datatable">
											<thead>
											<tr>
												<th><strong>#</strong></th>
												<th><strong>Type</strong></th>
												<th><strong>Amount</strong></th>
												<th><strong>Discount</strong></th>
												<th><strong>Paid</strong></th>
												<th><strong>Remainig</strong></th>
												<th><strong>Date</strong></th>
											</tr>
											</thead>
											<tbody>
												<?php
												
												while($result = mysql_fetch_assoc($q)){
													$invdtls = $member->retrieve(['act'=>'sale_invoice_details_wh','inv'=>$result['id'],'type'=>$result['type']]);
													// echo "<pre>";
													// print_r($invdtls);
													// echo "</pre>";
													// exit();
													$redir=null;
													$result['type']=="credit" ? $redir="sale_invoice_detail?inv={$result['id']}" : $redir="sale_cash_invoice_detail?inv={$result['id']}";
													
													$calc_net_wh[] = $invdtls['net'];
													$calc_sale_paid_wh[] = $invdtls['tot_paid'];
													$calc_remaining_wh[] = $invdtls['remaining'];
													
													?>
														<tr>
															<td><b><?php echo str_pad($result['id'], 8, '0', STR_PAD_LEFT); ?></b></td>
															
															<td><?php echo ucwords($result['type']); ?></td>
															<td><?php echo $invdtls['net'];?></td>
															<td><?php echo $result['discount']; ?></td>
															<td><?php echo $invdtls['tot_paid']; ?></td>
															<td><?php echo $invdtls['remaining']; ?></td>
															<td><?php echo date("d, M Y",strtotime($result['reg_date'])); ?></td>
															
														</tr>
													
													<?php
												
												}
												?>
											</tbody>
											<tfoot>
												<th>Total</th>
												<th>-</th>
												<th><?php echo array_sum($calc_net_wh);?></th>
												<th>-</th>
												<th><?php echo array_sum($calc_sale_paid_wh);?></th>
												<th><?php echo array_sum($calc_remaining_wh);?></th>
												<th>-</th>
												
											</tfoot>
										</table>
										<script>
											retrieve({"act":"tabletools-reports","title":"Al Dakhliya Plastic(Factory)","tagline": "Customer Name : <?php echo ucwords($member->ret_by("customer","id",$selected,"name")); ?> <span style='float:right;'>Warehouse Sale Invoice Report From: <?php echo date("d, M Y",strtotime($from)); ?> to <?php echo date("d, M Y",strtotime($to)); ?></span>"})
										</script>
									</div>
								<?php	
								}else{
									echo "<blockquote>Empty</blockquote>";
									
								}
							
							
							break;
							
							
							
							
							
							
							case "purchase":
								
								$q = mysql_query("SELECT * FROM purchase_invoice where company='{$company}' AND reg_date BETWEEN '{$from}' AND '{$to}' {$payload}");
								
								if(mysql_num_rows($q)){
									
								?>
									<div class="table-responsive ls-table">
										<table class="table table-bordered datatable ">
											<thead>
											<tr>
												<th><strong>#</strong></th>
												<th><strong>Amount</strong></th>
												<th><strong>Discount</strong></th>
												<th><strong>Paid</strong></th>
												<th><strong>Remainig</strong></th>
												<th><strong>Date</strong></th>
											</tr>
											</thead>
											<tbody>
												<?php
												
												while($result = mysql_fetch_assoc($q)){
													$invdtls = $member->retrieve(['act'=>'purchase_invoice_details','inv'=>$result['id']]);
													
													// echo "<pre>";
													// print_r($invdtls);
													// echo "</pre>";
													// exit();
													?>
														<tr>
															<td><a href='purchase_invoice_detail?inv=<?php echo $result['id']?>'><?php echo str_pad($result['id'], 8, '0', STR_PAD_LEFT); ?></a></td>
															<td><?php echo $invdtls['net'];?></td>
															<td><?php echo $result['discount']; ?></td>
															<td><?php echo $invdtls['paid']; ?></td>
															<td><?php echo $invdtls['remaining']; ?></td>
															<td><?php echo date("d, M Y",strtotime($result['reg_date'])); ?></td>
															
														</tr>
													
													<?php
												
												}
												?>
											</tbody>
										</table>
										<script>
											$('.datatable').DataTable();
										</script>
									</div>
								<?php	
								}else{
									echo "<blockquote>Empty</blockquote>";
									
								}
							
							
							break;
							
							default:
							
								echo "<blockquote>Invalid Report Type</blockquote>";
							
							break;
							
						}
						
						
					
					
					break;
					
					
					case "report_sale_return":
					
						$company = trim(@$_REQUEST['company']);
						$from = trim(@$_REQUEST['from']);
						$to = trim(@$_REQUEST['to']);
						
						$q = mysql_query("select * from item where status=true and company='{$company}' order by reg_date DESC");
						
						if(mysql_num_rows($q)){
							?>
								<div class="table-responsive ls-table">
										<table class="table table-bordered datatable ">
											<thead>
											<tr>
												<th><strong>SKU</strong></th>
												<th><strong>Name</strong></th>
												<th><strong>Unit</strong></th>
												<th><strong>Quantity</strong></th>
												<th><strong>Sale</strong></th>
												<th><strong>Return</strong></th>
											</tr>
											</thead>
											<tbody>
												<?php
												
												while($result = mysql_fetch_assoc($q)){
													$sale_return = $member->retrieve(['act'=>'calc_sale_return','item'=>$result['id'],"from"=>$from,"to"=>$to]);
													
													?>
														<tr>
															<td><?php echo $result['id'];?></td>
															<td><?php echo $result['name']; ?></td>
															<td><?php echo $result['quantity']; ?></td>
															<td><?php echo strtoupper($member->ret_by("unit","id",$result['unit'],"name")); ?></td>
															<td><?php echo $sale_return['sale']; ?></td>
															<td><?php echo $sale_return['return']; ?></td>
															
															
														</tr>
													
													<?php
												
												}
												?>
											</tbody>
										</table>
										<script>
											retrieve({"act":"tabletools-reports","title":"Al Dakhliya Plastic(Factory)","tagline": "Item Sale/Return Report From: <?php echo date("d, M Y",strtotime($from)); ?> to <?php echo date("d, M Y",strtotime($to)); ?>"})
										</script>
								</div>
							<?php
							
						}else{
							echo "<blockquote>Empty</blockquote>";
						}
						
						
					
					break;
					
					case "report_sale_p_l":
					
						$company = trim(@$_REQUEST['company']);
						$dates = ['from'=>trim(@$_REQUEST['from']),'to'=>trim(@$_REQUEST['to'])];
						
						$purchase = $member->p_l(['act'=>'factory-purchase','company'=>$company,'dates'=>$dates]);
						$sale = $member->p_l(['act'=>'factory-sale','company'=>$company,'dates'=>$dates]);
						$expenses = $member->p_l(['act'=>'factory-expenses','company'=>$company,'dates'=>$dates]);
						
						$total = $sale - ($purchase-$expenses);
							?>
								<div class="table-responsive ls-table">
										<table class="table table-bordered datatable ">
											<thead>
											<tr>
												<th><strong>SALE</strong></th>
												<th><strong>PURCHASE</strong></th>
												<th><strong>EXPENSES</strong></th>
												<th><strong>TOTAL</strong></th>
											</tr>
											</thead>
											<tbody>
												<tr>
													<td><?php echo $sale;?></td>
													<td><?php echo $purchase; ?></td>
													<td><?php echo $expenses; ?></td>
													<td><?php echo $total; ?></td>
												</tr>
											</tbody>
										</table>
										<script>
											retrieve({"act":"tabletools-reports","title":"AL DAKHLIYA PLASTIC(FC)","tagline": "P/L Report From: <?php echo date("d, M Y",strtotime($dates['from'])); ?> to <?php echo date("d, M Y",strtotime($dates['to'])); ?>"})
										</script>
								</div>
							<?php
					break;
					
					
					case "report_sale_p_l_wh":
					
						$company = trim(@$_REQUEST['company']);
						$dates = ['from'=>trim(@$_REQUEST['from']),'to'=>trim(@$_REQUEST['to'])];
						
						$purchase = $member->p_l(['act'=>'factory-purchase','company'=>$company,'dates'=>$dates]);
						$sale = $member->p_l(['act'=>'warehouse-sale','company'=>$company,'dates'=>$dates]);
						$expenses = $member->p_l(['act'=>'warehouse-expenses','company'=>$company,'dates'=>$dates]);
						
						$total = $sale - ($purchase-$expenses);
							?>
								<div class="table-responsive ls-table">
										<table class="table table-bordered datatable ">
											<thead>
											<tr>
												<th><strong>SALE</strong></th>
												<th><strong>PURCHASE</strong></th>
												<th><strong>EXPENSES</strong></th>
												<th><strong>TOTAL</strong></th>
											</tr>
											</thead>
											<tbody>
												<tr>
													<td><?php echo $sale;?></td>
													<td><?php echo $purchase; ?></td>
													<td><?php echo $expenses; ?></td>
													<td><?php echo $total; ?></td>
												</tr>
											</tbody>
										</table>
										<script>
											retrieve({"act":"tabletools-reports","title":"AL DAKHLIYA PLASTIC(WH)","tagline": "P/L Report From: <?php echo date("d, M Y",strtotime($dates['from'])); ?> to <?php echo date("d, M Y",strtotime($dates['to'])); ?>"})
										</script>
								</div>
							<?php
					break;
					
					
					
					case "report_sale_return_wh":
					
						$company = trim(@$_REQUEST['company']);
						$from = trim(@$_REQUEST['from']);
						$to = trim(@$_REQUEST['to']);
						
						$q = mysql_query("select * from item_warehouse where status=true and company='{$company}' order by reg_date DESC");
						
						if(mysql_num_rows($q)){
							?>
								<div class="table-responsive ls-table">
										<table class="table table-bordered datatable ">
											<thead>
											<tr>
												<th><strong>SKU</strong></th>
												<th><strong>Name</strong></th>
												<th><strong>Sale</strong></th>
												<th><strong>Return</strong></th>
											</tr>
											</thead>
											<tbody>
												<?php
												
												while($result = mysql_fetch_assoc($q)){
													$sale_return = $member->retrieve(['act'=>'calc_sale_return_wh','item'=>$result['id'],"from"=>$from,"to"=>$to]);
													
													// echo "<pre>";
													// print_r($sale_return);
													// echo "</pre>";
													// exit();
													?>
														<tr>
															<td><?php echo $result['id'];?></td>
															<td><?php echo $result['name']; ?></td>
															<td><?php echo $sale_return['sale']; ?></td>
															<td><?php echo $sale_return['return']; ?></td>
															
															
														</tr>
													
													<?php
												
												}
												?>
											</tbody>
										</table>
										<script>
											retrieve({"act":"tabletools-reports","title":"Al Dakhliya Plastic(Warehouse)","tagline": "Item Sale/Return Report From: <?php echo date("d, M Y",strtotime($from)); ?> to <?php echo date("d, M Y",strtotime($to)); ?>"})
										</script>
								</div>
							<?php
							
						}else{
							echo "<blockquote>Empty</blockquote>";
						}
						
						
					
					break;
					
					
					case "toggle_cust_supp":
					
						$selected = trim(@$_REQUEST['selected']);
						
						switch($selected){
							
							case "purchase":
							
								$member->retrieve(['act'=>'supplier_all_esp']);
								
							break;
							
							case "sale":
							
								$member->retrieve(['act'=>'customer_all_esp']);
							
							break;
						}
					break;
			
	}
	

}else{
	
		echo json_encode(array("status"=>"error","message"=>"Parameters Missing"));
	
}



?>
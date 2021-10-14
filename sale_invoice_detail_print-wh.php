<?php 
if(!isset($_REQUEST['inv'])){
	header("location:dashboard");
	exit();
}
require_once('assets/funcs.php');
$obj = new main();
$obj->check_sesh("clerk-wh",array("pass"=>NULL,"fail"=>"../clerk/login-wh"));
$obj->connect_db();
$member = new member();
$static = new static_content;
$invdtls = $member->retrieve(['act'=>'sale_invoice_details_wh','inv'=>trim($_REQUEST['inv']),'type'=>trim(@$_REQUEST['type'])]);



// echo "<pre>";
// print_r($invdtls);
// echo "</pre>";
// exit();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Trebuchet MS"; font-size:small }
		a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
		a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
		comment { display:none;  } 
	</style>
	
</head>

<body>


<table cellspacing="0" border="0">
	<colgroup width="285"></colgroup>
	<colgroup width="61"></colgroup>
	<colgroup width="96"></colgroup>
	<colgroup width="62"></colgroup>
	<colgroup width="75"></colgroup>
	<colgroup width="104"></colgroup>
	<tbody><tr>
		<td colspan="3" height="56" align="left" valign="middle"><font face="Arial" size="5" color="#2C3B65"><strong>MAJAN GLOBAL ENTERPRISES
		</strong></font></td>
		<td align="left" valign="bottom"><br></td>
		<td colspan="2" align="right" valign="bottom"><b><font face="Arial" size="5" color="#7B8EC5">INVOICE</font></b><br /><?php echo strtoupper($invdtls['order']);?></td>
		</tr>
	<tr>
		<td height="20" align="left" valign="bottom">Karsha, Sanaiya Nizwa</td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
	</tr>
	<tr>
		<td height="20" align="left" valign="bottom">Sultanate Of Oman</td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="right" valign="bottom">DATE</td>
		<td style="border-top: 1px solid #a6a6a6; border-bottom: 1px solid #a6a6a6; border-left: 1px solid #a6a6a6; border-right: 1px solid #a6a6a6" align="center" valign="bottom" sdval="43521" sdnum="1033;1033;M/D/YYYY"><?php echo date("d/m/y",strtotime($invdtls['invoice_detail']['reg_date']));?></td>
	</tr>
	<tr>
		<td height="20" align="left" valign="bottom">Phone: 00968-25437642</td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="right" valign="bottom">INVOICE #</td>
		<td style="border-top: 1px solid #a6a6a6; border-bottom: 1px solid #a6a6a6; border-left: 1px solid #a6a6a6; border-right: 1px solid #a6a6a6" align="center" valign="bottom"><?php echo str_pad($invdtls['invoice_detail']['id'], 8, '0', STR_PAD_LEFT);?></td>
	</tr>
	
	<tr>
		<td height="20" align="left" valign="bottom">Email: irfan@majanghm.com</td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="right" valign="bottom">DUE DATE</td>
		<td style="border-top: 1px solid #a6a6a6; border-bottom: 1px solid #a6a6a6; border-left: 1px solid #a6a6a6; border-right: 1px solid #a6a6a6" align="center" valign="bottom" bgcolor="#D3D9EC" sdval="43551" sdnum="1033;1033;M/D/YYYY">3/27/2019</td>
		
	</tr>
	
	<tr>
		<td height="20" align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
	</tr>
	<tr>
		<td height="20" align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
	</tr>
	<tr>
		<td height="21" align="left" valign="bottom" bgcolor="#3B4E87"><b><font face="Arial" color="#FFFFFF">BILL TO</font></b></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		
		<td height="21" colspan="3" align="left" valign="bottom" bgcolor="#3B4E87"><b><font face="Arial" color="#FFFFFF">Details</font></b></td>
	</tr>
	
	
	<tr>
		<td height="20" align="left" valign="bottom"><?php echo ucwords($invdtls['customer_detail']['name']);?></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td height="21" colspan="2" align="left" valign="bottom">Sales Person</td>
		<td align="left" valign="bottom"><input placeholder="Sales Person Name"></input></td>
	</tr>
	<tr>
		<td height="20" align="left" valign="bottom"><?php echo ucwords($invdtls['customer_detail']['customer_company']);?></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td height="21" colspan="2" align="left" valign="bottom">Delivered By</td>
		<td align="left" valign="bottom"><input placeholder="Delivered By"></input></td>
	</tr>
	<tr>
		<td height="20" align="left" valign="bottom"><?php echo ucwords($invdtls['customer_detail']['address']);?></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
	</tr>
	<tr>
		<td height="20" align="left" valign="bottom"><?php echo ucwords($invdtls['customer_detail']['email']);?></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
	</tr>
	<tr>
		<td height="20" align="left" valign="bottom"><?php echo ucwords($invdtls['customer_detail']['phone']);?></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
	</tr>
	<tr>
		<td height="20" align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><br></td>
	</tr>
	<tr>
		
		<th colspan="2" style="border-top: 1px solid #3b4e87; border-bottom: 1px solid #3b4e87; border-left: 1px solid #3b4e87" colspan="0" height="21" align="left" valign="bottom" bgcolor="#3B4E87"><b><font face="Arial" color="#FFFFFF">ITEM</font></b></th>
		<th style="border-top: 1px solid #3b4e87; border-bottom: 1px solid #3b4e87" align="center" valign="bottom" bgcolor="#3B4E87"><b><font face="Arial" color="#FFFFFF">QTY</font></b></th>
		<th style="border-top: 1px solid #3b4e87; border-bottom: 1px solid #3b4e87" align="center" valign="bottom" bgcolor="#3B4E87"><b><font face="Arial" color="#FFFFFF">Price/Unit</font></b></th>
		<th style="border-top: 1px solid #3b4e87; border-bottom: 1px solid #3b4e87" align="center" valign="bottom" bgcolor="#3B4E87"><b><font face="Arial" color="#FFFFFF">Amt</font></b></th>
		<th style="border-top: 1px solid #3b4e87; border-bottom: 1px solid #3b4e87; border-right: 1px solid #3b4e87" align="center" valign="bottom" bgcolor="#3B4E87"><b><font face="Arial" color="#FFFFFF">bz</font></b></th>
	</tr>
	<?php
		
		foreach($invdtls['sale_item'] as $val)
		{
			
			
			$amt = (($val['quantity']*$val['grouping_qty'])*$val['price_per_unit']);
			if(is_float($amt)){
				
				$arr = explode(".",$amt);
				$arr = ['ro'=>$arr[0],'bz'=>$arr[1]];
				
			}else{
				$arr = ['ro'=>$amt,'bz'=>'000'];
			}
		
		
		?>
			<tr>
				
				
				<td colspan="2" style="border-left: 1px solid #000000;border-bottom: 1px solid #000000;"  height="20" align="left" valign="bottom" bgcolor="#F2F2F2"><?php echo ucwords($val['item']); ?></td>
				
				<td style="border-left: 1px solid #000000; border-right: 1px solid #000000; border-bottom: 1px solid #000000" align="center" valign="bottom" bgcolor="#F2F2F2" sdval="230" sdnum="1033;0;_(* #,##0.00_);_(* \(#,##0.00\);_(* &quot;-&quot;??_);_(@_)"><?php echo $val['quantity']*$val['grouping_qty']." ".$val['grouping']; ?></td>
				<td style="border-left: 1px solid #000000; border-right: 1px solid #000000; border-bottom: 1px solid #000000" align="center" valign="bottom" bgcolor="#F2F2F2"><?php echo (($val['price_per_unit']*$val['quantity'])/$val['grouping_qty'])?></td>
				
				<td style="border-left: 1px solid #000000; border-right: 1px solid #000000; border-bottom: 1px solid #000000" align="center" valign="bottom" bgcolor="#F2F2F2" sdval="230" sdnum="1033;0;_(* #,##0.00_);_(* \(#,##0.00\);_(* &quot;-&quot;??_);_(@_)"><?php echo $arr['ro'] ?></td>
				
				<td style="border-left: 1px solid #000000; border-right: 1px solid #000000; border-bottom: 1px solid #000000" align="center" valign="bottom" bgcolor="#F2F2F2" sdval="230" sdnum="1033;0;_(* #,##0.00_);_(* \(#,##0.00\);_(* &quot;-&quot;??_);_(@_)"><?php echo $arr['bz'] ?></td>
			</tr>
			
			
			
		<?php
		}
	?>

	
	<tr>
		<td style="border-top: 1px solid #000000" height="20" align="left" valign="bottom"><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign="bottom"><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign="bottom"><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign="bottom"><font size="1" color="#FFFFFF">[42]</font></td>
		<td style="border-top: 1px solid #000000" align="left" valign="bottom"></td>
		<td style="border-top: 1px solid #000000" align="right" valign="bottom" sdval="950" sdnum="1033;0;_(* #,##0.00_);_(* \(#,##0.00\);_(* &quot;-&quot;??_);_(@_)"> </td>
	</tr>
	
	<tr>
		<td style="border-top: 1px solid #000000" height="20" align="left" valign="bottom"><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign="bottom"><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign="bottom"><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign="bottom"><font size="1" color="#FFFFFF">[42]</font></td>
		<td style="border-top: 1px solid #000000" align="left" valign="bottom">Subtotal</td>
		<td style="border-top: 1px solid #000000" align="right" valign="bottom" sdval="950" sdnum="1033;0;_(* #,##0.00_);_(* \(#,##0.00\);_(* &quot;-&quot;??_);_(@_)"><?php echo $invdtls['net']?></td>
	</tr>
	
	
	<tr>
		<td  colspan="3" height="21" align="left" valign="top"></td>
		<td align="left" valign="bottom"><br></td>
		<td  align="left" valign="bottom">Discount</td>
		<td style="border-top: 1px solid #a6a6a6; border-bottom: 2px double #000000;" align="right" valign="bottom" sdval="0" sdnum="1033;0;_(* #,##0.00_);_(* \(#,##0.00\);_(* &quot;-&quot;??_);_(@_)"><?php echo $invdtls['invoice_detail']['discount'];echo $invdtls['invoice_detail']['discount_type']=="percentage"? "%" : "" ;?></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000" height="20" align="left" valign="bottom"><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign="bottom"><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign="bottom"><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign="bottom"><font size="1" color="#FFFFFF">[42]</font></td>
		<td style="border-top: 1px solid #000000" align="left" valign="bottom">Paid (Adv)</td>
		<td style="border-top: 1px solid #000000" align="right" valign="bottom" sdval="950" sdnum="1033;0;_(* #,##0.00_);_(* \(#,##0.00\);_(* &quot;-&quot;??_);_(@_)"><?php echo $invdtls['tot_paid']?></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000" height="20" align="left" valign="bottom"><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign="bottom"><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign="bottom"><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign="bottom"><font size="1" color="#FFFFFF">[42]</font></td>
		<td style="border-top: 1px solid #000000" align="left" valign="bottom">Remaining</td>
		<td style="border-top: 1px solid #000000" align="right" valign="bottom" sdval="950" sdnum="1033;0;_(* #,##0.00_);_(* \(#,##0.00\);_(* &quot;-&quot;??_);_(@_)"><?php echo $invdtls['remaining']?></td>
	</tr>
	<tr>
		<td  colspan="3" height="23" align="left" valign="top"><br></td>
		<td align="left" valign="bottom"><br></td>
		<td align="left" valign="bottom"><b>TOTAL</b></td>
		<td align="right" valign="bottom" bgcolor="#D3D9EC" sdval="971.56" sdnum="1033;0;_(&quot;$&quot;* #,##0.00_);_(&quot;$&quot;* \(#,##0.00\);_(&quot;$&quot;* &quot;-&quot;??_);_(@_)"><b><?php echo $invdtls['total']?></b></td>
	</tr>
	
	</tbody></table>
	<p>Remarks : <?php echo $invdtls['remarks']; ?></p>
<?php
		
		$f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
		echo "Amount in  words: " . ucwords($f->format($invdtls['total'])) . " Rial Omani";
?>

	<!--<p align="left" valign="bottom">
		Declaration<br />
		We declare that this invoice shows the actual price of goods<br />
		Described and that all particulars are true and correct.
	</p>

	
	<br />
	<br />-->
	<br />
	<br />
	<br />
	<br />
	<p align="left" valign="bottom">
	Authorized Signature<br />
	
	</p>
	<p align="right" valign="bottom">
	Reciever Signature<br />
	</p>

                                                                                                                                                        

	<p align="middle" valign="bottom">
		
			<i>Thank you for your business!</i><br />
			<!--<strong>
				Karsha Nizwa,P.CODE:611,P.O BOX:673,Sultanate of Oman,C.R:1061383<br />
				Phone:+968-99666367,+968-96455040<br />
				Email:aldakhiliyaplasticindustry1@gmail.com
			</strong>-->

		
	</p>
</body>

</html>

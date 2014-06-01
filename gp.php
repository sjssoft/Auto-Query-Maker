<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon"  href="favicon.ico" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min-full.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.min.js"></script>
<title>SJSsoft's Make Get/Post</title>

</head>

<body>
<div class="well row-fluid">
<div class="span3">
<form method="get" enctype="multipart/form-data">
<select name="m" id="m">
<option>POST</option>
<option>GET</option>
<option>REQUEST</option>
</select>
<div class="mudBox" id="mudBox">
<?php for($i=1; $i<=10;$i++) {
	echo '<div class="input" id="input'.$i.'">'.$i.'. <input type="text" name="t[]" id="t'.$i.'" /></div>';
}
echo '<script> var llimit='.$i.'</script>';
?>
</div>
<button class="btn btn-primary " id="btnadd">Add More Box</button>
<button class="btn btn-success " accesskey="S"  id="submit">submit</button>
<div class="clearfix" style="clear:both; height:2px;"></div>
</form>
</div>
<div class="span8" style="background:#FFF; padding:20px;">
<strong>Code</strong><div class="pull-right"><button type="button" class="btn btn-info" id="qMaker">Make Query</button> <input class="lister" id="lister" /> <button type="button" class="btn btn-warning" id="listSetter">Set Variables</button></div><hr />
<?php
if(isset($_GET['t']))
{
	$q='';
	$qfill=0;
		$m= $_GET['m'];
		echo '<table>';
			for ($i=0; $i < count($_GET['t']); $i++) {
				$j=$i+1;
		$t= $_GET['t'][$i];
		if($t!="") {
	echo '<tr><td id="litstd'.$j.'">$'.$t.'</td><td> =$_'.$m.'[\''.$t.'\'];</td>
	<td width="100">&nbsp;&nbsp;&nbsp;</td><td> =$_'.$m.'[\'\'];</td></tr>';
	$q.='\'$'.$t.'\', '; $qfill++;
			} 
			}
			echo '</table>Total = '.$qfill.'<hr><span class="showq1" id="showq1">';
			echo $q;
			echo '</span><span class="showq" id="showq"></span><hr><span class="qbox" id="qbox"></span>';
			}
			?>
<div class="clearfix" style="clear:both; height:2px;"></div>
<textarea name="rw" class="span12" placeholder="My Clipboard" rows="10" id="rw"></textarea>
</div>
<div class="clearfix" style="clear:both; height:2px; background:#666;"></div>
</div>
<script>
var cont=11;
	$(function() {
	$("#btnadd").click(function() {
$('#mudBox').append('<div class="input" id="input'+cont+'">'+cont+'. <input type="text" name="t[]" id="t'+cont+'" /></div>');  cont++;
$("#btnadd").focus();
	    return false;
});
var lc=1, lq=''; 
$("#listSetter").click(function() {
	//alert("setting");
	lq='';
	var lvalue=$('#lister').val();
	var lid='';
	for(var lloop=1; lloop<=llimit; lloop++)
	{
		lid='litstd'+lloop;
//	alert(lid+' > '+lvalue);
	$('#'+lid).html('$'+lvalue+lloop);
	var lm=$('#'+lid).html();
//	alert(lm);
	lq+='\'$'+lvalue+lloop+'\', ';
	}
	//alert(lq);
	$("#showq").html('<br>'+ lq);
});
$("#qMaker").click(function() {
if($("#showq").html()!="") { var qvar=$("#showq").html(); }
else { var qvar=$("#showq1").html(); }
qvar=qvar.slice(0,-2);
//alert(qvar);
var qvar='$result=mysql_query("INSERT INTO table VALUES (NULL,'+qvar+') ");' ;
$("#qbox").html(qvar);
 });
 });
</script>
<div class="clearfix"></div>
<div class="row">
<div class="span12" align="center"> <a href="http://www.sjssoft.com">Developed at:<span style="color:#FF3300"> SJSsoft</span></a>
</div>
</div>
</body>
</html>

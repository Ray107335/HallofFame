﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ITEM List</title>
<style type="text/css">
<!--
*{
	padding	: 0;
	margin	: 0;
	line-height	: 140%;
	font-family	: Osaka,Verdana;
	overflow:inherit;
}
body{
  margin:30px;
  background	: #98a0a5/*#bfbfbf*/;
  color	: #bdc8d7;
}
td{
  white-space: nowrap;
  background-color : #10151b;
  text-align:center;
  padding:4px;
}
.a{
  background-color : #333333;
}
-->
</style></head>
<body>
<?php 
include("../data/data.item.php");
print("<table cellspacing=\"1\"><tbody>");
$img_f	= "../image/icon/";
$des	= '<tr><td class="a">ID</td>
<td class="a">图</td>
<td class="a">名字</td>
<td class="a">类型</td>
<td class="a">atk</td>
<td class="a">def</td>
<td class="a">handle</td>
<td class="a">卖价</td>
<td class="a">买价</td></tr>';
$count=0;
for($i=1000; $i<10000; $i++) {
	$item	= LoadItemData($i);
	if(!$item) continue;

	if($count%6==0)
		print($des);
	$count++;

	print("<tr><td>\n");
	print($i);
	print("</td><td>");
	print("<img src=\"".$img_f.$item[img]."\">");
	print("</td><td>\n");
	print($item[name]);
	print("</td><td>\n");
	print($item[type]);
	print("</td><td>\n");
	print($item[atk][0]."<br />".$item[atk][1]);
	print("</td><td>\n");
	print($item[def][0]."+".$item[def][1]."<br />".$item[def][2]."+".$item[def][3]);
	print("</td><td>\n");
	print($item[handle]);
	print("</td><td>\n");
	print($item[buy]);
	print("</td><td>\n");
	print($item[sell]);
	print("</td></tr>\n");
	if($item["need"]) {
		print("<tr><td colspan=\"9\" style=\"text-align:left;padding-left:50px\">\n");
		foreach($item["need"] as $M_item => $M_amount) {
			$M	= LoadItemData($M_item);
			print("$M[name]");
			print("<img src=\"".$img_f.$M[img]."\">");
			print("x".$M_amount." / \n");
		}
		print("</td></tr>\n");
	}
}
print("</tbody></table>");
?>
</body>
</html>


<table border="0" align="right" cellpadding="0" cellspacing="0">



  <tr>

    <td align="center"><p>&nbsp;  </p>

	

	

<table border="0" cellpadding="2" cellspacing="1">

<tr>

	<? 





for($i=1; $i<$page; $i++)

if($i>=$page-5)



echo "<td width='12' align='center' style='border:1px solid $Cor1'><a href='?page=$i'><b><font color='#1E4B7A'>$i</font></b></a></td>";

echo "<td width='12' align='center' style='border:1px solid $Cor1; color:#FFF' bgcolor='#1E4B7A'><b>$page</b></td>";



for($i=$page+1; $i<=$tp; $i++)

if($i<=$page+5)



echo "<td width='12' align='center' style='border:1px solid $Cor1;'><a href='?page=$i'><b><font color='#1E4B7A'>$i</font></b></a></td>";



?>

</tr>

</table>



</td>

</tr>

</table>
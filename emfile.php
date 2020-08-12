
                      <div class="tab-pane" id="tab2">

<div class="panel-body table-responsive">
<table class="table table-striped data-tables" id="data-tables">
<thead>
  <tr>
    <th style="display:none">Date</th> 
    <th>PF No</th>
    <th>Name</th>
    <th>Action</th>
    
  </tr>
</thead>
<tbody>';
$result =mysql_query("select * from attendance where status=1 and emp='".$emp."'");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
    $row=mysql_fetch_array($result);
    $categ=stripslashes($row['categ']);
    $code=stripslashes($row['serial']);
    if(stripslashes($row['drcr'])=='dr'){$type='Invoice';$out=5;$rcptno=stripslashes($row['invno']);}
    if(stripslashes($row['drcr'])=='cn'){$type='Credit Note';$out=55;$rcptno=stripslashes($row['credno']);}
    if(stripslashes($row['drcr'])=='cr'){$type='Receipt';$out=6;$rcptno=stripslashes($row['rcptno']);}

   if($categ==3){$out=7;}if($categ==4){$out=8;}
  echo"<tr class=\"gradeX\" id=\"normal".$code."\" title=\"Click to View\" style=\"cursor:pointer\" onclick=\"window.open('report.php?id=".$out."&rcptno=".$rcptno."')\" >";
    echo'<td style="display:none">'.stripslashes($row['stamp']).'</td>
     <td>'.stripslashes($row['date']).'</td>
    <td>'.$type.'</td>
    <td>'.$rcptno.'</td>
    <td>'.stripslashes($row['description']).'</td>
    <td>'.number_format(floatval($row['amount'])).'</td>
    <td>'.number_format(floatval($row['bal'])).'</td>
      </tr>';

  }
 
echo'</tbody>
</table>
</div>




</div>

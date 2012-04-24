<?php
$q=$_GET["q"];
$sql="SELECT * FROM user WHERE id = '".$q."'";

echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr> </table>";

?>
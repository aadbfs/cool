<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","silvaal-db","hxZNxRvHUN1hq4YA","silvaal-db");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<body>
<div>
	<!--Filter characters by house-->
	<table>
		<tr>
			<td>Game of Thrones People</td>
		</tr>
		<tr>
			<td>Name</td>
			<td>House</td>
			<td>Gender</td>
			<td>Location</td>
			<td>Status</td>
		</tr>
<?php
//get character by house
if(!($stmt = $mysqli->prepare("SELECT name, gender, house_name, cL.loc_name, ST.curstat FROM charHouse as CH
INNER JOIN UChar as U ON cid=char_id
INNER JOIN charLoc as L ON CH.cid=L.cid
INNER JOIN curLoc as cL ON L.lid=cL.loc_id
INNER JOIN house as H ON hid=house_id
INNER JOIN charStat as S ON CH.cid=S.cid
INNER JOIN status as ST ON S.sid=ST.stat_id 
WHERE hid = ?"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

//then display
if(!($stmt->bind_param("i",$_POST['house']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($name, $gender, $loc_name, $house_name, $curStat)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $name . "\n</td>\n<td>\n" . $gender . "\n</td>\n<td>\n" . $loc_name . "\n</td>\n<td>\n" . $house_name . "\n</td>\n<td>\n" . $curStat . "\n</td>\n</tr>";
 
}
$stmt->close();
?>
	</table>
</div>

</body>
</html>
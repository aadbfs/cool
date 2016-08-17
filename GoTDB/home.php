<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","silvaal-db","hxZNxRvHUN1hq4YA","silvaal-db");
if($mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
	<head>
    <title></title>
		<meta charset="utf-8" />
		<script src="Scripts/jquery-1.9.1.min.js"></script>
		<script src="Scripts/bootstrap.min.js"></script>            
		<link href="Content/bootstrap.min.css" rel="stylesheet" />
		<link href="home.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
		<table>
		<!--table of all characters-->
			<tr>
				<td>Game of Thrones Characters</td>
			</tr>
			<tr>
				<td>Name</td>
				<td>House</td>
				<td>Gender</td>
				<td>Location</td>
				<td>Status</td>
			</tr>
<?php
//print out all AGoT characters
$strSql="SELECT name, gender, house_name, cL.loc_name, ST.curstat FROM charHouse as CH
INNER JOIN UChar as U ON cid=char_id
INNER JOIN charLoc as L ON CH.cid=L.cid
INNER JOIN curLoc as cL ON L.lid=cL.loc_id
INNER JOIN house as H ON hid=house_id
INNER JOIN charStat as S ON CH.cid=S.cid
INNER JOIN status as ST ON S.sid=ST.stat_id";	
if(!($stmt = $mysqli->prepare($strSql))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
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
<!--add character to database-->
<div id ="addpers">
	<form method="post" action="addpers.php"> 

		<fieldset>
			<legend>Name</legend>
			<p>Name: <input type="text" name="CharName" /></p>
		</fieldset>

		<fieldset>
			<legend>Gender</legend>
			<p>Gender: <input type="text" name="CharGender" /></p>
		</fieldset>
		
		<fieldset>
			<legend>House</legend>
			<p>House: <input type="text" name="CharHouse" /></p>
		</fieldset>

		<fieldset>
			<legend>Status</legend>
			<select name="CharStatus">
<?php
if(!($stmt = $mysqli->prepare("SELECT stat_id, curStat FROM status"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($id, $stat)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo '<option value=" '. $id . ' "> ' . $stat . '</option>\n';
}
$stmt->close();
?>
			</select>
		</fieldset>
		
				<fieldset>
			<legend>Location</legend>
			<select name="CharLoc">
<?php
if(!($stmt = $mysqli->prepare("SELECT loc_id, loc_name FROM curLoc"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($lid, $lname)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo '<option value=" '. $lid . ' "> ' . $lname . '</option>\n';
}
$stmt->close();
?>
			</select>
		</fieldset>
		<p><input type="submit" /></p>
	</form>
</div>

<!--Filter by House-->
<div>
	<form method="post" action="filter.php">
		<fieldset>
			<legend>Filter By House</legend>
				<select name="house">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT house_id, house_name FROM house"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}

					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($hid, $hname)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" '. $hid . ' "> ' . $hname . '</option>\n';
					}
					$stmt->close();
					?>
				</select>
		</fieldset>
		<input type="submit" value="Run Filter" />
	</form>
</div>

<!--Delete location-->
<div>
	<form method="post" action="delete.php">
		<fieldset>
			<legend>Delete Location</legend>
				<select name="location">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT loc_id, loc_name FROM curLoc"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}

					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($lid, $lname)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" '. $lid . ' "> ' . $lname . '</option>\n';
					}
					$stmt->close();
					?>
				</select>
		</fieldset>
		<input type="submit" value="Delete Location" />
	</form>
</div>

<!--get current number of characters in database-->
<p>Current number of characters in the database:</p>
<?php
if(!($stmt = $mysqli->prepare("SELECT COUNT(char_id) FROM UChar"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($idcount)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo $idcount;
}
$stmt->close();
?>

    </body>
	
	<footer>Alexandre Silva; CS340</footer>
</html>
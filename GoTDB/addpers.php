<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//connect
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","silvaal-db","hxZNxRvHUN1hq4YA","silvaal-db");
if(!$mysqli || $mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}

//get character name	
function getUChar($fCharName){
	//Connects to the database
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu","silvaal-db","hxZNxRvHUN1hq4YA","silvaal-db");
	if(!$mysqli || $mysqli->connect_errno){
		echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	
	$strSqlUchar ="select char_id from UChar where name=?";

	/* create a prepared statement */
	if(!($stmt = $mysqli->prepare($strSqlUchar))){
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	 /* bind parameters for CharName */
	$stmt->bind_param("s", $fCharName);

	/* execute query */
	$stmt->execute();

	/* bind result variables */
	if(!$stmt->bind_result($charId)){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}

	 /* fetch value */
	$stmt->fetch();
	$stmt->close();
	return $charId;
}

//get character house
function getHouse($fcharHouse){
	//Connects to the database
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu","silvaal-db","hxZNxRvHUN1hq4YA","silvaal-db");
	if(!$mysqli || $mysqli->connect_errno){
		echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}

	 $strSqlHouse ="select house_id from house where house_name=?";

	/* create a prepared statement */
	 if(!($stmt = $mysqli->prepare($strSqlHouse))){
		 echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	 }
	 /* bind parameters for CharHouse */
	 $stmt->bind_param("s", $fcharHouse);

	// /* execute query */
	 $stmt->execute();

	// /* bind result variables */
	 if(!$stmt->bind_result($house_id)){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	 }

	 // /* fetch value */
	 $stmt->fetch();
	 $stmt->close();
	 return $house_id;;
}


//insert into UChar
function insertChar($fCharName, $fCharGender){
		//Connects to the database
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu","silvaal-db","hxZNxRvHUN1hq4YA","silvaal-db");
	if(!$mysqli || $mysqli->connect_errno){
		echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}

	 $strInsert = "INSERT INTO UChar (name, gender) VALUES ('{$fCharName}', '{$fCharGender}')";
	 
	  /* create a prepared statement */
	if(!$stmt = $mysqli->prepare($strInsert)) {
		  echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	
	/* execute query */
	if(!$stmt->execute()){
		echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	} else {
		echo " Added " . $stmt->affected_rows . " rows to UChar.";
	}
	
	$last_id = mysqli_insert_id($mysqli);
	$stmt->close();
	return $last_id;
}

//insert into CharHouse
function insertHouseChar($fCharId, $fHouseId){
		//Connects to the database
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu","silvaal-db","hxZNxRvHUN1hq4YA","silvaal-db");
	if(!$mysqli || $mysqli->connect_errno){
		echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}

	$strInsert = "INSERT INTO charHouse (cid, hid) VALUES ('{$fCharId}', '{$fHouseId}')";
  
	/* create a prepared statement */
	if(!$stmt = $mysqli->prepare($strInsert)) {
		  echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	  }

	/* execute query */
	if(!$stmt->execute()){
		 echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	} else {
		 echo " Added " . $stmt->affected_rows . " rows to charHouse.";
	}	 
	//no id will be returned
	$last_id = mysqli_insert_id($mysqli);
	$stmt->close();
	return $last_id;
}

//insert into CharStatus
function insertStatusChar($fCharId, $fStatusId){
		//Connects to the database
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu","silvaal-db","hxZNxRvHUN1hq4YA","silvaal-db");
	if(!$mysqli || $mysqli->connect_errno){
		echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}

	$strInsert = "INSERT INTO charStat (cid, sid) VALUES ('{$fCharId}', '{$fStatusId}')";
  
	/* create a prepared statement */
	if(!$stmt = $mysqli->prepare($strInsert)) {
		  echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	  }

	/* execute query */
	if(!$stmt->execute()){
		 echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	} else {
		 echo " Added " . $stmt->affected_rows . " rows to charStat.";
	}	 
	//no id will be returned
	$last_id = mysqli_insert_id($mysqli);
	$stmt->close();
	return $last_id;
}

//insert into CharLoc
function insertLocChar($fCharId, $fLocId){
	//Connects to the database
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu","silvaal-db","hxZNxRvHUN1hq4YA","silvaal-db");
	if(!$mysqli || $mysqli->connect_errno){
		echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}

	$strInsert = "INSERT INTO charLoc (cid, lid) VALUES ('{$fCharId}', '{$fLocId}')";
  
	/* create a prepared statement */
	if(!$stmt = $mysqli->prepare($strInsert)) {
		  echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	  }

	/* execute query */
	if(!$stmt->execute()){
		 echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	} else {
		 echo " Added " . $stmt->affected_rows . " rows to charLoc.";
	}	 
	//no id will be returned
	$last_id = mysqli_insert_id($mysqli);
	$stmt->close();
	return $last_id;
}

//insert into tables
$myChar = getUChar($_POST['CharName']);
$myHouse = getHouse($_POST['CharHouse']);

if($myChar == ''){ //check if field is empty
  $myChar = insertChar($_POST['CharName'], $_POST['CharGender']);
}
$myCharHouse = insertHouseChar($myChar, $myHouse);
$insertStatusChar = insertStatusChar($myChar, $_POST['CharStatus']);
$insertLocChar = insertLocChar($myChar, $_POST['CharLoc']);

?>

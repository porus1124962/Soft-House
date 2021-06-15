<?php

require('connect-wamp.php');
$t1Name = "download-list";
$table1Col2 = "SoftName";
$table1Col3 = "SoftLink";
$table1Col4 = "SoftImgLink";
$table1Col5 = "Category";
$t2Name = "categories";
$table2Col2 = "CatName";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully<br/>";

//insert data function
function insertData($softName,$softLink,$SoftImgLink,$softCategory) {
	
  	global $conn;
  	global $t1Name;
  	global $table1Col2;
  	global $table1Col3;
  	global $table1Col4;
  	global $table1Col5;
  	global $db;
  
    $sql = "INSERT INTO `$db`.`$t1Name` (`ID`, `$table1Col2`, `$table1Col3`, `$table1Col4`, `$table1Col5`) VALUES (NULL, '$softName', '$softLink', '$SoftImgLink', '$softCategory')";

	if ($conn->query($sql) === TRUE) {
    	return "Data Added Successfully";
	} else {
    	return "Error: " . $sql . "<br>" . $conn->error;
	}

}

//insertData("Mozila","mozi.com","mozi.img.com","Browser");

//delete data function
function deleteData($delSoftName){
	
  	global $conn;
  	global $t1Name;
  	global $table1Col2;
  	global $db;
	
//	$sql_del = "DELETE FROM '$db'.'$t1Name' WHERE '$table1Col2' = '$delSoftName'";
	$sql_del = "DELETE FROM `$t1Name` WHERE `$table1Col2` = '$delSoftName'";

	if ($conn->query($sql_del) === TRUE) {
		return "Data Deleted Successfully";
	} else {
		return "Error deleting record: " . $conn->error;
	}
}

function selectData(){
	
	global $conn;
  	global $t2Name;
  	global $db;
	global $table2Col2;
	
	$sql_select_cat = "SELECT * FROM `$t2Name` WHERE 1";
	$result = $conn->query($sql_select_cat);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			selectDataHelper($row["$table2Col2"]);
		}
	} else {
		echo "No Data Found!";
	}
}

//selectData();
function selectDataHelper($mCategories){
  
	global $conn;
  	global $t1Name;
  	global $db;
	global $table1Col2;
	global $table1Col3;
	global $table1Col4;
	global $table1Col5;
	
	$sql_select_cat = "SELECT * FROM `$t1Name` WHERE `$table1Col5` = '$mCategories'";
  
	$result = $conn->query($sql_select_cat);

	if ($result->num_rows > 0) {
      
      //echo "total num of rows $result->num_rows";
		
		//making heading of category
		echo('<br><h1 style="width: 100%; color: #fff; border-bottom: double #fff; font-size: 45px; border-bottom-width: thick;" id="'.$mCategories.'">'.$mCategories.'</h1>');
      
      	for($i = 0; $i < $result->num_rows/4; $i++){
		  
		  	$row_1 = $result->fetch_assoc();
			$s_Name_1 = $row_1["$table1Col2"];
			$s_link_1 = $row_1["$table1Col3"];
			$s_img_link_1 = $row_1["$table1Col4"];
		  
		  	$row_2 = $result->fetch_assoc();
			$s_Name_2 = $row_2["$table1Col2"];
			$s_link_2 = $row_2["$table1Col3"];
			$s_img_link_2 = $row_2["$table1Col4"];
		  
		  	$row_3 = $result->fetch_assoc();
			$s_Name_3 = $row_3["$table1Col2"];
			$s_link_3 = $row_3["$table1Col3"];
			$s_img_link_3 = $row_3["$table1Col4"];
		  
		  	$row_4 = $result->fetch_assoc();
			$s_Name_4 = $row_4["$table1Col2"];
			$s_link_4 = $row_4["$table1Col3"];
			$s_img_link_4 = $row_4["$table1Col4"];
		  
		  if (empty($s_Name_2)) {
			  
			  echo ('
			  	<br>
				<div class="card-deck">
				  
					<div class="card">
						<img class="card-img-top" src="'.$s_img_link_1.'" alt="Card image" style="width:100%">
						<div class="card-body">
							  <h4 class="card-title">'.$s_Name_1.'</h4>
							  <a href="'.$s_link_1.'" class="btn btn-primary">Download</a>
						</div>
					</div>

					<div class="card" style="visibility:hidden;"></div>

					<div class="card" style="visibility:hidden;"></div>

					<div class="card" style="visibility:hidden;"></div>
			
				</div>
			');
			  
		  }elseif(empty($s_Name_3)){
			  
			  echo ('
			  <br>
			  <div class="card-deck">
				  
				<div class="card">
					<img class="card-img-top" src="'.$s_img_link_1.'" alt="Card image" style="width:100%">
					<div class="card-body">
						  <h4 class="card-title" style="white-space: nowrap;">'.$s_Name_1.'</h4>
						  <a href="'.$s_link_1.'" class="btn btn-primary">Download</a>
					</div>
  				</div>
				
				<div class="card">
					<img class="card-img-top" src="'.$s_img_link_2.'" alt="Card image" style="width:100%">
					<div class="card-body">
						  <h4 class="card-title" style="white-space: nowrap;">'.$s_Name_2.'</h4>
						  <a href="'.$s_link_2.'" class="btn btn-primary">Download</a>
					</div>
  				</div>
				
				<div class="card" style="visibility:hidden;"></div>
				
				<div class="card" style="visibility:hidden;"></div>
			
			</div>
			');
			  
		  }elseif(empty($s_Name_4)){
			  
			  echo ('
			  <br>
			  <div class="card-deck">
				  
				<div class="card">
					<img class="card-img-top" src="'.$s_img_link_1.'" alt="Card image" style="width:100%">
					<div class="card-body">
						  <h4 class="card-title" style="white-space: nowrap;">'.$s_Name_1.'</h4>
						  <a href="'.$s_link_1.'" class="btn btn-primary">Download</a>
					</div>
  				</div>
				
				<div class="card">
					<img class="card-img-top" src="'.$s_img_link_2.'" alt="Card image" style="width:100%">
					<div class="card-body">
						  <h4 class="card-title" style="white-space: nowrap;">'.$s_Name_2.'</h4>
						  <a href="'.$s_link_2.'" class="btn btn-primary">Download</a>
					</div>
  				</div>
				
				<div class="card">
					<img class="card-img-top" src="'.$s_img_link_3.'" alt="Card image" style="width:100%">
					<div class="card-body">
						  <h4 class="card-title" style="white-space: nowrap;">'.$s_Name_3.'</h4>
						  <a href="'.$s_link_3.'" class="btn btn-primary">Download</a>
					</div>
  				</div>
				
			</div>
			');
			  
		  }else{
			  echo ('
			  <br>
			  <div class="card-deck">
				  
				<div class="card">
					<img class="card-img-top" src="'.$s_img_link_1.'" alt="Card image" style="width:100%">
					<div class="card-body">
						  <h4 class="card-title" style="white-space: nowrap;">'.$s_Name_1.'</h4>
						  <a href="'.$s_link_1.'" class="btn btn-primary">Download</a>
					</div>
  				</div>
				
				<div class="card">
					<img class="card-img-top" src="'.$s_img_link_2.'" alt="Card image" style="width:100%">
					<div class="card-body">
						  <h4 class="card-title" style="white-space: nowrap;">'.$s_Name_2.'</h4>
						  <a href="'.$s_link_2.'" class="btn btn-primary">Download</a>
					</div>
  				</div>
				
				<div class="card">
					<img class="card-img-top" src="'.$s_img_link_3.'" alt="Card image" style="width:100%">
					<div class="card-body">
						  <h4 class="card-title" style="white-space: nowrap;">'.$s_Name_3.'</h4>
						  <a href="'.$s_link_3.'" class="btn btn-primary">Download</a>
					</div>
  				</div>
				
				<div class="card">
					<img class="card-img-top" src="'.$s_img_link_4.'" alt="Card image" style="width:100%">
					<div class="card-body">
						  <h4 class="card-title" style="white-space: nowrap;">'.$s_Name_4.'</h4>
						  <a href="'.$s_link_4.'" class="btn btn-primary">Download</a>
					</div>
  				</div>
			</div>
			');
		  }
		  
		}

	} else {
		//echo "<br>No Data Found<br>";
	}
}

function echoCategories(){
	
	global $conn;
  	global $t2Name;
  	global $db;
	global $table2Col2;
	
	$sql_select_cat = "SELECT * FROM `$t2Name` WHERE 1";
	$result = $conn->query($sql_select_cat);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$cat = $row["$table2Col2"];
//			selectDataHelper($row["$table2Col2"]);
			echo '<tr class="popular-download-table">
					  <td><a href="#'.$cat.'" class="link-no-deco">'.$cat.'</a></td>
				  </tr>';
		}
	} else {
		echo '<tr class="popular-download-table">
				  <td><a href="#" class="link-no-deco">No Category</a></td>
			  </tr>';
	}
}

function selectOption(){
	$str = "";
	global $conn;
  	global $t2Name;
  	global $db;
	global $table2Col2;
	
	$sql_select_cat = "SELECT * FROM `$t2Name` WHERE 1";
	$result = $conn->query($sql_select_cat);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$str .= '<option>'.$row["$table2Col2"].'</option>';
		}
	} else {
		$str = "<option>No Data Found!</option>";
	}
	return $str;
}

if (isset($_POST['catValForList'])) {
	
	$catValForList =  $_POST["catValForList"];
	echo selectNameDownList("$catValForList");
}

function selectNameDownList($cat){
	$str = "";
	global $conn;
  	global $t1Name;
  	global $db;
	global $table1Col2;
	global $table1Col5;
	
	$check_duplicate = 'SELECT * FROM  `'.$t1Name.'` WHERE  `'.$table1Col5.'` =  "'.$cat.'"';
	$result = $conn->query($check_duplicate);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$str .= '<option>'.$row["$table1Col2"].'</option>';
		}
	} else {
		$str = "<option>No Data Found!</option>";
	}
	return $str;
}

if (isset($_POST['nameForEdit']) and isset($_POST['catForEdit'])) {
	
	$catForEdit =  $_POST["catForEdit"];
	$nameForEdit =  $_POST["nameForEdit"];
//	echo selectNameDownList("$nameForEdit");
	
	global $conn;
  	global $t1Name;
	global $table1Col5;
	global $table1Col2;
	
	$sql_select_cat = "SELECT * FROM `$t1Name` WHERE `$table1Col5` = '$catForEdit' AND `$table1Col2` = '$nameForEdit'";
	$result = $conn->query($sql_select_cat);

	$str = "";
	
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
//			selectDataHelper($row["$table2Col2"]);
			$str = '<h1 id="sIdForEdit">'.$row["ID"].'</h1>
			<h1 id="sNameForEdit">'.$row["$table1Col2"].'</h1>
			<h1 id="sImgLinkForEdit">'.$row["$table1Col4"].'</h1>
			<h1 id="sDownLinkForEdit">'.$row["$table1Col3"].'</h1>';
		}
	} else {
		$str = '<h1 id="sNameForEdit">Nothing Found</h1>';
	}
	
	echo $str;
}

function checkDupName($cName){
	global $t1Name;
	global $table1Col2;
	global $conn;
	
	$check_duplicate = 'SELECT * FROM  `'.$t1Name.'` WHERE  `'.$table1Col2.'` =  "'.$cName.'"';
	
	$data = $conn->query($check_duplicate);
	
	if($data->num_rows > 0){
		return true;
	}else{
		return false;
	}
}

if (isset($_POST['updateCardId']) and isset($_POST['updateCardName']) and isset($_POST['updateCardCat']) and isset($_POST['updateCardImgLink']) and isset($_POST['updateCardDownLink']) and isset($_POST['oldCardName'])) {
	
	$updateCardId =  $_POST["updateCardId"];
	$updateCardName =  $_POST["updateCardName"];
	$updateCardCat =  $_POST["updateCardCat"];
	$updateCardImgLink =  $_POST["updateCardImgLink"];
	$updateCardDownLink =  $_POST["updateCardDownLink"];
	$oldCardName =  $_POST["oldCardName"];
	
	if($oldCardName == $updateCardName){
		//if same name then go further
		echo updateCardHelper($updateCardName,$updateCardDownLink,$updateCardImgLink,$updateCardCat,$updateCardId);
	} else if(checkDupName($updateCardName) == true){
		//first check if it duplicate with others
		echo "Duplicate Name";
	}else{
		//if no duplicate then go further
	    echo updateCardHelper($updateCardName,$updateCardDownLink,$updateCardImgLink,$updateCardCat,$updateCardId);
	}
}

function updateCardHelper($updateName,$updateDownLink,$updateImgLink,$updateCat,$id){
	
	global $conn;
  	global $t1Name;
	global $table1Col2;
	global $table1Col3;
	global $table1Col4;
	global $table1Col5;
	
	$sql_update_card = "UPDATE `$t1Name` SET `$table1Col2` = '$updateName', `$table1Col3` = '$updateDownLink', `$table1Col4` = '$updateImgLink', `$table1Col5` = '$updateCat' WHERE `$t1Name`.`ID` = $id";
	
	if ($conn->query($sql_update_card) === TRUE) {
    	return "Data Updated Successfully";
	} else {
    	return "Error: " . $sql_update_card . "<br>" . $conn->error;
	}
}

if (isset($_POST['newCatName'])) {
	
	$newCatName =  $_POST["newCatName"];
	
	global $conn;
  	global $t2Name;
	global $table2Col2;
	
	$sql_check_duplicate = "SELECT * FROM `$t2Name` WHERE `$table2Col2` = '$newCatName'";
	$out = $conn->query($sql_check_duplicate);
	
	if ($out->num_rows > 0) {
		echo "Duplicate Category";
	}else{
		$sql_new_cat = "INSERT INTO `$db`.`$t2Name` (`ID`, `$table2Col2`) VALUES (NULL, '$newCatName')";
	
		if ($conn->query($sql_new_cat) === TRUE) {
			echo "Category Added Successfully";
		} else {
			echo "Error: " . $sql_new_cat . "<br>" . $conn->error;
		}
	}
}

if (isset($_POST['delCatName'])) {
	
	$delCatName = $_POST["delCatName"];
	
  	global $conn;
  	global $t2Name;
  	global $table2Col2;
	global $t1Name;
	global $table1Col5;
	
	$sql_del = "DELETE FROM `$t2Name` WHERE `$table2Col2` = '$delCatName'";
	$sql_del_card = "DELETE FROM `$t1Name` WHERE `$table1Col5` = '$delCatName'";

	if (($conn->query($sql_del) === TRUE) && ($conn->query($sql_del_card) === TRUE)) {
		echo "Category Deleted Successfully";
	} else {
		echo "Error deleting record: " . $conn->error;
	}
}


//SELECT * FROM `download-list` WHERE `Category` = 'Player' AND `SoftName` = 'GPM'

//UPDATE `download-list` SET `SoftName` = 'GPM Ply', `SoftLink` = 'http://simple.com/GPM', `SoftImgLink` = 'https://www.ginjadeals.com/wp-content/uploads/2017/12/4-month-trial-of-google-play-music-youtube-red.jpg', `Category` = 'Browser' WHERE `download-list`.`ID` = 2;

?>
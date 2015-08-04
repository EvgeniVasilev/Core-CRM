<?php
ob_start();
require_once './functions/crud.php';
require_once './templates/head.php';
?>
<div class="container-fluid window">
	<div>
		<a href="javascript: window.history.back()">Back</a>
	</div>
	<?php

	if (isset($_REQUEST["action"])) {

		switch($_REQUEST["action"]) {
			case "Edit" :
				$id = $_REQUEST['id'];
				$sql = "SELECT * FROM crm_customres WHERE cstm_id = '$id'";
				$result = $conn -> query($sql);

				foreach ($result as $row) {

					$edit = <<< EDIT
<form method="post" action="./modcrm.php?id=$id&action=Edit" class="col-lg-8  col-md-8  col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-1">
<h1>
<small>
Edit Customer Details
</small>
</h1>
        <div class="row">
            <!--LEFT SECTION-->
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="fName" class="label-default">First Name</label>
                    <br/>
                    <input id="fName"  name="fName" type="text" value="$row[cstm_fname]" required="required" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="sName" class="label-default">Second Name</label>
                    <br/>
                    <input id="sName"  name="sName" value="$row[cstm_sname]" type="text" required="required" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="lName" class="label-default">Last Name</label>
                    <br/>
                    <input id="lName"  name="lName" value="$row[cstm_lname]" type="text" required="required" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="email" class="label-default">E-Mail</label>
                    <br/>
                    <input id="email"  name="email" value="$row[cstm_email]" type="email" required="required" class="form-control"/>
                </div>

                <div class="form-group">                    
                    <label for="telephone" class="label-default">Telephone</label>                    
                    <br/>
                    <input id="telephone"  name="telephone" value="$row[cstm_tel]" type="text" required="required" class="form-control"/>
                </div>
            </div>
            <!--RIGHT SECTION-->
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="country" class="label-default">Country</label>
                    <br/>
                    <input id="country"  name="country" value="$row[cstm_country]" type="text" required="required" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="state" class="label-default">State</label>
                    <br/>
                    <input id="state"  name="state" value="$row[cstm_state]" type="text" required="required" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="city" class="label-default">City</label>
                    <br/>
                    <input id="city"  name="city" value="$row[cstm_city]" type="text" required="required" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="street" class="label-default">Street</label>
                    <br/>
                    <input id="street"  name="street" value="$row[cstm_street]" type="text" required="required" class="form-control"/>
                </div>
                
                <div class="form-group">
                    <label for="zip" class="label-default">Zip</label>
                    <br/>
                    <input id="zip"  name="zip" value="$row[cstm_zip]" type="text" required="required" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="label-default" for="notes">Notes</label>
                    <textarea id="notes" name="notes" class="form-control" required="required">$row[comments]</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="form-group">
                    <input type="submit" class="btn btn-primary form-control" name="process" value="Process Edit"/>
                </div>
            </div>           
        </div>
    </form>
EDIT;
				}

				echo $edit;

				if (isset($_REQUEST['process']) and $_REQUEST['process'] === "Process Edit") {
					
					if (isset($_REQUEST["fName"]) and !empty($_REQUEST["fName"])) {
						$fname = $_REQUEST["fName"];
					}

					if (isset($_REQUEST["sName"]) and !empty($_REQUEST["sName"])) {
						$sname = $_REQUEST["sName"];
					}

					if (isset($_REQUEST["lName"]) and !empty($_REQUEST["lName"])) {
						$lname = $_REQUEST["lName"];
					}

					if (isset($_REQUEST["country"]) and !empty($_REQUEST["country"])) {
						$country = $_REQUEST["country"];
					}

					if (isset($_REQUEST["city"]) and !empty($_REQUEST["city"])) {
						$town = $_REQUEST["city"];
					}

					if (isset($_REQUEST["state"]) and !empty($_REQUEST["state"])) {
						$state = $_REQUEST["state"];
					}

					if (isset($_REQUEST["street"]) and !empty($_REQUEST["street"])) {
						$street = $_REQUEST["street"];
					}

					if (isset($_REQUEST["zip"]) and !empty($_REQUEST["zip"])) {
						$zip = $_REQUEST["zip"];
					}

					if (isset($_REQUEST["telephone"]) and !empty($_REQUEST["telephone"])) {
						$telephone = $_REQUEST["telephone"];
					}

					if (isset($_REQUEST["email"]) and !empty($_REQUEST["email"])) {
						$email = $_REQUEST["email"];
					}
					
					if (isset($_REQUEST["notes"]) and !empty($_REQUEST["notes"])) {
						$notes = $_REQUEST["notes"];
					}
echo $id;
					$sql = "UPDATE crm_customres SET cstm_fname = '$fname', cstm_sname = '$sname', cstm_lname = '$lname', cstm_email = '$email', cstm_tel ='$telephone', cstm_country = '$country', cstm_state = '$state', cstm_city ='$town', cstm_street = '$street', cstm_zip = '$zip', comments = '$notes'  WHERE cstm_id = '$id' "; 
                    
                    update($sql);
					header("Location: ./full.php?id=$id");

				}

				break;

			case "Delete" :
				$id = $_REQUEST['id'];
				$sql = "SELECT * FROM crm_customres WHERE cstm_id = '$id'";
				$result = $conn -> query($sql);
				echo "<div class=\"alert-danger padded\">";
				foreach ($result as $row) {
					echo "Are sure that you want to delete record for: &nbsp;";
					echo $row["cstm_fname"];
					echo "&nbsp;";
					echo $row["cstm_sname"];
					echo "&nbsp;";
					echo $row["cstm_lname"];
					echo " ?";

					echo "&nbsp;";
					echo "&nbsp;";
					echo "<span>&nbsp;|&nbsp;</span>";
					echo "&nbsp;";
					echo "<a href=\"./modcrm.php?id=$id&action=Delete&process=1\">";
					echo "Yes";
					echo "</a>";

					echo "<span>&nbsp;|&nbsp;</span>";
					echo "&nbsp;";
					echo "<a href=\"./modcrm.php?id=$id&action=Delete&process=0\">";
					echo "No";
					echo "</a>";
					echo "<span>&nbsp;|&nbsp;</span>";
				}
				echo "</div>";

				if (isset($_REQUEST["process"]) and $_REQUEST["process"] == "1") {
                    $sql = "DELETE FROM crm_customres WHERE cstm_id = '$id'";
                    delete($sql);
					header("Location:./delete.php");
				}

				if (isset($_REQUEST["process"]) and $_REQUEST["process"] == "0") {
					header("Location: ./full.php?id=$id");
				}
				break;

			case "Add New Customer":
            
                if (isset($_REQUEST["fName"]) and !empty($_REQUEST["fName"])) {
                        $fname = $_REQUEST["fName"];
                }

                if (isset($_REQUEST["sName"]) and !empty($_REQUEST["sName"])) {
                    $sname = $_REQUEST["sName"];
                }

                if (isset($_REQUEST["lName"]) and !empty($_REQUEST["lName"])) {
                    $lname = $_REQUEST["lName"];
                }

                if (isset($_REQUEST["country"]) and !empty($_REQUEST["country"])) {
                    $country = $_REQUEST["country"];
                }

                if (isset($_REQUEST["city"]) and !empty($_REQUEST["city"])) {
                    $town = $_REQUEST["city"];
                }

                if (isset($_REQUEST["state"]) and !empty($_REQUEST["state"])) {
                    $state = $_REQUEST["state"];
                }

                if (isset($_REQUEST["street"]) and !empty($_REQUEST["street"])) {
                    $street = $_REQUEST["street"];
                }

                if (isset($_REQUEST["zip"]) and !empty($_REQUEST["zip"])) {
                    $zip = $_REQUEST["zip"];
                }

                if (isset($_REQUEST["telephone"]) and !empty($_REQUEST["telephone"])) {
                    $telephone = $_REQUEST["telephone"];
                }

                if (isset($_REQUEST["email"]) and !empty($_REQUEST["email"])) {
                    $email = $_REQUEST["email"];
                }
                
                if (isset($_REQUEST["notes"]) and !empty($_REQUEST["notes"])) {
                    $notes = $_REQUEST["notes"];
                }
                
                if(isset($_REQUEST["date_joined"]) and !empty($_REQUEST["date_joined"])){
                    $date_joined = $_REQUEST["date_joined"];
                }
                
                $sql = "INSERT INTO crm_customres (cstm_fname,cstm_sname,cstm_lname,cstm_email, cstm_tel,cstm_country, cstm_state, cstm_city, cstm_street, cstm_zip, comments, cstm_date_joined) Values('".$fname."', '".$sname."', '".$lname."','".$email."', '".$telephone."', '".$country."', '".$state."', '".$town."', '".$street."', '".$zip."','".$notes."', '".$date_joined."')";
                    
                insert($sql);
                 
                header("Location: ./index.php");  
               
				break;
		}
	}
?>
	<br/>
	<div class="clearfix"></div>
	</div>
	<?php
	require_once './templates/footer.php';
	?>

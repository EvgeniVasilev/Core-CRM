<?php
require_once './functions/crud.php';
require_once './templates/head.php';
?>
<div class="container-fluid window">
<div class="page-header">
<h3>
Orenda Customers
</h3>
</div>
	<?php
	$sql = "SELECT * FROM crm_customres ORDER BY cstm_id DESC";
	$result = select($sql);	
	$rows = $result -> rowCount();   	
    
	if ($rows ==  0) {
		echo "<h2>Nothing to display yet!</h2>";
	} 
    
    if($rows !== 0 ){
        echo "<table class=\"table table-striped\">";
        echo "<thead>";
        echo "<tr>";
        echo "<th>First Name</th>";
        echo "<th>Second Name</th>";
        echo "<th>Last name</th>";
        echo "<th>Country</th>";
        echo "<th>Date Joined</th>";
        echo "<th>View Full Information</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";    
    
    
		
        
		foreach($result as $row) {
			
            echo "<tr>";
			$id = $row["cstm_id"];			
           
			echo "<td>";
			echo $row["cstm_fname"];
			echo "</td>";

			echo "<td>";
			echo $row["cstm_sname"];
			echo "</td>";

			echo "<td>";
			echo $row["cstm_lname"];
			echo "</td>";

			echo "<td>";
			echo $row["cstm_country"];
			echo "</td>";

			echo "<td>";
			echo $row["cstm_date_joined"];
			echo "</td>";

			echo "<td>";
			echo "<a href=\"./full.php?id=$id\">";
			echo "View";
			echo "</a>";
			echo "</td>";
            echo "</tr>";            
        }
		
		echo "</tbody>";
		echo "</table>";	
    }    
?>
</div>
<?php
require_once './templates/footer.php';
?>

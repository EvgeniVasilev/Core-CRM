<?php
require_once './functions/crud.php';
require_once './templates/head.php';
?>
    <div class="container-fluid window">
    <h3 class="page-header">       
        Search Results        
    </h3>
        <?php
        if (isset($_REQUEST['keywords']) and empty($_REQUEST['keywords'])) {
            echo "<div class=\"alert-danger slick\">";
            echo "<p>Please insert some words to search!</p>";
            echo "</div>";
        } 
        
        if (isset($_REQUEST['keywords'])) {
            $keywords = $_REQUEST['keywords'];
        }
        $search = "SELECT * FROM crm_customres "
                ." WHERE MATCH(cstm_fname,cstm_sname,cstm_lname,cstm_country)"
                ." AGAINST ('".$keywords."' IN BOOLEAN MODE)"
                ." ORDER BY MATCH (cstm_fname,cstm_sname,cstm_lname, cstm_country) "
                ." AGAINST ('".$keywords."' IN BOOLEAN MODE)";
                
        $result = select($search);
        $rows = $result->rowCount();
        
        if(isset($_REQUEST['keywords']) and !empty($_REQUEST['keywords'])){
            if($rows === 0){
                 echo "<div class=\"alert-danger slick\">";
                echo "<p>No match Found!</p>";
                echo "</div>";
            }
            
            if ($rows !== 0) {
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


            foreach ($result as $row) {

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
    }   
    ?>
    </div>
<?php
require_once './templates/footer.php'; 

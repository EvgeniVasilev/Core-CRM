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
    $pager = "";
    
    $sql = "SELECT * FROM crm_customres";
    $result = select($sql);
    $rows = $result->rowCount();        
    $rec_count = $rows;
    
    if ($rows == 0) {
        echo "<h2>Nothing to display yet!</h2>";
    }
    
    if(isset($_GET["p"])){
        $p = $_GET["p"];
        
    } else {    
    $n = 10;
    
    if ($rows > 0) {
        
        if(!isset($_GET["page"])){
            $page = 0;
        } else {
            $page = $_GET["page"];
        }
        
        
        $records = $page * $n;       
       
        
        $show_records = 'SELECT * FROM crm_customres ORDER BY cstm_id DESC  LIMIT ' . $records . ",  $n";   
        $result = select($show_records);
        $max = $result->rowCount();
        
        if($page > 0 ){
            $p = $page - 1;
            $pager .="<li class='previous'>";            
            $pager .= "<a href='./index.php?page=$p'><i>&larr; </i>Back</a>";
            $pager .="</li>";
        }
        
        $page++;
        
        if($records + $n < $rec_count){
            $pager .= "<li class='next'>";
            $pager .= "<a href='./index.php?page=$page'>NEXT<i>&rarr;</i></a>";
            $pager .= "</li>";
        }
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


        foreach($result as $row){         
            
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
        echo "<ul class='pager'>";
        echo $pager;
        echo "</ul>";
        }
    }
  
    ?>
</div>
<?php
require_once './templates/footer.php';
?>

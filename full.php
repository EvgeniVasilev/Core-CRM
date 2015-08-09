<?php
require_once './functions/crud.php';
require_once './templates/head.php';
?>
    <div class="container-fluid window">
        <?php
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM crm_customres WHERE cstm_id = '$id'";
        $result = select($sql);
        $rows = $result->rowCount();

        if ($rows == 0) {
            echo "<h2>Nothing to display yet!</h2>";
        }
        foreach ($result as $row) {
            $body = <<< EOD
   <div class="page-header">
       <h3>          
            Customer's Details         
       </h3>
   </div>
   <div class="row">
   <div class="col-lg-12">
   <a class="pull-right btn btn-primary" href="mail.php?id=$id">Send mail to $row[cstm_fname]&nbsp;$row[cstm_sname]</a>
   </div>
   <br/>
   <br/>
   </div>
   <div class="well">
       <p><b><u>1. Personal Details:</u></b></p>
       <p><b>First Name:</b>&nbsp;$row[cstm_fname]</p>
       <p><b>Second Name:</b>&nbsp;$row[cstm_sname]</p>
       <p><b>Last Name:</b>&nbsp;$row[cstm_lname]</p>
       <p><b>E-mail Name:</b>&nbsp;$row[cstm_email]</p>
       <p><b>Telephone:</b>&nbsp;$row[cstm_tel]</p>
       <p><b><u>2. Address</u></b></p>
       <p><b>Country:</b>&nbsp;$row[cstm_country]</p>
       <p><b>State:</b>&nbsp;$row[cstm_state]</p>
       <p><b>Street:</b>&nbsp;$row[cstm_street]</p>
       <p><b>Zip:</b>&nbsp;$row[cstm_zip]</p>
       <p><b><u>3. Other:</u></b></p>
       <p><b>Date Joined:</b>&nbsp;$row[cstm_date_joined]</p>
       <p><b>Notes:</b>&nbsp;$row[comments]</p>
   </div>
   <form method="post" action="modcrm.php" class="form-inline">
       <input type="hidden" name="fName" vlue="$row[cstm_fname]"/>
       <input type="hidden" name="id" value="$id"/>
       <input type="submit" name="action" value="Edit" class="btn btn-primary"/>
       <input type="submit" name="action" value="Delete" class="btn btn-primary"/>
   </form>
   <br/>
EOD;

            echo $body;
        }
        ?>
    </div>
<?php
require_once './templates/footer.php';

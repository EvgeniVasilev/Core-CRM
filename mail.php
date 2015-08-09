<?php
require_once './functions/crud.php';
require_once './templates/head.php';
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
}
$sql = "SELECT * FROM crm_customres WHERE cstm_id = '$id'";
$email = "";
$id = '';
$full_name = '';
$result = select($sql);

foreach ($result as $row) {
    $id = $row["cstm_id"];
    $email = $row["cstm_email"];
    $full_name = $row["cstm_fname"] . " " . $row["cstm_sname"] . " " . $row["cstm_lname"];
}
?>
    <div class="container-fluid window">
        <form method="post" action="send_email.php"
              class="col-lg-8  col-md-8  col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-1">
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
            <input type="hidden" name="full_name" value="<?php echo $full_name ?>"/>

            <div class="form-group">
                <label class="label-default" for="email">E-mail</label>
                <br/>

                <div class="row">
                    <div class="col-lg-6">
                        <input type="emai" value="<?php echo $email ?>" name="email" class="form-control"/>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <label class="label-default" for="email">Message</label>
                <br/>
                <textarea name="message" class="form-control">Dear  <?php echo $full_name; ?> , </textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Send E-Mail" class="btn btn-primary"/>
            </div>
        </form>
    </div>
<?php
require_once './templates/footer.php';

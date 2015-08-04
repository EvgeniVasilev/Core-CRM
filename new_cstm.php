<?php
require_once './templates/head.php';
?>
<div class="window">
	<div class="page-header">
		<h2><small> Add New Customer </small></h2>
	</div>
	<form method="post"  action="modcrm.php" class="col-lg-8  col-md-8  col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-1">
		<div class="row">
			<!--LEFT SECTION-->
			<div class="col-lg-6">
				<div class="form-group">
					<label for="fName" class="label-default">First Name</label>
					<br/>
					<input id="fName"  name="fName" type="text" required="required" class="form-control"/>
				</div>

				<div class="form-group">
					<label for="sName" class="label-default">Second Name</label>
					<br/>
					<input id="sName"  name="sName" type="text" required="required" class="form-control"/>
				</div>

				<div class="form-group">
					<label for="lName" class="label-default">Last Name</label>
					<br/>
					<input id="lName"  name="lName" type="text" required="required" class="form-control"/>
				</div>

				<div class="form-group">
					<label for="email" class="label-default">E-Mail</label>
					<br/>
					<input id="email"  name="email" type="email" required="required" class="form-control"/>
				</div>

				<div class="form-group">					
					<label for="telephone" class="label-default">Telephone</label>					
					<br/>
					<input id="telephone"  name="telephone" type="text" required="required" class="form-control"/>
				</div>
			</div>
			<!--RIGHT SECTION-->
			<div class="col-lg-6">
				<div class="form-group">
					<label for="country" class="label-default">Country</label>
					<br/>
					<input id="country"  name="country" typee="text" required="required" class="form-control"/>
				</div>

				<div class="form-group">
					<label for="state" class="label-default">State</label>
					<br/>
					<input id="state"  name="state" type="text" required="required" class="form-control"/>
				</div>

				<div class="form-group">
					<label for="city" class="label-default">City</label>
					<br/>
					<input id="city"  name="city" type="text" required="required" class="form-control"/>
				</div>

				<div class="form-group">
					<label for="street" class="label-default">Street</label>
					<br/>
					<input id="street"  name="street" type="text" required="required" class="form-control"/>
				</div>
				
				<div class="form-group">
					<label for="zip" class="label-default">Zip</label>
					<br/>
					<input id="zip"  name="zip" type="text" required="required" class="form-control"/>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="form-group">
					<label class="label-default" for="notes">Notes</label>
					<textarea id="notes" name="notes" class="form-control" required="required"></textarea>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<div class="form-group">
					<input type="submit" class="btn btn-primary form-control" name="action" value="Add New Customer"/>
				</div>
			</div>
			<input type="hidden" name="date_joined" value="<?php  echo date('Y-m-d');?>"/>
		</div>
	</form>
</div>
<?php
require_once './templates/footer.php';

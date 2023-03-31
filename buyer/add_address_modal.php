<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New Address</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="add_address.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Home Address:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="home_address" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Zip:</label>
					</div>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="zip" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">State:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="state" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Area:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="area" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Phone Number:</label>
					</div>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="phone_number" required>
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"> Save</a>
			</form>
            </div>

        </div>
    </div>
</div>
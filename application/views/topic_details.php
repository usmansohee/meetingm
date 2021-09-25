
<div class="row">
	<div class="col-md-6">
		<h1 class="h3 mb-3 ml-4 text-gray-800"><?= $topics['id'].". ".$topics['name'] ?></h1>
	</div>

	<div class="col d-flex align-self-start justify-content-end">

		<button type="button" class="btn btn-info btn-icon-split mr-1" id="attendees" name="attendees" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
			<span class="icon text-white-50"><i class="fas fa-user"></i></span>
			<span class="text">Select Participants</span>
		</button>

		<button type="button" class=" btn btn-success btn-icon-split mr-1 " data-toggle="modal" data-id="2014-123456" data-target=".bd-example-modal-lg">
			<span class="icon text-white-50"><i class="fas fa-plus"></i></span>
			<span class="text">Add Topic</span>
		</button>

		<a style="text-decoration: none;" href="<?php echo site_url('welcome/admin_project/');?>"><button type="button" class=" btn btn-primary btn-icon-split mr-4">
			<span class="icon text-white-50"><i class="fas fa-folder"></i></span>
			<span class="text">Projects</span>
		</button></a>

	</div>

</div>

<?php foreach($data_set as $key=>$value){ ?>
	<form method="post" action="<?php echo site_url('welcome/update_topic_details/'.$value['id']);?>" >
<?php

echo "<div class='card shadow mb-1'>";
echo "	<div class='card-header py-1 form-inline'>";
echo "		<div class='container d-flex justify-content-between'>";
echo "			<h6 class='m-0 font-weight-bold text-primary d-flex align-items-center'>Topic {$value['chap_id']}</h6>";
echo "			<div class='col d-flex align-self-start justify-content-end'>";
echo "		 		<button type='submit' class='btn btn-primary btn-sm' data-toggle='tooltip' data-placement='top' title='Save'><i class='fas fa-fw fa-save'></i></button>";
echo "			</div>";
echo "		</div>";
echo "	</div>";

echo "<div class='card shadow mb-1 mt-1 mr-3 ml-3'>";
echo "	<div class='card-body'>";
echo "		<div class='table-responsive'>";
echo "			<table class='table table-bordered small mb-0' id='dataTable' width='100%' cellspacing='0'>";
echo "				<thead class='row-12'>";
echo "				<tr>";

echo "					<div class='col-1'><th class='col-0'>Week</th></div>";
echo "					<div class='col-1'><th class='col-2'>Date</th></div>";
echo "					<div class='col-1'><th class='col-6'>Notes</th></div>";
//echo "					<div class='col-1'><th class='col-2'>Participants</th></div>";
echo "					<div class='col-1'><th class='col-2'>Status</th></div>";
echo "					<div class='col-1'><th class='col-2'>Due</th></div>";
echo "				</tr>";
echo "				</thead>";
echo "				<tbody>";
echo "				<tr>";

echo "					<td><input type='text' name='week_no' class='form-control form-control-sm' value='{$value['week']}' placeholder='20' required readonly></td>";
echo "					<td><input type='text' id='datepicker1' name='date' class='form-control form-control-sm' value='{$value['date']}'  placeholder='12/11/1997' required></td>";
echo "					<td><textarea type='text' name='note' rows='3' class='form-control form-control-sm' placeholder='this is some description text area' required>{$value['note']}</textarea></td>";
//echo "					<td><input type='text' name='participants' class='form-control form-control-sm' value='{$value['assigned_to']}' placeholder='HR.Canva' readonly></td>";
echo "					<td><input type='text' name='status' class='form-control form-control-sm' value='{$value['status']}' placeholder='Completed' required></td>";
echo "					<td><input type='text' id='datepicker2' name='due_date' class='form-control form-control-sm' value='{$value['due_date']}' placeholder='12/11/1997' required></td>";
echo "				</tr>";
echo "				</tbody>";
echo "			</table>";
echo "		</div>";
echo "	</div>";
echo "</div>";

echo "<div class='row justify-content-center'>";
echo "<div class='input-group mb-1 mr-5 ml-5'>";
 echo "<div class='input-group-prepend'>";
 echo   "<span class='input-group-text bg-info text-light' id='basic-addon1'>Selected Participants</span>";
 echo "</div>";
echo  "<input type='text' class='form-control' placeholder='participants' aria-label='participants' value='{$value['assigned_to']}' aria-describedby='basic-addon1' readonly>";
echo "</div>";
echo "</div>";

##### attendees ############
echo "<div class='card shadow mb-1 mr-3 ml-3'>";
echo "			<div class='card-header py-1'>";
echo "				<h6 class='m-0 font-weight-bold text-primary'>Participants</h6>";
echo "			</div>";
echo "			<div class='collapse' id='collapseExample'>";
echo "				<div class='card-body'>";
echo "					<div class='table-responsive'>";
echo "						<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
echo "							<thead>";
echo "							<tr>";
echo "								<th>#</th>";
echo "								<th>Name</th>";
echo "								<th>Company</th>";
echo "								<th>Email</th>";
echo "								<th>Attending</th>";
echo "							</tr>";
echo "							</thead>";

echo "							<tbody>";
								 foreach($data_attendees as $key=>$value){
echo "							<tr>";

echo "								<td>{$value['id']}</td>";
echo "								<td>{$value['name']}</td>";
echo "								<td> {$value['company']}</td>";
echo "								<td>{$value['email']}</td>";
echo "								<td>";
echo "									<div class='form-check text-center'>";
echo "										<input class='form-check-input position-static' type='checkbox' name='attendee_checkbox[]' id='blankCheckbox' value='{$value['id']}'>";
echo "									</div>";
echo "								</td>";
echo "							</tr>";
							 	}
echo "						</tbody>";
echo "					</table>";
echo "				</div>";
echo "			</div>";
echo "		</div>";
echo "</div>";

echo "</div>";

echo "</form>";

}
?>

	<!-- Modal -->
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><?php echo $topics['id'].". ".$topics['name'] ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form class="user" method="post" action="<?php echo site_url('welcome/add_topic_details');?>">
				<div class="modal-body">

					<div class="form-row">

						<!--		Main Topic ID		-->
						<div class="form-group col-md-4" hidden>
							<label for="name">Topic #</label>
							<input type="text" class="form-control" name="topic_no" value="<?php echo $topics['id'] ?>" readonly>
						</div>

						<div class="form-group col-md-4">
							<label for="name">Chap #</label>
							<input type="text" class="form-control" name="chap_no" value="<?php echo $topics['id'].".".(count($data_set)+1) ?>" readonly>
						</div>

						<div class="form-group col-md-4">
							<label for="number">Week no</label>
							<input type="text" class="form-control"  name="week" value="<?php echo date("W");?>" placeholder="TBZ 98" readonly>
						</div>
						<div class="form-group col-md-4">
							<label for="number">Date</label>
							<input type="text" class="form-control" id="date3" name="date" placeholder="01/01/2000"  required>
						</div>
					</div>

					<div class="form-group">
						<label for="name">Notes</label>
						<textarea  rows="6" type='text' name='note' class='form-control form-control-sm' placeholder='Start writing your notes/description here' required></textarea>

					</div>

					<div class="form-row">
						<div class="form-group col-md-4" hidden >
							<label for="name">Participants</label>
							<input type="text" class="form-control" name="paricipants" placeholder="paricipants" >
						</div>

						<div class="form-group col-md-6" hidden>
							<label for="name">Status</label>
							<input type="text" class="form-control" name="status" placeholder="In Progress" >
						</div>

						<div class="form-group col-md-6">
							<div class="form-group">
								<label for="dropdown_status">Status</label>
								<select class="form-control" id="dropdown_status" name="dropdown_status" required>
									<option>Information</option>
									<option>In Progress</option>
									<option>Completed</option>
									<option>Grace period</option>
									<option>Open minded</option>
								</select>
							</div>
						</div>

						<div class="form-group col-md-6">
							<label for="number">Due Date</label>
							<input type="text" class="form-control" id="date4" name="due_date" placeholder="01/01/2000"  required>
						</div>
					</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>

			</form>

			</div>
		</div>
	</div>

<script>
	$('#datepicker').datepicker({
		uiLibrary: 'bootstrap4'
	});
	$('#datepicker').datepicker({
		uiLibrary: 'bootstrap4'
	});
</script>

<script>
	$('#date3').datepicker({
		uiLibrary: 'bootstrap4'
	});
	$('#date4').datepicker({
		uiLibrary: 'bootstrap4'
	});
</script>

<script>
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
</script>

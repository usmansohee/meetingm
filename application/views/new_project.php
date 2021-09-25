
<div class="w-100 " style="padding-right: 20px; padding-left: 20px ">

	<form class="project" method="post" enctype="multipart/form-data" action="<?php echo site_url('welcome/add_project/'.$admin_project_id);?>">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">

		<h1 class="h3 mb-0 text-gray-800"><?=  $data_admin[0]['id'].'. '.$data_admin[0]['name']?></h1>


		<button type="submit" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-file-download"></i>
                                        </span>
			<span class="text">Download PDF</span>
		</button>

	</div>

		<div class="form-row">
			<div class="form-group col-md-3">
				<label for="name">Project Name</label>
				<input type="text" class="form-control" id="project_name" name="project_name" placeholder="Example" required>
			</div>
			<div class="form-group col-md-3">
				<label for="number">Topic Name</label>
				<input type="text" class="form-control" name="topic_name" placeholder="TBZ 98" required>
			</div>
			<div class="form-group col-md-3">
				<label for="address">Date</label>
				<input type="text" class="form-control" id="date" name="date" placeholder="01/01/2000" required>
			</div>

			<div class="form-group col-md-3">
				<label>Picture</label>
				<input class="form-control" type="file" name="picture" />
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="zip">Loacation</label>
				<input type="text" class="form-control" id="location" name="location" placeholder="1234 Main St" required>
			</div>
			<div class="form-group col-md-4">
				<label for="country">Side Dishes</label>
				<input type="text" class="form-control" id="side_dishes" name="side_dishes" placeholder="ABZ 009" required>
			</div>

			<div class="form-group col-md-4">
				<label class="row ml-1" for="country">Participants</label>
				<button type="button" class="row-12 btn w-100 btn-primary" id="attendees" name="attendees"  data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" >Select Attendees</button>
			</div>
		</div>


		<div class="card shadow mb-2">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Participants</h6>
			</div>
			<div class="collapse" id="collapseExample">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Company</th>
								<th>Email</th>
								<th>Attending</th>
							</tr>
							</thead>
							<tbody>
								<?php foreach($data_attendees as $key=>$value){ ?>
									<tr>

										<td><?= $value['id'] ?></td>

										<?php
											echo "<td>{$value['name']}</td>";
											echo "<td> {$value['company']}</td>";
											echo "<td>{$value['email']}</td>";
										?>
										<td>
											<div class="form-check text-center">
												<input class="form-check-input position-static" type="checkbox" name="attendee_checkbox[]" id="blankCheckbox" value="<?=$value['id']?> " checked>
											</div>
										</td>
									</tr>

								<?php }  ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="card shadow mb-2">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
						<tr>
							<th>Next Appointment</th>
							<th>Time</th>
							<th>Location</th>
							<th>Topic</th>
						</tr>
						</thead>
						<tbody>
							<tr>
								<td><input id="datepicker1" name="datepicker1" placeholder="01/01/2000" required></td>
								<td><input id="timepicker1" name="timepicker1" placeholder="08:00" required></td>
								<td><input type="text" name="loc1" class="form-control" placeholder="location" required></td>
								<td><input type="text" name="topic1" class="form-control" placeholder="topic" required></td>
							</tr>
							<tr>
								<td><input id="datepicker2" name="datepicker2" placeholder="01/01/2000" required></td>
								<td><input id="timepicker2" name="timepicker2" placeholder="8:00" required></td>
								<td><input type="text" name="loc2" class="form-control" placeholder="location" required></td>
								<td><input type="text" name="topic2" class="form-control" placeholder="topic" required></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="card shadow mb-2">
			<div class="card-body">
				<textarea id="summernote" name="summernote" required></textarea>
			</div>
		</div>

	</form>
	<hr>

<!--	SHOW SELECTED PROJECT DETAILS HERE UNEDITABLE-->
	<?php foreach($data_topic as $key=>$value){

		echo "<div class='card shadow mb-2'>";

		echo "	<div class='card-header py-2 form-inline'>";
		echo "		<div class='container d-flex justify-content-between'>";
		echo "			<h6 class='m-0 font-weight-bold text-primary d-flex align-items-center'>{$value['id']}. {$value['name']}</h6>";
		echo "		</div>";
		echo "	</div>";

		echo "	<div class='card-body'>";
		echo "		<div class='table-responsive'>";
		echo "			<table class='table table-bordered small mb-0' id='dataTable' width='100%' cellspacing='0'>";

		echo "				<thead class='row-12'>";
		echo "				<tr>";
		echo "					<div class='col-1'><th class='col-0'>Topic#</th></div>";
		echo "					<div class='col-1'><th class='col-0'>Week</th></div>";
		echo "					<div class='col-1'><th class='col-2'>Date</th></div>";
		echo "					<div class='col-1'><th class='col-4'>Notes</th></div>";
		echo "					<div class='col-1'><th class='col-2'>Participants</th></div>";
		echo "					<div class='col-1'><th class='col-2'>Status</th></div>";
		echo "					<div class='col-1'><th class='col-2'>Due</th></div>";
		echo "				</tr>";
		echo "				</thead>";
	foreach($data_topic_detail as $key=>$detail_value) {
		if ($value['id']==$detail_value['topic_id']) {
			echo "				<tbody>";
			echo "				<tr>";
			echo "					<td>{$detail_value['chap_id']}</td>";
			echo "					<td>{$detail_value['week']}</td>";
			echo "					<td>{$detail_value['date']}</td>";
			echo "					<td>{$detail_value['note']}</td>";
			echo "					<td>{$detail_value['assigned_to']}</td>";
			echo "					<td>{$detail_value['status']}</td>";
			echo "					<td>{$detail_value['due_date']}</td>";
			echo "				</tr>";
			echo "				</tbody>";
		}
	}
		echo "			</table>";
		echo "		</div>";
		echo "	</div>";
		echo "</div>";

		}
		?>
</div>

<script>
	$('#datepicker1').datepicker({
		uiLibrary: 'bootstrap4'
	});
	$('#datepicker2').datepicker({
		uiLibrary: 'bootstrap4'
	});
	$('#timepicker1').timepicker({
		uiLibrary: 'bootstrap4'
	});
	$('#timepicker2').timepicker({
		uiLibrary: 'bootstrap4'
	});
	$('#date').datepicker({
		uiLibrary: 'bootstrap4'
	});
</script>
<script>

	$('#summernote').summernote({

		placeholder: 'Project description...',
		tabsize: 2,
		height: 100,
		toolbar: [
			['style', ['style']],
			['font', ['bold', 'underline', 'clear']],
			['para', ['ul', 'ol', 'paragraph']],
			['table', ['table']]
		]
	});
</script>

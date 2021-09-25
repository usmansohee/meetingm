<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="card shadow mb-4">

		<div class="card shadow mb-4">

			<div class="card-header py-3">
				<div class='container d-flex justify-content-center'>

					<div class='col d-flex align-self-center '>
						<h5 class="m-0 font-weight-bold text-primary">Projects</h5>
					</div>

					<div class='col d-flex align-self-start justify-content-end'>
						<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-fw fa-plus"></i></button>
					</div>

				</div>
			</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th>#</th>
						<th>Project Name</th>
						<th>Project Number</th>
						<th>Address</th>
						<th>Country</th>
						<th>Actions</th>

					</tr>
					</thead>

					<tbody>

					<?php $i=1; foreach($data_set as $key=>$value){ ?>

						<tr>
							<td><?= $i;?></td>
							<?php echo "<td>{$value['name']}</td>";
							echo "<td> {$value['number']}</td>";
							echo "<td>{$value['address']}</td>";
							echo "<td>{$value['country']}</td>"; ?>
							<td class="text-center">
								<a style="text-decoration: none;" href="<?php echo site_url('/welcome/delete_admin_project/'.$value['id']);?>"> <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-fw fa-trash"></i></button> </a>
								<a style="text-decoration: none;" href="<?php echo site_url('/welcome/topics/'.$value['id']);?>"> <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View"><i class="fas fa-fw fa-eye"></i></button> </a>
								<a style="text-decoration: none;" href="<?php echo site_url('/welcome/new_project/'.$value['id']);?>" class="btn btn-primary btn-icon-split btn-sm"  data-toggle="tooltip" data-placement="top" title="Create">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-file-pdf"></i>
                                        </span>
									<span class="text">Create PDF</span>
								</a>

							</td>
						</tr>

						<?php $i++; }  ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add New Project</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form class="user" method="post" action="<?php echo site_url('welcome/add_admin_project');?>">

					<div class="modal-body">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="name">Project Name</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Example">
							</div>
							<div class="form-group col-md-6">
								<label for="number">Project Number</label>
								<input type="text" class="form-control" id="number" name="number" placeholder="ABC 123">
							</div>
						</div>
						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St.">
						</div>

						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="zip">Zip</label>
								<input type="text" class="form-control" id="zip" name="zip" placeholder="12345">
							</div>

							<div class="form-group col-md-6">
								<label for="country">Country</label>
								<input type="text" class="form-control" id="country" name="country" placeholder="Austria">
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="date1">Construction Start</label>
								<input type="text" class="form-control" id="date1" name="start" placeholder="01/01/2000">
							</div>

							<div class="form-group col-md-6">
								<label for="date2">Construction End</label>
								<input type="text" class="form-control" id="date2" name="end" placeholder="01/01/2000">
							</div>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" name="submit" class="btn btn-primary">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</div>

<script>
	$('#date1').datepicker({
		uiLibrary: 'bootstrap4'
	});
	$('#date2').datepicker({
		uiLibrary: 'bootstrap4'
	});
</script>
<script>
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
</script>


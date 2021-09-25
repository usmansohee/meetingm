<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">

		<div class="card-header py-3">
			<div class='container d-flex justify-content-center'>

				<div class='col d-flex align-self-center '>
					<h5 class="m-0 font-weight-bold text-primary">Attendees</h5>
				</div>

				<div class='col d-flex align-self-start justify-content-end'>
					<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" data-toggle="tooltip" data-placement="left" title="New"><i class="fas fa-fw fa-plus"></i></button>
				</div>

			</div>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Company</th>
						<th>Email</th>
						<th>Actions</th>

					</tr>
					</thead>

					<tbody>

					<?php $i=1; foreach($data_set as $key=>$value){

					?>

					<tr>
						<td><?= $i  ?></td>
						<td><?= $value['name']  ?></td>
						<?php echo "<td>{$value['company']}</td>";
						echo "<td> {$value['email']}</td>";
						 ?>
						<td class="text-center">
							<a href="<?php echo site_url('/welcome/delete_attendee/'.$value['id']);?>"> <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="left" title="Delete"><i class="fas fa-fw fa-trash"></i></button> </a>

						</td>
					</tr>

					<?php
						$i++; }
						 ?>

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
					<h5 class="modal-title" id="exampleModalLabel">Add New Attendee</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form class="user" method="post" action="<?php echo site_url('welcome/add_attendee');?>">
					<div class="modal-body">

						<div class="row justify-content-center">


							<div class="form-group col-md-10">
								<label for="address">Name</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="John doe" required>
							</div>
							<div class="form-group col-md-10">
								<label for="address">Company</label>
								<input type="text" class="form-control" id="name" name="company" placeholder="Beta .Inc" required>
							</div>
							<div class="form-group col-md-10">
								<label for="address">Email</label>
								<input type="email" class="form-control" id="name" name="email" placeholder="abc@xyz.com" required>
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
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
</script>

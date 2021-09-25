<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">

		<div class="card shadow mb-4">

			<div class="card-header py-3">
				<div class='container d-flex justify-content-center'>

					<div class='col d-flex align-self-center '>
						<h5 class="m-0 font-weight-bold text-primary">Topics</h5>
					</div>

					<div class='col d-flex align-self-start justify-content-end'>
						<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" ><i class="fas fa-fw fa-plus"></i></button>
					</div>

				</div>
			</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th class="col-md-1">#</th>
						<th class="col-md-9">Chapters Name</th>
						<th class="col-md-2">Actions</th>
					</tr>
					</thead>

					<tbody>

					<?php  foreach($data_set as $key=>$value){ ?>
						<tr>

							<td><?= $key+1 ?></td>

							<td><?= $value['name'] ?></td>

							<td class="text-center">
								<a style="text-decoration: none;" href="<?php echo site_url('/welcome/delete_topic/'.$value['id']);?>"> <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-fw fa-trash"></i></button> </a>
								<a style="text-decoration: none;" href="<?php echo site_url('/welcome/topic_details/'.$value['id']);?>"> <button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-fw fa-edit"></i></button> </a>
							</td>
						</tr>

					<?php }  ?>

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
					<h5 class="modal-title" id="exampleModalLabel">Add new topic</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form class="user" method="post" action="<?php echo site_url('welcome/add_topic');?>">
					<div class="modal-body">

						<div class="row justify-content-center">
							<div class="form-group col-md-10">
								<label for="address">Main Project ID</label>
								<input type="text" class="form-control" id="id" name="id" value="<?= $admin_project_id;  ?>" required readonly>
							</div>

							<div class="form-group col-md-10">
								<label for="address">Topic Name</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="General">
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

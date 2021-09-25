<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">

		<div class="card-header py-3">
			<div class='container d-flex justify-content-center'>
				<div class='col d-flex align-self-center '>
					<h6 class="m-0 font-weight-bold text-primary">Construction Meetings</h6>
				</div>
				<div class='col d-flex align-self-start justify-content-end'>
				</div>
			</div>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th>#</th>
						<th>Meeting Name</th>
						<th>Topic</th>
						<th>Date</th>
						<th>Location</th>
						<th>Actions</th>
					</tr>
					</thead>

					<tbody>

					<?php $i=1; foreach($data_set as $key=>$value){ ?>

						<tr>
							<td><?= $i;?></td>
							<?php echo "<td>{$value['project']}</td>";
							echo "<td> {$value['topic']}</td>";
							echo "<td>{$value['date']}</td>";
							echo "<td>{$value['location']}</td>"; ?>
							<td class="text-center">

								<a style="text-decoration: none;" href="<?php echo site_url('/welcome/delete_project/'.$value['id']);?>"> <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-fw fa-trash"></i></button> </a>
								<a style="text-decoration: none;" href="<?php echo site_url('/welcome/copy_meeting/'.$value['id']);?>"> <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Copy"><i class="fas fa-fw fa-copy" ></i></button> </a>

							</td>
						</tr>

					<?php $i++; }  ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- End of Main Content -->

<script>
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
</script>

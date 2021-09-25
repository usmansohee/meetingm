<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Example 1</title>

	<style>
		.clearfix:after {
			content: "";
			display: table;
			clear: both;
		}

		a {
			color: #5D6975;
			text-decoration: underline;
		}

		body {
			position: relative;

			margin: 0 auto;
			color: #001028;
			background: #FFFFFF;
			font-family: Arial, sans-serif;
			font-size: 12px;
			font-family: Arial;
		}

		header {
			padding: 10px 0;
			margin-bottom: 30px;
		}

		#logo {
			text-align: right;
			margin-bottom: 10px;
		}

		#logo img {
			width: 90px;
		}

		h1 {
			border-top: 1px solid  #5D6975;
			border-bottom: 1px solid  #5D6975;
			color: #5D6975;
			font-size: 2.4em;
			line-height: 1.4em;
			font-weight: normal;
			text-align: center;
			margin: 0 0 20px 0;
			background: url(dimension.png);
		}

		#project {
			float: left;
		}

		#project span {
			color: #5D6975;
			text-align: right;
			width: 52px;
			margin-right: 10px;
			display: inline-block;
			font-size: 0.8em;
		}

		#company {
			float: right;
			text-align: right;
		}

		#project div,
		#company div {
			white-space: nowrap;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			border-spacing: 0;
			margin-bottom: 5px;
		}

		table tr:nth-child(2n-1) td {
			background: #F5F5F5;
		}

		table th,
		table td {
			text-align: left;
		}

		table th {
			padding: 2px 5px;
			color: #5D6975;
			border-bottom: 1px solid #C1CED9;
			white-space: nowrap;
			font-weight: normal;
		}

		table .service,
		table .desc {
			text-align: left;
		}

		table td {
			padding: 5px;
			text-align: left;
			border-top: 1px solid black;
		}

		table td.service,
		table td.desc {
			vertical-align: center;
		}

		table td.unit,
		table td.qty,
		table td.total {
			font-size: 1.2em;
		}

		table td.grand {
			border-top: 1px solid #5D6975;;
		}

		#notices .notice {
			color: #5D6975;
			font-size: 1.2em;
		}

		footer {
			color: #5D6975;
			width: 100%;
			height: 30px;
			position: absolute;
			bottom: 0;
			border-top: 1px solid #C1CED9;
			padding: 8px 0;
			text-align: center;
		}
	</style>

	<style>

		.main_data{
			width: 150px;
			font-family: system-ui;
			font-size: 20px;
			font-weight: bold;

		}

		.main_data_detail{

			font-family: "Apple Color Emoji";
			font-size: 18px;
		}

		.topic_detail_heading{
			width: 60px;
			font-size: 20px;
			font-weight: bold;
		}

		.topic_detail_body{
			width: 60px;
			font-size: 18px;
		}

		.topic_detail_heading_one{
			width: 70px;
			font-size: 18px;
			font-weight: bold;
		}

		.topic_detail_heading_one_body{
			font-size: 18px;
		}

	</style>


</head>
<body>

<header class="clearfix">

<!--	<img src="https://www.w3schools.com/images/lamp.jpg" width="64" height="64">-->

	<h1><?= $admin_project_data['name'] ?></h1>


	<?php
		$path = base_url('assets/');// Modify this part (your_img.png
		$path = $path.$project_meeting_data['picture'];
		$type = pathinfo($path, PATHINFO_EXTENSION);
		$data = file_get_contents($path);
		$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
	?>

	<div id="logo">
		<img src="<?= $base64?>" width="64" height="128" style="margin-top: 25px;">
	</div>

	<div style="margin-top: 25px;">
		<table>
			<tr>
				<th class="main_data">Project</th>
				<th class="main_data_detail"><?= $project_meeting_data['project']?></th>
			</tr>
			<tr>
				<th class="main_data">Topic</th>
				<th class="main_data_detail"><?= $project_meeting_data['topic']?></th>
			</tr>
			<tr>
				<th class="main_data">Date</th>
				<th class="main_data_detail"><?= $project_meeting_data['date']?></th>
			</tr>
			<tr>
				<th class="main_data">Loacation</th>
				<th class="main_data_detail"><?= $project_meeting_data['location']?></th>
			</tr>
			<tr>
				<th class="main_data">Side Dishes</th>
				<th class="main_data_detail"><?= $project_meeting_data['side_dishes']?></th>
			</tr>
			<tr>
				<th class="main_data">Participants</th>
				<th class="main_data_detail"><?= $project_meeting_data['participants']?></th>
			</tr>
		</table>
	</div>

	<table style="margin-top: 50px;">
		<thead>
		<tr>
			<th class="main_data">Next Appoinment</th>
			<th class="main_data">Time</th>
			<th class="main_data"> Location</th>
			<th class="main_data">Topic</th>
		</tr>
		</thead>

		<tbody>
		<tr>
			<td class="service main_data_detail"><?= $project_meeting_data['date1']?></td>
			<td class="desc main_data_detail"><?= $project_meeting_data['time1']?></td>
			<td class="unit main_data_detail"><?= $project_meeting_data['loc1']?></td>
			<td class="qty main_data_detail"><?= $project_meeting_data['topic1']?></td>

		</tr>
		<tr>
			<td class="service main_data_detail"><?= $project_meeting_data['date2']?></td>
			<td class="desc main_data_detail"><?= $project_meeting_data['time2']?></td>
			<td class="unit main_data_detail"><?= $project_meeting_data['loc2']?></td>
			<td class="qty main_data_detail"><?= $project_meeting_data['topic2']?></td>

		</tr>
		</tbody>
	</table>

	<div id="notices" style="margin-top: 50px;">
		<div class="main_data" style="margin-top: 5px; margin-bottom: 5px; ">NOTES:</div>
		<textarea rows="20" class="main_data_detail" style="margin-top: 5px; margin-bottom: 5px; "><?= $project_meeting_data['note']?></textarea>
	</div>


</header>

<div style="margin-top: 50px">


	<table>
		<thead>
		<tr>
			<th class="topic_detail_heading">#</th>
			<th class="topic_detail_heading">Week</th>
			<th class="topic_detail_heading">Date</th>
			<th class="topic_detail_heading">Status</th>
			<th class="topic_detail_heading">Due Date</th>
		</tr>
		</thead>
	</table>

<?php  foreach($topics as $key=>$value_one){ ?>

<?php  foreach($topics_details as $key=>$value_two){

	if ($value_two['topic_id']==$value_one['id']){

		?>

		<table>
			<tbody>
			<tr style="border-top: 1px solid black;">
				<td class="topic_detail_body"><?= $value_two['chap_id']?></td>
				<td class="topic_detail_body"><?= $value_two['week']?></td>
				<td class="topic_detail_body"><?= $value_two['date']?></td>
				<td class="topic_detail_body"><?= $value_two['status']?></td>
				<td class="topic_detail_body"><?= $value_two['due_date']?></td>
			</tr>


			</tbody>
		</table>

		<table>
			<tr>
				<th class="topic_detail_heading_one" style="border-bottom: 1px solid white;">Participants:</th>
				<th class="topic_detail_heading_one_body" style="border-bottom: 1px solid white;"><?= $value_two['assigned_to']?></th>
			</tr>
			<tr >
				<th class="topic_detail_heading_one " style="border-bottom: 1px solid white; margin-bottom: 10px;">Notes:</th>
				<th class="topic_detail_heading_one_body " style="border-bottom: 1px solid white; margin-bottom: 10px;"><?= $value_two['note']?></th>
			</tr>
		</table>

	<?php } } ?>


<?php } ?>

</div>

	<footer>

	</footer>


</body>


</html>

<! DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="<?php echo '/booking/css/style.css'.'?v='.filemtime('css/style.css'); ?>">
		<style>

		</style>
		<title>Session's Info</title>
	</head>

	<body>
		<div id="content">
			<div id="rightmenu">
				<h2>Related session</h2>
				<?php
					$querys = "SELECT * FROM trainers NATURAL JOIN schedule NATURAL JOIN session WHERE trainers.trainer_name LIKE '";
					$querys .= $session->trainer_name."'" ;
					$querys .= "OR session.organizer_name LIKE '";
					$querys .= $session->organizer_name."'" ;
					$results = $this->db->query($querys);
					foreach($results->result() as $row){
						echo "<p>" . '<a href="/booking/details?course_code=' . $row->course_code . '"' . 'target="_blank"' . '>' .  $row->session_title . ' </a>' . "</p>";
					}
				?>
			</div>
			<div id="container" style="width: 70%; margin-right: 27.5%;">
				<h1>
					<?php
					if(isset($session)){
						echo $session->session_title."'s Details";
					}
					?>
				</h1>
				<div id="body">
					<table id="field">
						<tr>
							<img style="width:500px; margin-left:20%; " src="/booking/images/session/<?php echo $session->course_code.".jpg?v=".filemtime('images/session/'.$session->course_code.'.jpg'); ?>"
						</tr>
						<tr height=15%>
							<th>Session Title: </th>
							<td><?php if(isset($session)){ echo $session->session_title; } ?></td>
							<th>Number of lesson: </th>
							<td><?php if(isset($session)){ echo $session->noOfLesson; } ?></td>
						</tr>
						<tr height=15%>
							<th>Level: </th>
							<td><?php if(isset($session)){ echo $session->level; } ?></td>
							<th>Format: </th>
							<td><?php if(isset($session)){ echo $session->format; } ?></td>
						</tr>
						<tr height=15%>
							<th>Price: </th>
							<td><?php if(isset($session)){ echo "$".$session->price; } ?></td>
							<th>Available Ticket: </th>
							<td><?php if(isset($session)){ echo $session->available_ticket; } ?></td>
						</tr>
						<tr height=15%>
							<th>Date: </th>
							<td><?php if(isset($session)){ echo $session->start_date; } ?></td>
							<th>Time: </th>
							<td><?php if(isset($session)){ echo $session->start_time." to ".$session->end_time; } ?></td>
						</tr>
						<tr height=15%>
							<th>City: </th>
							<td><?php if(isset($session)){ echo $session->city; } ?></td>
							<th>Venue: </th>
							<td><?php if(isset($session)){
								echo "<p>" . '<a href="/booking/venue?venue=' . $session->venue . '"' . 'target="_blank"' . '>' .  $session->venue . ' </a>' . "</p>"; } ?></td>
						</tr>
						<tr height=15%>
							<th>Organizer: </th>
							<td><?php if(isset($session)){
								 echo "<p>" . '<a href="/booking/organizer?organizer_name=' . $session->organizer_name . '"' . 'target="_blank"' . '>' .  $session->organizer_name . ' </a>' . "</p>"; } ?></td>
							<th>trainer: </th>
							<td><?php
							if(isset($session->trainer_name)){
							foreach($sessions as $row){
								echo '<a href="/booking/info?trainer_id=' . $row->trainer_id . '"' . 'target="_blank"' . '>' .  $row->trainer_name . ' </a>, ';
							}} ?> </td>
						</tr>
						<tr height=15%>
							<th>Short Description: </th>
							<td colspan="3">
								<?php if($session){ echo $session->short_description; } ?>
							</td>
						</tr>
						<tr height=15%>
							<th>Long Description: </th>
							<td colspan="3">
								<?php if($session){ echo $session->long_description; } ?>
							</td>
						</tr>
						</tr>
					</table>
					<?php
					if ($session->available_ticket == 0){
						echo '<a class="disableButton"><b>Full!</b></a>';
					}else{
						echo '<a href="/booking/bookIt?course_code='.$session->course_code.'"><input type="submit" value="Book"></a>';
					}

					?>

				</div>
			</div>

			<p class="footer" style="bottom:0; width:75%; margin:20px 0 0 -32px;"><em>&copy; 2017</em> Page rendered in <strong>{elapsed_time}</strong> seconds.</p>
		</div>
	</body>

</html>

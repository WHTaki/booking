<! DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="<?php echo '/booking/css/style.css'.'?v='.filemtime('css/style.css'); ?>">
		<title>Trainer's Info</title>
	</head>

	<body>
		<div class="content">
			<div id="rightmenu">
				<h2>Related session</h2>
				<?php
				foreach($trainers as $row){
					echo "<p>" . '<a href="/booking/details?course_code=' . $row->course_code . '"' . 'target="_blank"' . '>' .  $row->session_title . ' </a>' . "</p>";
				}
				?>
			</div>
			<div id="container" style="width: 70%; margin-right: 27.5%;">
				<h1>
					<?php
						if(isset($trainer)){
							echo $trainer->trainer_name."'s Info";
						}
					?>
				</h1>
				<div id="body">
					<table id="field">
						<tr>
							<td rowspan="4" align="center" width=180>
								<img src="<?php echo $photoPath; ?>" alt="<?php echo $trainer->trainer_name; ?>" width=100%>
							</td>
							<th height=15%>Name: </th>
							<td height=15%><?php if(isset($trainer)){ echo $trainer->trainer_name; } ?></td>
							<th height=15%>Gender: </th>
							<td height=15%><?php if(isset($trainer)){ echo $trainer->trainer_gender; } ?></td>
						</tr>
						<tr height=15%>
							<th>Telno: </th>
							<td><?php if(isset($trainer)){ echo $trainer->trainer_mobile; } ?></td>
							<th>Division: </th>
							<td><?php if(isset($trainer)){ echo $trainer->division; } ?></td>
						</tr>
						<tr height=15%>
							<th>Email address: </th>
							<td colspan="3">
								<?php if($trainer){ echo $trainer->trainer_email; } ?>
							</td>
						</tr>
						<tr>
							<td colspan="5">
								<?php if($trainer){ echo $trainer->trainer_info; } ?>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<?php
			$previous = "javascript:history.go(-1)";
			if(isset($_SERVER['HTTP_REFERER'])) {
			    $previous = $_SERVER['HTTP_REFERER'];
			}
			 ?>

			<p class="footer" style="bottom:0; width:75%; margin:20px 0 0 -32px;"><em>&copy; 2017</em> Page rendered in <strong>{elapsed_time}</strong> seconds.</p>
		</div>
	</body>

</html>

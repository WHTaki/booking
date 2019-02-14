<! DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="<?php echo '/booking/css/style.css'.'?v='.filemtime('css/style.css'); ?>">
		<title> Orgainzer's Info </title>
	</head>

	<body>
		<div id="content">
			<div id="rightmenu">
				<h2>Related session</h2>
				<?php
				foreach($organizers as $row){
					echo "<p>" . '<a href="/booking/details?course_code=' . $row->course_code . '"' . 'target="_blank"' . '>' .  $row->session_title . ' </a>' . "</p>";
				}
				?>
			</div>
			<div id="container" style="width: 70%; margin-right: 27.5%;">
				<h1>
					<?php
						if(isset($organizer)){
							echo $organizer->organizer_name."'s Info";
						}
					?>
				</h1>

	   		<div id="body">
				<table id="field">
					<tr>
						<th height=15%>Name: </th>
		         <td height=15%><?php  if (isset($organizer)) { echo $organizer->organizer_name; }?></td>
		      </tr>
		      <tr height=15%>
						<th>Telno: </th>
		        <td height=15%><?php  if (isset($organizer)) { echo $organizer->organizer_teleno; }?></td>
		      </tr>
		      <tr height=15%>
						<th>Email address: </th>
						<td colspan="3">
							<?php if($organizer){ echo $organizer->organizer_email; } ?>
						</td>
					</tr>
		       <tr>
						<th> Address: </th>
						<td colspan="5">
							<?php if($organizer){ echo $organizer->organizer_address; } ?>
						</td>
					</tr>
	      </table>
			</div>
		</div>
    <p class="footer" style="bottom:0; width:75%; margin:20px 0 0 -32px;"><em>&copy; 2017</em> Page rendered in <strong>{elapsed_time}</strong> seconds.</p>
	</div>
</body>

</html>

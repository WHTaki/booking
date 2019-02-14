<! DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="<?php echo '/booking/css/style.css'.'?v='.filemtime('css/style.css'); ?>">
		<title> Venue's Info </title>
	</head>

	<body>
		<div id="content">
			<div id="rightmenu">
				<h2>Related session</h2>
				<?php
				foreach($venues as $row){
					echo "<p>" . '<a href="/booking/details?course_code=' . $row->course_code . '"' . 'target="_blank"' . '>' .  $row->session_title . ' </a>' . "</p>";
				}
				?>
			</div>
			<div id="container" style="width: 70%; margin-right: 27.5%;">
				<h1>
					<?php
						if(isset($venue)){
							echo $venue->venue."'s Info";
						}
					?>
				</h1>
        <div id="body">
					<table id="field">
            <tr>
              <th height=15%>Name: </th>
							<td height=15%><?php
							if(isset($venue)){ echo $venue->venue; }
							?></td>
            </tr>
            <th height=15%> Address: </th>
              <td height=15%><?php
              if(isset($venue)){ echo $venue->address; }
              ?></td>
            </tr>
            <th height=15%> City: </th>
              <td height=15%><?php
              if(isset($venue)){ echo $venue->city; }
              ?></td>
            </tr>
        </table>
      </div>
    </div>
    <p class="footer" style="bottom:0; width:75%; margin:20px 0 0 -32px;"><em>&copy; 2017</em> Page rendered in <strong>{elapsed_time}</strong> seconds.</p>
  </div>
</body>

</html>

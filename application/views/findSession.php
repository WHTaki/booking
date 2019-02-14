<div class="content">
	<div id="container">
		<div style="text-align:center;"><h1>Booking page</h1></div>

		<div id="body">
			<table id="field">
				<tr>
					<th>Course Code</th>
					<th>Session title</th>
					<th>Level</th>
					<th>Format</th>
					<th>Price</th>
					<th>No. of lessons</th>
					<th>More Details</th>
					<th></th>
				</tr>
				<?php

						foreach($sessions as $row)
							{
								echo '<tr><td>'
						 			.$row->course_code.'</td><td>'
									.$row->session_title.'</td><td>'
									.$row->level.'</td><td>'
									.$row->format.'</td><td>'
									.$row->price.'</td><td>'
									.$row->noOfLesson.'</td><td>'
									.'<a href="/booking/details?course_code='
									.$row->course_code
									.'" class="detailButton" target="_blank">Details</a></td><td>';

									if ($row->available_ticket == 0){
										echo '<a class="disableButton"><b>Full!</b></a></td></tr>';
									}else{
										echo '<a href="/booking/bookIt?course_code='
										.$row->course_code
										.'" class="detailButton">Book It</a></td></tr>';
									}
							}

				?>
			</table>
			</form>
		</div>
	</div>
</div>

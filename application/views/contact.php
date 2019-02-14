	<div class="content">
		<div id="container">
			<div style="text-align:center;"><h1>Contact</h1></div>
			<div id="body">
				<h2>Contact us</h2>
				Telephone: 36550699<br>
				Email: bookitnow@gmail.com<br>
				Address: City University of Hong Kong. Tat Chee Avenue. Kowloon Tong<br><br>
				<h2>Cooperating Organizers</h2>
				<?php
				if(isset($contact)){
					foreach($contact as $row){
						echo '<b>'.$row->organizer_name.'</b>'
								.'<br>Telephone:  '.$row->organizer_teleno
								.'<br>Email:  '.$row->organizer_email
								.'<br>Address:  '.$row->organizer_address.'<br><br>';
					}
				}
				?>
			</div>
		</div>
	</div>
	<div style="width:auto">

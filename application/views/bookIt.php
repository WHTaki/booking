<div class="content">

	<div id="container" style="height:auto; width:auto; margin-right: 5%; margin-left: 5%;">
		<h1>
      Booking Session:
			 <?php
					echo $_GET['course_code'];
				?>
		</h1>
		<div id="body">
			<font color="red" size="5">Please input the details below.</font><br><br>

			<?php echo form_open('/bookIt?course_code='.$_GET['course_code']); ?>
				<table cellpadding="2" cellspacing="2" border="0">
					<input type="hidden" name="course"	value=<?php echo $_GET['course_code'];?> >

					<tr>
						<td>Surname:</td>
						<td><input type="text" name="surname" value="<?php echo set_value('surname'); ?> "></td>
						<td><?php echo form_error('surname'); ?></td>
					</tr>
					<tr>
						<td>Given name:</td>
						<td><input type="text" name="givenname" value="<?php echo set_value('givenname'); ?>"></td>
						<td><?php echo form_error('givenname'); ?></td>
					</tr>
					<tr>
						<td>Gender:</td>
						<td><input type="radio" name="gender" value="Female">Female
						<input type="radio" name="gender" value="Male">Male</td>
						<td><?php echo form_error('gender'); ?></td>
					</tr>
					<tr>
						<td>Mobile:</td>
						<td><input type="text" name="mobile" value="<?php echo set_value('mobile'); ?>" ></td>
						<td><?php echo form_error('mobile'); ?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><input type="text" name="email" value="<?php echo set_value('email'); ?>" ></td>
						<td><?php echo form_error('email'); ?></td>
					</tr>
					<tr>
						<td><input type="submit" value="Submit"></td>
					</tr>
				</table>
			<?php echo form_close(); ?>

      </form>
		</div>
	</div>
</div>

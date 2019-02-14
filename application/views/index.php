<style>
	.mySlider {
		width: 100%;
		box-shadow: 0 5px 5px -5px #D0D0D0;
	}

	.photo {
		width:100%
	}

	.mySlides {
		display:none;
		position: relative;
	}

	.caption {
		width: 300px;
		font-size: 18px;
		opacity: 0.7;
		background-color: #000;
		border: none;
		color: #fff;
		border-radius: 10px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		padding: 10px;
		right: 0%;
		bottom: 5%;
		margin-bottom: 12px;
		position: absolute;
		transform: translate(-50%,0%);
		-ms-transform: translate(-50%,0%)
	}

	.numbertext {
		color: #f2f2f2;
		font-size: 18px;
		padding: 8px 12px;
		position: absolute;
		top: 0;
	}

	.dot {
		cursor: pointer;
		height: 15px;
		width: 15px;
		margin: 0 2px;
		background-color: #bbb;
		border-radius: 50%;
		display: inline-block;
		transition: background-color 0.6s ease;
	}

	.dotActive, .dot:hover{
		background-color: #555;
	}

	.caption:hover {
		opacity: 1.0;
	}

</style>

<div class="content">
	<div class="mySlider">
		<?php
			$i = 1;
			foreach($index as $row) {
				echo '<div class="mySlides"><div class="numbertext"> '
					.$i
					.' / 7</div><a href="/booking/details?course_code='
					.$row->course_code
					.'"><img class="photo" src="'
					.'/booking/images/session/'
					.$row->course_code
					.'.jpg?v='
					.filemtime('images/session/'.$row->course_code.'.jpg')
					.'"></a><div class="caption">'
					.'<b>'.$row->session_title.'</b><br>'
					.'<p>'.$row->short_description
					.'</p></div></div>';
					$i++;
			}

			echo '<div style="text-align: center;">';
			for($i = 1; $i <= 7; $i++) {
				echo '<span class="dot" onclick="currentDiv('.$i.')"></span>';
			}
			echo '</div>';
		?>
	</div><br>



</div>

<script>
	var slideIndex = 0;
	carousel();

	function currentDiv(n) {
		showDivs(slideIndex = n);
	}

	function showDivs(n) {
		var i;
		var x = document.getElementsByClassName("mySlides");
		var dots = document.getElementsByClassName("dot");
		if (n > x.length) {slideIndex = 1}
		if (n < 1) {slideIndex = x.length}
		for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";
		}
		for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" dotActive", "");
		}
		x[slideIndex-1].style.display = "block";
		dots[slideIndex-1].className += " dotActive";
	}

	function carousel() {
		var i;
		var x = document.getElementsByClassName("mySlides");
		var dots = document.getElementsByClassName("dot");
		for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";
		}
		slideIndex++;
		if (slideIndex > x.length) { slideIndex = 1; }
		x[slideIndex-1].style.display = "block";
		for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" dotActive", "");
		}
		x[slideIndex-1].style.display = "block";
		dots[slideIndex-1].className += " dotActive";
		setTimeout(carousel, 5000);
	}

</script>

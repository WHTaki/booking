	<p class="footer"><em>&copy; 2017</em> Page rendered in <strong>{elapsed_time}</strong> seconds.</p>
</body>

	<script>
		var navbar = document.getElementById("topnav");
		var sticky = navbar.offsetTop;

		function scorlldown() {
			if (window.pageYOffset >= sticky) {
				navbar.classList.add("sticky")
			} else {
				navbar.classList.remove("sticky");
			}
		}
	</script>

</html>

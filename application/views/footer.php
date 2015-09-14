<footer class="footer" style="width:100%;background-color:#49075e;height:71px;position:absolute;bottom:0;text-align:center;">
	<div class="container">
		<p class="text-muted" style="margin-top:15px;color:white;">Tartiner Studios&reg; <?php echo date("Y"); ?></p>
	</div>
</footer>

<script>
$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
});
</script>
</body>
</html>
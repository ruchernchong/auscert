<footer class="footer" style="width:100%;z-index:1100;background-color:#49075e;height:71px;position:fixed;bottom:0;text-align:center;">
	<div class="container">
		<p class="text-muted" style="margin-top:15px;color:white;">Tartiner Studios&reg; <?php echo date("Y"); ?></p>
	</div>
</footer>

<!-- jQuery -->
<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script>
$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
});
</script>
</body>
</html>
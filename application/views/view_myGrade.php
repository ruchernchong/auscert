<?php //$userID = 1; 

$query = $this->db->query('SELECT courseID, completion, grading FROM user_courses WHERE userID = 2 AND enrolled = 1');
$coursesQuery = $this->db->query('SELECT courseID, courseName FROM courses');

/*foreach ($query->result() as $row)
{
    echo $row->courseID, "\r\n";
    echo $row->completion,"\r\n";
    echo $row->grading, "\r\n";
}

echo 'Total Results: ' . $query->num_rows();*/

?>

<div id="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">My Grade 
					<small>GUYS</small>
				</h1>
			</div>
		</div>


		<div class=\"row\">
		<div class=\"panel-body\">
		<?php

		foreach ($query->result() as $row) {
			//find the name of the course
			$courseName = "Course";
			foreach ($coursesQuery->result() as $coursesRow) {
				if ($coursesRow->courseID == $row->courseID) {
					$courseName = $coursesRow->courseName;
				}
			}

			//find the colour/style (depending on completion level)
			$completion = $row->completion;
			$style = "";
			if ($completion == 100) {
				$style = "success";
			} else if ($completion == 0) {
				$style = "danger";
			} else {
				$style = "warning";
			}



			echo "<div class=\"alert alert-$style\">";
				echo "<h2><b> $courseName </b></h2>";
					echo "<div class=\"progress\">";
						echo "<div class=\"progress-bar progress-bar-$style\" role=\"progressbar\" aria-valuenow=\"40\"";
							echo "aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:$completion%\">";
							if ($row->completion == 100) {
								echo "Complete";
							} else if ($row->completion > 0) {
								echo "$row->completion%";
							}
						echo "</div>";
					echo "</div>";
				echo "<h3>Grade:$row->grading</h3>";
			echo "</div>";
		}
		?>

<?php /*
			<div class="alert alert-info">
				<h2><b>Choosing Password</b></h2>
				<div class="progress">
					<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40"
					aria-valuemin="0" aria-valuemax="100" style="width:100%">
					Complete 
				</div>
			</div>
			<h3>Score: 80</h3>
		</div>

		<div class="alert alert-warning">
			<h2><b>Safe Online Transaction</b></h2>
			<div class="progress">
				<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40"
				aria-valuemin="0" aria-valuemax="100" style="width:75%">
				75%
			</div>
		</div>
		<h3>Score: -</h3>
	</div>

	<div class="alert alert-danger">
		<h2><b>Piracy</b></h2>
		<div class="progress">
			<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40"
			aria-valuemin="0" aria-valuemax="100" style="width:1%">
		</div>
	</div>

	<h3>Score: -</h3>

*/ ?>

</div>
</div>
</div>
</div>

</div>
<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script>
$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
});
</script>
</body>
</html>
<?php
require_once "importance.php";

if (!User::loggedIn()) {
	Config::redir("login.php");
}
?>


<html>

<head>
	<title>Outbreaks/Reports <?php echo CONFIG::SYSTEM_NAME; ?></title>
	<?php require_once "inc/head.inc.php";  ?>
</head>

<body>
	<?php require_once "inc/header.inc.php"; ?>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-md-2'><?php require_once "inc/sidebar.inc.php"; ?></div> <!-- this should be a sidebar -->
			<div class='col-md-10'>
				<div class='content-area'>
					<div class='content-header'>
						Outbreaks/Reports <small>Available outbreak</small>
					</div>
					<?php require_once "inc/alerts.inc.php";  ?>
					<div class='content-body'>
						<div id="chartContainer" style="height: 370px; width: 100%;"></div>
						<?php Outbreak::load(); ?>
					</div><!-- end of the content area -->
				</div>
			</div><!-- col-md-7 -->
		</div>
	</div>
	<script>
		window.onload = function() {

			var chart = new CanvasJS.Chart("chartContainer", {
				animationEnabled: true,
				exportEnabled: true,
				theme: "light2", // "light1", "light2", "dark1", "dark2"
				title: {
					text: "Covid-19 cases by municipality"
				},
				axisY: {
					includeZero: true
				},
				data: [{
					type: "column", //change type to bar, line, area, pie, etc
					indexLabel: "{y}", //Shows y value on all Data Points
					indexLabelFontColor: "white",
					indexLabelPlacement: "inside",
					indexLabelFontSize: "15",
					yValueFormatString: "###,###,###,###. cases",
					dataPoints: <?php echo json_encode(Outbreak::$dataPoints, JSON_NUMERIC_CHECK); ?>
				}]
			});
			chart.render();

		}
	</script>
	<script src="./js/canvasjs.min.js"></script>
</body>

</html>
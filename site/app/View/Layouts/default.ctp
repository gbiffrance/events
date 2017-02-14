<html>
<head>
	<?php
		echo $this->Html->css('/bootstrap3/dist/css/bootstrap.css');
		echo $this->Html->css('/bootstrap/css/bootstrap.css');
		echo $this->Html->css('/css/style.css');
		echo $this->Html->charset('ISO-8859-1');
	?>
	<title>GBIF France | Valoriser ses donn&eacute;es d'observation sur la biodiversit&eacute;</title>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
</head>

<body>
	<div class="container">
		<div class="masthead">
			<?php echo $this->element('header'); ?>
			<div class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<?php echo $this->element('menu'); ?>
					</div>
				</div>

			</div>

		</div>
        <section>
        	<div class="container">
			<div id="date">
        			<script language="javascript">
					today = new Date();
					var options = {
						weekday: "long", year: "numeric", month: "long", day: "2-digit"
					};
					document.write(today.toLocaleDateString("fr-fr", options));
				</script>
	        	</div>
            	<?php echo $content_for_layout; ?>
            </div>
        </section>

		<?php echo $this->element('footer'); ?>
	</div>

</body>
</html>

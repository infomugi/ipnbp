<?php require_once('backend/tpl_header.php'); ?>

<div class="panel panel-default panel-contrast">
	<div class="panel-heading"><?php echo $this->pageTitle; ?>

	</div>
	<div class="panel-body panel-body-contrast">
		<div class="table-responsive">
			<?php echo $content; ?>
		</div>
	</div>
</div>

<?php require_once('backend/tpl_footer.php'); ?>

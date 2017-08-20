<?php require_once('backend/tpl_header.php'); ?>

<?php require_once('backend/tpl_sidebar.php'); ?>

<div class="be-content">
	<div class="main-content container-fluid">
		<div class="row">
			<div class="col-sm-12">

				<div class="panel panel-default panel-contrast">
					<div class="panel-heading"><?php echo $this->pageTitle; ?>

					</div>
					<div class="panel-body panel-body-contrast">
						<div class="table-responsive">
							<?php echo $content; ?>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>


<?php require_once('backend/tpl_footer.php'); ?>

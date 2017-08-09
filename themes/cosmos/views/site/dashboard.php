<?php
/* @var $this SiteController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle='Dashboard';
$baseUrl = Yii::app()->theme->baseUrl; 
?>

<table class="table table-hover">
	<thead>
		<tr>
			<th style="width: 32px"></th>
			<th style="width: 32px"></th>
			<th>Name</th>
			<th>Date</th>
			<th>Country</th>
			<th>Sales</th>
			<th style="width: 15%">Progress</th>
			<th>Status</th>
			<th style="width: 5%"></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<label class="custom-control custom-control-primary custom-checkbox active">
					<input class="custom-control-input" type="checkbox" name="custom" checked="checked">
					<span class="custom-control-indicator"></span>
				</label>
			</td>
			<td>
				<img class="img-circle" src="<?php echo $baseUrl; ?>/backend/img/avatars/1.jpg" alt="" width="32" height="32">
			</td>
			<td>Jonathan Mel</td>
			<td>
				April 6, 2017
				<br>
				<small class="text-muted">8:30</small>
			</td>
			<td>
				<span class="flag-icon flag-icon-us"></span>
			</td>
			<td>98</td>
			<td>
				<small class="text-muted">5/10</small>
				<div class="progress progress-xs m-b-0">
					<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
						<span class="sr-only">60% Complete (success)</span>
					</div>
				</div>
			</td>
			<td>
				<span class="label label-outline-success">Active</span>
			</td>
			<td>
				<div class="btn-group">
					<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Action
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="#">Separated link</a></li>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<label class="custom-control custom-control-primary custom-checkbox active">
					<input class="custom-control-input" type="checkbox" name="custom">
					<span class="custom-control-indicator"></span>
				</label>
			</td>
			<td>
				<img class="img-circle" src="<?php echo $baseUrl; ?>/backend/img/avatars/2.jpg" alt="" width="32" height="32">
			</td>
			<td>Landon Graham</td>
			<td>
				March 31, 2017
				<br>
				<small class="text-muted">2:25</small>
			</td>
			<td>
				<span class="flag-icon flag-icon-gb"></span>
			</td>
			<td>105</td>
			<td>
				<small class="text-muted">8/10</small>
				<div class="progress progress-xs m-b-0">
					<div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
						<span class="sr-only">80% Complete (success)</span>
					</div>
				</div>
			</td>
			<td>
				<span class="label label-outline-info">In process</span>
			</td>
			<td>
				<div class="btn-group">
					<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Action
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="#">Separated link</a></li>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<label class="custom-control custom-control-primary custom-checkbox active">
					<input class="custom-control-input" type="checkbox" name="custom">
					<span class="custom-control-indicator"></span>
				</label>
			</td>
			<td>
				<img class="img-circle" src="<?php echo $baseUrl; ?>/backend/img/avatars/3.jpg" alt="" width="32" height="32">
			</td>
			<td>Ron Carran</td>
			<td>
				February 14, 2017
				<br>
				<small class="text-muted">5:40</small>
			</td>
			<td>
				<span class="flag-icon flag-icon-us"></span>
			</td>
			<td>87</td>
			<td>
				<small class="text-muted">4/10</small>
				<div class="progress progress-xs m-b-0">
					<div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
						<span class="sr-only">40% Complete (success)</span>
					</div>
				</div>
			</td>
			<td>
				<span class="label label-outline-success">Active</span>
			</td>
			<td>
				<div class="btn-group">
					<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Action
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="#">Separated link</a></li>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<label class="custom-control custom-control-primary custom-checkbox active">
					<input class="custom-control-input" type="checkbox" name="custom" checked="checked">
					<span class="custom-control-indicator"></span>
				</label>
			</td>
			<td>
				<img class="img-circle" src="<?php echo $baseUrl; ?>/backend/img/avatars/4.jpg" alt="" width="32" height="32">
			</td>
			<td>Lucius Skyle</td>
			<td>
				January 12, 2017
				<br>
				<small class="text-muted">4:50</small>
			</td>
			<td>
				<span class="flag-icon flag-icon-fr"></span>
			</td>
			<td>145</td>
			<td>
				<small class="text-muted">7/10</small>
				<div class="progress progress-xs m-b-0">
					<div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
						<span class="sr-only">70% Complete (success)</span>
					</div>
				</div>
			</td>
			<td>
				<span class="label label-outline-warning">Expired</span>
			</td>
			<td>
				<div class="btn-group">
					<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Action
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="#">Separated link</a></li>
					</ul>
				</div>
			</td>
		</tr>
	</tbody>
</table>
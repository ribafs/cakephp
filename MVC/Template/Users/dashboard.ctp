	<section id="main-content">
        <section class="wrapper">            
            <!--overview start-->
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "dashboard"]);?>">Home</a></li>
						<li><i class="fa fa-laptop"></i>Dashboard</li>						  	
					</ol>
				</div>
			</div>              
            <div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box blue-bg">
						<i class="icon_profile"></i>
						<div class="count"><?php echo $total_users; ?></div>
						<div class="title">Users</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box brown-bg">
						<i class="fa fa-shopping-cart"></i>
						<div class="count">XXX</div>
						<div class="title">Coming Soon</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box dark-bg">
						<i class="fa fa-thumbs-o-up"></i>
						<div class="count">XXX</div>
						<div class="title">Coming Soon</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box green-bg">
						<i class="fa fa-cubes"></i>
						<div class="count">XXX</div>
						<div class="title">Coming Soon</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->				
			</div><!--/.row-->
			<div class="row">
               	
				<div class="col-lg-12 col-md-12">	
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2><i class="fa fa-flag-o red"></i><strong>Registered Users</strong></h2>
							<div class="panel-actions">
								<!--<a href="#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
								<a href="#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
								<a href="#" class="btn-close"><i class="fa fa-times"></i></a>-->
							</div>
						</div>
						<div class="panel-body">
							<table class="table bootstrap-datatable countries">
								<thead>
									<tr>
										<th></th>
										<th>Full Name</th>
										<th>Email</th>
										<th>Mobile</th>
										<th>Created</th>
									</tr>
								</thead>   
								<tbody>
								<?php foreach($users as $user) { ?>
									<tr>
										<td><img src="/Demo/cakephp_3_2/img/Germany.png" style="height:18px; margin-top:-2px;"></td>
										<td><?= isset($user->first_name)?$user->first_name:''; ?> <?= isset($user->last_name)?$user->last_name:'' ?></td>
										<td><?= isset($user->email)?$user->email:''; ?></td>
										<td><?= isset($user->mobile_no)?$user->mobile_no:''; ?></td>
										<td><?= isset($user->created_at)?$user->created_at:''; ?></td>
									</tr>
									 <?php } ?>              
								</tbody>
							</table>
						</div>
	
					</div>	

				</div><!--/col-->		
				
				
              </div><br/><br/>

          </section>
      </section>      
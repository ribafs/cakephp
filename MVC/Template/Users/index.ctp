<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-table"></i> Users</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "dashboard"]);?>">Home</a></li>
						<li><i class="fa fa-table"></i>Users</li>
						<li><i class="fa fa-th-list"></i>Users</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Users
                          </header>                          
                        <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th><i class="icon_profile"></i> Full Name</th>
                                 <th><i class="icon_calendar"></i> Date</th>
                                 <th><i class="icon_mail_alt"></i> Email</th>
                                 <th><i class="icon_mobile"></i> Mobile</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              <?php foreach($users as $user) { ?>
							  <tr>
                                 <td><?= isset($user->first_name)?$user->first_name:''; ?> <?= isset($user->last_name)?$user->last_name:'' ?></td>
                                 <td><?= isset($user->created_at)?date('d M Y ',strtotime($user->created_at)):''; ?></td>
                                 <td><?= isset($user->email)?$user->email:''; ?></td>
                                 <td><?= isset($user->mobile_no)?$user->mobile_no:''; ?></td>
                                 <td>
                                  <div class="btn-group">
                                    <a class="btn btn-primary" href="<?php echo $this->Url->build(["controller" => "Users","action" => "edit_user_info",$user->id]); ?>">
										<i class="icon_pencil-edit "></i>
									</a>
                                      <a class="btn btn-success" href="<?php echo $this->Url->build(["controller" => "Users","action" => "view_user_info",$user->id]); ?>"><i class="arrow_right_alt "></i></a>
                                      <a class="btn btn-danger" href="<?php echo $this->Url->build(["controller" => "Users","action" => "delete_user",$user->id]); ?>" onclick="return confirm('Are you sure you want to remove this user?');"><i class="icon_trash_alt "></i></a>
                                  </div>
                                  </td>
                              </tr>
							  <?php } ?>   							  							
                           </tbody>						   
                        </table>
						<div class="text-center">
                                  <ul class="pagination">
                                      <li><?= $this->Paginator->prev('« Previous') ?></a></li>
                                      <li><?= $this->Paginator->numbers() ?></a></li>
                                      <li><?= $this->Paginator->next('Next »') ?></a></li>
                                  </ul>
                              </div>	
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
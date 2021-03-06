<!--main content start-->
    <section id="main-content">
        <section class="wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> Add User</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "dashboard"]);?>">Home</a></li>
						<li><i class="icon_document_alt"></i>Users</li>
						<li><i class="fa fa-file-text-o"></i>Add User</li>
					</ol>
				</div>
			</div>
			<?= $this->Flash->render('flash'); ?>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Add Users 
                          </header>						  
                          <div class="panel-body">
							  <?= $this->Form->create($user,['class'=>'form-horizontal form-validate']) ?>
							  <input type="hidden" id="referal_code" required="required" name="referal_code" value="<?php echo time(); ?>">
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">First Name</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" id="first_name" required="required" name="first_name">
                                      </div>
                                  </div>								  
								   <div class="form-group">
                                      <label class="col-sm-2 control-label">Last Name</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" id="last_name" required="required" name="last_name">
                                      </div>
                                  </div>
								    <div class="form-group">
                                      <label class="col-sm-2 control-label">Email</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" name="email">
                                      </div>
                                  </div>
								   <div class="form-group">
                                      <label class="col-sm-2 control-label">Mobile</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" name="mobile_no">
                                      </div>
                                  </div>
								    <div class="form-group">
                                      <label class="col-sm-2 control-label">Password</label>
                                      <div class="col-sm-10">
                                          <input type="password" class="form-control" name="password">
                                      </div>
                                  </div>
                                 <div class="form-group">
									  <div class="col-lg-offset-2 col-lg-10">
										  <button class="btn btn-primary" type="submit">Save</button>
										  <button class="btn btn-danger" type="clear">Cancel</button>
									  </div>
								  </div>
                            <?= $this->Form->end() ?>
                          </div>
                      </section>                    
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
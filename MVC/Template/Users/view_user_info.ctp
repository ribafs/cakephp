	<section id="main-content">
		<section class="wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> View User Information</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="/">Home</a></li>
						<li><i class="icon_document_alt"></i>Users</li>
						<li><i class="fa fa-file-text-o"></i>View User information</li>
					</ol>
				</div>
			</div>
			<?= $this->Flash->render('flash'); ?>
			<div class="row">
			  <div class="col-lg-12">
				  <section class="panel">
					  <header class="panel-heading">
						 View User Information
					  </header>						  
						<?= $this->LabelView->show('First Name',$user->first_name); ?>
						<?= $this->LabelView->show('Last Name',$user->last_name); ?>
						<?= $this->LabelView->show('Email',$user->email); ?>
						<?= $this->LabelView->show('Mobile Number',$user->mobile_no); ?>
				  </section>                    
			  </div>
			</div>
		</section>
	</section>

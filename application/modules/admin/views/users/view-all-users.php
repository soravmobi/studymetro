<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'view_all_users_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-xs-12">
	      <div class="box box-primary">
	        <div class="box-header">
	          <h3 class="box-title"><?php echo sprintf(ALL_DATA, 'Users'); ?></h3>
	          <a href="<?php cms_url('admin/users/add-new'); ?>" class="addNewAdmin" title="Add New User">Add New</a>
	          <div class="box-tools">
	            <div class="input-group customInputGroups" style="width: 150px;">
	              <form action="<?php cms_url('admin/users/view-all'); ?>" method="get">
		              <input type="text" name="s" class="form-control input-sm pull-right" placeholder="Search" value="<?php echo $this->input->get('s'); ?>">
		              <div class="input-group-btn cusInputGrpbtn">
		                <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
		              </div>
	              </form>
	            </div>
	            <?php if($pagination) { echo $pagination; } ?>
	          </div>
	          <!-- flash data -->
            <?php if($this->session->flashdata('item_success')) { ?>
                <div class="alert alert-success alert-dismissable" style="margin-top:12px;">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <?php echo $this->session->flashdata('item_success'); ?>
                </div>
            <?php } if($this->session->flashdata('invalid_item')) { ?>
            	<div class="alert alert-danger alert-dismissable" style="margin-top:12px;">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <?php echo $this->session->flashdata('invalid_item'); ?>
                </div>
            <?php } ?>
	        </div><!-- /.box-header -->
	        <div class="box-body table-responsive no-padding">
	          <table class="table table-hover">
	            <tr>
	              <th>ID</th>
	              <th>Username</th>
	              <th>Picture</th>
	              <th>Email</th>
	              <th>Verified</th>
	              <th>Online Status</th>
	              <th>User Status</th>
	              <th>User Type</th>
	              <th>History</th>
	              <th>Invoice</th>
	              <th>University</th>
	              <th>Action</th>
	              <th>Date Created</th>
	              <th>Delete</th>
	            </tr>
	            <?php
	            	if(!empty($users)) { //p($users);
	            		$offset = $offset + 1;
	            		foreach($users as $val) {
	            ?>
	            	<tr>
		              <td><?php echo $offset++; ?></td>
		              <td id="user_name<?php echo $val['id']; ?>"><?php echo $val['username']; ?></td>
		              <td>
		              	<?php 
		              		$profilePic = get_user_meta($val['id'], 'profile_picture');
		              		if(!empty($profilePic)) {
		              	?>
		              		<?php echo display_profile_pic($profilePic, 52, 52, 'profile_pic'); ?>
		              	<?php } else { ?>
		              		<?php echo display_profile_pic(get_admin_assets().'dist/img/no-image.jpg', 52, 52, 'profile_pic'); ?>
		              	<?php } ?>
		              </td>
		              <td>
		              	<a href="<?php cms_url('admin/users/edit/'.$val['id']); ?>">
		              		<?php echo $val['email']; ?>
		              </td>
		              <td>
		              	<?php if($val['user_status'] == 1) { ?>
		              		<span class="label label-success">Yes</span>
		              	<?php } else { ?>
		              		<span class="label label-danger">No</span>
		              	<?php } ?>
		              </td>
		              <td>
		              	<?php if($val['online_status'] == 1) { ?>
		              		<span class="label label-success">Online</span>
		              	<?php } else { ?>
		              		<span class="label label-danger">Offline</span>
		              	<?php } ?>
		              </td>
		              <td>
		              	<?php if($val['is_blocked'] == 1) { ?>
		              		<span class="label label-danger">Blocked</span>
		              	<?php } else { ?>
		              		<span class="label label-success">Active</span>
		              	<?php } ?>
		              </td>
		              <td>
		              	<?php if($val['user_type'] == 1) { ?>
		              		<span class="label label-warning">Super Admin</span>
		              	<?php } elseif($val['user_type'] == 2) { ?>
		              		<span class="label label-success">Student</span>
		              	<?php } elseif($val['user_type'] == 3) { ?>
		              		<span class="label label-info">Agency</span>
		              	<?php } elseif($val['user_type'] == 4) { ?>
		              		<span class="label label-danger">Trainer</span>
		              	<?php } elseif($val['user_type'] == 5) { ?>
		              		<span class="label label-default">University</span>
		              	<?php } elseif($val['user_type'] == 6) { ?>
		              		<span class="label label-primary">Frainchsee</span>
		              	<?php } ?>
		              </td>
		              <td>
		              	<a href="<?php cms_url('admin/users/viewHistory/'.$val['id']); ?>" title="View History">
		              		View-History
		              	</a>
		              </td>
		              <td>
		              	<?php if($val['user_type']==5){ ?>
		              	<a href="javascript:" user_id="<?php echo $val['id']; ?>" class="upload_invoice" title="Upload Invoice">
		              		Upload Invoice
		              	</a>
		              	<?php } ?>
		              </td>
		              <td>
		              	<?php if($val['user_type']==5){ ?>
		              	<a href="javascript:" user_id="<?php echo $val['id']; ?>" class="assign_univ" title="Assign University">
		              		Assign-University
		              	</a>
		              	<?php } ?>
		              </td>
		              <td>
		              	<a href="<?php cms_url('admin/users/edit/'.$val['id']); ?>" title="Edit User">
		              		<i class="fa fa-pencil"></i> Edit
		              	</a>
		              </td>
		              <td><?php echo date('m-d-Y', strtotime($val['date_created'])); ?></td>
		              <td>
		              	<a href="<?php cms_url('admin/users/delete/'.$val['id']); ?>" title="Delete Page" onclick="if(!confirm('Are you sure you want to delete this user?')) return false;">
		              		<i class="fa fa-trash"></i> Delete
		              	</a>
		              </td>
		            </tr>
	            <?php } /* End foreach */ ?>
	            <?php } else { ?>
	            	<tr>
	            		<td colspan="11" align="center"><?php echo sprintf(NO_RECORDS_FOUND, 'users') ?></td>
	            	</tr>
	            <?php } ?>
	          </table>
	        </div><!-- /.box-body -->
	        <div class="box-footer"><?php if($pagination) { echo $pagination; } ?></div>
	      </div><!-- /.box -->
	    </div>
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- Modal Start -->
<div class="modal fade model_logoinform" id="assigned_university" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Assigned University</h4>
      </div>
      <div class="modal-body">
      <!-- <form method="post" action=""> -->
       <input type="hidden" name="assign_user_id" id="assign_user_id" value="" />
        <div class="form-group">
            <label for="inputEmail">University List</label><br/>
            <select multiple="" name="univ_name" id="univ_name" class="chosen-select form-control">
            	<!-- <option value="">Select University</option> -->
            	<?php foreach($universities as $univ){ ?>
            	<option value="<?php echo $univ['id']; ?>"><?php echo $univ['name']; ?></option>
            	<?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="inputEmail">Assigned to</label><br/>
            <input type="text" name="username" id="username" class="form-control" value="" />
        </div>
        
        <input type="submit" id="submit_univ" class="btn btn-primary" value="Submit">
        <!-- <a href="javascript:"  class="btn btn-primary">Login</a> -->
           <!-- </form> -->
      </div>
      
    </div>
  </div>
</div>
<!--  Modal End -->


<!-- Modal Start -->
<div class="modal fade model_logoinform" id="upload_invoice_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upload Invoice</h4>
      </div>
      <div class="modal-body">
       <form name="invoice_form" id="invoice_form" enctype="multipart/form-data"> 
       <input type="hidden" name="invoice_user_id" id="invoice_user_id" value="" />
        <div class="form-group">
                    <label for="name" class="col-sm-3 control-label"> Browse file:</label>
                    <div class="col-sm-9">
                    <input type="file" class="form-control"  onchange="readURL(this,'pdf','')" name="file">
                     <div class="error_form"><?php echo form_error('file'); ?></div>
                    </div>
                </div>
        <div class="form-group">
            <label for="inputEmail">Upload for</label><br/>
            <input type="text" name="invoice_username" id="invoice_username" class="form-control" value="" />
        </div>
        
        <input type="submit" id="submit_invoice" class="btn btn-primary" value="Submit">
        <!-- <a href="javascript:"  class="btn btn-primary">Login</a> -->
          </form> 
      </div>
      
    </div>
  </div>
</div>
<!--  Modal End -->


<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/css/chosen.min.css">
<script src="<?php echo base_url(); ?>assets/admin/js/chosen.jquery.js"></script>

<script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      
      $(selector).chosen(config[selector]);
    }

    $('#univ_name_chosen').attr('style','width: 100%;');
  </script>

<script type="text/javascript">
	$('body').on('click','.assign_univ',function(){
		var user_id = $(this).attr('user_id');
		var user_name = $('#user_name'+user_id).html();
		$('#assigned_university').modal('show');
		$('#assign_user_id').val(user_id);;
		$('#username').val(user_name);
	});

	$('body').on('click','#submit_univ',function(){
		var user_id = $('#assign_user_id').val();
		var univ_name = $('#univ_name').val();
		var univ_id = JSON.stringify(univ_name);
		$.ajax({
				url:"<?php echo base_url('admin/users/assignUniversity'); ?>",
				type:"POST",
				data:{user_id:user_id,univ_id:univ_id},
				success:function(result)
				{
					if(result==1)
					{
						$('#assigned_university').modal('hide');
						alert('University has assigned successfully');
					}
				}
		});
		
	});


// for upload invoice

$('body').on('click','.upload_invoice',function(){
		var user_id = $(this).attr('user_id');
		var user_name = $('#user_name'+user_id).html();
		$('#upload_invoice_modal').modal('show');
		$('#invoice_user_id').val(user_id);;
		$('#invoice_username').val(user_name);
	});

	$('body').on('click','#submit_invoice',function(e){
		e.preventDefault();
		var user_id = $('#invoice_user_id').val();
		var file = new FormData($('#invoice_form')[0]);
		
		//alert(file);
		$.ajax({
				url:"<?php echo base_url(); ?>admin/users/doUploadInvoices",
				type:"POST",
				data:file,user_id,
				processData: false,
    			contentType: false,
				success:function(result)
				{	
					//alert(result);
					if(result==1)
					{
						$('#upload_invoice_modal').modal('hide');
						alert('Invoice uploaded successfully');
					}
				},
				error: function(error_data){
			        alert(error_data);
			    }
		});
		
	});

</script>
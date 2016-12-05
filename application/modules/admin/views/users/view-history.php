<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'view_history_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-xs-12">
	      <div class="box box-primary">
	        <div class="box-header">
	          
	          <h3><?php echo $user_name; ?></h3><br/>
            <h2 class="box-title"><?php echo sprintf(ALL_DATA, 'Documents'); ?></h2>
	          
	        </div><!-- /.box-header -->
          <div class="success"></div>
	        <div class="box-body table-responsive no-padding">
	          <!-- view all documents -->

	          <div class="profile_sec">
                <?php if(!empty($documents)) { foreach($documents as $d) { ?>
                  <div class="box_doc">

                    <a download class="download_btn" href="<?php echo $d['file']; ?>" title="Click Here To Download Document"><i class="fa fa-download" aria-hidden="true"></i></a>

                    <a href="<?php echo $d['file']; ?>" class="img_doc gallery"><img src="<?php echo $d['file']; ?>"></a>
                    <div class="doc_meta">
                      <p><?php echo date('F d, Y', strtotime($d['added_date'])); ?> <span><?php echo $d['document']; ?></span></p>
                    </div>
                  </div>
                <?php } } else{ ?>
                  <div class="well text-center">Documents not uploaded by user</div>
                <?php } ?>
               </div>

	        </div>

	        <div class="box-header">
	          
	          <h2 class="box-title"><?php echo sprintf(ALL_DATA, 'Programs'); ?></h2>
	          
	        </div><!-- /.box-header -->
	        <div class="box-body table-responsive no-padding">
	          <!-- view all documents -->

	        <div class="col-md-12 col-sm-12">
              <div class="right_dashboard">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>S.NO.</th>
                      <th>Program</th>
                      <th>Email</th>
                      <th>Phone No</th>
                      <th>Pay Status</th>
                      <th>Apply Date</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; foreach($applications as $a) { ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo getDetailsBy(PROGRAMS,'id',$a['program_id'],'program_name'); ?></td>
                      <td><?php echo $a['email']; ?></td>
                      <td><?php echo $a['phone_no']; ?></td>
                      <td><?php echo (!empty($a['pay_status'])) ? $a['pay_status'] : 'Pending'; ?></td>
                      <td><?php echo convertDateTime($a['apply_date']); ?></td>
                      <td>
                      	<select app_id="<?php echo $a['id']; ?>" name="app_status" id="app_status" class="app_status form-control">
                      		<option value="0" <?php if($a['program_status']==0) { echo 'selected'; } ?>>Applied</option>
                      		<option value="1" <?php if($a['program_status']==1) { echo 'selected'; } ?>>In Process</option>
                      		<option value="2" <?php if($a['program_status']==2) { echo 'selected'; } ?>>I20 Release</option>
                      		<option value="3" <?php if($a['program_status']==3) { echo 'selected'; } ?>>Visa Appointment Date</option>
                      		<option value="4" <?php if($a['program_status']==4) { echo 'selected'; } ?>>Visa Approved</option>
                      		<option value="5" <?php if($a['program_status']==5) { echo 'selected'; } ?>>Visa Declined</option>
                      		<option value="6" <?php if($a['program_status']==6) { echo 'selected'; } ?>>Tution Fee Paid</option>
                      		<option value="7" <?php if($a['program_status']==7) { echo 'selected'; } ?>>Accepted</option>
                      	</select>
                      </td>
                    </tr>
                  <?php $i++; } ?>
                  </tbody>
                  </table>
              </div>
            </div>

	        </div>

	        <!-- /.box-body -->
	        <div class="box-footer"><?php //if($pagination) { echo $pagination; } ?></div>
	      </div><!-- /.box -->
	    </div>
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper-->


<script type="text/javascript">
  $('body').on('change','.app_status',function(){
    var prgrm_status = $(this).val();
    var prgrm_id = $(this).attr('app_id');
    $.ajax({
            url:"<?php echo base_url('admin/users/changeAppStatus'); ?>",
            type:"POST",
            data:{prgrm_status:prgrm_status,prgrm_id:prgrm_id},
            success:function(result)
            {
              if(result==1)
              {
                $('.success').html('<div class="alert alert-success alert-dismissable" style="margin-top:12px;"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Status updated successfully.</div>');
              }
            }
    });
  });
</script>
<?php
$type = empty($edit) ? 'Add' : 'Edit';
$this->assign('pagetitle', __('%s Bus Detail',$type));
$this->Custom->addCrumb(__('Bus Details'),array('action'=>'index'));
$this->Custom->addCrumb(__('%s Bus Detail',$type));
$this->start('top_links');
echo $this->Html->link(__('Back'),array('action'=>'index'),array('icon'=>'fa-angle-double-left','class'=>'btn btn-default','escape'=>false));
$this->end();
?>
<div class="box box-primary">
	<div class="overflow-hide-break">
		<?php echo $this->Form->create('BusDetail', array('class' => 'form-validate multiple_save','type'=>'file')); ?>
		<div class="box-body box-content">
			<div class="row no-margin">
                <div class="col-md-6">
				<?php

				echo $this->Form->input('id',array('type'=>'hidden'));
				echo $this->Form->input('customer_id',array('class' => 'form-control','empty' => 'Select Customer', 'div' => array('class' => 'form-group required')));		
				echo $this->Form->input('booking_type',array('class' => 'form-control','options' => array('single'=>'Single','whole'=>'Whole'),'empty' => 'Select Type', 'div' => array('class' => 'form-group required')));		
				echo "<div id='BusDetailMemberDiv'>";
				echo $this->Form->input('member',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
				echo "</div>";
				echo $this->Form->input('company_name',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
				echo $this->Form->input('bus_no',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
				echo $this->Form->input('seat_no',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
				echo $this->Form->input('city_name',array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
				</div>
				<div class="col-md-6">
				<?php
				echo $this->Form->input('source',array('class' => 'form-control', 'div' => array('class' => 'form-group required')));
				echo $this->Form->input('destination',array('class' => 'form-control', 'div' => array('class' => 'form-group required')));
				echo $this->Form->input('pnr_no',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
				echo $this->Form->input('price',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
				echo $this->Form->input('payment_with_gst',array('class' => 'form-control','disabled', 'div' => array('class' => 'form-group')));
				echo $this->Form->input('payment_type',array('options'=>array('cash'=>'Cash', 'cheque'=> 'Cheque', 'net_banking' => 'Net Banking' ), 'empty'=>'Select Payment Type', 'class' => 'form-control required', 'div' => array('class' => 'form-group required')));
				echo $this->Form->input('payment_received',array('class' => 'form-control', 'div' => array('class' => 'form-group required')));
				?>
				</div>
			</div>
		</div>
		<div class="form-action">
			<?php echo $this->Form->submit(__('Save'), array('div' => false,'class' => 'btn btn-primary btn_dsbl'));?>
			&nbsp;&nbsp;
			<?php echo $this->Html->link(__('Cancel'), array('action' => 'index'), array('class' => 'btn btn-default'));?>
		</div>

		<?php $arrValidation = array(
			'Rules' => array(
				'customer_id' => array('required' => 1),
				'company_name' => array('required' => 1,'alphabates'=> true),
				'booking_type' => array('required' => 1),
				//'bus_no' => array('required' => 1),
				//'seat_no' => array('required' => 1),
				'payment_type' => array('required' => 1),
				'city_name' => array('required' => 1,'alphabates'=> true),
				'price' => array('required' => 1),
				//'pnr_no' => array('required' => 1),
				'source' => array('required' => 1,'alphabates'=> true),
				'destination' => array('required' => 1,'alphabates'=> true),
				'payment_received' => array('required' => 1),

			),
			'Messages' => array(
				'customer_id' => array('required' => __('Please select Customer.')),
				'company_name' => array('required' => __('Please enter Company Name.')),
				//'bus_no' => array('required' => __('Please enter Bus No.')),
				//'seat_no' => array('required' => __('Please enter Seat No.')),
				'booking_type' => array('required' => __('Please select Booking Type.')),
				'city_name' => array('required' => __('Please enter City Name.')),
				'price' => array('required' => __('Please enter Price.')),
				'source' => array('required' => __('Please enter Source.')),
				'destination' => array('required' => __('Please enter Destination.')),
				'payment_received' => array('required' => __('Please enter Payment Received.')),
				'payment_type' => array('required' => __('Please select Payment Type.')),
				//'pnr_no' => array('required' => __('Please enter Pnr No.')),
			));

				echo $this->Form->setValidation($arrValidation); ?>

				<?php echo $this->Form->end(); ?>
			</div>
		</div>
		<script type="text/javascript">
			$( document ).ready(function() {
				$("#BusDetailMemberDiv").hide();
				$("#BusDetailBookingType").on('change',function(e) {
					var type = $(this).val();
					if(type=='whole'){
						$("#BusDetailMemberDiv").hide();
					}else{
						$("#BusDetailMemberDiv").show();
					}
				});
			});

			var gst = '<?php echo $config_gst; ?>';
	    	$( document ).on('keyup','#BusDetailPrice', function(e) {
				var amount = parseInt($(this).val());
				var payment_with_gst = parseInt((amount * gst) / 100);
				var total_payment = (amount + payment_with_gst);
				$('#BusDetailPaymentWithGst').val(total_payment);
			});

		</script>
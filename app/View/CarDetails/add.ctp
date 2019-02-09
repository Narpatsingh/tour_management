<?php
$type = empty($edit) ? 'Add' : 'Edit';
$this->assign('pagetitle', __('%s Car Detail',$type));
$this->Custom->addCrumb(__('Car Details'),array('action'=>'index'));
$this->Custom->addCrumb(__('%s Car Detail',$type));
$this->start('top_links');
echo $this->Html->link(__('Back'),array('action'=>'index'),array('icon'=>'fa-angle-double-left','class'=>'btn btn-default','escape'=>false));
$this->end();
?>
<div class="box box-primary">
	<div class="overflow-hide-break">
		<?php echo $this->Form->create('CarDetail', array('class' => 'form-validate','type'=>'file')); ?>
		<div class="box-body box-content">
			<?php
			echo $this->Form->input('id',array('type'=>'hidden'));
			echo $this->Form->input('customer_id',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
			echo $this->Form->input('company_name',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
			echo $this->Form->input('car_no',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
			echo $this->Form->input('pnr_no',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
			echo $this->Form->input('price',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
			echo $this->Form->input('source',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
			echo $this->Form->input('destination',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
			?>
		</div>
		<div class="form-action">
			<?php echo $this->Form->submit(__('Save'), array('div' => false,'class' => 'btn btn-primary'));?>
			&nbsp;&nbsp;
			<?php echo $this->Html->link(__('Cancel'), array('action' => 'index'), array('class' => 'btn btn-default'));?>
		</div>

		<?php $arrValidation = array(
			'Rules' => array(
				'customer_id' => array('required' => 1),
				'company_name' => array('required' => 1),
				'car_no' => array('required' => 1),
				'pnr_no' => array('required' => 1),
				'price' => array('required' => 1),
				'source' => array('required' => 1),
				'destination' => array('required' => 1),

			),
			'Messages' => array(
				'customer_id' => array('required' => __('Please select Customer')),
				'company_name' => array('required' => __('Please enter Company Name')),
				'car_no' => array('required' => __('Please enter Car No')),
				'pnr_no' => array('required' => __('Please enter Pnr No')),
				'price' => array('required' => __('Please enter Price')),
				'source' => array('required' => __('Please enter Source')),
				'destination' => array('required' => __('Please enter Destination')),));
		
		echo $this->Form->setValidation($arrValidation); ?>

		<?php echo $this->Form->end(); ?>
	</div>
</div>
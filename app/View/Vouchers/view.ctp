<?php
	$this->assign('pagetitle', __('Voucher Detail').' <small>'.__('Vouchers').'</small>');
	$this->Custom->addCrumb(__('Vouchers'),array('action'=>'index'));
	$this->Custom->addCrumb(__('Voucher Detail'));
	$this->start('top_links');
		echo $this->Html->link(__('Delete'), array('action' => 'delete', $voucher['Voucher']['id']), array('icon'=>'fa-trash-o','title' => __('Click here to delete this Voucher'),'class'=>'btn btn-danger','escape'=>false),__('Are you sure? You want to delete this Voucher?'));
		echo $this->Html->link(__('Edit'), array('action' => 'edit', $voucher['Voucher']['id']), array('icon'=>'fa-edit','title' => __('Click here to edit this Voucher'),'class'=>'btn btn-primary','escape'=>false));
		echo $this->Html->link(__('Add Voucher'),array('action'=>'add'),array('icon'=>'fa-plus','title' => 'Click here to add Voucher','class'=>'btn btn-primary','escape'=>false));
		echo $this->Html->link(__('Back'),array('action'=>'index'),array('icon'=>'fa-angle-double-left','class'=>'btn btn-default','escape'=>false));
	$this->end();
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="overflow-hide-break">
                <div class="box-body userViewPage">
                    		<div class='col-xs-12 col-sm-9 detailBox'>			<div class='row'>				<div class='col-md-12 col-sm-12 innerBox'>					<div class='dl-horizontal'>						<ul>							<li>								<span class='col-xs-12'>									<div class='row'>										Voucher Detail									</div>								</span>							</li>						</ul>						<ul>							<li class='innreicons'>								<?php //echo __('Id'); ?><i class='fa fa-hand-o-right'>								</i>							</li><li>								<?php echo $voucher['Voucher']['id']; ?>							</li>						</ul>						<ul>							<li class='innreicons'>								<?php //echo __('Customer Full Name'); ?><i class='fa fa-hand-o-right'>								</i>							</li><li>								<?php echo $voucher['Voucher']['customer_full_name']; ?>							</li>						</ul>						<ul>							<li class='innreicons'>								<?php //echo __('Customer Contact No'); ?><i class='fa fa-hand-o-right'>								</i>							</li><li>								<?php echo $voucher['Voucher']['customer_contact_no']; ?>							</li>						</ul>						<ul>							<li class='innreicons'>								<?php //echo __('Customer Tour Type'); ?><i class='fa fa-hand-o-right'>								</i>							</li><li>								<?php echo $voucher['Voucher']['customer_tour_type']; ?>							</li>						</ul>						<ul>							<li class='innreicons'>								<?php //echo __('Customer Tour Name'); ?><i class='fa fa-hand-o-right'>								</i>							</li><li>								<?php echo $voucher['Voucher']['customer_tour_name']; ?>							</li>						</ul>						<ul>							<li class='innreicons'>								<?php //echo __('Customer Hotel Name'); ?><i class='fa fa-hand-o-right'>								</i>							</li><li>								<?php echo $voucher['Voucher']['customer_hotel_name']; ?>							</li>						</ul>						<ul>							<li class='innreicons'>								<?php //echo __('Customer Tour Date'); ?><i class='fa fa-hand-o-right'>								</i>							</li><li>								<?php echo $voucher['Voucher']['customer_tour_date']; ?>							</li>						</ul>						<ul>							<li class='innreicons'>								<?php //echo __('Customer Hotel Place Name'); ?><i class='fa fa-hand-o-right'>								</i>							</li><li>								<?php echo $voucher['Voucher']['customer_hotel_place_name']; ?>							</li>						</ul>						<ul>							<li class='innreicons'>								<?php //echo __('Customer Hotel Check In Date'); ?><i class='fa fa-hand-o-right'>								</i>							</li><li>								<?php echo $voucher['Voucher']['customer_hotel_check_in_date']; ?>							</li>						</ul>						<ul>							<li class='innreicons'>								<?php //echo __('Customer Hotel Check Out Date'); ?><i class='fa fa-hand-o-right'>								</i>							</li><li>								<?php echo $voucher['Voucher']['customer_hotel_check_out_date']; ?>							</li>						</ul>						<ul>							<li class='innreicons'>								<?php //echo __('Customer Room Type'); ?><i class='fa fa-hand-o-right'>								</i>							</li><li>								<?php echo $voucher['Voucher']['customer_room_type']; ?>							</li>						</ul>						<ul>							<li class='innreicons'>								<?php //echo __('Customer Travel Type'); ?><i class='fa fa-hand-o-right'>								</i>							</li><li>								<?php echo $voucher['Voucher']['customer_travel_type']; ?>							</li>						</ul>						<ul>							<li class='innreicons'>								<?php //echo __('Meal Plan'); ?><i class='fa fa-hand-o-right'>								</i>							</li><li>								<?php echo $voucher['Voucher']['meal_plan']; ?>							</li>						</ul>						<ul>							<li class='innreicons'>								<?php //echo __('Tour Manager Name'); ?><i class='fa fa-hand-o-right'>								</i>							</li><li>								<?php echo $voucher['Voucher']['tour_manager_name']; ?>							</li>						</ul>						<ul>							<li class='innreicons'>								<?php //echo __('Tour Manager Contact No'); ?><i class='fa fa-hand-o-right'>								</i>							</li><li>								<?php echo $voucher['Voucher']['tour_manager_contact_no']; ?>							</li>						</ul>						<ul>							<li class='innreicons'>								<?php //echo __('Hotel Contact No'); ?><i class='fa fa-hand-o-right'>								</i>							</li><li>								<?php echo $voucher['Voucher']['hotel_contact_no']; ?>							</li>						</ul>						<ul>							<li class='innreicons'>								<?php //echo __('Emergency Contact No'); ?><i class='fa fa-hand-o-right'>								</i>							</li><li>								<?php echo $voucher['Voucher']['emergency_contact_no']; ?>							</li>						</ul>						<ul>							<li class='innreicons'>								<?php //echo __('Company Signature'); ?><i class='fa fa-hand-o-right'>								</i>							</li><li>								<?php echo $voucher['Voucher']['company_signature']; ?>							</li>						</ul>						<ul>							<li class='innreicons'>								<?php //echo __('Customer Signature'); ?><i class='fa fa-hand-o-right'>								</i>							</li><li>								<?php echo $voucher['Voucher']['customer_signature']; ?>							</li>						</ul>						<ul>							<li class='innreicons'>								<?php //echo __('Created'); ?><i class='fa fa-hand-o-right'>								</i>							</li><li>								<?php echo $voucher['Voucher']['created']; ?>							</li>						</ul>						<ul>							<li class='innreicons'>								<?php //echo __('Updated'); ?><i class='fa fa-hand-o-right'>								</i>							</li><li>								<?php echo $voucher['Voucher']['updated']; ?>							</li>						</ul>					</div>				</div>			</div>		</div>                </div>
            </div>
        </div>
    </div>
</div>
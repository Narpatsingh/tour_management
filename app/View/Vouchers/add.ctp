<?php
    $type = empty($edit) ? 'Add' : 'Edit';
    $this->assign('pagetitle', __('%s Voucher',$type));
    $this->Custom->addCrumb(__('Vouchers'),array('action'=>'index'));
    $this->Custom->addCrumb(__('%s Voucher',$type));
    $this->start('top_links');
    echo $this->Html->link(__('Back'),array('action'=>'index'),array('icon'=>'fa-angle-double-left','class'=>'btn btn-default','escape'=>false));
    $this->end();
    $pcount = $this->request->data['Voucher']['package_count'];
?>

<?php if($pcount==1): ?>    

    <!-- For 1 package section start -->
    <div class="col-md-12">
      
      <div class="box box-primary">
        <div class="overflow-hide-break">
            <?php echo $this->Form->create('Voucher', array('method'=>'POST','class' => 'form-validate multiple_save')); ?>
            <div class="box-body box-content">        
       <?php
       /*Upper start*/ 
                echo $this->Form->input('id',array('type'=>'hidden'));
                echo $this->Form->input('all_t_and_c',array('type'=>'hidden'));
                echo $this->Form->input('booking_id',array('type'=>'hidden'));
                echo $this->Form->input('ac_id',array('type'=>'hidden'));
                echo $this->Form->input('package_count',array('type'=>'hidden'));
                echo $this->Form->input('payment_recieved',array('type'=>'hidden'));
                echo $this->Form->input('customer_email_id',array('type'=>'hidden'));
                echo $this->Form->input('enc_id',array('type'=>'hidden'));
                echo $this->Form->input('all_t_and_c',array('type'=>'hidden'));
       ?>
                <div class="col-md-6">
       <?php
                echo $this->Form->input('customer_full_name',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('customer_contact_no',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
       /*Upper end*/ 
       ?>
       <?php
       /*Middle start*/ 
                echo $this->Form->input('tour_photo',array('type'=>'hidden'));
                echo $this->Form->input('total_payment',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('customer_tour_type',array('class' => 'form-control', 'div' => array('class' => 'form-group')));       
                echo $this->Form->input('customer_tour_name',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('customer_tour_date',array('type'=>'text','class' => 'form-control', 'div' => array('class' => 'form-group')));

                if (!empty($hotels)) {
                    foreach ($hotels as $key => $hotel) {
                      echo $this->Form->input('Hotel.'.$hotel['id'].'.hotel_id',array('type' => 'hidden','value' => $hotel['id']));
                      echo $this->Form->input('Hotel.'.$hotel['id'].'.customer_hotel_name',array('label' => 'Customer Hotel Name','class' => 'form-control','readonly' => true,'value' => $hotel['name'], 'div' => array('class' => 'form-group')));
                      echo $this->Form->input('Hotel.'.$hotel['id'].'.customer_tour_name',array('type' => 'hidden','class' => 'form-control','value' => $this->request->data['Voucher']['customer_tour_name'], 'div' => array('class' => 'form-group')));
                      echo $this->Form->input('Hotel.'.$hotel['id'].'.hotel_check_in_date',array('type'=>'text','id'=>'CustomIdFor'.$hotel['id'].'check_inHotel', 'label' =>  $hotel['name'].' Check In Date','value' => empty($hotel['hotel_check_in_date'])?'':$hotel['hotel_check_in_date'],'class' => 'form-control', 'div' => array('class' => 'form-group')));
                      echo $this->Form->input('Hotel.'.$hotel['id'].'.hotel_check_out_date',array('type'=>'text','id'=>'CustomIdFor'.$hotel['id'].'check_outHotel', 'label' =>  $hotel['name'].' Check Out Date','value' => empty($hotel['hotel_check_out_date'])?'':$hotel['hotel_check_out_date'],'type'=>'text','class' => 'form-control', 'div' => array('class' => 'form-group')));
                      echo $this->Form->input('Hotel.'.$hotel['id'].'.hotel_contact_no',array('label' => $hotel['name'].' Contact Number','class' => 'form-control','readonly' => true,'value' => $hotel['contact_no'], 'div' => array('class' => 'form-group')));
                      if(!empty($edit)){
                      echo $this->Form->input('Hotel.'.$hotel['id'].'.id',array('type' => 'hidden','value' => $hotel['id']));  
                      }
                      ?>
                      <script type="text/javascript">
                      jQuery(document).ready(function () {
                              $('#CustomIdFor<?=$hotel['id']?>check_inHotel').datepicker({
                                  format: "yyyy-mm-dd",
                                  autoclose: true
                              });                        
                              $('#CustomIdFor<?=$hotel['id']?>check_outHotel').datepicker({
                                  format: "yyyy-mm-dd",
                                  autoclose: true
                              });                        
                      });                        
                      </script>
                      <?php

                    }
                }


                echo $this->Form->input('Voucher.generate_receipt',array('type'=>'checkbox'));                
       ?>
                </div>
                <div class="col-md-6">
       <?php         
                echo $this->Form->input('Voucher.customer_travel_type',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.meal_plan',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
       /*Middle end*/ 
       ?>
       <?php
       /*Bottom start*/ 
                echo $this->Form->input('Voucher.customer_room_type',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.tour_manager_name',array('class' => 'form-control', 'div' => array('class' => 'form-group')));                
                echo $this->Form->input('Voucher.tour_manager_contact_no',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.emergency_contact_no',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.payment_type',array('options'=>array('cash'=>'Cash', 'cheque'=> 'Cheque', 'net_banking' => 'Net Banking' ), 'empty'=>'Select Payment Type', 'class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.payment_recieved',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.special_remarks',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
      ?>
                <div class="box box-primary">
                  <div class="box-body box-content">
                  <h4 class="pl-5" style="padding:5px;">Car Details</h4>
      <?php 
                echo $this->Form->input('Voucher.car_type',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.pick_up_date',array('type'=>'text', 'class' => 'form-control', 'div' => array('class' => 'form-group')));                
                echo $this->Form->input('Voucher.drop_date',array('type'=>'text', 'class' => 'form-control', 'div' => array('class' => 'form-group')));                
                echo $this->Form->input('Voucher.nights_days',array('label'=>'Nights/Days','class' => 'form-control', 'div' => array('class' => 'form-group')));                
      ?>                  
                </div>
                </div>
      <?php
                echo $this->Form->input('Voucher.company_signature',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.customer_signature',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
       /*Bottom end*/ 
       ?>
                </div>
                </div>
                <div class="form-action">
                    <?php echo $this->Form->submit(__('Save'), array('div' => false,'class' => 'btn btn-primary btn_dsbl'));?>
                    &nbsp;&nbsp;
                    <?php echo $this->Html->link(__('Cancel'), array('action' => 'index'), array('class' => 'btn btn-default'));?>
                </div>

                <?php $arrValidation = array(
                    'Rules' => array(
                        'customer_full_name' => array('required' => 1),
                        'customer_contact_no' => array('required' => 1),
                        'customer_tour_type' => array('required' => 1),
                        'customer_tour_name' => array('required' => 1),
                        'customer_hotel_name' => array('required' => 1),
                        'customer_tour_date' => array('required' => 1),
                        'customer_hotel_place_name' => array('required' => 1),
                        'customer_hotel_check_in_date' => array('required' => 1),
                        'customer_hotel_check_out_date' => array('required' => 1),
                        'customer_room_type' => array('required' => 1),
                        'customer_travel_type' => array('required' => 1),
                        'meal_plan' => array('required' => 1),
                        'tour_manager_name' => array('required' => 1),
                        'tour_manager_contact_no' => array('required' => 1),
                        'hotel_contact_no' => array('required' => 1),
                        'emergency_contact_no' => array('required' => 1),
                        'company_signature' => array('required' => 1),
                        'customer_signature' => array('required' => 1),
                        'payment_type' => array('required' => 1),
                        'total_payment' => array('required' => 1),
                        'payment_recieved' => array('required' => 1),
                    ),
                    'Messages' => array(
                        'customer_full_name' => array('required' => __('Please enter Customer Full Name')),
                        'customer_contact_no' => array('required' => __('Please enter Customer Contact No')),
                        'customer_tour_type' => array('required' => __('Please enter Customer Tour Type')),
                        'customer_tour_name' => array('required' => __('Please enter Customer Tour Name')),
                        'customer_hotel_name' => array('required' => __('Please enter Customer Hotel Name')),
                        'customer_tour_date' => array('required' => __('Please enter Customer Tour Date')),
                        'customer_hotel_place_name' => array('required' => __('Please enter Customer Hotel Place Name')),
                        'customer_hotel_check_in_date' => array('required' => __('Please enter Customer Hotel Check In Date')),
                        'customer_hotel_check_out_date' => array('required' => __('Please enter Customer Hotel Check Out Date')),
                        'customer_room_type' => array('required' => __('Please enter Customer Room Type')),
                        'customer_travel_type' => array('required' => __('Please enter Customer Travel Type')),
                        'meal_plan' => array('required' => __('Please enter Meal Plan')),
                        'tour_manager_name' => array('required' => __('Please enter Tour Manager Name')),
                        'tour_manager_contact_no' => array('required' => __('Please enter Tour Manager Contact No')),
                        'hotel_contact_no' => array('required' => __('Please enter Hotel Contact No')),
                        'emergency_contact_no' => array('required' => __('Please enter Emergency Contact No')),
                        'company_signature' => array('required' => __('Please enter Company Signature')),
                        'customer_signature' => array('required' => __('Please enter Customer Signature')),
                        'payment_type' => array('required' => __('Please select payment type')),
                        'total_payment' => array('required' => __('Please enter total payment')),
                        'payment_recieved' => array('required' => __('Please enter payment recieved amount.')),
                    ));



                        echo $this->Form->setValidation($arrValidation); ?>

                        <?php echo $this->Form->end(); ?>                
            </div>
        </div>

    </div>
    <!-- For 1 package section end -->

    <?php elseif($pcount==2): ?>

    <!-- For 2 packages section start -->
    <div class="col-md-12">

      <div class="box box-primary">
        <div class="overflow-hide-break">
            <?php echo $this->Form->create('Voucher', array('method'=>'POST','class' => 'form-validate multiple_save')); ?>
            <div class="box-body box-content">        
       <?php
       /*Upper start*/ 
                echo $this->Form->input('id',array('type'=>'hidden'));
                echo $this->Form->input('all_t_and_c',array('type'=>'hidden'));
                echo $this->Form->input('booking_id',array('type'=>'hidden'));
                echo $this->Form->input('ac_id',array('type'=>'hidden'));
                echo $this->Form->input('package_count',array('type'=>'hidden'));
                echo $this->Form->input('payment_recieved',array('type'=>'hidden'));
                echo $this->Form->input('customer_email_id',array('type'=>'hidden'));
                echo $this->Form->input('enc_id',array('type'=>'hidden'));
                echo $this->Form->input('all_t_and_c',array('type'=>'hidden'));
       ?>
                <div class="col-md-6">
       <?php     
                echo $this->Form->input('customer_full_name',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
       ?>
                </div>
                <div class="col-md-6">
       <?php         
                echo $this->Form->input('customer_contact_no',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
       /*Upper end*/ 
       ?> 
                </div>
       <?php
       /*Middle start*/ 
       ?>
                    <div class="col-md-6">
                     <div class="box box-primary">
                      <div class="overflow-hide-break">
                       <div class="box-body box-content">
       <?php
                echo "<center><b> Tour Title :  ". $this->request->data['Voucher']['customer_tour_name']."</b></center><br>";
                echo $this->Form->input('tour_photo',array('type'=>'hidden'));
                echo $this->Form->input('total_payment',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('customer_tour_type',array('class' => 'form-control', 'div' => array('class' => 'form-group')));       
                echo $this->Form->input('customer_tour_name',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('customer_tour_date',array('type'=>'text','class' => 'form-control', 'div' => array('class' => 'form-group')));

                if (!empty($hotels)) {
                    foreach ($hotels as $key => $hotel) {
                      echo $this->Form->input('Hotel.'.$hotel['id'].'.hotel_id',array('type' => 'hidden','value' => $hotel['id']));
                      echo $this->Form->input('Hotel.'.$hotel['id'].'.customer_hotel_name',array('label' => 'Customer Hotel Name','class' => 'form-control','readonly' => true,'value' => $hotel['name'], 'div' => array('class' => 'form-group')));
                      echo $this->Form->input('Hotel.'.$hotel['id'].'.customer_tour_name',array('type' => 'hidden','class' => 'form-control','value' => $this->request->data['Voucher']['customer_tour_name'], 'div' => array('class' => 'form-group')));
                      echo $this->Form->input('Hotel.'.$hotel['id'].'.hotel_check_in_date',array('type'=>'text','id'=>'CustomIdFor'.$hotel['id'].'check_inHotel', 'label' =>  $hotel['name'].' Check In Date','value' => empty($hotel['hotel_check_in_date'])?'':$hotel['hotel_check_in_date'],'class' => 'form-control', 'div' => array('class' => 'form-group')));
                      echo $this->Form->input('Hotel.'.$hotel['id'].'.hotel_check_out_date',array('type'=>'text','id'=>'CustomIdFor'.$hotel['id'].'check_outHotel', 'label' =>  $hotel['name'].' Check Out Date','value' => empty($hotel['hotel_check_out_date'])?'':$hotel['hotel_check_out_date'],'type'=>'text','class' => 'form-control', 'div' => array('class' => 'form-group')));
                      echo $this->Form->input('Hotel.'.$hotel['id'].'.hotel_contact_no',array('label' => $hotel['name'].' Contact Number','class' => 'form-control','readonly' => true,'value' => $hotel['contact_no'], 'div' => array('class' => 'form-group')));
                      if(!empty($edit)){
                      echo $this->Form->input('Hotel.'.$hotel['id'].'.id',array('type' => 'hidden','value' => $hotel['id']));  
                      }
                      ?>
                      <script type="text/javascript">
                      jQuery(document).ready(function () {
                              $('#CustomIdFor<?=$hotel['id']?>check_inHotel').datepicker({
                                  format: "yyyy-mm-dd",
                                  autoclose: true
                              });                        
                              $('#CustomIdFor<?=$hotel['id']?>check_outHotel').datepicker({
                                  format: "yyyy-mm-dd",
                                  autoclose: true
                              });                        
                      });                        
                      </script>
                      <?php

                    }
                }

                echo $this->Form->input('Voucher.customer_hotel_place_name',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.customer_room_type',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.customer_travel_type',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.meal_plan',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
        ?>
                       </div>
                      </div>
                     </div>
                    <div class="box box-primary">
                      <div class="box-body box-content">
                      <h4 class="pl-5" style="padding:5px;">Car Details</h4>
          <?php 
                    echo $this->Form->input('Voucher.car_type',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                    echo $this->Form->input('Voucher.pick_up_date',array('type'=>'text', 'class' => 'form-control', 'div' => array('class' => 'form-group')));                
                    echo $this->Form->input('Voucher.drop_date',array('type'=>'text', 'class' => 'form-control', 'div' => array('class' => 'form-group')));                
                    echo $this->Form->input('Voucher.nights_days',array('label'=>'Nights/Days','class' => 'form-control', 'div' => array('class' => 'form-group')));                
          ?>                  
                    </div>
                    </div>                     
                    </div>

                    <div class="col-md-6">
                     <div class="box box-primary">
                      <div class="overflow-hide-break">
                       <div class="box-body box-content">
       <?php
                echo "<center><b> Tour Title :  ". $this->request->data['Voucher']['customer_tour_name2']."</b></center><br>";                
                echo $this->Form->input('tour_photo2',array('type'=>'hidden'));
                echo $this->Form->input('total_payment2',array('class' => 'form-control','label' => 'Total Payment', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('customer_tour_type2',array('class' => 'form-control','label' => 'Customer Tour Type', 'div' => array('class' => 'form-group')));       
                echo $this->Form->input('customer_tour_name2',array('class' => 'form-control','label' => 'Customer Tour Name', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('customer_tour_date2',array('type'=>'text','class' => 'form-control','label' => 'Customer Tour Date', 'div' => array('class' => 'form-group')));

                if (!empty($hotels2)) {
                    foreach ($hotels2 as $key => $hotel) {
                      echo $this->Form->input('Hotel2.'.$hotel['id'].'.hotel_id',array('type' => 'hidden','value' => $hotel['id']));
                      echo $this->Form->input('Hotel2.'.$hotel['id'].'.customer_hotel_name',array('label' => 'Customer Hotel Name','class' => 'form-control','readonly' => true,'value' => $hotel['name'], 'div' => array('class' => 'form-group')));
                      echo $this->Form->input('Hotel2.'.$hotel['id'].'.customer_tour_name',array('type' => 'hidden','class' => 'form-control','value' => $this->request->data['Voucher']['customer_tour_name2'], 'div' => array('class' => 'form-group')));                      
                      echo $this->Form->input('Hotel2.'.$hotel['id'].'.hotel_check_in_date',array('type'=>'text','id'=>'CustomIdFor'.$hotel['id'].'check_inHotel', 'label' =>  $hotel['name'].' Check In Date','value' => empty($hotel['hotel_check_in_date'])?'':$hotel['hotel_check_in_date'],'class' => 'form-control', 'div' => array('class' => 'form-group')));
                      echo $this->Form->input('Hotel2.'.$hotel['id'].'.hotel_check_out_date',array('type'=>'text','id'=>'CustomIdFor'.$hotel['id'].'check_outHotel', 'label' =>  $hotel['name'].' Check Out Date','value' => empty($hotel['hotel_check_out_date'])?'':$hotel['hotel_check_out_date'],'type'=>'text','class' => 'form-control', 'div' => array('class' => 'form-group')));
                      echo $this->Form->input('Hotel2.'.$hotel['id'].'.hotel_contact_no',array('label' => $hotel['name'].' Contact Number','class' => 'form-control','readonly' => true,'value' => $hotel['contact_no'], 'div' => array('class' => 'form-group')));
                      if(!empty($edit)){
                      echo $this->Form->input('Hotel2.'.$hotel['id'].'.id',array('type' => 'hidden','value' => $hotel['id']));  
                      }
                      ?>
                      <script type="text/javascript">
                      jQuery(document).ready(function () {
                              $('#CustomIdFor<?=$hotel['id']?>check_inHotel').datepicker({
                                  format: "yyyy-mm-dd",
                                  autoclose: true
                              });                        
                              $('#CustomIdFor<?=$hotel['id']?>check_outHotel').datepicker({
                                  format: "yyyy-mm-dd",
                                  autoclose: true
                              });                        
                      });                        
                      </script>
                      <?php

                    }
                }

                echo $this->Form->input('Voucher.customer_hotel_place_name2',array('class' => 'form-control','label' => 'Customer Hotel Place Name', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.customer_room_type2',array('class' => 'form-control','label' => 'Customer Room Type', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.customer_travel_type2',array('class' => 'form-control','label' => 'Customer Travel Type', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.meal_plan2',array('class' => 'form-control','label' => 'Meal Plan', 'div' => array('class' => 'form-group')));
        ?>
                       </div>
                      </div>
                     </div>
                    <div class="box box-primary">
                      <div class="box-body box-content">
                      <h4 class="pl-5" style="padding:5px;">Car Details</h4>
          <?php 
                    echo $this->Form->input('Voucher.car_type2',array('label'=>'Car Type','class' => 'form-control', 'div' => array('class' => 'form-group')));
                    echo $this->Form->input('Voucher.pick_up_date2',array('label'=>'Pick Up Date','type'=>'text', 'class' => 'form-control', 'div' => array('class' => 'form-group')));                
                    echo $this->Form->input('Voucher.drop_date2',array('label'=>'Drop Date','type'=>'text', 'class' => 'form-control', 'div' => array('class' => 'form-group')));                
                    echo $this->Form->input('Voucher.nights_days2',array('label'=>'Nights/Days','class' => 'form-control', 'div' => array('class' => 'form-group')));                
          ?>                  
                    </div>
                    </div>                     
                    </div>                            
       <?php        
       /*Middle end*/ 
       ?>
                <div class="col-md-6">
       <?php
       /*Bottom start*/ 
                echo $this->Form->input('Voucher.tour_manager_name',array('class' => 'form-control', 'div' => array('class' => 'form-group')));                
                echo $this->Form->input('Voucher.tour_manager_contact_no',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.emergency_contact_no',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.generate_receipt',array('type'=>'checkbox'));                
       ?>
                </div>
                <div class="col-md-6">
       <?php         
                echo $this->Form->input('Voucher.payment_type',array('options'=>array('cash'=>'Cash', 'cheque'=> 'Cheque', 'net_banking' => 'Net Banking' ), 'empty'=>'Select Payment Type', 'class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.payment_recieved',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.special_remarks',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.company_signature',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.customer_signature',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
       /*Bottom end*/ 
       ?>
                </div>
                </div>
                <div class="form-action">
                    <?php echo $this->Form->submit(__('Save'), array('div' => false,'class' => 'btn btn-primary btn_dsbl'));?>
                    &nbsp;&nbsp;
                    <?php echo $this->Html->link(__('Cancel'), array('action' => 'index'), array('class' => 'btn btn-default'));?>
                </div>

                <?php $arrValidation = array(
                    'Rules' => array(
                        'customer_full_name' => array('required' => 1),
                        'customer_contact_no' => array('required' => 1),
                        'customer_tour_type' => array('required' => 1),
                        'customer_tour_name' => array('required' => 1),
                        'customer_hotel_name' => array('required' => 1),
                        'customer_tour_date' => array('required' => 1),
                        'customer_hotel_place_name' => array('required' => 1),
                        'customer_hotel_check_in_date' => array('required' => 1),
                        'customer_hotel_check_out_date' => array('required' => 1),
                        'customer_room_type' => array('required' => 1),
                        'customer_travel_type' => array('required' => 1),
                        'meal_plan' => array('required' => 1),
                        'tour_manager_name' => array('required' => 1),
                        'tour_manager_contact_no' => array('required' => 1),
                        'hotel_contact_no' => array('required' => 1),
                        'emergency_contact_no' => array('required' => 1),
                        'company_signature' => array('required' => 1),
                        'customer_signature' => array('required' => 1),
                        'payment_type' => array('required' => 1),
                        'total_payment' => array('required' => 1),
                        'total_payment2' => array('required' => 1),
                        'payment_recieved' => array('required' => 1),
                        'customer_tour_type2' => array('required' => 1),
                        'customer_tour_name2' => array('required' => 1),
                        'customer_hotel_name2' => array('required' => 1),
                        'customer_tour_date2' => array('required' => 1),
                        'customer_hotel_place_name2' => array('required' => 1),
                        'customer_hotel_check_in_date2' => array('required' => 1),
                        'customer_hotel_check_out_date2' => array('required' => 1),
                        'customer_room_type2' => array('required' => 1),
                        'customer_travel_type2' => array('required' => 1),
                        'meal_plan2' => array('required' => 1),
                        'hotel_contact_no2' => array('required' => 1),
                    ),
                    'Messages' => array(
                        'customer_full_name' => array('required' => __('Please enter Customer Full Name')),
                        'customer_contact_no' => array('required' => __('Please enter Customer Contact No')),
                        'customer_tour_type' => array('required' => __('Please enter Customer Tour Type')),
                        'customer_tour_name' => array('required' => __('Please enter Customer Tour Name')),
                        'customer_hotel_name' => array('required' => __('Please enter Customer Hotel Name')),
                        'customer_tour_date' => array('required' => __('Please enter Customer Tour Date')),
                        'customer_hotel_place_name' => array('required' => __('Please enter Customer Hotel Place Name')),
                        'customer_hotel_check_in_date' => array('required' => __('Please enter Customer Hotel Check In Date')),
                        'customer_hotel_check_out_date' => array('required' => __('Please enter Customer Hotel Check Out Date')),
                        'customer_room_type' => array('required' => __('Please enter Customer Room Type')),
                        'customer_travel_type' => array('required' => __('Please enter Customer Travel Type')),
                        'meal_plan' => array('required' => __('Please enter Meal Plan')),
                        'tour_manager_name' => array('required' => __('Please enter Tour Manager Name')),
                        'tour_manager_contact_no' => array('required' => __('Please enter Tour Manager Contact No')),
                        'hotel_contact_no' => array('required' => __('Please enter Hotel Contact No')),
                        'emergency_contact_no' => array('required' => __('Please enter Emergency Contact No')),
                        'company_signature' => array('required' => __('Please enter Company Signature')),
                        'customer_signature' => array('required' => __('Please enter Customer Signature')),
                        'payment_type' => array('required' => __('Please select payment type')),
                        'total_payment' => array('required' => __('Please enter total payment')),
                        'total_payment2' => array('required' => __('Please enter total payment')),
                        'payment_recieved' => array('required' => __('Please enter payment recieved amount.')),
                        'customer_tour_type2' => array('required' => __('Please enter Customer Tour Type')),
                        'customer_tour_name2' => array('required' => __('Please enter Customer Tour Name')),
                        'customer_hotel_name2' => array('required' => __('Please enter Customer Hotel Name')),
                        'customer_tour_date2' => array('required' => __('Please enter Customer Tour Date')),
                        'customer_hotel_place_name2' => array('required' => __('Please enter Customer Hotel Place Name')),
                        'customer_hotel_check_in_date2' => array('required' => __('Please enter Customer Hotel Check In Date')),
                        'customer_hotel_check_out_date2' => array('required' => __('Please enter Customer Hotel Check Out Date')),
                        'customer_room_type2' => array('required' => __('Please enter Customer Room Type')),
                        'customer_travel_type2' => array('required' => __('Please enter Customer Travel Type')),
                        'meal_plan2' => array('required' => __('Please enter Meal Plan')),
                        'hotel_contact_no2' => array('required' => __('Please enter Hotel Contact No')),
                    ));

                        echo $this->Form->setValidation($arrValidation); ?>

                        <?php echo $this->Form->end(); ?>                
            </div>
        </div>     

    </div>
    <!-- For 2 packages section end -->
    
    <?php else: ?>  

    <!-- For 3 packages section start -->
    <div class="col-md-12">

      <div class="box box-primary">
        <div class="overflow-hide-break">
            <?php echo $this->Form->create('Voucher', array('method'=>'POST','class' => 'form-validate multiple_save')); ?>
            <div class="box-body box-content">        
       <?php
       /*Upper start*/ 
                echo $this->Form->input('id',array('type'=>'hidden'));
                echo $this->Form->input('all_t_and_c',array('type'=>'hidden'));
                echo $this->Form->input('booking_id',array('type'=>'hidden'));
                echo $this->Form->input('ac_id',array('type'=>'hidden'));
                echo $this->Form->input('package_count',array('type'=>'hidden'));
                echo $this->Form->input('payment_recieved',array('type'=>'hidden'));
                echo $this->Form->input('customer_email_id',array('type'=>'hidden'));
                echo $this->Form->input('enc_id',array('type'=>'hidden'));
                echo $this->Form->input('all_t_and_c',array('type'=>'hidden'));
       ?>
                <div class="col-md-6">
       <?php               
                echo $this->Form->input('customer_full_name',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
       ?>
                </div>
                <div class="col-md-6">  
       <?php         
                echo $this->Form->input('customer_contact_no',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
       /*Upper end*/ 
       ?>
                </div>
       <?php
       /*Middle start*/ 
       ?>
                    <div class="col-md-4">
                     <div class="box box-primary">
                      <div class="overflow-hide-break">
                       <div class="box-body box-content">
       <?php
                echo "<center><b> Tour Title :  ". $this->request->data['Voucher']['customer_tour_name']."</b></center><br>";
                echo $this->Form->input('tour_photo',array('type'=>'hidden'));
                echo $this->Form->input('total_payment',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('customer_tour_type',array('class' => 'form-control', 'div' => array('class' => 'form-group')));       
                echo $this->Form->input('customer_tour_name',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('customer_tour_date',array('type'=>'text','class' => 'form-control', 'div' => array('class' => 'form-group')));

                if (!empty($hotels)) {
                    foreach ($hotels as $key => $hotel) {
                      echo $this->Form->input('Hotel.'.$hotel['id'].'.hotel_id',array('type' => 'hidden','value' => $hotel['id']));
                      echo $this->Form->input('Hotel.'.$hotel['id'].'.customer_hotel_name',array('label' => 'Customer Hotel Name','class' => 'form-control','readonly' => true,'value' => $hotel['name'], 'div' => array('class' => 'form-group')));
                      echo $this->Form->input('Hotel.'.$hotel['id'].'.customer_tour_name',array('type' => 'hidden','class' => 'form-control','value' => $this->request->data['Voucher']['customer_tour_name'], 'div' => array('class' => 'form-group')));
                      echo $this->Form->input('Hotel.'.$hotel['id'].'.hotel_check_in_date',array('type'=>'text','id'=>'CustomIdFor'.$hotel['id'].'check_inHotel', 'label' =>  $hotel['name'].' Check In Date','value' => empty($hotel['hotel_check_in_date'])?'':$hotel['hotel_check_in_date'],'class' => 'form-control', 'div' => array('class' => 'form-group')));
                      echo $this->Form->input('Hotel.'.$hotel['id'].'.hotel_check_out_date',array('type'=>'text','id'=>'CustomIdFor'.$hotel['id'].'check_outHotel', 'label' =>  $hotel['name'].' Check Out Date','value' => empty($hotel['hotel_check_out_date'])?'':$hotel['hotel_check_out_date'],'type'=>'text','class' => 'form-control', 'div' => array('class' => 'form-group')));
                      echo $this->Form->input('Hotel.'.$hotel['id'].'.hotel_contact_no',array('label' => $hotel['name'].' Contact Number','class' => 'form-control','readonly' => true,'value' => $hotel['contact_no'], 'div' => array('class' => 'form-group')));
                      if(!empty($edit)){
                      echo $this->Form->input('Hotel.'.$hotel['id'].'.id',array('type' => 'hidden','value' => $hotel['id']));  
                      }
                      ?>
                      <script type="text/javascript">
                      jQuery(document).ready(function () {
                              $('#CustomIdFor<?=$hotel['id']?>check_inHotel').datepicker({
                                  format: "yyyy-mm-dd",
                                  autoclose: true
                              });                        
                              $('#CustomIdFor<?=$hotel['id']?>check_outHotel').datepicker({
                                  format: "yyyy-mm-dd",
                                  autoclose: true
                              });                        
                      });                        
                      </script>
                      <?php

                    }
                }

                echo $this->Form->input('Voucher.customer_hotel_place_name',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.customer_room_type',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.customer_travel_type',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.meal_plan',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
        ?>
                       </div>
                      </div>
                     </div>
                    <div class="box box-primary">
                      <div class="box-body box-content">
                      <h4 class="pl-5" style="padding:5px;">Car Details</h4>
          <?php 
                    echo $this->Form->input('Voucher.car_type',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                    echo $this->Form->input('Voucher.pick_up_date',array('type'=>'text', 'class' => 'form-control', 'div' => array('class' => 'form-group')));                
                    echo $this->Form->input('Voucher.drop_date',array('type'=>'text', 'class' => 'form-control', 'div' => array('class' => 'form-group')));                
                    echo $this->Form->input('Voucher.nights_days',array('class' => 'form-control', 'div' => array('class' => 'form-group')));                
          ?>                  
                    </div>
                    </div>                     
                    </div>

                    <div class="col-md-4">
                     <div class="box box-primary">
                      <div class="overflow-hide-break">
                       <div class="box-body box-content">
       <?php
                echo "<center><b> Tour Title :  ". $this->request->data['Voucher']['customer_tour_name2']."</b></center><br>";                
                echo $this->Form->input('Voucher.tour_photo2',array('type'=>'hidden'));
                echo $this->Form->input('Voucher.total_payment2',array('class' => 'form-control','label' => 'Total Payment', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.customer_tour_type2',array('class' => 'form-control','label' => 'Customer Tour Type', 'div' => array('class' => 'form-group')));       
                echo $this->Form->input('Voucher.customer_tour_name2',array('class' => 'form-control','label' => 'Customer Tour Name', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.customer_tour_date2',array('type'=>'text','class' => 'form-control','label' => 'Customer Tour Date', 'div' => array('class' => 'form-group')));

                if (!empty($hotels2)) {
                    foreach ($hotels2 as $key => $hotel) {
                      echo $this->Form->input('Hotel2.'.$hotel['id'].'.hotel_id',array('type' => 'hidden','value' => $hotel['id']));
                      echo $this->Form->input('Hotel2.'.$hotel['id'].'.customer_hotel_name',array('label' => 'Customer Hotel Name','class' => 'form-control','readonly' => true,'value' => $hotel['name'], 'div' => array('class' => 'form-group')));
                      echo $this->Form->input('Hotel2.'.$hotel['id'].'.customer_tour_name',array('type' => 'hidden','class' => 'form-control','value' => $this->request->data['Voucher']['customer_tour_name2'], 'div' => array('class' => 'form-group')));                                            
                      echo $this->Form->input('Hotel2.'.$hotel['id'].'.hotel_check_in_date',array('type'=>'text','id'=>'CustomIdFor'.$hotel['id'].'check_inHotel', 'label' =>  $hotel['name'].' Check In Date','value' => empty($hotel['hotel_check_in_date'])?'':$hotel['hotel_check_in_date'],'class' => 'form-control', 'div' => array('class' => 'form-group')));
                      echo $this->Form->input('Hotel2.'.$hotel['id'].'.hotel_check_out_date',array('type'=>'text','id'=>'CustomIdFor'.$hotel['id'].'check_outHotel', 'label' =>  $hotel['name'].' Check Out Date','value' => empty($hotel['hotel_check_out_date'])?'':$hotel['hotel_check_out_date'],'type'=>'text','class' => 'form-control', 'div' => array('class' => 'form-group')));
                      echo $this->Form->input('Hotel2.'.$hotel['id'].'.hotel_contact_no',array('label' => $hotel['name'].' Contact Number','class' => 'form-control','readonly' => true,'value' => $hotel['contact_no'], 'div' => array('class' => 'form-group')));
                      if(!empty($edit)){
                      echo $this->Form->input('Hotel2.'.$hotel['id'].'.id',array('type' => 'hidden','value' => $hotel['id']));  
                      }
                      ?>
                      <script type="text/javascript">
                      jQuery(document).ready(function () {
                              $('#CustomIdFor<?=$hotel['id']?>check_inHotel').datepicker({
                                  format: "yyyy-mm-dd",
                                  autoclose: true
                              });                        
                              $('#CustomIdFor<?=$hotel['id']?>check_outHotel').datepicker({
                                  format: "yyyy-mm-dd",
                                  autoclose: true
                              });                        
                      });                        
                      </script>
                      <?php

                    }
                }

                echo $this->Form->input('Voucher.customer_hotel_place_name2',array('class' => 'form-control','label' => 'Customer Hotel Place Name', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.customer_room_type2',array('class' => 'form-control','label' => 'Customer Room Type', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.customer_travel_type2',array('class' => 'form-control','label' => 'Customer Travel Type', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.meal_plan2',array('class' => 'form-control','label' => 'Meal Plan', 'div' => array('class' => 'form-group')));
        ?>
                       </div>
                      </div>
                     </div>
                    <div class="box box-primary">
                      <div class="box-body box-content">
                      <h4 class="pl-5" style="padding:5px;">Car Details</h4>
          <?php 
                    echo $this->Form->input('Voucher.car_type2',array('label'=>'Car Type','class' => 'form-control', 'div' => array('class' => 'form-group')));
                    echo $this->Form->input('Voucher.pick_up_date2',array('label'=>'Pick Up Date','type'=>'text', 'class' => 'form-control', 'div' => array('class' => 'form-group')));                
                    echo $this->Form->input('Voucher.drop_date2',array('label'=>'Drop Date','type'=>'text', 'class' => 'form-control', 'div' => array('class' => 'form-group')));                
                    echo $this->Form->input('Voucher.nights_days2',array('label'=>'Nights/Days','class' => 'form-control', 'div' => array('class' => 'form-group')));                
          ?>                  
                    </div>
                    </div>                     
                    </div>                            

                    <div class="col-md-4">
                     <div class="box box-primary">
                      <div class="overflow-hide-break">
                       <div class="box-body box-content">
       <?php
                echo "<center><b> Tour Title :  ". $this->request->data['Voucher']['customer_tour_name3']."</b></center><br>";                
                echo $this->Form->input('Voucher.tour_photo3',array('type'=>'hidden'));
                echo $this->Form->input('Voucher.total_payment2',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.customer_tour_type3',array('class' => 'form-control','label' => 'Customer Tour Type', 'div' => array('class' => 'form-group')));       
                echo $this->Form->input('Voucher.customer_tour_name3',array('class' => 'form-control','label' => 'Customer Tour Name', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.customer_tour_date3',array('type'=>'text','class' => 'form-control','label' => 'Customer Tour Date', 'div' => array('class' => 'form-group')));

                if (!empty($hotels3)) {
                    foreach ($hotels3 as $key => $hotel) {
                      echo $this->Form->input('Hotel3.'.$hotel['id'].'.hotel_id',array('type' => 'hidden','value' => $hotel['id']));
                      echo $this->Form->input('Hotel3.'.$hotel['id'].'.customer_hotel_name',array('label' => 'Customer Hotel Name','class' => 'form-control','readonly' => true,'value' => $hotel['name'], 'div' => array('class' => 'form-group')));
                      echo $this->Form->input('Hotel3.'.$hotel['id'].'.customer_tour_name',array('type' => 'hidden','class' => 'form-control','value' => $this->request->data['Voucher']['customer_tour_name3'], 'div' => array('class' => 'form-group')));                                            
                      echo $this->Form->input('Hotel3.'.$hotel['id'].'.hotel_check_in_date',array('type'=>'text','id'=>'CustomIdFor'.$hotel['id'].'check_inHotel', 'label' =>  $hotel['name'].' Check In Date','value' => empty($hotel['hotel_check_in_date'])?'':$hotel['hotel_check_in_date'],'class' => 'form-control', 'div' => array('class' => 'form-group')));
                      echo $this->Form->input('Hotel3.'.$hotel['id'].'.hotel_check_out_date',array('type'=>'text','id'=>'CustomIdFor'.$hotel['id'].'check_outHotel', 'label' =>  $hotel['name'].' Check Out Date','value' => empty($hotel['hotel_check_out_date'])?'':$hotel['hotel_check_out_date'],'type'=>'text','class' => 'form-control', 'div' => array('class' => 'form-group')));
                      echo $this->Form->input('Hotel3.'.$hotel['id'].'.hotel_contact_no',array('label' => $hotel['name'].' Contact Number','class' => 'form-control','readonly' => true,'value' => $hotel['contact_no'], 'div' => array('class' => 'form-group')));
                      if(!empty($edit)){
                      echo $this->Form->input('Hotel3.'.$hotel['id'].'.id',array('type' => 'hidden','value' => $hotel['id']));  
                      }
                      ?>
                      <script type="text/javascript">
                      jQuery(document).ready(function () {
                              $('#CustomIdFor<?=$hotel['id']?>check_inHotel').datepicker({
                                  format: "yyyy-mm-dd",
                                  autoclose: true
                              });                        
                              $('#CustomIdFor<?=$hotel['id']?>check_outHotel').datepicker({
                                  format: "yyyy-mm-dd",
                                  autoclose: true
                              });                        
                      });                        
                      </script>
                      <?php

                    }
                }

                echo $this->Form->input('Voucher.customer_hotel_place_name3',array('class' => 'form-control','label' => 'Customer Hotel Place Name', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.customer_room_type3',array('class' => 'form-control','label' => 'Customer Room Type', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.customer_travel_type3',array('class' => 'form-control','label' => 'Customer Travel Type', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.meal_plan3',array('class' => 'form-control','label' => 'Meal Plan', 'div' => array('class' => 'form-group')));
        ?>
                       </div>
                      </div>
                     </div>
                    <div class="box box-primary">
                      <div class="box-body box-content">
                      <h4 class="pl-5" style="padding:5px;">Car Details</h4>
          <?php 
                    echo $this->Form->input('Voucher.car_type3',array('label'=>'Car Type','class' => 'form-control', 'div' => array('class' => 'form-group')));
                    echo $this->Form->input('Voucher.pick_up_date3',array('label'=>'Pick Up Date','type'=>'text', 'class' => 'form-control', 'div' => array('class' => 'form-group')));                
                    echo $this->Form->input('Voucher.drop_date3',array('label'=>'Drop Date','type'=>'text', 'class' => 'form-control', 'div' => array('class' => 'form-group')));                
                    echo $this->Form->input('Voucher.nights_days3',array('label'=>'Nights/Days','class' => 'form-control', 'div' => array('class' => 'form-group')));                
          ?>                  
                    </div>
                    </div>                     
                    </div>                            

       <?php        
       /*Middle end*/ 
       ?>
                <div class="col-md-6">  
       <?php
       /*Bottom start*/ 
                echo $this->Form->input('Voucher.tour_manager_name',array('class' => 'form-control', 'div' => array('class' => 'form-group')));                
                echo $this->Form->input('Voucher.tour_manager_contact_no',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.emergency_contact_no',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.generate_receipt',array('type'=>'checkbox'));                
       ?>
                </div>
                <div class="col-md-6">  
       <?php         
                echo $this->Form->input('Voucher.payment_type',array('options'=>array('cash'=>'Cash', 'cheque'=> 'Cheque', 'net_banking' => 'Net Banking' ), 'empty'=>'Select Payment Type', 'class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.payment_recieved',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.special_remarks',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.company_signature',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
                echo $this->Form->input('Voucher.customer_signature',array('class' => 'form-control', 'div' => array('class' => 'form-group')));
       /*Bottom end*/ 
       ?>
                </div>
                </div>
                <div class="form-action">
                    <?php echo $this->Form->submit(__('Save'), array('div' => false,'class' => 'btn btn-primary btn_dsbl'));?>
                    &nbsp;&nbsp;
                    <?php echo $this->Html->link(__('Cancel'), array('action' => 'index'), array('class' => 'btn btn-default'));?>
                </div>

                <?php $arrValidation = array(
                    'Rules' => array(
                        'customer_full_name' => array('required' => 1),
                        'customer_contact_no' => array('required' => 1),
                        'customer_tour_type' => array('required' => 1),
                        'customer_tour_name' => array('required' => 1),
                        'customer_hotel_name' => array('required' => 1),
                        'customer_tour_date' => array('required' => 1),
                        'customer_hotel_place_name' => array('required' => 1),
                        'customer_hotel_check_in_date' => array('required' => 1),
                        'customer_hotel_check_out_date' => array('required' => 1),
                        'customer_room_type' => array('required' => 1),
                        'customer_travel_type' => array('required' => 1),
                        'meal_plan' => array('required' => 1),
                        'tour_manager_name' => array('required' => 1),
                        'tour_manager_contact_no' => array('required' => 1),
                        'hotel_contact_no' => array('required' => 1),
                        'emergency_contact_no' => array('required' => 1),
                        'company_signature' => array('required' => 1),
                        'customer_signature' => array('required' => 1),
                        'payment_type' => array('required' => 1),
                        'total_payment' => array('required' => 1),
                        'total_payment2' => array('required' => 1),
                        'total_payment3' => array('required' => 1),
                        'payment_recieved' => array('required' => 1),
                        'customer_tour_type2' => array('required' => 1),
                        'customer_tour_name2' => array('required' => 1),
                        'customer_hotel_name2' => array('required' => 1),
                        'customer_tour_date2' => array('required' => 1),
                        'customer_hotel_place_name2' => array('required' => 1),
                        'customer_hotel_check_in_date2' => array('required' => 1),
                        'customer_hotel_check_out_date2' => array('required' => 1),
                        'customer_room_type2' => array('required' => 1),
                        'customer_travel_type2' => array('required' => 1),
                        'meal_plan2' => array('required' => 1),
                        'hotel_contact_no3' => array('required' => 1),
                        'customer_tour_type3' => array('required' => 1),
                        'customer_tour_name3' => array('required' => 1),
                        'customer_hotel_name3' => array('required' => 1),
                        'customer_tour_date3' => array('required' => 1),
                        'customer_hotel_place_name3' => array('required' => 1),
                        'customer_hotel_check_in_date3' => array('required' => 1),
                        'customer_hotel_check_out_date3' => array('required' => 1),
                        'customer_room_type3' => array('required' => 1),
                        'customer_travel_type3' => array('required' => 1),
                        'meal_plan3' => array('required' => 1),
                        'hotel_contact_no3' => array('required' => 1),                        
                    ),
                    'Messages' => array(
                        'customer_full_name' => array('required' => __('Please enter Customer Full Name')),
                        'customer_contact_no' => array('required' => __('Please enter Customer Contact No')),
                        'customer_tour_type' => array('required' => __('Please enter Customer Tour Type')),
                        'customer_tour_name' => array('required' => __('Please enter Customer Tour Name')),
                        'customer_hotel_name' => array('required' => __('Please enter Customer Hotel Name')),
                        'customer_tour_date' => array('required' => __('Please enter Customer Tour Date')),
                        'customer_hotel_place_name' => array('required' => __('Please enter Customer Hotel Place Name')),
                        'customer_hotel_check_in_date' => array('required' => __('Please enter Customer Hotel Check In Date')),
                        'customer_hotel_check_out_date' => array('required' => __('Please enter Customer Hotel Check Out Date')),
                        'customer_room_type' => array('required' => __('Please enter Customer Room Type')),
                        'customer_travel_type' => array('required' => __('Please enter Customer Travel Type')),
                        'meal_plan' => array('required' => __('Please enter Meal Plan')),
                        'tour_manager_name' => array('required' => __('Please enter Tour Manager Name')),
                        'tour_manager_contact_no' => array('required' => __('Please enter Tour Manager Contact No')),
                        'hotel_contact_no' => array('required' => __('Please enter Hotel Contact No')),
                        'emergency_contact_no' => array('required' => __('Please enter Emergency Contact No')),
                        'company_signature' => array('required' => __('Please enter Company Signature')),
                        'customer_signature' => array('required' => __('Please enter Customer Signature')),
                        'payment_type' => array('required' => __('Please select payment type')),
                        'total_payment' => array('required' => __('Please enter total payment')),
                        'total_payment2' => array('required' => __('Please enter total payment')),
                        'total_payment3' => array('required' => __('Please enter total payment')),
                        'payment_recieved' => array('required' => __('Please enter payment recieved amount.')),
                        'customer_tour_type2' => array('required' => __('Please enter Customer Tour Type')),
                        'customer_tour_name2' => array('required' => __('Please enter Customer Tour Name')),
                        'customer_hotel_name2' => array('required' => __('Please enter Customer Hotel Name')),
                        'customer_tour_date2' => array('required' => __('Please enter Customer Tour Date')),
                        'customer_hotel_place_name2' => array('required' => __('Please enter Customer Hotel Place Name')),
                        'customer_hotel_check_in_date2' => array('required' => __('Please enter Customer Hotel Check In Date')),
                        'customer_hotel_check_out_date2' => array('required' => __('Please enter Customer Hotel Check Out Date')),
                        'customer_room_type2' => array('required' => __('Please enter Customer Room Type')),
                        'customer_travel_type2' => array('required' => __('Please enter Customer Travel Type')),
                        'meal_plan2' => array('required' => __('Please enter Meal Plan')),
                        'hotel_contact_no2' => array('required' => __('Please enter Hotel Contact No')),
                        'customer_tour_type3' => array('required' => __('Please enter Customer Tour Type')),
                        'customer_tour_name3' => array('required' => __('Please enter Customer Tour Name')),
                        'customer_hotel_name3' => array('required' => __('Please enter Customer Hotel Name')),
                        'customer_tour_date3' => array('required' => __('Please enter Customer Tour Date')),
                        'customer_hotel_place_name3' => array('required' => __('Please enter Customer Hotel Place Name')),
                        'customer_hotel_check_in_date3' => array('required' => __('Please enter Customer Hotel Check In Date')),
                        'customer_hotel_check_out_date3' => array('required' => __('Please enter Customer Hotel Check Out Date')),
                        'customer_room_type3' => array('required' => __('Please enter Customer Room Type')),
                        'customer_travel_type3' => array('required' => __('Please enter Customer Travel Type')),
                        'meal_plan3' => array('required' => __('Please enter Meal Plan')),
                        'hotel_contact_no3' => array('required' => __('Please enter Hotel Contact No')),                        
                    ));

                        echo $this->Form->setValidation($arrValidation); ?>

                        <?php echo $this->Form->end(); ?>                
            </div>
        </div>     

    </div>
    <!-- For 3 packages section end -->

<?php endif; ?>

<script type="text/javascript">
jQuery(document).ready(function () {

        $('#VoucherCustomerTourDate').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
        $('#VoucherCustomerHotelCheckOutDate').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
        $('#VoucherCustomerHotelCheckInDate').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
        $('#VoucherCustomerHotelCheckInDate2').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
        $('#VoucherCustomerHotelCheckInDate3').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
        $('#VoucherCustomerHotelCheckOutDate2').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
        $('#VoucherCustomerHotelCheckOutDate3').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
        $('#VoucherPickUpDate').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
        $('#VoucherPickUpDate2').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
        $('#VoucherPickUpDate3').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
        $('#VoucherDropDate').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
        $('#VoucherDropDate2').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
        $('#VoucherDropDate3').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
    });
</script>
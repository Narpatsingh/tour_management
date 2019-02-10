<?php
$this->assign('pagetitle', __('Accounts'));
$this->Custom->addCrumb(__('Accounts'));
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body row">
                <div class="col-md-12">
                                <?php echo $this->Form->create('Account', array('autocomplete' => 'off', 'novalidate' => 'novalidate'));
                                      echo $this->Form->input('customer_name', array('label' => __('Name'), 'placeholder' => __('name'), 'required' => false, 'class' => 'form-control', 'div' => array('class' => 'col-md-3'))); 
                                      echo $this->Form->input('ac_type', array('label' => __('Type'),'empty'=>'Select Type','options'=>$ac_types,'placeholder' => __('name'), 'required' => false, 'class' => 'form-control', 'div' => array('class' => 'col-md-3'))); 
                                ?>

                    <label>&nbsp</label>
                    <div class="col-md-6 form-group">
                                <?php echo $this->Form->submit(__('Search'), array('class' => 'btn btn-primary margin-right10', 'div' => false));       echo $this->Html->link(__('Reset Search'), array('action' => 'index', 'all'), array('title' => __('reset search'), 'class' => 'btn btn-default')); ?>
                    </div>
                    
                    <?php echo $this->Form->end();?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="box box-primary">           
    <div class="box-footer clearfix">
        <?php echo $this->element('paginationtop'); $srno = 1;?>
    </div>
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th><?php echo 'Srno'; ?></th>
                    <th><?php echo $this->Paginator->sort('customer_name','Customer Name'); ?></th>
                    <th><?php echo $this->Paginator->sort('ac_type','Type'); ?></th>
                    <th><?php echo $this->Paginator->sort('payment_amount'); ?></th>
                    <th><?php echo $this->Paginator->sort('total_payment_with_gst'); ?></th>
                    <th><?php echo $this->Paginator->sort('payment_recieved'); ?></th>
                    <th><?php echo $this->Paginator->sort('payment_receivable'); ?></th>
                    <th class="actions text-center"><?php echo __('Actions'); ?></th>
                </tr>			
            </thead>		
            <tbody>
                <?php if(empty($accounts)){?>
                    <tr>
                       <td colspan='9' class='text-warning'><?php echo __('No Account found.')?></td>
                   </tr>
               <?php }else{?>

                <?php foreach ($accounts as $account): ?>
                   <tr>
                      <td>
                         <?php echo $srno++; ?>
                     </td>
                     <td><?php echo h($account['Account']['customer_name']); ?>&nbsp;</td>
                     <td><?php echo h(Inflector::humanize($account['Account']['ac_type'])); ?>&nbsp;</td>
                     <td><?php echo h($account['Account']['payment_amount']); ?>&nbsp;</td>
                     <td><?php echo h($account['Account']['total_payment_with_gst']); ?>&nbsp;</td>
                     <td><?php echo h($account['Account']['payment_recieved']); ?>&nbsp;</td>
                     <td><?php echo empty($account['Account']['payment_receivable'])?'N/A':$account['Account']['payment_receivable']; ?>&nbsp;</td>
                     <td class="actions text-center">
                         <?php //echo $this->Html->link(__(''), array('action' => 'view', $account['Account']['id']), array('icon'=>'view','title' => __('Click here to view this Account'))); ?>
                         <?php if(empty($account['Account']['payment_receivable'])): ?>
                         <i class="fa fa-check" style="color:green;"></i> 
                         <?php else: ?> 
                         <?php echo $this->Html->link(__(''), array('action' => 'edit',encrypt( $account['Account']['id'] )), array('icon'=>'edit','title' => __('Click here to edit this Account'))); ?>
                         <?php endif; ?>
                         <?php echo $this->Html->link(__(''), array('action' => 'delete', $account['Account']['id']), array('icon'=>'delete','title' => __('Click here to delete this Account')), __('Are you sure you want to delete Account?')); ?>
                     </td>
                 </tr>
             <?php endforeach; ?>
         <?php }?>			
     </tbody>
 </table>
</div>
<div class="box-footer clearfix">
    <?php echo $this->element('pagination'); ?>
</div>
</div>
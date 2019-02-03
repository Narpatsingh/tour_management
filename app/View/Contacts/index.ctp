<?php
$this->assign('pagetitle', __('Contacts'));
$this->Custom->addCrumb(__('Contacts'));
$this->start('top_links');
//echo $this->Html->link(__('Add Contact'),array('action'=>'add'),array('icon'=>'fa-plus','title'=>__('Add Contact'),'class'=>'btn btn-primary','escape'=>false));
$this->end();
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body row">
                <div class="col-md-12">
                 <?php echo $this->Form->create('Contact', array('autocomplete' => 'off', 'novalidate' => 'novalidate'));
                 echo $this->Form->input('name', array('label' => __('Name'), 'placeholder' => __('name'), 'required' => false, 'class' => 'form-control', 'div' => array('class' => 'col-md-3')));
                 echo $this->Form->input('email', array('label' => __('Email'), 'placeholder' => __('email'), 'required' => false, 'class' => 'form-control', 'div' => array('class' => 'col-md-3')));
                 ?>

                 <label>&nbsp</label>
                 <div class="col-md-6 form-group">
                  <?php echo $this->Form->submit(__('Search'), array('class' => 'btn btn-primary margin-right10', 'div' => false));		echo $this->Html->link(__('Reset Search'), array('action' => 'index', 'all'), array('title' => __('reset search'), 'class' => 'btn btn-default')); ?>
              </div>

              <?php echo $this->Form->end();?>
          </div>
      </div>
  </div>
</div>
</div>

<div class="box box-primary">           
    <div class="box-footer clearfix">
        <?php echo $this->element('paginationtop'); ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('name'); ?></th>
                    <th><?php echo $this->Paginator->sort('email'); ?></th>
                    <th><?php echo $this->Paginator->sort('message'); ?></th>
                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                    <th><?php echo $this->Paginator->sort('updated'); ?></th>
                    <th class="actions text-center"><?php echo __('Actions'); ?></th>
                </tr>			
            </thead>		
            <tbody>
                <?php if(empty($contacts)){?>
                    <tr>
                       <td colspan='7' class='text-warning'><?php echo __('No Contact found.')?></td>
                   </tr>
               <?php }else{?>

                <?php foreach ($contacts as $contact): ?>
                   <tr>
                      <td><?php echo h($contact['Contact']['name']); ?>&nbsp;</td>
                      <td><?php echo h($contact['Contact']['email']); ?>&nbsp;</td>
                      <td><?php echo h($contact['Contact']['message']); ?>&nbsp;</td>
                      <td><?php echo h($contact['Contact']['created']); ?>&nbsp;</td>
                      <td><?php echo h($contact['Contact']['updated']); ?>&nbsp;</td>
                      <td class="actions text-center">
                         <?php //echo $this->Html->link(__(''), array('action' => 'view', $contact['Contact']['id']), array('icon'=>'view','title' => __('Click here to view this Contact'))); ?>
                         <?php echo $this->Html->link(__(''), array('action' => 'edit', $contact['Contact']['id']), array('icon'=>'edit','title' => __('Click here to edit this Contact'))); ?>
                         <?php echo $this->Html->link(__(''), array('action' => 'delete', $contact['Contact']['id']), array('icon'=>'delete','title' => __('Click here to delete this Contact')), __('Are you sure you want to delete Contact?')); ?>
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
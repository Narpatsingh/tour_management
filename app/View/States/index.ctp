<?php
$formParamter = '';
$this->assign('pagetitle', __('Manage State'));
$this->Custom->addCrumb(__('Manage State'));
$this->start('top_links');
echo $this->Html->link(__('Add State'), array('controller' => $this->params['controller'], 'action' => 'add'),
    array('icon' => 'add', 'title' => __('Add State'), 'class' => 'btn btn-primary', 'escape' => false));


$this->end();
//generate search panel
$nameLabel = __('Name');
$emailLabel = __('Email');

$searchPanelArray = array(
    'name' => 'User',
    'options' => array(
        'id' => 'UserSearchForm',
        'url' => $this->Html->url(array('controller' => $this->params['controller'], 'action' => 'index', '', ''),
            true),
        'autocomplete' => 'off',
        'novalidate' => 'novalidate',
        'inputDefaults' => array(
            'dir' => 'ltl',
            'class' => 'form-control',
            'required' => false,
            'div' => array(
                'class' => 'form-group col-md-2'
            )
        )
    ),
    'searchDivClass' => 'col-md-6',
    'search' => array(
        'title' => 'Search User',
        'options' => array(
            'id' => 'UserSearchBtn',
            'class' => 'btn btn-primary margin-right10',
            'title' => 'Search User',
            'div' => false
        )
    ),
    'reset' => $this->Html->link(__('Reset Search'),
        array('controller' => $this->params['controller'], 'action' => 'index', 'all', '', ''),
        array('escape' => false, 'title' => __('Display the all the Users'), 'class' => 'btn btn-default')),
    'fields' => array(
        array(
            'name' => 'name',
            'options' => array(
                'label' => $nameLabel,
                'type' => 'text',
                'placeholder' => __('Enter name')
            )
        ),
        array(
            'name' => 'email',
            'options' => array(
                'label' => $emailLabel,
                'type' => 'text',
                'placeholder' => __('Enter email address')
            )
        ),
        array(
            'name' => 'status',
            'options' => array(
                'type' => 'select',
                'options' => array('active' => __('Active'), 'inactive' => __('Inactive')),
                'empty' => __('Select status')
            )
        )
    )
);


//echo $this->CustomForm->setSearchPanel($searchPanelArray);

?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-footer clearfix">

                <?php echo $this->element('paginationtop'); ?>
            </div>
            <div class="box-body table-responsive no-padding">
                <?php
                $startNo = (int)$this->Paginator->counter('{:start}');

                ?>
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <?php $fieldCount = 9; ?>

                        <th width="5%"> <?php echo __('Sr.'); ?> </th>
                        <th><?php echo $this->Paginator->sort('State.name', __('State Name')); ?></th>
                        <th><?php echo $this->Paginator->sort('State.created', __('Added On')); ?></th>
                        <th><?php echo __('Actions'); ?></th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php if (empty($States)) { ?>
                        <tr>
                            <td colspan='<?php echo $fieldCount; ?>'
                                class='text-warning'><?php echo __('No User found.') ?>
							</td>
                        </tr>
                    <?php } else { ?>
                        <?php foreach ($States as $State): ?>
                            <tr>
                                <td> <?php echo $startNo++; ?> </td>
                                <td> <?php echo isset($State['State']['name']) ? $State['State']['name'] : ''; ?> </td>
                                <td> <?php echo isset($State['State']['created']) ? showdatetime($State['State']['created']) : ''; ?> </td>
                                <td class="actions text-center">
                                <span class='text-left'>
                                    <?php
                                    // echo $this->Html->link(__(''), array('action' => 'view', $State['State']['id']),
                                    //     array(
                                    //         'icon' => 'view',
                                    //         'class' => 'no-hover-text-decoration',
                                    //         'title' => __('view State')
                                    //     ));
                                    echo $this->Html->link(__(''), array('action' => 'edit', $State['State']['id']),
                                        array(
                                            'icon' => 'edit',
                                            'class' => 'no-hover-text-decoration',
                                            'title' => __('Edit State')
                                        ));
                                    echo $this->Html->link(__(''), array('action' => 'delete', $State['State']['id']),
                                        array(
                                            'icon' => 'delete',
                                            'class' => 'no-hover-text-decoration',
                                            'title' => __('Delete State')
                                        ), __('Are you sure you want to delete selected State?'));
                                    ?>
                                </span>
                                </td>


                            </tr>
                        <?php endforeach; ?>
                    <?php } ?>
                    </tbody>
                </table>

            </div>
            <div class="box-footer clearfix">
                <?php echo $this->element('pagination'); ?>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function () {

    });
</script>
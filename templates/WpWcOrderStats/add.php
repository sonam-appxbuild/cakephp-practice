<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WpWcOrderStat $wpWcOrderStat
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Wp Wc Order Stats'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="wpWcOrderStats form content">
            <?= $this->Form->create($wpWcOrderStat) ?>
            <fieldset>
                <legend><?= __('Add Wp Wc Order Stat') ?></legend>
                <?php
                    echo $this->Form->control('parent_id', ['options' => $parentWpWcOrderStats]);
                    echo $this->Form->control('date_created');
                    echo $this->Form->control('date_created_gmt');
                    echo $this->Form->control('num_items_sold');
                    echo $this->Form->control('total_sales');
                    echo $this->Form->control('tax_total');
                    echo $this->Form->control('shipping_total');
                    echo $this->Form->control('net_total');
                    echo $this->Form->control('returning_customer');
                    echo $this->Form->control('status');
                    echo $this->Form->control('customer_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WpWcOrderStat[]|\Cake\Collection\CollectionInterface $wpWcOrderStats
 */
?>
<div class="wpWcOrderStats index content">
    <?= $this->Html->link(__('New Wp Wc Order Stat'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Wp Wc Order Stats') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('order_id') ?></th>
                    <th><?= $this->Paginator->sort('parent_id') ?></th>
                    <th><?= $this->Paginator->sort('date_created') ?></th>
                    <th><?= $this->Paginator->sort('date_created_gmt') ?></th>
                    <th><?= $this->Paginator->sort('num_items_sold') ?></th>
                    <th><?= $this->Paginator->sort('total_sales') ?></th>
                    <th><?= $this->Paginator->sort('tax_total') ?></th>
                    <th><?= $this->Paginator->sort('shipping_total') ?></th>
                    <th><?= $this->Paginator->sort('net_total') ?></th>
                    <th><?= $this->Paginator->sort('returning_customer') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('customer_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($wpWcOrderStats as $wpWcOrderStat): ?>
                <tr>
                    <td><?= $this->Number->format($wpWcOrderStat->order_id) ?></td>
                    <td><?= $wpWcOrderStat->has('parent_wp_wc_order_stat') ? $this->Html->link($wpWcOrderStat->parent_wp_wc_order_stat->order_id, ['controller' => 'WpWcOrderStats', 'action' => 'view', $wpWcOrderStat->parent_wp_wc_order_stat->order_id]) : '' ?></td>
                    <td><?= h($wpWcOrderStat->date_created) ?></td>
                    <td><?= h($wpWcOrderStat->date_created_gmt) ?></td>
                    <td><?= $this->Number->format($wpWcOrderStat->num_items_sold) ?></td>
                    <td><?= $this->Number->format($wpWcOrderStat->total_sales) ?></td>
                    <td><?= $this->Number->format($wpWcOrderStat->tax_total) ?></td>
                    <td><?= $this->Number->format($wpWcOrderStat->shipping_total) ?></td>
                    <td><?= $this->Number->format($wpWcOrderStat->net_total) ?></td>
                    <td><?= h($wpWcOrderStat->returning_customer) ?></td>
                    <td><?= h($wpWcOrderStat->status) ?></td>
                    <td><?= $this->Number->format($wpWcOrderStat->customer_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $wpWcOrderStat->order_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $wpWcOrderStat->order_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $wpWcOrderStat->order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $wpWcOrderStat->order_id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>

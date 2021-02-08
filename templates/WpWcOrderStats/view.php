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
            <?= $this->Html->link(__('Edit Wp Wc Order Stat'), ['action' => 'edit', $wpWcOrderStat->order_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Wp Wc Order Stat'), ['action' => 'delete', $wpWcOrderStat->order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $wpWcOrderStat->order_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Wp Wc Order Stats'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Wp Wc Order Stat'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="wpWcOrderStats view content">
            <h3><?= h($wpWcOrderStat->order_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Parent Wp Wc Order Stat') ?></th>
                    <td><?= $wpWcOrderStat->has('parent_wp_wc_order_stat') ? $this->Html->link($wpWcOrderStat->parent_wp_wc_order_stat->order_id, ['controller' => 'WpWcOrderStats', 'action' => 'view', $wpWcOrderStat->parent_wp_wc_order_stat->order_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($wpWcOrderStat->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Order Id') ?></th>
                    <td><?= $this->Number->format($wpWcOrderStat->order_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Num Items Sold') ?></th>
                    <td><?= $this->Number->format($wpWcOrderStat->num_items_sold) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Sales') ?></th>
                    <td><?= $this->Number->format($wpWcOrderStat->total_sales) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tax Total') ?></th>
                    <td><?= $this->Number->format($wpWcOrderStat->tax_total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Shipping Total') ?></th>
                    <td><?= $this->Number->format($wpWcOrderStat->shipping_total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Net Total') ?></th>
                    <td><?= $this->Number->format($wpWcOrderStat->net_total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer Id') ?></th>
                    <td><?= $this->Number->format($wpWcOrderStat->customer_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Created') ?></th>
                    <td><?= h($wpWcOrderStat->date_created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Created Gmt') ?></th>
                    <td><?= h($wpWcOrderStat->date_created_gmt) ?></td>
                </tr>
                <tr>
                    <th><?= __('Returning Customer') ?></th>
                    <td><?= $wpWcOrderStat->returning_customer ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Wp Wc Order Stats') ?></h4>
                <?php if (!empty($wpWcOrderStat->child_wp_wc_order_stats)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Order Id') ?></th>
                            <th><?= __('Parent Id') ?></th>
                            <th><?= __('Date Created') ?></th>
                            <th><?= __('Date Created Gmt') ?></th>
                            <th><?= __('Num Items Sold') ?></th>
                            <th><?= __('Total Sales') ?></th>
                            <th><?= __('Tax Total') ?></th>
                            <th><?= __('Shipping Total') ?></th>
                            <th><?= __('Net Total') ?></th>
                            <th><?= __('Returning Customer') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Customer Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($wpWcOrderStat->child_wp_wc_order_stats as $childWpWcOrderStats) : ?>
                        <tr>
                            <td><?= h($childWpWcOrderStats->order_id) ?></td>
                            <td><?= h($childWpWcOrderStats->parent_id) ?></td>
                            <td><?= h($childWpWcOrderStats->date_created) ?></td>
                            <td><?= h($childWpWcOrderStats->date_created_gmt) ?></td>
                            <td><?= h($childWpWcOrderStats->num_items_sold) ?></td>
                            <td><?= h($childWpWcOrderStats->total_sales) ?></td>
                            <td><?= h($childWpWcOrderStats->tax_total) ?></td>
                            <td><?= h($childWpWcOrderStats->shipping_total) ?></td>
                            <td><?= h($childWpWcOrderStats->net_total) ?></td>
                            <td><?= h($childWpWcOrderStats->returning_customer) ?></td>
                            <td><?= h($childWpWcOrderStats->status) ?></td>
                            <td><?= h($childWpWcOrderStats->customer_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'WpWcOrderStats', 'action' => 'view', $childWpWcOrderStats->order_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'WpWcOrderStats', 'action' => 'edit', $childWpWcOrderStats->order_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'WpWcOrderStats', 'action' => 'delete', $childWpWcOrderStats->order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $childWpWcOrderStats->order_id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location $location
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Location'), ['action' => 'edit', $location->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Location'), ['action' => 'delete', $location->id], ['confirm' => __('Are you sure you want to delete # {0}?', $location->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Locations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Location'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="locations view content">
            <h3><?= h($location->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($location->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($location->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Detections') ?></h4>
                <?php if (!empty($location->detections)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Location Id') ?></th>
                            <th><?= __('Detection Time') ?></th>
                            <th><?= __('Detected Object') ?></th>
                            <th><?= __('Name') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($location->detections as $detection) : ?>
                        <tr>
                            <td><?= h($detection->id) ?></td>
                            <td><?= h($detection->user_id) ?></td>
                            <td><?= h($detection->location_id) ?></td>
                            <td><?= h($detection->detection_time) ?></td>
                            <td><?= h($detection->detected_object) ?></td>
                            <td><?= h($detection->name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Detections', 'action' => 'view', $detection->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Detections', 'action' => 'edit', $detection->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Detections', 'action' => 'delete', $detection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detection->id)]) ?>
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

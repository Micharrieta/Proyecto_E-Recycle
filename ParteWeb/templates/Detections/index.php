<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Detection> $detections
 */
?>
<div class="detections index content">
    <?= $this->Html->link(__('New Detection'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Detections') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('location_id') ?></th>
                    <th><?= $this->Paginator->sort('detection_time') ?></th>
                    <th><?= $this->Paginator->sort('detected_object') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detections as $detection): ?>
                <tr>
                    <td><?= $this->Number->format($detection->id) ?></td>
                    <td><?= $detection->hasValue('user') ? $this->Html->link($detection->user->name, ['controller' => 'Users', 'action' => 'view', $detection->user->id]) : '' ?></td>
                    <td><?= $detection->hasValue('location') ? $this->Html->link($detection->location->name, ['controller' => 'Locations', 'action' => 'view', $detection->location->id]) : '' ?></td>
                    <td><?= h($detection->detection_time) ?></td>
                    <td><?= h($detection->detected_object) ?></td>
                    <td><?= h($detection->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $detection->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $detection->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $detection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detection->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

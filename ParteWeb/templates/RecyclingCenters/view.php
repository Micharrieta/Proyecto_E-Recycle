<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RecyclingCenter $recyclingCenter
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Recycling Center'), ['action' => 'edit', $recyclingCenter->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Recycling Center'), ['action' => 'delete', $recyclingCenter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recyclingCenter->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Recycling Centers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Recycling Center'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="recyclingCenters view content">
            <h3><?= h($recyclingCenter->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($recyclingCenter->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($recyclingCenter->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Horario') ?></th>
                    <td><?= h($recyclingCenter->horario) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($recyclingCenter->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

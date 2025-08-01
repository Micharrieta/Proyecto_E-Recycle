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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $recyclingCenter->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $recyclingCenter->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Recycling Centers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="recyclingCenters form content">
            <?= $this->Form->create($recyclingCenter) ?>
            <fieldset>
                <legend><?= __('Edit Recycling Center') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('address');
                    echo $this->Form->control('horario');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

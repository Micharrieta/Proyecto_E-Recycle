<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Detection $detection
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $locations
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $detection->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $detection->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Detections'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="detections form content">
            <?= $this->Form->create($detection) ?>
            <fieldset>
                <legend><?= __('Edit Detection') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('location_id', ['options' => $locations]);
                    echo $this->Form->control('detection_time');
                    echo $this->Form->control('detected_object');
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

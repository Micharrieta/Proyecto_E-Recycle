<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Detection $detection
 */
?>
<div class="row">
    <aside class="column">
    </aside>
    <div class="column column-80">
        <div class="detections view content">
            <h3><?= h($detection->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Usuario') ?></th>
                    <td><?= $detection->hasValue('user') ? $this->Html->link($detection->user->name, ['controller' => 'Users', 'action' => 'view', $detection->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Ubicación') ?></th>
                    <td><?= $detection->hasValue('location') ? $this->Html->link($detection->location->name, ['controller' => 'Locations', 'action' => 'view', $detection->location->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Objeto detectado') ?></th>
                    <td><?= h($detection->detected_object) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha') ?></th>
                    <td><?= h($detection->detection_time) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

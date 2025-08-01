<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\RecyclingCenter> $recyclingCenters
 */
?>
<div class="recyclingCenters index content">
    
    <h3><?= __('Puntos de Reciclaje') ?></h3>
    <div class="table-responsive">
        <table class="tabla">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('Lugar') ?></th>
                    <th><?= $this->Paginator->sort('Dirección') ?></th>
                    <th><?= $this->Paginator->sort('Horario') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recyclingCenters as $recyclingCenter): ?>
                <tr>
                    <td><?= h($recyclingCenter->name) ?></td>
                    <td><?= h($recyclingCenter->address) ?></td>
                    <td><?= h($recyclingCenter->horario) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>

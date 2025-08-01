<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Tip> $tips
 */
?>
<div class="tips index content">
    <h3><?= __('Recomendaciones') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('objeto') ?></th>
                    <th><?= $this->Paginator->sort('tip') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tips as $tip): ?>
                <tr>
                    <td><?= h($tip->objeto) ?></td>
                    <td><?= h($tip->tip) ?></td>
                    
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

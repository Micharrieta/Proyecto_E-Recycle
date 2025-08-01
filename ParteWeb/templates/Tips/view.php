<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tip $tip
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            
        </div>
    </aside>
    <div class="column column-80">
        <div class="tips view content">
            <h3><?= h($tip->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Objeto') ?></th>
                    <td><?= h($tip->objeto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($tip->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Tip') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($tip->tip)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>

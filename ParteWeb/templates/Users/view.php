<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
        </div>
    </aside>
    <div class="column column-80">
        <div class="users view content">
            <h3><?= h($user->name) ?></h3>
            <table>
            </table>
            <div class="related">
                <h4><?= __('Detecciones Realizadas') ?></h4>
                <?php if (!empty($user->detections)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Fecha') ?></th>
                            <th><?= __('Objeto detectado') ?></th>
                            <th><?= __('Nombre') ?></th>
                            <th class="actions"><?= __('Detalles') ?></th>
                        </tr>
                        <?php foreach ($user->detections as $detection) : ?>
                        <tr>
                            <td><?= h($detection->detection_time) ?></td>
                            <td><?= h($detection->detected_object) ?></td>
                            <td><?= h($detection->name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['controller' => 'Detections', 'action' => 'view', $detection->id]) ?>
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

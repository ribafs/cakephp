<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Produto'), ['action' => 'edit', $produto->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Produto'), ['action' => 'delete', $produto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produto->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Produtos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Produto'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="container">
            <h3><?= h($produto->id) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Descricao') ?></th>
                    <td><?= h($produto->descricao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($produto->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estoque Minimo') ?></th>
                    <td><?= $this->Number->format($produto->estoque_minimo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estoque Maximo') ?></th>
                    <td><?= $this->Number->format($produto->estoque_maximo) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Compras') ?></h4>
                <?php if (!empty($produto->compras)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Produto Id') ?></th>
                            <th><?= __('Quantidade') ?></th>
                            <th><?= __('Preco') ?></th>
                            <th><?= __('Data') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($produto->compras as $compras) : ?>
                        <tr>
                            <td><?= h($compras->id) ?></td>
                            <td><?= h($compras->produto_id) ?></td>
                            <td><?= h($compras->quantidade) ?></td>
                            <td><?= h($compras->preco) ?></td>
                            <td><?= h($compras->data) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Compras', 'action' => 'view', $compras->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Compras', 'action' => 'edit', $compras->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Compras', 'action' => 'delete', $compras->id], ['confirm' => __('Are you sure you want to delete # {0}?', $compras->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Estoques') ?></h4>
                <?php if (!empty($produto->estoques)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Produto Id') ?></th>
                            <th><?= __('Compra Id') ?></th>
                            <th><?= __('Quantidade') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($produto->estoques as $estoques) : ?>
                        <tr>
                            <td><?= h($estoques->id) ?></td>
                            <td><?= h($estoques->produto_id) ?></td>
                            <td><?= h($estoques->compra_id) ?></td>
                            <td><?= h($estoques->quantidade) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Estoques', 'action' => 'view', $estoques->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Estoques', 'action' => 'edit', $estoques->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Estoques', 'action' => 'delete', $estoques->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estoques->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Vendas') ?></h4>
                <?php if (!empty($produto->vendas)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Produto Id') ?></th>
                            <th><?= __('Estoque Id') ?></th>
                            <th><?= __('Quantidade') ?></th>
                            <th><?= __('Data') ?></th>
                            <th><?= __('Preco') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($produto->vendas as $vendas) : ?>
                        <tr>
                            <td><?= h($vendas->id) ?></td>
                            <td><?= h($vendas->produto_id) ?></td>
                            <td><?= h($vendas->estoque_id) ?></td>
                            <td><?= h($vendas->quantidade) ?></td>
                            <td><?= h($vendas->data) ?></td>
                            <td><?= h($vendas->preco) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Vendas', 'action' => 'view', $vendas->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Vendas', 'action' => 'edit', $vendas->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Vendas', 'action' => 'delete', $vendas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendas->id)]) ?>
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

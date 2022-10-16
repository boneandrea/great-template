<?php
	/**
	 * @var \App\View\AppView                $this
	 * @var iterable<\App\Model\Entity\User> $users
	 */
	?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <a href="/admin/users/add">
                        <button type="button" class="btn btn-primary">New User</button>
                    </a>
                </h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('id') ?></th>
                            <th><?= $this->Paginator->sort('username') ?></th>
                            <th><?= $this->Paginator->sort('email') ?></th>
                            <th><?= $this->Paginator->sort('first_name') ?></th>
                            <!--
                                 <th><?= $this->Paginator->sort('last_name') ?></th>
                                 <th><?= $this->Paginator->sort('token_expires') ?></th>
                                 <th><?= $this->Paginator->sort('api_token') ?></th>
                                 <th><?= $this->Paginator->sort('activation_date') ?></th>
                                 <th><?= $this->Paginator->sort('secret') ?></th>
                                 <th><?= $this->Paginator->sort('secret_verified') ?></th>
                                 <th><?= $this->Paginator->sort('tos_date') ?></th>
                            -->
                            <th><?= $this->Paginator->sort('active') ?></th>
                            <th><?= $this->Paginator->sort('is_superuser') ?></th>
                            <th><?= $this->Paginator->sort('role') ?></th>
                            <th><?= $this->Paginator->sort('created') ?></th>
                            <th><?= $this->Paginator->sort('modified') ?></th>
                            <th><?= $this->Paginator->sort('last_login') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= h($user->id) ?></td>
                                <td><?= h($user->username) ?></td>
                                <td><?= h($user->email) ?></td>
                                <td><?= h($user->first_name) ?></td>
                                <!--
                                     <td><?= h($user->last_name) ?></td>
                                     <td><?= h($user->token_expires) ?></td>
                                     <td><?= h($user->api_token) ?></td>
                                     <td><?= h($user->activation_date) ?></td>
                                     <td><?= h($user->secret) ?></td>
                                     <td><?= h($user->secret_verified) ?></td>
                                     <td><?= h($user->tos_date) ?></td>
                                -->
                                <td><?= h($user->active) ?></td>
                                <td><?= h($user->is_superuser) ?></td>
                                <td><?= h($user->role) ?></td>
                                <td><?= h($user->created) ?></td>
                                <td><?= h($user->modified) ?></td>
                                <td><?= h($user->last_login) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< '.__('first')) ?>
            <?= $this->Paginator->prev('< '.__('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next').' >') ?>
            <?= $this->Paginator->last(__('last').' >>') ?>
        </ul>
    </div>
</div>

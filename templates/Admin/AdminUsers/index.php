<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">AdminUsers</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <a href="#">
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
                            <div class="card-body table-responsive p-0">
                                <div class="users index content">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th><?= $this->Paginator->sort('id') ?></th>
                                                <th><?= $this->Paginator->sort('username') ?></th>
                                                <th><?= $this->Paginator->sort('email') ?></th>
                                                <th><?= $this->Paginator->sort('first_name') ?></th>
                                                <th><?= $this->Paginator->sort('last_name') ?></th>
                                                <!--
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
                                                <th><?= $this->Paginator->sort('additional_data') ?></th>
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
                                                    <td><?= h($user->last_name) ?></td>
                                                    <!--
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
                                                    <td><?= h($user->additional_data) ?></td>
                                                    <td><?= h($user->last_login) ?></td>
                                                    <td class="actions">
                                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
            </div>
        </div>
    </div>
</div>

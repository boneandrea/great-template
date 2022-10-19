<?php
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
<?php if(!$user->isNew()):?>
    <?= $this->Form->postLink(
    	__('Delete'),
    	['action' => 'delete', $user->id],
    	['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']
    ) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
<?php endif; ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <?php
    		echo $this->Form->control('username');
echo $this->Form->control('email');
echo $this->Form->control('password');
echo $this->Form->control('first_name');
echo $this->Form->control('last_name');
echo $this->Form->control('token');
echo $this->Form->control('token_expires', ['empty' => true]);
echo $this->Form->control('api_token');
echo $this->Form->control('activation_date', ['empty' => true]);
echo $this->Form->control('secret');
echo $this->Form->control('secret_verified');
echo $this->Form->control('tos_date', ['empty' => true]);
echo $this->Form->control('active');
echo $this->Form->control('is_superuser');
echo $this->Form->control('role');
echo $this->Form->control('additional_data');
echo $this->Form->control('last_login', ['empty' => true]);
?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

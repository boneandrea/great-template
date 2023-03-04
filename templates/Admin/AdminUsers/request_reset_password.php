<?php
	$this->setLayout('admin/login');
	$this->assign('title', 'パスワードを忘れた方');
	?>
<div class="wrapper">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="container mt-5">
                <?= $this->Flash->render()?>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">管理者パスワードリセット</h3>
                    </div>
                    <?= $this->Form->create($user, ['class' => 'parts-form']) ?>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="parts-form__item">
                                <label for="email" class="parts-form__label">パスワードを再設定するメールアドレスを入力してください</label>
                                <?= $this->Form->email('reference', [
										'class' => 'form-control',
										'required' => true,
										'autofocus' => true,
										'label' => false,
										])
	?>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">リセットメールの送信</button>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="wrapper">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="container mt-5">
                <?= $this->Flash->render('flash') ?>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">管理者ログイン</h3>
                    </div>
                    <?= $this->Form->create() ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="email">メールアドレス</label>
                            <?= $this->Form->control('email', ['label' => __d('cake_d_c/users', 'Email'),
															   'class' => 'form-control',
															   'required' => true,
															   'label' => false,
															   'id' => 'email',
															   'aria-required' => true, ])?>
                        </div>
                        <div class="form-group">
                            <label for="password">パスワード</label>
                            <?= $this->Form->control('password', ['label' => __d('cake_d_c/users', 'Password'),
																  'class' => 'form-control',
																  'id' => 'password',
																  'label' => false,
																  'required' => true, ]) ?>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <div class="mt-3 text-center">
                            <a href="/admin/admin-users/request-reset-password">パスワードを忘れた</a>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>

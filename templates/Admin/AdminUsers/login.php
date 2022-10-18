<?php
    $this->disableAutoLayout();
    use Cake\Core\Configure;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminLTE 3 | Starter</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="/dist/css/adminlte.min.css?v=3.2.0">
        <script src="/plugins/jquery/jquery.min.js"></script>
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <div>
                <div class="content">
                    <div class="container-fluid">
                        <div class="card-body">
                            <div class="users form">
                                <?= $this->Flash->render() ?>
                                <?= $this->Form->create() ?>
                                <fieldset>
                                    <legend>管理者ログインページ</legend>
                                    <?= $this->Form->control('email', ['label' => __d('cake_d_c/users', 'Email'), 'required' => true]) ?>
                                    <?= $this->Form->control('password', ['label' => __d('cake_d_c/users', 'Password'), 'required' => true]) ?>
                                    <?php
		                                if (Configure::read('Users.reCaptcha.login')) {
			                                echo $this->User->addReCaptcha();
		                                }
		                                if (Configure::read('Users.RememberMe.active')) {
			                                echo $this->Form->control(Configure::read('Users.Key.Data.rememberMe'), [
				                                'type' => 'checkbox',
				                                'label' => __d('cake_d_c/users', 'Remember me'),
				                                'checked' => Configure::read('Users.RememberMe.checked'),
			                                ]);
		                                }
                                    ?>
                                    <?php
                                        $registrationActive = Configure::read('Users.Registration.active');
                                        if ($registrationActive) {
	                                        echo $this->Html->link(__d('cake_d_c/users', 'Register'), ['action' => 'register']);
                                        }
                                        if (Configure::read('Users.Email.required')) {
	                                        if ($registrationActive) {
		                                        echo ' | ';
	                                        }
	                                        echo $this->Html->link(__d('cake_d_c/users', 'Reset Password'), ['action' => 'requestResetPassword']);
                                        }
                                    ?>
                                </fieldset>
                                <?= $this->Form->button(__d('cake_d_c/users', 'Login')); ?>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <aside class="control-sidebar control-sidebar-dark">

                <div class="p-3">
                    <h5>Title</h5>
                    <p>Sidebar content</p>
                </div>
            </aside>


            <footer class="main-footer">
                <div class="float-right d-none d-sm-inline">
                    Anything you want
                </div>
                <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
            </footer>
        </div>
    </body>
</html>

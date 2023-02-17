<?php
	/**
	 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
	 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org).
	 *
	 * Licensed under The MIT License
	 * For full copyright and license information, please see the LICENSE.txt
	 * Redistributions of files must retain the above copyright notice.
	 *
	 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
	 *
	 * @see      https://cakephp.org CakePHP(tm) Project
	 * @since     0.10.0
	 *
	 * @license   https://opensource.org/licenses/mit-license.php MIT License
	 *
	 * @var \App\View\AppView $this
	 */
	use Cake\Core\Configure;
	use Cake\Datasource\ConnectionManager;
	use Cake\Error\Debugger;
	use Cake\Http\Exception\NotFoundException;

	$this->disableAutoLayout();

	$checkConnection = function (string $name) {
		$error = null;
		$connected = false;
		try {
			$connection = ConnectionManager::get($name);
			$connected = $connection->connect();
		} catch (Exception $connectionError) {
			$error = $connectionError->getMessage();
			if (method_exists($connectionError, 'getAttributes')) {
				$attributes = $connectionError->getAttributes();
				if (isset($attributes['message'])) {
					$error .= '<br />'.$attributes['message'];
				}
			}
		}

		return compact('connected', 'error');
	};

	if (!Configure::read('debug')) :
		throw new NotFoundException('Please replace templates/Pages/home.php with your own version or re-enable debug mode.');
	endif;

	?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            CakePHP: the rapid development PHP framework:
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>

        <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

        <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home']) ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body>
        <header>
            <div class="container text-center">
                <a href="https://cakephp.org/" target="_blank" rel="noopener">
                    <img alt="CakePHP" src="https://cakephp.org/v2/img/logos/CakePHP_Logo.svg" width="350" />
                </a>
                <h1>
                   System<span>(🍓)</span>
                </h1>
            </div>
        </header>
        <main class="main">
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="column">
                            <div class="message default text-center">公開ページ
                            </div>
                            <div id="url-rewriting-warning" style="padding: 1rem; background: #fcebea; color: #cc1f1a; border-color: #ef5753;">
                                <ul>
                                    <li class="bullet problem">
                                        URL rewriting is not properly configured on your server.<br />
                                        1) <a target="_blank" rel="noopener" href="https://book.cakephp.org/4/en/installation.html#url-rewriting">Help me configure it</a><br />
                                        2) <a target="_blank" rel="noopener" href="https://book.cakephp.org/4/en/development/configuration.html#general-configuration">I don't / can't use URL rewriting</a>
                                    </li>
                                </ul>
                            </div>
                            <?php Debugger::checkSecurityKeys(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column links">
                            <h3>For user</h3>
                            <a href="/pages/static">static page</a>
                            <a href="/login">user login</a>
                            <a href="/mypage">mypage</a>
                            <a href="/pages/inquiry/">contact</a>
                            <h3>For admin</h3>
                            <a href="/admin/login">admin login</a>
                            <a href="/admin/dashboard">admin dashboard</a>
                            <a href="/admin/users">Users</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?=$this->Html->script('helo')?>
    </body>
</html>

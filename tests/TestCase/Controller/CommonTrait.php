<?php

namespace App\Test\TestCase\Controller;

use Cake\I18n\FrozenTime;
use Cake\TestSuite\EmailTrait;
use Symfony\Component\DomCrawler\Crawler;

trait CommonTrait
{
	use EmailTrait;

	public $_now;
	public $description;
	public $title;
	public $AMILIEtitleText = true;

	public function setUp(): void
	{
		parent::setUp();

		$this->_now = new FrozenTime();

		// warning もエラーにする
		set_error_handler(function ($errno, $errstr, $errfile, $errline) {
			throw new \RuntimeException(sprintf('errno=%s: %s on line %d in file %s', $errno, $errstr, $errline, $errfile));
		});

		if (method_exists($this, 'mySetUp')) {
			$this->mySetUp();
		}

		$this->enableCsrfToken();
		$this->enableSecurityToken();
	}

	public function tearDown(): void
	{
		parent::tearDown();
		if (method_exists($this, 'myTearDown')) {
			$this->myTearDown();
		}

		if ($this->description !== null) {
			$this->assertSame(
				$this->description,
				$this->dom()->filter('meta[name=description]')->eq(0)->attr('content'),
				'meta.descriptionが正しい'
			);
			$this->assertSame(
				$this->description,
				$this->dom()->filter('meta[property="og:description"]')->eq(0)->attr('content'),
				'meta.ogp:descriptionが正しい'
			);
		}

		if ($this->title !== null) {
			$expected_title = $this->title;

			$this->assertSame(
				$expected_title,
				$this->dom()->filter('title')->eq(0)->text(),
				'titleが正しい'
			);
			$this->assertSame(
				$expected_title,
				$this->dom()->filter('meta[property="og:title"]')->eq(0)->attr('content'),
				'meta.ogp:titleが正しい'
			);
		}

		FrozenTime::setTestNow($this->_now); // 1テストでmockすると全体に影響するのを回避
		restore_error_handler();
	}

	/**
	 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
	 *
	 * @param mixed $option
	 */
	public function UserLogin($option = [])
	{
		$id = '241a9807-7281-4438-a945-c20478b6919f';
		$this->_set_login('Auth', $id);
	}

	/**
	 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
	 */
	public function AdminLogin($option = [])
	{
		$id = '1c970c32-ce77-44fc-8b86-8ecfc10733f3';
		$this->_set_login('AdminUser', $id);
	}

	public function _set_login(string $sessionKey, string $id)
	{
		$this->session([
			$sessionKey => $this->fetchTable('Users')->get($id),
		]);
	}

	public function logout()
	{
		$this->session([
			'Auth' => [
			],
            "AdminUser"=>[
            ],
		]);
	}

	public function dom()
	{
		$dom = new Crawler();
		$dom->addHTMLContent($this->_response->getBody(), 'UTF-8');

		return $dom;
	}
}

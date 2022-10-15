<?php

namespace App\Test\TestCase\Controller;

use Cake\Event\EventManager;
use Cake\I18n\FrozenTime;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\EmailTrait;
use Symfony\Component\DomCrawler\Crawler;

trait CommonTrait
{
	use EmailTrait;

	public $_now;
	public $description;
	public $title;
	public $AMILIEtitleText = true;

	public function setUp():void
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

	public function tearDown():void
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

	public function _setFormAuth($option = [])
	{
		$params = [
			'id' => 1,
			'name' => 'MY_NAME',
			'email' => 'email@pu.ga',
			'role' => 0,
			'firebase_uid' => 'e0Ew0Z0EQDeLZBfVFOS14TnY2Pl2',
			'coordinator_profile' => [
				'zip' => '115-0045',
				'prefecture_id' => 13,
				'address1' => '北区赤羽',
				'address2' => '1丁目19-9 ヴェルデ赤羽 302号',
			],
			'coordinator_types' => [],
		];

		$this->session([
			'Auth' => [
				'User' => array_merge($params, $option),
			],
		]);
	}

	/**
	 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
	 *
	 * @param mixed $option
	 */
	public function UserLogin($option = [])
	{
		$this->_setFormAuth([
			'id' => 1,
			'user_profile' => [
				'name' => 'my name',
				'birthday' => '2000-1-1',
				'has_dog' => 1,
				'has_cat' => 1,
				'has_other' => 1,
				'number_dog' => 1,
				'number_cat' => 1,
				'number_other' => 1,
				'dogs' => [
					['name' => 'dog1'],
				],
				'cats' => [
					['name' => 'cat1'],
				],
			],
		]);
	}

	public function AdminLogin($option = [])
	{
		$this->_setFormAuth($option);
	}

	public function UserLogout()
	{
		$this->session([
			'Auth' => [
				'User' => [],
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

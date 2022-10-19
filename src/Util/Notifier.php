<?php

namespace App\Util;

/*
 * 何かあった場合にChatworkに通知
 *
 * app_local.phpに以下を設定する
 *
 * "Chatwork" => [
 *      "TOKEN"=>   'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
 *		"ROOM_ID" => 999999999,
 * ]
 */

use Cake\Core\Configure;
use Cake\Log\Log;

class Notifier
{
	/**
	 * @SuppressWarnings(PHPMD.StaticAccess)
	 */
	public function __construct()
	{
		$this->api_url = 'https://api.chatwork.com';
		$this->chatwork_token = Configure::read('Chatwork.TOKEN');
	}

	/**
	 * ChatWorkにメッセージを投稿する.
	 *
	 * @param string $body 投稿する文字列
	 *
	 * @return array $result 結果を返す
	 */
	public function postMessage($body): array
	{
		// 本番以外では通知しないように
		// if (!IS_PRODUCTION) {
		// 	Log::debug($body);

		// 	return [];
		// }

		$room_id = Configure::read('Chatwork.ROOM_ID');
		$headers = ['X-ChatWorkToken: '.$this->chatwork_token];
		$option = ['body' => $body];
		$curl = curl_init($this->api_url."/v2/rooms/{$room_id}/messages");
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($option));
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($curl);
		curl_close($curl);

		return $result;
	}
}

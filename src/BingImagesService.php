<?php

namespace Bing;

use Bing\BingImagesServiceProvider;


class BingImagesService {

	private $api = 'https://api.datamarket.azure.com/Bing/Search/v1/Image';
	private $appId;

	public function __construct ($appId) {
		$this->setKey($appId);
	}

	private function setKey ($key) {
		$this->appId = $key;
	}

	private function getKey () {
		return $this->appId;
	}

	/**
	 * Autenticação
	 * @param $key string Chave de autenticação
	 * @return array Cabeçalho de aplicação
	 */
	private function getAuth ($key) {
		$auth = base64_encode("{$key}:{$key}");
		$data = array(
			'http' => array(
				'request_fulluri' => true,
				'ignore_errors' => true,
				'header' => "Authorization: Basic {$auth}"
			)
		);
		return $data;
	}

	/**
	 * Contexto de streaming
	 * @return resource Stream Context
	 */
	private function getContext () {
		$key = $this->getKey();
		$data = $this->getAuth($key);
		$context = stream_context_create($data);
		return $context;
	}

	/**
	 * Resposta do Serviço
	 * @param $query string Parâmetro de busca
	 * @return mixed Resposta do serviço
	 */
	public function getResponse ($query) {
		$query = urlencode("'{$query}'");
		$context = $this->getContext();
		$requestUrl = "{$this->api}?\$format=json&Query={$query}";
		$response = file_get_contents($requestUrl, 0, $context);
		return $response;
	}

}
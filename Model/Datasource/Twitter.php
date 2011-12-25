<?php
/**
 * Twitter Driver for Apis Source
 * 
 * Makes usage of the Apis plugin by Proloser
 *
 * @package Twitter Datasource
 * @author Dean Sofer
 * @version 0.0.1
 **/
App::uses('ApisSource', 'Apis.Model/Datasource');
class Twitter extends ApisSource {
	
	/**
	 * The description of this data source
	 *
	 * @var string
	 */
	public $description = 'Twitter DataSource';
	
	/**
	 * Stores the queryData so that the tokens can be substituted just before requesting
	 *
	 * @param string $model 
	 * @param string $queryData 
	 * @return mixed $data
	 * @author Dean Sofer
	 */
	public function read(&$model, $queryData = array()) {
		$this->tokens = $queryData['conditions'];
		return parent::read($model, $queryData);
	}
	
	/**
	 * Supplement the request object with github-specific data
	 *
	 * @param array $request 
	 * @return array $response
	 */
	public function beforeRequest(&$model, $request) {
		$request['uri']['scheme'] = 'https';
		// Attempted fix for 3.0
		if (strtoupper($request['method']) == 'GET' && !empty($this->config['access_token']))
			$request['uri']['query']['access_token'] = $this->config['access_token'];
		return $request;
	}
}
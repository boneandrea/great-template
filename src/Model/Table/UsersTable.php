<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use CakeDC\Users\Model\Table\UsersTable as CDUserTable;

/**
 * Users Model.
 *
 * @method \App\Model\Entity\User                                             newEmptyEntity()
 * @method \App\Model\Entity\User                                             newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[]                                           newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User                                             get($primaryKey, $options = [])
 * @method \App\Model\Entity\User                                             findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User                                             patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[]                                           patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false                                       save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User                                             saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface       saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface       deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends CDUserTable
{
	/**
	 * Initialize method.
	 *
	 * @param array $config the configuration for the Table
	 */
	public function initialize(array $config): void
	{
		parent::initialize($config);

		$this->setTable('users');
		$this->setDisplayField('username');
		$this->setPrimaryKey('id');

		$this->addBehavior('Timestamp');
	}

	/**
	 * Default validation rules.
	 *
	 * @param \Cake\Validation\Validator $validator validator instance
	 */
	public function validationDefault(Validator $validator): Validator
	{
		$validator
			->scalar('username')
			->maxLength('username', 255)
			->requirePresence('username', 'create')
			->notEmptyString('username');

		$validator
			->email('email')
			->allowEmptyString('email');

		$validator
			->scalar('password')
			->maxLength('password', 255)
			->requirePresence('password', 'create')
			->notEmptyString('password');

		$validator
			->scalar('first_name')
			->maxLength('first_name', 50)
			->allowEmptyString('first_name');

		$validator
			->scalar('last_name')
			->maxLength('last_name', 50)
			->allowEmptyString('last_name');

		$validator
			->scalar('token')
			->maxLength('token', 255)
			->allowEmptyString('token');

		$validator
			->dateTime('token_expires')
			->allowEmptyDateTime('token_expires');

		$validator
			->scalar('api_token')
			->maxLength('api_token', 255)
			->allowEmptyString('api_token');

		$validator
			->dateTime('activation_date')
			->allowEmptyDateTime('activation_date');

		$validator
			->scalar('secret')
			->maxLength('secret', 32)
			->allowEmptyString('secret');

		$validator
			->boolean('secret_verified')
			->allowEmptyString('secret_verified');

		$validator
			->dateTime('tos_date')
			->allowEmptyDateTime('tos_date');

		$validator
			->boolean('active')
			->notEmptyString('active');

		$validator
			->boolean('is_superuser')
			->notEmptyString('is_superuser');

		$validator
			->scalar('role')
			->maxLength('role', 255)
			->allowEmptyString('role');

		$validator
			->allowEmptyString('additional_data');

		$validator
			->dateTime('last_login')
			->allowEmptyDateTime('last_login');

		return $validator;
	}

	/**
	 * Returns a rules checker object that will be used for validating
	 * application integrity.
	 *
	 * @param \Cake\ORM\RulesChecker $rules the rules object to be modified
	 *
	 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
	 */
	public function buildRules(RulesChecker $rules): RulesChecker
	{
		$rules->add($rules->isUnique(['username']), ['errorField' => 'username']);
		$rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

		// 作成および更新操作に提供されるルールを追加
		$rules->add(function ($entity, $options) {
			return in_array($entity->role, ['user', 'admin']);
		}, 'roleRule');

		return $rules;
	}
}

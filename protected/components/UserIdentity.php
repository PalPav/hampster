<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    // Будем хранить id.
    protected $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
    public function getId()
    {
        return $this->_id;
    }

	public function authenticate()
	{

        //$salt = substr(str_replace('+', '.', base64_encode(sha1(str_shuffle(microtime(true).$this->username), true))), 0, 22);

        //var_dump($salt);
        //$hash = crypt('ast81CLONE#', '$2a$12$' . $salt);

        $record=Hampster::model()->findByAttributes(array('login'=>$this->username));

        if($record===null) {
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        }
        else if($record->rock!==crypt($this->password, '$2a$12$' .$record->roll)){
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }
        else
        {
            $this->_id = $record->id;

            // Далее логин нам не понадобится, зато имя может пригодится
            // в самом приложении. Используется как Yii::app()->user->name.
            // realName есть в нашей модели. У вас это может быть name, firstName
            // или что-либо ещё.
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
	}
}
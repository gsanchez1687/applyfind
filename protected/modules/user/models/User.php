<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $activkey
 * @property integer $superuser
 * @property integer $status
 * @property string $create_at
 * @property string $lastvisit_at
 *
 * The followings are the available model relations:
 * @property Profile $profiles
 */
class User extends CActiveRecord
{
	const STATUS_NOACTIVE=0;
	const STATUS_ACTIVE=1;
	const STATUS_BANNED=-1;
	
	//TODO: Delete for next version (backward compatibility)
	const STATUS_BANED=-1;
	
	/**
	 * The followings are the available columns in table 'users':
	 * @var integer $id
	 * @var string $username
	 * @var string $password
	 * @var string $email
	 * @var string $activkey
	 * @var integer $createtime
	 * @var integer $lastvisit
	 * @var integer $superuser
	 * @var integer $status
	 * @var timestamp $create_at
	 * @var timestamp $lastvisit_at
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return Yii::app()->getModule('user')->tableUsers;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.CConsoleApplication
		return ((get_class(Yii::app())=='CConsoleApplication' || (get_class(Yii::app())!='CConsoleApplication' && Yii::app()->getModule('user')->isAdmin()))?array(
			array('username', 'length', 'max'=>20, 'min' => 3,'message' => UserModule::t("Incorrect username (length between 3 and 20 characters).")),
			array('password', 'length', 'max'=>128, 'min' => 4,'message' => UserModule::t("Incorrect password (minimal length 4 symbols).")),
			array('email', 'email'),
			array('username', 'unique', 'message' => UserModule::t("This user's name already exists.")),
			array('email', 'unique', 'message' => UserModule::t("This user's email address already exists.")),
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => UserModule::t("Incorrect symbols (A-z0-9).")),
			array('status', 'in', 'range'=>array(self::STATUS_NOACTIVE,self::STATUS_ACTIVE,self::STATUS_BANNED)),
			array('superuser', 'in', 'range'=>array(0,1)),
			array('create_at', 'default', 'value' => date('Y-m-d H:i:s'), 'setOnEmpty' => true, 'on' => 'insert'),
			array('lastvisit_at', 'default', 'value' => '0000-00-00 00:00:00', 'setOnEmpty' => true, 'on' => 'insert'),
			array('username, email', 'required'),
			array('superuser, status', 'numerical', 'integerOnly'=>true),
			array('id, username, password, email, activkey, create_at, lastvisit_at, superuser, status', 'safe', 'on'=>'search'),
		):((Yii::app()->user->id==$this->id)?array(
			array('username, email', 'required'),
			array('username', 'length', 'max'=>20, 'min' => 3,'message' => UserModule::t("Incorrect username (length between 3 and 20 characters).")),
			array('email', 'email'),
			array('username', 'unique', 'message' => UserModule::t("This user's name already exists.")),
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => UserModule::t("Incorrect symbols (A-z0-9).")),
			array('email', 'unique', 'message' => UserModule::t("This user's email address already exists.")),
		):array()));
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
        $relations = Yii::app()->getModule('user')->relations;
        if (!isset($relations['profile']))
            $relations['profile'] = array(self::HAS_ONE, 'Profile', 'user_id');
        return $relations;
        return array(
            'lenguageProgramming' => array(self::BELONGS_TO, 'LanguageProgramming', 'lenguage_programming_id'),
            'os0' => array(self::BELONGS_TO, 'SystemOperations', 'os'),
		);
        
        
        
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => UserModule::t("Id"),
			'username'=>UserModule::t("Nombre de usuario"),
			'password'=>UserModule::t("Contraseña"),
			'verifyPassword'=>UserModule::t("Repetir Contraseña"),
			'email'=>UserModule::t("E-mail"),
			'phone'=>UserModule::t("Telefono"),
			'os'=>UserModule::t("Sistema Operativo"),
			'lenguage_programming_id'=>UserModule::t("Lenguaje de Programacion"),
			'verifyCode'=>UserModule::t("Verification Code"),
			'activkey' => UserModule::t("activation key"),
			'createtime' => UserModule::t("Registration date"),
			'create_at' => UserModule::t("Registration date"),			
			'lastvisit_at' => UserModule::t("Última visita"),
			'superuser' => UserModule::t("Super Usuario"),
			'status' => UserModule::t("Estado"),
		);
	}
	
	public function scopes()
    {
        return array(
            'active'=>array(
                'condition'=>'status='.self::STATUS_ACTIVE,
            ),
            'notactive'=>array(
                'condition'=>'status='.self::STATUS_NOACTIVE,
            ),
            'banned'=>array(
                'condition'=>'status='.self::STATUS_BANNED,
            ),
            'superuser'=>array(
                'condition'=>'superuser=1',
            ),
            'notsafe'=>array(
            	'select' => 'id, username, password, email, activkey, create_at, lastvisit_at, superuser, status',
            ),
        );
    }
	
	public function defaultScope()
    {
        return CMap::mergeArray(Yii::app()->getModule('user')->defaultScope,array(
            'alias'=>'user',
            'select' => 'user.id, user.username, user.email, user.create_at, user.lastvisit_at, user.superuser, user.status',
        ));
    }
	
	public static function itemAlias($type,$code=NULL) {
		$_items = array(
			'UserStatus' => array(
				self::STATUS_NOACTIVE => UserModule::t('No Activado'),
				self::STATUS_ACTIVE => UserModule::t('Activo'),
				self::STATUS_BANNED => UserModule::t('Baneado'),
			),
			'AdminStatus' => array(
				'0' => UserModule::t('No'),
				'1' => UserModule::t('Si'),
			),
		);
		if (isset($code))
			return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
		else
			return isset($_items[$type]) ? $_items[$type] : false;
	}
	
/**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;
        
        $criteria->compare('t.id',$this->id);
        $criteria->compare('t.username',$this->username,true);
        $criteria->compare('t.password',$this->password);
        $criteria->compare('t.email',$this->email,true);
        $criteria->compare('t.activkey',$this->activkey);
        $criteria->compare('t.create_at',$this->create_at);
        $criteria->compare('t.lastvisit_at',$this->lastvisit_at);
        $criteria->compare('t.superuser',$this->superuser);
        $criteria->compare('t.status',$this->status);

        return new CActiveDataProvider(get_class($this), array(
            'criteria'=>$criteria,
        	'pagination'=>array(
			'pageSize'=>Yii::app()->getModule('user')->user_page_size,
			),
        ));
    }

    public function getCreatetime() {
        return strtotime($this->create_at);
    }

    public function setCreatetime($value) {
        $this->create_at=date('Y-m-d H:i:s',$value);
    }

    public function getLastvisit() {
        return strtotime($this->lastvisit_at);
    }

    public function setLastvisit($value) {
        $this->lastvisit_at=date('Y-m-d H:i:s',$value);
    }

    public function afterSave() {
        if (get_class(Yii::app())=='CWebApplication'&&Profile::$regMode==false) {
            Yii::app()->user->updateSession();
        }
        return parent::afterSave();
    }
}

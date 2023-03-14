<?php

/**
 * This is the model class for table "postulates".
 *
 * The followings are the available columns in table 'postulates':
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property integer $telefono_personal
 * @property string $email
 * @property string $file
 * @property string $date
 *
 * The followings are the available model relations:
 * @property TrabajoPostulantes[] $trabajoPostulantes
 */
class Postulates extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'postulates';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre,apellido,telefono_personal,email,file', 'required'),
			array('telefono_personal', 'numerical', 'integerOnly'=>true),
			array('nombre, apellido', 'length', 'max'=>50),
			array('email', 'length', 'max'=>100),
			array('file', 'file', 'types'=>'pdf','maxSize' => 1024 * 1024 * 1024 ,'tooLarge' => 'El archivo era más grande que 3MB. Por favor, sube un archivo más pequeño.'),
			array('date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, apellido, telefono_personal, email, file, date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'trabajoPostulantes' => array(self::HAS_MANY, 'TrabajoPostulantes', 'postulante_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'apellido' => 'Apellido',
			'telefono_personal' => 'Telefono Personal',
			'email' => 'Email',
			'file' => 'File',
			'date' => 'Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('telefono_personal',$this->telefono_personal);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Postulates the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
}

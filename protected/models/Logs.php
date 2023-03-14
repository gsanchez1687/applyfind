<?php

/**
 * This is the model class for table "logs".
 *
 * The followings are the available columns in table 'logs':
 * @property integer $id
 * @property string $modulo
 * @property string $actividad
 * @property string $pais
 * @property string $ip
 * @property string $date
 * @property string $dipositivo
 * @property integer $estatus
 */
class Logs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'logs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('estatus', 'numerical', 'integerOnly'=>true),
			array('modulo, actividad, pais', 'length', 'max'=>100),
			array('ip', 'length', 'max'=>45),
			array('dipositivo', 'length', 'max'=>500),
			array('date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, modulo, actividad, pais, ip, date, dipositivo, estatus', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'modulo' => 'Modulo',
			'actividad' => 'Actividad',
			'pais' => 'Pais',
			'ip' => 'Ip',
			'date' => 'Date',
			'dipositivo' => 'Dipositivo',
			'estatus' => 'Estatus',
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
		$criteria->compare('modulo',$this->modulo,true);
		$criteria->compare('actividad',$this->actividad,true);
		$criteria->compare('pais',$this->pais,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('dipositivo',$this->dipositivo,true);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Logs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

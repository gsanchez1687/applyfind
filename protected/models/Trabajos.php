<?php

/**
 * This is the model class for table "trabajos".
 *
 * The followings are the available columns in table 'trabajos':
 * @property integer $id
 * @property integer $departamento_id
 * @property integer $pais_id
 * @property string $titulo
 * @property string $descripcion
 * @property string $proposito
 * @property string $funcion
 * @property string $formacion
 * @property string $conocimiento
 * @property string $experiencia
 * @property string $habilidad
 * @property string $beneficio
 * @property string $fecha_contratacion
 * @property integer $cantidad_vacante
 * @property integer $genero_id
 * @property string $año_experiencia
 * @property string $edad_min
 * @property string $edad_max
 * @property integer $activo
 * @property string $creado
 * @property string $modificado
 *
 * The followings are the available model relations:
 * @property Generos $genero
 * @property Departamentos $departamento
 * @property Paises $pais
 * @property UsuarioPostulantes[] $usuarioPostulantes
 */
class Trabajos extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'trabajos';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('departamento_id, pais_id, titulo, tag, descripcion', 'required'),
            array('departamento_id, pais_id, cantidad_vacante, genero_id, activo, prioridad', 'numerical', 'integerOnly' => true),
            array('titulo', 'length', 'max' => 100),
            array('salario', 'length', 'max' => 50),
            array('tag', 'length', 'max' => 100),
            array('tag', 'match', 'pattern'=>'/^[\w\s,]+$/', 'message'=>'Etiquetas sólo pueden contener caracteres de palabra.'),          
            array('slug', 'length', 'max' => 255),
            array('tiempo_experiencia, edad_min, edad_max', 'length', 'max' => 2),
            array('modificado','default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'update'),
            array('creado,modificado','default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'insert'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, departamento_id, pais_id, titulo, slug, descripcion, proposito, funcion, formacion, conocimiento, experiencia, habilidad, beneficio, fecha_contratacion, cantidad_vacante, genero_id, tiempo_experiencia, edad_min, edad_max, activo, prioridad, creado, modificado', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'trabajoPostulantes' => array(self::HAS_MANY, 'TrabajoPostulantes', 'trabajo_id'),
            'genero' => array(self::BELONGS_TO, 'Generos', 'genero_id'),
            'departamento' => array(self::BELONGS_TO, 'Departamentos', 'departamento_id'),
            'pais' => array(self::BELONGS_TO, 'Paises', 'pais_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'departamento_id' => 'Departamento',
            'pais_id' => 'Pais',
            'titulo' => 'Titulo',
            'slug' => 'Slug',
            'tag' => 'Etiquetas',
            'descripcion' => 'Descripcion',
            'proposito' => 'Proposito',
            'funcion' => 'Funcion',
            'formacion' => 'Formacion',
            'conocimiento' => 'Conocimiento',
            'experiencia' => 'Experiencia',
            'habilidad' => 'Habilidad',
            'beneficio' => 'Beneficio',
            'fecha_contratacion' => 'Fecha Contratacion',
            'cantidad_vacante' => 'Cantidad Vacante',
            'genero_id' => 'Genero',
            'tiempo_experiencia' => 'Tiempo Experiencia',
            'edad_min' => 'Edad Minima',
            'edad_max' => 'Edad Maxima',
            'activo' => 'Activo',
            'prioridad' => 'Prioridad',
            'creado' => 'Creado',
            'modificado' => 'Modificado',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.
        $ip = '132.254.255.255';
        //$location = Yii::app()->geoip->lookupLocation($ip); 
        //$data = array('countryName' => $location ->countryName);
        Yii::app()->params['pais'] = 'Venezuela';
        
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('departamento_id', $this->departamento_id);
        $criteria->compare('pais_id', $this->pais_id);
        $criteria->compare('titulo', $this->titulo, true);
        $criteria->compare('slug', $this->slug, true);
        $criteria->compare('tag', $this->tag, true);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('proposito', $this->proposito, true);
        $criteria->compare('funcion', $this->funcion, true);
        $criteria->compare('formacion', $this->formacion, true);
        $criteria->compare('conocimiento', $this->conocimiento, true);
        $criteria->compare('experiencia', $this->experiencia, true);
        $criteria->compare('habilidad', $this->habilidad, true);
        $criteria->compare('beneficio', $this->beneficio, true);
        $criteria->compare('fecha_contratacion', $this->fecha_contratacion, true);
        $criteria->compare('cantidad_vacante', $this->cantidad_vacante);
        $criteria->compare('genero_id', $this->genero_id);
        $criteria->compare('tiempo_experiencia', $this->tiempo_experiencia, true);
        $criteria->compare('edad_min', $this->edad_min, true);
        $criteria->compare('edad_max', $this->edad_max, true);
        $criteria->compare('activo', $this->activo);
        $criteria->compare('prioridad', $this->prioridad);
        $criteria->compare('creado', $this->creado, true);
        $criteria->compare('modificado_', $this->modificado, true);

//        $criteria->join = "INNER JOIN paises Pais ON (Pais.id = t.pais_id )";
//        $criteria->addCondition("t.activo = 1 AND Pais.nombre = '".Yii::app()->params['pais']."'");

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort'=>array('defaultOrder'=>'id DESC') //tambien se puede ordenar desde aqui
        ));
    }
    public function search2() {
        // @todo Please modify the following code to remove attributes that should not be searched.
              
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('departamento_id', $this->departamento_id);
        $criteria->compare('pais_id', $this->pais_id);
        $criteria->compare('titulo', $this->titulo, true);
        $criteria->compare('slug', $this->slug, true);
        $criteria->compare('tag', $this->tag, true);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('proposito', $this->proposito, true);
        $criteria->compare('funcion', $this->funcion, true);
        $criteria->compare('formacion', $this->formacion, true);
        $criteria->compare('conocimiento', $this->conocimiento, true);
        $criteria->compare('experiencia', $this->experiencia, true);
        $criteria->compare('habilidad', $this->habilidad, true);
        $criteria->compare('beneficio', $this->beneficio, true);
        $criteria->compare('fecha_contratacion', $this->fecha_contratacion, true);
        $criteria->compare('cantidad_vacante', $this->cantidad_vacante);
        $criteria->compare('genero_id', $this->genero_id);
        $criteria->compare('tiempo_experiencia', $this->tiempo_experiencia, true);
        $criteria->compare('edad_min', $this->edad_min, true);
        $criteria->compare('edad_max', $this->edad_max, true);
        $criteria->compare('activo', $this->activo);
        $criteria->compare('prioridad', $this->prioridad);
        $criteria->compare('creado', $this->creado, true);
        $criteria->compare('modificado', $this->modificado, true);
        
         $criteria->addCondition("t.activo = 1");
         
        
         
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort'=>array('defaultOrder'=>'id DESC'), //tambien se puede ordenar desde aqui
            'pagination' => array('pageSize'=>Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']))
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Trabajos the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function fecha($date) {

        if ($date == '' || empty($date))
            return '';

        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

        list($anio, $mes, $dia) = preg_split('/-/', $date);

        $month = $meses[((int) $mes) - 1];

        $fechaLegible = $dia[0] . $dia[1] . " de " . $month . " " . $anio; //Spanish    

        return $fechaLegible;
    }

    public static function tiempoTranscurridoFechas($fechaInicio, $fechaFin) {
        $fecha1 = new DateTime($fechaInicio);
        $fecha2 = new DateTime($fechaFin);
        $fecha = $fecha1->diff($fecha2);
        $tiempo = "";

        if ($fecha->d == 0) {

            $tiempo = " Hoy ";
        }


        //años
        if ($fecha->y > 0) {
            $tiempo .= $fecha->y;

            if ($fecha->y == 1)
                $tiempo .= " año, ";
            else
                $tiempo .= " años, ";
        }

        //meses
        if ($fecha->m > 0) {
            $tiempo .= $fecha->m;

            if ($fecha->m == 1)
                $tiempo .= " mes, ";
            else
                $tiempo .= " meses, ";
        }

        //dias
        if ($fecha->d > 0) {
            $tiempo .= $fecha->d;

            if ($fecha->d == 1)
                $tiempo .= " día ";
            else
                $tiempo .= " días ";
        }

        //horas
        if ($fecha->h > 0) {
            $tiempo .= $fecha->h;

            if ($fecha->h == 1)
                $tiempo .= " hora, ";
            else
                $tiempo .= " horas, ";
        }

        //minutos
        if ($fecha->i > 0) {
            $tiempo .= $fecha->i;

            if ($fecha->i == 1)
                $tiempo .= " minuto";
            else
                $tiempo .= " minutos";
        }
        else if ($fecha->i == 0) //segundos
            $tiempo .= $fecha->s . " segundos";

        return $tiempo;
    }

    public function behaviors() {
        return array(
            'sluggable' => array(
                'class' => 'ext.behaviors.SluggableBehavior',
                'columns' => array('titulo'),
                'unique' => true,
                'update' => true,
            ),
        );
    }
    
    
    


}

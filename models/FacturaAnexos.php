<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fg_factura_anexos".
 *
 * @property integer $id
 * @property string $titulo
 * @property string $path
 * @property integer $factura_id
 * @property string $data_criacao
 * @property string $data_update
 * @property integer $criado_por
 * @property integer $updated_por
 *
 * @property FgFactura $factura
 */
class FacturaAnexos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fg_factura_anexos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo', 'path', 'factura_id'], 'required'],
            [['path'], 'string'],
            [['factura_id', 'criado_por', 'updated_por'], 'integer'],
            [['data_criacao', 'data_update'], 'safe'],
            [['titulo'], 'string', 'max' => 50],
            [['factura_id'], 'exist', 'skipOnError' => true, 'targetClass' => FgFactura::className(), 'targetAttribute' => ['factura_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'path' => 'Path',
            'factura_id' => 'Factura ID',
            'data_criacao' => 'Data Criacao',
            'data_update' => 'Data Update',
            'criado_por' => 'Criado Por',
            'updated_por' => 'Updated Por',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFactura()
    {
        return $this->hasOne(FgFactura::className(), ['id' => 'factura_id']);
    }
}

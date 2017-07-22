<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fg_orcamento".
 *
 * @property integer $id
 * @property string $titulo
 * @property string $descricao
 * @property string $valor
 * @property string $data_criacao
 * @property string $data_update
 * @property integer $criado_por
 * @property integer $updated_por
 *
 * @property FgFactura[] $fgFacturas
 */
class Orcamento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fg_orcamento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo'], 'required'],
            [['descricao'], 'string'],
            [['valor'], 'number'],
            [['data_criacao', 'data_update'], 'safe'],
            [['criado_por', 'updated_por'], 'integer'],
            [['titulo'], 'string', 'max' => 50],
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
            'descricao' => 'Descricao',
            'valor' => 'Valor',
            'data_criacao' => 'Data Criacao',
            'data_update' => 'Data Update',
            'criado_por' => 'Criado Por',
            'updated_por' => 'Updated Por',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFgFacturas()
    {
        return $this->hasMany(FgFactura::className(), ['orcamento_id' => 'id']);
    }
}

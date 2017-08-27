<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fg_anexos".
 *
 * @property integer $id
 * @property string $titulo
 * @property string $path
 * @property string $ref
 * @property string $data_criacao
 * @property string $data_update
 * @property integer $criado_por
 * @property integer $updated_por
 */
class Anexo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fg_anexos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo', 'path', 'ref'], 'required'],
            [['path'], 'string'],
            [['data_criacao', 'data_update'], 'safe'],
            [['criado_por', 'updated_por'], 'integer'],
            [['titulo'], 'string', 'max' => 50],
            [['ref'], 'string', 'max' => 150],
            [['ref'], 'unique'],
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
            'ref' => 'Ref',
            'data_criacao' => 'Data Criacao',
            'data_update' => 'Data Update',
            'criado_por' => 'Criado Por',
            'updated_por' => 'Updated Por',
        ];
    }
}

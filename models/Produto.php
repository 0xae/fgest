<?php
namespace app\models;
use Yii;

/**
 * This is the model class for table "fg_produto".
 *
 * @property integer $id
 * @property string $descricao
 * @property integer $quantidade
 * @property string $valor
 * @property string $data
 * @property string $iva
 * @property integer $factura_id
 * @property string $data_criacao
 * @property string $data_update
 * @property integer $criado_por
 * @property integer $updated_por
 *
 * @property FgFactura $factura
 */
class Produto extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'fg_produto';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['descricao', 'quantidade', 
              'iva', 'valor', 
              'factura_id', 
                ], 'required'],

            [['quantidade', 'factura_id', 
                'criado_por', 'updated_por'],
                 'integer'],
            [['valor', 'iva'], 'number'],
            [['data', 'data_criacao', 'data_update'], 'safe'],
            [['descricao'], 'string', 'max' => 50],
            [['factura_id'], 'exist', 'skipOnError' => true, 'targetClass' => Factura::className(), 'targetAttribute' => ['factura_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'descricao' => 'Descricao',
            'quantidade' => 'Quantidade',
            'valor' => 'Valor',
            'data' => 'Data',
            'iva' => 'Iva',
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
    public function getFactura() {
        return $this->hasOne(Factura::className(), ['id' => 'factura_id']);
    }
}

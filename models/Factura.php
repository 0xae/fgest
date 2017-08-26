<?php
namespace app\models;
use Yii;

/**
 * This is the model class for table "fg_factura".
 *
 * @property integer $id
 * @property string $titulo
 * @property string $descricao
 * @property integer $orcamento_id
 * @property string $data_criacao
 * @property string $data_update
 * @property integer $criado_por
 * @property integer $updated_por
 *
 * @property FgOrcamento $orcamento
 * @property FgFacturaAnexos[] $fgFacturaAnexos
 * @property FgFacturaItem[] $fgFacturaItems
 */
class Factura extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'fg_factura';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['titulo', 'orcamento_id'], 'required'],
            [['descricao'], 'string'],
            [['orcamento_id', 'criado_por', 'updated_por'], 'integer'],
            [['data_criacao', 'data_update'], 'safe'],
            [['titulo'], 'string', 'max' => 50],
            [['orcamento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orcamento::className(), 'targetAttribute' => ['orcamento_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'descricao' => 'Descricao',
            'orcamento_id' => 'Orcamento ID',
            'data_criacao' => 'Data Criacao',
            'data_update' => 'Data Update',
            'criado_por' => 'Criado Por',
            'updated_por' => 'Updated Por',
        ];
    }

    public function getOrcamento() {
        return $this->hasOne(FgOrcamento::className(), ['id' => 'orcamento_id'])
                    ->one();
    }

    public function getProduto() {
        return $this->hasMany(Produto::className(), ['factura_id' => 'id'])
                    ->all();
    }
}

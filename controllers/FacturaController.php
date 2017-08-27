<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use app\models\Factura;
use app\models\Produto;
/**
 * FacturaController implements the CRUD actions for Factura model.
 */
class FacturaController extends Controller {
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'view', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Factura models.
     * @return mixed
     */
    public function actionIndex() {
        $dataProvider = new ActiveDataProvider([
            'query' => Factura::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Factura model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $produtoM = new Produto;
        return $this->render('view', [
            'model' => $this->findModel($id),
            'produtoModel' => $produtoM
        ]);
    }

    /**
     * Creates a new Factura model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Factura();
        $model->criado_por = Yii::$app->user->identity->id;
        $model->updated_por = Yii::$app->user->identity->id;
        $model->data_criacao = date('Y-m-d H:i:s');
        $model->data_update = date('Y-m-d H:i:s');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['orcamento/view', 'id' => $model->orcamento_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Factura model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->updated_por = Yii::$app->user->identity->id;
            $model->data_update = date('Y-m-d H:i:s');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Factura model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Factura model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Factura the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Factura::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

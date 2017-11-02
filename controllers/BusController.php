<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Bus;
use app\models\Journey;
use app\models\BusSearch;
use app\models\UploadForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Url;

/**
 * BusesController implements the CRUD actions for Buses model.
 */
class BusController extends Controller
{
    /**
     * @inheritdoc
     */

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => [],
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Buses models.
     * @return mixed
     */
    public function actionIndex()
    {
/*        $searchModel = new BusSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
*/        $model = new Bus();

        return $this->render('index', [
/*            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
*/            'model' => $this->findBuses(),
        ]);
    }

    /**
     * Displays a single Buses model.
     * @param string $numberCode
     * @return mixed
     */
    public function actionView($numberCode)
    {
        return $this->render('view', [
            'model' => $this->findBus($numberCode),
        ]);
    }

    /**
     * Creates a new Buses model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bus();

        if($model->load(Yii::$app->request->post())){
            if(!$this->findBus($model->numberCode) && $model->save()){
                $image = UploadedFile::getInstance($model, 'imageFile');
                $model->imageName = $image->baseName.'.'.$image->extension;
                $model->save();
                $image->saveAs("images/$model->imageName");
              
                Yii::$app->session->setFlash('busRegistered','The bus was registered successfully');  
                return $this->redirect(['index']);
            }else{
                Yii::$app->session->setFlash('busExist','The bus already exist');
                $this->redirect(['create',
                    'model' => $model,
                    ]);
            }
        }
        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Buses model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $numberCode
     * @return mixed
     */

    public function actionUpdate($numberCode)
    {
        $model = $this->findBus($numberCode);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->numberCode]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Buses model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $numberCode
     * @return mixed
     */

    public function actionDelete($numberCode)
    {   
        $model = new Journey;
        $model = $this->findJourney($numberCode);
        
        if($model):
            foreach($model as $model):
            if($model->setJourney !== 0){
                Yii::$app->session->setFlash('busNotDeleted','The bus was not deleted. Make sure no journey is assigned to it.Then try again');
                return $this->redirect(['index']);
            }
        endforeach;

        elseif ($this->findBus($numberCode)->delete()):
            Yii::$app->session->setFlash('busDeleted','The bus was deleted successfully');
            return $this->redirect(['index']);
        endif;
    
    }

    /**
     * Finds the Buses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $numberCode
     * @return Buses the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findBuses()
    {
        if (($model = Bus::find()->orderBy(['numberCode' => SORT_ASC ])->all()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
  
    protected function findBus($numberCode)
    {
        if (($model = Bus::findOne($numberCode)) !== null) {
            return $model;
        } else {
            return false;
//            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findJourney($numberCode)
    {
        if(($model = Journey::find()->where(['numberCode' => $numberCode])->all()) != null){
            return $model;
        }else{
            return false;
//            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
    
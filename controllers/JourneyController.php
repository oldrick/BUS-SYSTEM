<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Journey;
use app\models\JourneySearch;
use app\models\JourneyRecord;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JourneysController implements the CRUD actions for Journeys model.
 */
class JourneyController extends Controller
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
     * Lists all Journeys models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JourneySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Journeys model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Journeys model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Journey();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Journeys model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $douala = array('Douala-Yaounde','Douala-Buea','Douala-Dschang','Douala-Bamenda','Douala-Bertoua');
        $yaounde = array('Yaounde-Douala','Yaounde-Buea','Yaounde-Bamenda','Yaounde-Dschang','Yaounde-Bertoua');
        $buea = array('Buea-Douala','Buea-Yaounde','Buea-Bamenda','Buea-Dschang','Buea-Bertoua');
        $bamenda = array('Bamenda-Douala','Bamenda-Yaounde','Bamenda-Buea','Bamenda-Dschang','Bamenda-Bertoua');
        $bertoua = array('Bertoua-Douala','Bertoua-Yaounde','Bertoua-Buea','Bertoua-Bamenda','Bertoua-Dschang');
        $dschang = array('Dschang-Douala','Dschang-Yaounde','Dschang-Buea','Dschang-Bamenda','Dschang-Bertoua');
        //obtains the residence of a user and uses it know which journeys he can assign. A user from Douala can only
        //crud(delete and update) journeys that start with Douala.and so on....He can only view the others without having power to
        //crud them
            $user = Yii::$app->user->identity->residence;
            if($user == 'Douala'){
                $town = $douala;
            }elseif($user == 'Bamenda'){
                $town = $bamenda;
            }elseif($user == 'Yaounde'){
                $town = $yaounde;
            }elseif($user == 'Buea'){
                $town = $buea;
            }elseif($user == 'Bertoua'){
                $town = $bertoua;
            }elseif($user == 'Dschang'){
                $town = $dschang;
            }
            if (($model3 = Journey::find()->indexBy('journeyId')->all())) {
                foreach ($model3 as $model3){
                    foreach ($town as $value) {
                        if ($value == $model3->journey){
                            $model1 = $this->findModel($id);

                            if(($model = JourneyRecord::findOne(['journeyId' => $id])) == null){
                                
                                $model2 = new JourneyRecord();

                                $model2->journeyId = $model1->journeyId;
                                $model2->numberCode = $model1->numberCode;
                                $model2->setJourney = $model1->setJourney;
                                $model2->journey = $model1->journey;
                                $model2->price = $model1->price;
                                $model2->takeOffDate = $model1->takeOffDate;
                                $model2->takeOffTime = $model1->takeOffTime;
                                $model2->arrivalDate = $model1->arrivalDate;
                                $model2->arrivalTime = $model1->arrivalTime;
                                $model2->driver = $model1->driver;
                                $model2->userName = Yii::$app->user->identity->userName;
                                $model2->action = 'data';
                                $model2->save();
                            }
                            if ($model1->load(Yii::$app->request->post()) && $model1->save()) {

                                $model = new JourneyRecord();

                                $model->journeyId = $model1->journeyId;
                                $model->numberCode = $model1->numberCode;
                                $model->setJourney = $model1->setJourney;
                                $model->journey = $model1->journey;
                                $model->price = $model1->price;
                                $model->takeOffDate = $model1->takeOffDate;
                                $model->takeOffTime = $model1->takeOffTime;
                                $model->arrivalDate = $model1->arrivalDate;
                                $model->arrivalTime = $model1->arrivalTime;
                                $model->driver = $model1->driver;
                                $model->userName = Yii::$app->user->identity->userName;
                                $model->action = 'update';
                                $model->save();        
                                
                                return $this->redirect(['/journey/index']);
                            } else {
                                return $this->render('update', [
                                    'model' => $model1,
                                ]);
                            }
                        }else{
                            throw new NotFoundHttpException('You don\'t have the right to update this journey');
                        }
                    }
                }
            }
    }

    /**
     * Deletes an existing Journeys model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $douala = array('Douala-Yaounde','Douala-Buea','Douala-Dschang','Douala-Bamenda','Douala-Bertoua');
        $yaounde = array('Yaounde-Douala','Yaounde-Buea','Yaounde-Bamenda','Yaounde-Dschang','Yaounde-Bertoua');
        $buea = array('Buea-Douala','Buea-Yaounde','Buea-Bamenda','Buea-Dschang','Buea-Bertoua');
        $bamenda = array('Bamenda-Douala','Bamenda-Yaounde','Bamenda-Buea','Bamenda-Dschang','Bamenda-Bertoua');
        $bertoua = array('Bertoua-Douala','Bertoua-Yaounde','Bertoua-Buea','Bertoua-Bamenda','Bertoua-Dschang');
        $dschang = array('Dschang-Douala','Dschang-Yaounde','Dschang-Buea','Dschang-Bamenda','Dschang-Bertoua');
        //obtains the residence of a user and uses it know which journeys he can assign. A user from Douala can only
        //crud(delete and update) journeys that start with Douala.and so on....He can only view the others without having power to
        //crud them
            $user = Yii::$app->user->identity->residence;
            if($user == 'Douala'){
                $town = $douala;
            }elseif($user == 'Bamenda'){
                $town = $bamenda;
            }elseif($user == 'Yaounde'){
                $town = $yaounde;
            }elseif($user == 'Buea'){
                $town = $buea;
            }elseif($user == 'Bertoua'){
                $town = $bertoua;
            }elseif($user == 'Dschang'){
                $town = $dschang;
            }
            if (($model3 = Journey::find()->indexBy('journeyId')->all())) {
                foreach ($model3 as $model3){
                    foreach ($town as $value) {
                        if ($value == $model3->journey){

                            $model = new JourneyRecord();

                            $model1 = $this->findModel($id);
                            
                            $model->journeyId = $model1->journeyId;
                            $model->numberCode = $model1->numberCode;
                            $model->setJourney = $model1->setJourney;
                            $model->journey = $model1->journey;
                            $model->price = $model1->price;
                            $model->takeOffDate = $model1->takeOffDate;
                            $model->takeOffTime = $model1->takeOffTime;
                            $model->arrivalDate = $model1->arrivalDate;
                            $model->arrivalTime = $model1->arrivalTime;
                            $model->driver = $model1->driver;
                            $model->userName = Yii::$app->user->identity->userName;
                            $model->action = 'delete';

                            if($model->save() && $model1->delete()){
                                return $this->redirect(['index']);
                            }else{
                                throw new NotFoundHttpException('error inserting data in JourneyRecord.');
                            }
                        }else{
                            throw new NotFoundHttpException('You don\'t have the right to update this journey');
                        }
                    }
                }
           }
    }

    /**
     * Finds the Journeys model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Journeys the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Journey::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

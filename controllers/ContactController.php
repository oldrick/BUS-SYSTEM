<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Contact;
use app\models\ContactReply;
use app\models\ContactSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * ContactController implements the CRUD actions for Contact model.
 */
class ContactController extends Controller
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
     * Lists all Contact models.
     * @return mixed
     */
    public function actionIndex()
    {
        //if the logged in admin is a super admin,let he be notified on all the mails 
        if(Yii::$app->user->identity->userName == 'tsaffi'){
            $query = Contact::find();

        //if the logged in admin is a normal admin,let he be notified only on the mails of his region(mails sent to his region)
        }else{
            $query = Contact::find()->where(['region' => Yii::$app->user->identity->residence]);
        }
        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $contact = $query->orderBy(['id' => SORT_DESC])
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        return $this->render('index', [
            'contact' => $contact,
            'pagination' => $pagination,
        ]);
    }

    /**
     * Displays a single Contact model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findContact($id),
        ]);
    }

    /**
     * Creates a new Contact model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Contact();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Contact model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findContact($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Contact model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findContact($id)->delete();

        $model = $this->findContactReply($id);
        foreach($model as $model){
            $model->delete();
        }
        return $this->redirect(['index']);
    }

    public function actionReply($time, $email)
    {
        $model = new ContactReply();
        $model->sentTime = $time;
        
        if(Yii::$app->user->identity->userName){
            $model->admin = Yii::$app->user->identity->userName;
        }

        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['index']);
        }else{
            return $this->render('reply', [
                    'model' => $model,
                ]);
        }
    }

    /**
     * Finds the Contact model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Contact the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findContact($id)
    {
        if (($model = Contact::findOne(['time' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findContactReply($id)
    {
        if (($model = ContactReply::find()
                                    ->where(['sentTime' => $id])
                                    ->all()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

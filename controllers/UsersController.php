<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Users;
use app\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UpdateUser;
use app\models\Password;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
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
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new Users();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Users model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //go to create view if the passwords are not equal
            if(strcasecmp($model->password, $model->passwordAgain) !== 0){
                Yii::$app->session->setFlash('passwordsNotMatch', 'The passwords do not match');
                $this->render('create', [
                        'model' => $model,
                    ]);            
            }elseif(!$this->findModel($model->userName)){
                    $model->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
                    if($model->save()){
                        Yii::$app->session->setFlash('userAdded','User added successfully');
                        return $this->redirect(['index']);
                    }
            }else{
                Yii::$app->session->setFlash('userExist','The username already exist. Please choose a different username');
                $this->redirect(['create',
                    'model' => $model,
                    ]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
            if($model->save()){
                Yii::$app->session->setFlash('userUpdated', 'User updated successfully');
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('userDeleted', 'User deleted successfully');
        return $this->redirect(['index']);
    }

    public function actionUpdatePassword()
    {
        $model = new UpdateUser();
        
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $user = Password::findOne(Yii::$app->user->identity->userName);
                if(Yii::$app->getSecurity()->validatePassword($model->currentPassword, $user->password)){
                    $user->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
                    if($user->save()){
                        Yii::$app->session->setFLash('password updated', 'Your password was successfully updated');
                        return $this->refresh();    
                    }
                }else{
                        Yii::$app->session->setFLash('password not updated', 'Incorrect password');
                        return $this->refresh();                
                }
        }else{
            return $this->render('update-password',[
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            return false;
//            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

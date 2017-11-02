<?php

namespace app\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Contact;
use app\models\ContactReply;
use app\models\Bus;
use app\models\Journey;
use app\models\Customer;
use app\models\Cancel;
use app\models\Users;
use app\models\Login;
use app\models\Receipt;
use app\models\GetReceipt;
        
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $receipt = new GetReceipt();
        $model = Bus::find()->all();
     
        return $this->render('index', [
            'model' => $model,
            'receipt' => $receipt,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $model = new Login();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $query = Login::findOne($model->userName);
            if($query !== null){
                if(Yii::$app->getSecurity()->validatePassword($model->password, $query->password)){
                   Yii::$app->user->login($query); 
                   return Yii::$app->controller->redirect(Url::to(['bus/index']));  
                }else{
                    Yii::$app->session->setFlash('unknownUser', 'Incorrect username or password combination');
                }
            }else{
                Yii::$app->session->setFlash('unknownUser', 'Incorrect username or password combination');
            }
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new Contact();
//        $model2 = new ContactReply();

        if($model->load(Yii::$app->request->post()) && /*$model->contact(Yii::$app->params['adminEmail']) && */$model->save()/* && $model2->save()*/) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionBookSeat()
    {
        return $this->render('book-seat',[
            'journey' => $this->findJourneys(),
        ]);
    }

    public function actionBbookSeat($id)
    {
        $receiptTable = new Receipt;
        $model = new Customer();
        $model1 = $this->findJourney($id);
        $model->journeyId = $model1->journeyId;

        if(Yii::$app->request->post()){        
            if(isset($_POST['customerName']) && isset($_POST['telNo']) && isset($_POST['idCard']) && isset($_POST['seat'])) {
                $model->customerName = $_POST['customerName'];
                $model->telNo = $_POST['telNo'];
                $model->idCard = $_POST['idCard'];
                $model->seat = $_POST['seat'];
                $model->setSeat = 'on';
                if($model->save()){
                    Yii::$app->session->setFlash('seat booked');
                    $query = Customer::find()
                                    ->where([
                                        'journeyId' => $model->journeyId,
                                        'seat' => $model->seat,
                                        'setSeat' => 'off',
                                    ])->count();

                    // storing information into the receipt table
                    $receiptTable->customerName = $model->customerName;
                    $receiptTable->journeyName = $model1->journey;
                    $receiptTable->busNumberCode = $model1->numberCode;
                    $receiptTable->telephoneNo = $model->telNo;
                    $receiptTable->seatNo = $model->seat;
                    $receiptTable->price = $model1->price;
                    $receiptTable->takeOffDate = $model1->takeOffDate;
                    $receiptTable->takeOffTime = $model1->takeOffTime;
                    $receiptTable->arrivalDate = $model1->arrivalDate;
                    $receiptTable->arrivalTime = $model1->arrivalTime;
                    $receiptTable->registrationTime = $model->regTime;
                    $receiptTable->journey_Id = $model->journeyId;
                    $receiptTable->customer_Id = $model->customerId;
                    
                    if($receiptTable->save()){

                        return $this->render('receipt',[
                        'model' => $model,
                        'model1' => $model1,
                        'query' => $query,
                        ]);
                    }
                }   
            }
        }   
        return $this->render('bbook-seat',[
            'model' => $model,
            'model1' => $this->findJourney($id),
        ]);
    }
    
    public function actionCancelTicket()
    {
        $model = new Cancel();

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            // $model becomes an object of class customer
            if($model1 = $this->findCustomer($model)){
                $model2 = $this->findJourney($model1->journeyId);
                $takeOffDate = strtotime($model2->takeOffDate);
                $date = date('y-m-d');
                $today = strtotime($date);
    
                if($today > $takeOffDate){
                    $journeyTime = strtotime($model2->takeOffTime);
                    $date = date('h:i:s');
                    $currentTime = strtotime($date) - 3600;// subtract 3600 to put time in GMT
                    
                    if(($currentTime - $journeyTime) < -900){
                        Yii::$app->session->setFlash('re-cancel ticket','This ticket can no longer be cancelled as from 15 minutes before departure time');
                        return $this->refresh();
                    }
                }
                //prevents multiple cancelation of ticket as it will alter the cancelation time(regTime2)
                if($model1->setSeat == 'off'){
                    Yii::$app->session->setFlash('re-cancel ticket','This ticket is no longer valid');
                    return $this->refresh();
                }
                $model1->setSeat = 'off';
                // updates the setseat attribute in the customer table and sets it to off
                if($model1->save()){ 
                    Yii::$app->session->setFlash('cancel ticket','Your ticket has been cancelled successfully');
                    return $this->render('cancel-ticket', [
                            'model1' => $model1,
                        ]);
                }
            }else{
                Yii::$app->session->setFlash('could not cancel ticket','The input data is incorrect. Please try again');
                return $this->refresh();
            }
        }
        return $this->render('cancel-ticket',[
            'model' => $model,
        ]);
    
    }

    // ths function is used to download ticket
    public function actionDownload()
    { 
        $download = Receipt::findOne(); 
        $path = Yii::getAlias('@webroot').'/images/41.jpg';
        //echo $path;
        if (file_exists($path)) {
            return Yii::$app->response->sendFile($path);
        }
    }

    // this action is used to see receipt at any time
    public function actionSeeReceipt(){

        $receipt = new GetReceipt();
        $model1 = $this->findJourney($id);
        $model->journeyId = $model1->journeyId;
        $query = Receipt::find();

        $query = Customer::find()
                ->where([
                    'journeyId' => $model->journeyId,
                    'seat' => $model->seat,
                    'setSeat' => 'off',
                ])->count();


      //  if($receipt->load(Yii::$app->request->post()){

            return $this->render('reeipt',[
                'model' => $model,
                'model1' => $model1,
                 'query' => $query,
             ]);
            }
    //}

    protected function findJourneys()
    {
        if (($model = Journey::find()->where(['setJourney' => 1])->all()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findJourney($id)
    {
        if(($model = Journey::findOne($id)) !== null){
            return $model;
        }else{
            throw new NotFoundHttpException("The requested page does not exist.");
        }
    }

    protected function findCustomer($model)
    {
        if(($model2 = Customer::find($model)
                                ->where([
                                    'journeyId' => $model->journeyId ,
                                    'customerId' => $model,
                                    'regTime' => $model->regTime,
                                ])->one()) !== null){
            return $model2;
        }else{
            return false;
//            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

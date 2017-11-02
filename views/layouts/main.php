<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use app\models\ContactReply;
use app\models\Contact;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?>
	          <?= ($this->title != Yii::$app->name) ? ' @ ' . Yii::$app->name : '' ?>
	
   </title>
    <?php $this->head() ?>
    <link rel="icon" type="image/jpg" href="<?php echo Url::to('@web/images/bus.jpeg');?>">
</head>

<?php  $pageTitles = array('Contact','Login','Cancel Your Ticket','Add Bus','Add Journey','Update Journey','Update Your Password','Add Driver','Add User','Update Driver','Update Customer','Book Your Seat','receipt','Cancel Your Ticket','Update User'); ?>

<body class="<?= in_array($this->title, $pageTitles) ? 'c-body' : ''  ?>">
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
        NavBar::begin([
            'brandLabel' =>"<span>".Html::img('@web/images/bus2.jpeg', ['alt' => Yii::$app->name, 'width'=> 50, 'height'=> 30], ['class'=> 'img-responsive img-circle']). Yii::$app->name."<span>",
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-fixed-top',
                'style' => 'background-color:lightblue',
            ],
        ]);

        if(Yii::$app->user->isGuest) :
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    
                   /* [
                        'label' => 'Options',
                        'options' => ['class' => 'nav-pills'],
                        'items' => [
                            ['label' => 'Book seat', 'url' => ['/site/book-seat']],
                            '<li class="divider"></li>',
                            ['label' => 'Cancel ticket', 'url' => ['/site/cancel-ticket']],
                            '<li class="divider"></li>',
                            ['label' => 'Receipt', 'url' => ['/site/see-receipt']]
                        ],
                    ],*/

                    ['label' => 'About', 'url' => ['site/about']],
                    ['label' => 'Contact', 'url' => ['/site/contact']],
                    ['label' => 'Login', 'url' => ['/site/login']],
                ],
            ]);
            NavBar::end();
        else :
            $i = 0;
        //if the logged in admin is the super admin,let he be notified about the number of unanswered 
        //mails of all the regions.
            if(Yii::$app->user->identity->userName == 'tsaffi'){
                $contacts = Contact::find()->all();
            //if the logged in admin is a normal admin,let he be notified only on the unanswerd mails of his region.
            }else{  

                $contacts = Contact::find()->where(['region' => Yii::$app->user->identity->residence])->all();
            }
            foreach($contacts as $contacts){
                if(!ContactReply::findOne(['sentTime' => $contacts->time])){
                    $i++;
                }
            } 
    ?>
    <?php
                echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/bus/index']],
                    ['label' => 'Journey', 'url' => ['/journey/index']],
                    ['label' => 'Customer', 'url' => ['/customer/index']],

                    Html::a("<span class='badge' style='background-color:red; margin-top:-25px; margin-left:-5px'> $i </span>", ['/contact/index'], 
                                ['class' => 'glyphicon glyphicon-envelope', 'style' => 'margin-top:16px; font-size:2em']
                            ),                

                    [
                        'label' => 'View',
                        'options' => ['class' => 'nav-pills'],
                        'items' => [
                            ['label' => 'Driver', 'url' => ['/driver/index']],
                            '<li class="divider"></li>',
                            ['label' => 'Admin', 'url' => ['/users/index']],
                            '<li class="divider"></li>',
                            ['label' => 'records', 'url' => ['/journey-record/index']],
                        ],
                    ],

                    '<li class=dropdown>
                        <a class="dropdown-toggle btn btn-link" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>'.
                                Html::a('Update-password', ['/users/update-password'])
                            .'</li>
                            <li class="divider"></li>
                             <li>'.
                                Html::a('Logout('.Yii::$app->user->identity->userName.')', ['/site/logout'], 
                                    [
                                        'data'=>['method' => 'post'],
                                    ])
                            .'</li>   
                        </ul>
                    </li>'

                ],
            ]);
            NavBar::end();
        endif;
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer" style="background-color:lightblue;">
    <div class="container">
        <p class="pull-left">&copy; Musango <?= date('Y') ?></p>
        <p class="pull-right"><?= 'Powered by ABEBOH' /*de,es,zh-CN*/ ?></p>

                    <div id="google_translate_element"></div><script type="text/javascript">
            function googleTranslateElementInit() {
              new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'de,en,es,fr,zh-CN', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
            }
            </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\ContactReply;
use app\models\Contact;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Emails';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="">

    <h1 class="head"><?= Html::encode($this->title) ?></h1>
<?php //queries the dbs and display data about each user who responded to a request. study the code and understand ?>
    <table class="table table-striped table-bordered center">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Subject</th>
                <th>Body</th>
                <th>Sent Time</th>
                <th>Reply Body</th>
                <th>Reply Time</th>
                <th>Admin</th>
                <th>action</th>
            </tr>
        </thead>
<!--        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Subject</th>
                <th>Body</th>
                <th>Sent Time</th>
                <th>Reply Body</th>
                <th>Reply Time</th>
                <th>Admin</th>
                <th>action</th>
            </tr>
        </thead>
-->        <tbody>
            <?php foreach ($contact as $contact): ?>
                <tr>
                    <td><?= Html::encode($contact->id) ?></td>
                    <td><?= Html::encode($contact->name) ?></td>
                    <td><?= Html::encode($contact->subject) ?></td>
                    <td><?= Html::encode($contact->body) ?></td>
                    <td><?= Html::encode($contact->time) ?></td>

                    <?php if($contactReply = ContactReply::find()->where(['sentTime' => $contact->time])->all()): ?>
                        <?php $i = 1; ?>
                            <?php foreach($contactReply as $contactReply): ?>
                                    <?php if($i == 1): ?>
                                            <td><?= Html::encode($contactReply->body) ?></td>
                                            <td><?= Html::encode($contactReply->replyTime) ?></td>
                                            <td><?= Html::encode($contactReply->admin) ?></td>
                                        <?php if(Yii::$app->user->identity->userName == 'tsaffi'): ?>         
                                                    <td><?= Html::a('<span class="glyphicon glyphicon-share-alt glyph-size"></span>', ['reply', 'time' => $contact->time, 'email' => $contact->email], ['class' => '']) ?>
                                                        <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id'=>$contact->time], [
                                                            'class' => '',
                                                            'data' => [
                                                                'confirm' => 'Are you sure you want to delete this item?',
                                                                'method' => 'post',
                                                            ],
                                                        ])?>
                                                    </td>
                                        <?php else: ?>
                                            <td><?= Html::a('<span class="glyphicon glyphicon-share-alt glyph-size"></span>', ['reply', 'time' => $contact->time, 'email' => $contact->email], ['class' => '']) ?></td>
                                        <?php endif; ?>
                                    <?php else: ?>                       
                <tr> 
                                            <td><?= Html::encode($contact->id) ?></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><?= Html::encode($contactReply->body) ?></td>
                                            <td><?= Html::encode($contactReply->replyTime) ?></td>
                                            <td><?= Html::encode($contactReply->admin) ?></td>
                                        <?php if(Yii::$app->user->identity->userName == 'tsaffi'): ?>         
                                                    <td><?= Html::a('<span class="glyphicon glyphicon-share-alt glyph-size"></span>', ['reply', 'time' => $contact->time, 'email' => $contact->email], ['class' => '']) ?>
                                                        <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id'=>$contact->time], [
                                                            'class' => '',
                                                            'data' => [
                                                                'confirm' => 'Are you sure you want to delete this item?',
                                                                'method' => 'post',
                                                            ],
                                                        ])?>
                                                    </td>
                                        <?php else: ?>
                                            <td><?= Html::a('<span class="glyphicon glyphicon-share-alt glyph-size"></span>', ['reply', 'time' => $contact->time, 'email' => $contact->email], ['class' => '']) ?></td>
                                        <?php endif; ?>                                       
                                    <?php endif; ?>
                                    <?php $i++; ?>
                </tr>           
                            <?php endforeach; ?>
                    <?php else: ?>
                            <td></td>
                            <td></td>
                            <td></td>
                        <?php if(Yii::$app->user->identity->userName == 'tsaffi'): ?>         
                                    <td><?= Html::a('<span class="glyphicon glyphicon-share-alt glyph-size"></span>', ['reply', 'time' => $contact->time, 'email' => $contact->email], ['class' => '']) ?>
                                        <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id'=>$contact->time], [
                                            'class' => '',
                                            'data' => [
                                                'confirm' => 'Are you sure you want to delete this item?',
                                                'method' => 'post',
                                            ],
                                        ])?>
                                    </td>
                        <?php else: ?>
                            <td><?= Html::a('<span class="glyphicon glyphicon-share-alt glyph-size"></span>', ['reply', 'time' => $contact->time, 'email' => $contact->email], ['class' => '']) ?></td>
                        <?php endif; ?>
                    <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>


    <?= LinkPager::widget(['pagination' =>  $pagination]) ?>

</div>

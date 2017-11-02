<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\models\Customer;
use app\models\Bus;

$this->title = 'Book Your Seat';
?>
<div class="container">
    <div class="row">
        <div class="form-style-10">
            <h1><?= Html::encode($this->title) ?></h1>
            <p>
                JourneyId : <?= Html::encode($model1->journeyId) ?>

                <span class="color:red">Journey : <?= Html::encode($model1->journey) ?></span>
            </p>

            <?= Html::beginForm(['/site/bbook-seat', 'id' => $model1->journeyId], 'post', ['class'=>'form-horizontal']) ?>

                <div class="section"><span>1</span>Customer Name</div> 
                    <div class="inner-wrap">
                        <input type="text" name="customerName" maxlength="100" value="<?php if(isset($_POST['customerName'])) {echo $_POST['customerName'];} ?>" required />
                    </div>
                <div class="section"><span>2</span>Telephone No</div> 
                    <div class="inner-wrap">
                        <input type="text" name="telNo" maxlength="9" name="telNo" value="<?php if(isset($_POST['telNo'])) {echo $_POST['telNo'];} ?>" required/>
                    </div>

                <div class="section"><span>3</span>Id Card No</div> 
                    <div class="inner-wrap">
                        <input type="text" name="idCard" value="<?php if(isset($_POST['idCard'])) {echo $_POST['idCard'];} ?>" required/>
                    </div>

                <?php

                    echo '<div class="section"><span>4</span>Sitting plan</div>'; 
                    
                    $i = 1;
                    //queries the customer table to obtain the seats already booked for a particular journey and displays them in a radiobutton disabled,
                    //while those not yet booked are displayed in a radiobutton(to be selected)
                    $model2 = Bus::findOne(['numberCode' => $model1->numberCode]); 
                    
                    while($i <= $model2->capacity)
                    {
                        if(($model3 = Customer::find()->indexBy('seat')->where([
                            'journeyId' => $model1->journeyId,
                            'seat' => $i,
                            'setSeat' => 'on',
                            ]))->one() !== null || $i == 1 || $i == 2){

                                if(($i > 1 && $i < 5) || ($i > 6 && $i < 10)){
                                    echo '  <label class="label1" for = "radioBtn'.$i.'">'.$i.'</label>
                                        <input type="radio" disabled name="seat" id = "radioBtn'.$i.'" value="'.$i.'" />
                                        ';    
                                }else{
                                    echo '  <label for = "radioBtn'.$i.'">'.$i.'</label>
                                        <input type="radio" disabled name="seat" id = "radioBtn'.$i.'" value="'.$i.'" />
                                        ';
                                }
                        }
                        else
                        {
                                if(($i > 1 && $i < 5) || ($i > 6 && $i < 10)){
                                    echo '  <label class="label1" for = "radioBtn'.$i.'">'.$i.'</label>
                                        <input type="radio" name="seat" id = "radioBtn'.$i.'" value="'.$i.'"/>
                                        ';
                                }else{
                                    echo '  <label for = "radioBtn'.$i.'">'.$i.'</label>
                                        <input type="radio" name="seat" id = "radioBtn'.$i.'" value="'.$i.'"/>
                                        ';                                    
                                }
                        }
                    
                    if($i % 5 == 0)
                    {
                        echo "<br>";
                    }
                        $i++;
                    }
                ?>
                        <?= Html::SubmitButton('Submit', ['class' => 'btn btn-primary']) ?>
            <?= Html::endForm() ?>
        </div>
    </div>
</div>













<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use app\models\Bus;

$this->title = 'Musango';
?>

<!-- this div is used to manage the modal of geting the tickek-->
<div class="receipt-index">
    <!--<h1 class="head"><?//= Html::encode($this->title) ?></h1>-->
        <div class="modal fade" role="dialog" tabindex="-1" aria-labelledby="gridSystemModalLabel" id="modalButton">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info" style="border-top-left-radius: 5px; border-top-right-radius: 5px">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title center" id="gridSystemModalLabel">Fill the information to get your receipt</h4>
                </div><!-- /.modal-header -->
                    <div class="modal-body">
	                    <?php $form = ActiveForm::begin(['action' => ['/site/see']]); ?>

	                        <?= $form->field($receipt, 'customerId')?>
	                        <?= $form->field($receipt, 'journeyId')?>

	                        <div class="form-group">
	                            <?= Html::submitButton('send', ['class' => 'btn btn-info center-block']) ?>
	                        </div>

                        <?php ActiveForm::end(); ?>
                    </div><!-- /.modal-body -->
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
</div>

<div class="jumbotron" style="margin-top:-10px;">
	<?=Html::img("@web/images/bus2.jpeg", ['alt'=>'road', 'width' => '100%', 'height' => '100%']) ?>
	<div class="centered"><p style="color:white; font-size:2.5em;">Online Bus System, Booking with Zero Booking Fees</p></div>
	<div class="container">
		<div class="col-lg-4">
	  		<span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span>
			<?=Html::a('<p style=font-size:2.5em;>Book Seat</p>', ['site/book-seat'])?>
		</div>

		<div class="col-lg-4">
	  		<span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span>
			<?=Html::a('<p style=font-size:2.5em;>Cancel Ticket</p>', ['site/cancel-ticket'])?>
		</div>

		<div class="col-lgs-4">

	  		<span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span>
	  		<p style="font-size:2.5em;"><a data-toggle="modal" href="#modalButton">Get receipt</a></p>

 		</div>
	</div>
</div>
	<h3 style="text-align:center; padding-top:0px; color:blue;">Meet Musango bus system App</h3>
	<p style="text-align:center; padding-top:0px;">Musango bus system is a web application which provides real time travel experience in your hand</p>
	
	<div class="container-fluid">
		<div class="col-lg-4">
			<ul>
	        <span class="pattern">Top Bus Routes</span>                                                                   
	        <li><a id="route1" href="#" target="_blank" onclick="getdata('Douala','Yaounde');"> Douala to Yaounde</a></li>
	        <li><a id="route2" href="#" target="_blank" onclick="getdata('Yaounde','Douala');"> Yaounde to Douala</a></li>
	        <li><a id="route3" href="#" target="_blank" onclick="getdata('Bamenda','Yaounde');"> Bamenda to Yaounde</a></li>
	        <li><a id="route4" href="#" target="_blank" onclick="getdata('Yaounde','Bamenda');"> Yaounde to Bamenda</a></li>
	        <li><a id="route5" href="#" target="_blank" onclick="getdata('Douala','Bamenda');"> Douala to Bamenda</a></li>
	  	</ul>
      	</div>
          
        <div class="col-lg-4">  
	        <ul>
	            <li><a id="route6" href="#" target="_blank" onclick="getdata('Bamenda','Douala');"> Bamenda to Douala</a></li>                                                                 
	            <li><a id="route7" href="#" target="_blank" onclick="getdata('Yaounde','Ngaoundere');"> Yaounde to Ngaoundere</a></li>
	            <li><a id="route8" href="#" target="_blank" onclick="getdata('Yaounde','Bafoussam');"> Yaounde to Bafoussam</a></li>
	            <li><a id="route9" href="#" target="_blank" onclick="getdata('Buea','Bamenda');"> Buea to Bamenda</a></li>
	            <li><a id="route10" href="#" target="_blank" onclick="getdata('Bamenda','Buea');"> Bamenda to Buea</a></li>
	            <li class="fmore"><a href="InfoBusRoutes" target="_blank">more... </a></li>
	        </ul>
	    </div>
	    <div class="col-lg-4">

                    <p><i style="color: #F38B26;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></i><span> Need to book bus tickets on the go? </span></p>
                    <p><i style="color: #F38B26;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></i><span> To assist for all your bus booking</span></p>
                    <p><i style="color: #F38B26;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></i><span> Very easy to choose all bus types</span></p>
                    <p><i style="color: #F38B26;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></i><span> Cameroon's first bus booking app</span></p>
                    <p><i style="color: #F38B26;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></i><span> Get special rates found nowhere else</span></p>
                    <p><i style="color: #F38B26;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></i><span> Our team is available 24/7</span></p>
                    <p><i style="color: #F38B26;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></i><span> We ensure the safety and security</span></p>
	    </div>
	</div>

	<!--<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-left:auto;margin-right:auto">
<!--	<div id="myCarousel" class="carousel container slide" data-ride="carousel" style="margin-left:auto;margin-right:auto">-->
		<!-- Indicators -->
<!--		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
			<li data-target="#myCarousel" data-slide-to="3"></li>
		</ol>
-->		<!-- Wrapper for slides -->
	<!--	<div class="carousel-inner" role="listbox">

			<?php 
				//$i = 1; $j = 1;
				//$text = array(1=>
				/*		'Welcome to Musango express',
						'Security, Comfort,and Punctuality of our clients are our main aims',
						'Rent our buses for a period of time at an affordable price',
						'Contact our service client in case of any inquires, questions or problems',
						'Book and guarantee your seat online without stress',
						'Fast, Reliable, and Punctual',
						'We notify our clients 30 minutes before their journey departure time',
					);
			*/?>
			<?php
			//the loop below queries the bus table,obtain the bus images name,then display these images with the above array indices.
			//each array index is may be displayed more than once depending on the # of buses in the system.
			?>
				<?//php foreach($model as $model): ?>
					<?//php if($i == 1): ?>
						<div class="item active">
			            	<?//= Html::img("@web/images/$model->imageName",['class' => "img-rounded img-responsive", 'width' => '100%', 'height' => '100%']) ?>
							<div class="carousel-caption">
								<h3><?//= Html::encode($text['1']) ?></h3>
							</div>
						</div>
						<?//php $i++; $j++; ?>
					<?//php else: ?>
						<div class="item">
			            	<?//= Html::img("@web/images/$model->imageName",['class' => "img-rounded img-responsive",'width' => '100%', 'height' => '100%']) ?>
							<div class="carousel-caption">
								<h3><?//= Html::encode($text[$j]) ?></h3>
								<?php /*if($j == 6){
										$j = 0;
									}
										$j++;
								*/?>
							</div>
						</div>
					<?//php endif; ?>
				<?//php endforeach; ?>
<!--			
			<div class="item active">
				<img src="images/SW001" alt="virgin marry" class="megane">
				<div class="carousel-caption">
					<h3>The Mother of God</h3>
					<p>Holy marry mother of God pray for us sinners</p>
				</div>
			</div>

			<div class="item">
				<img src="images/SW002" alt="mesmer" class="megane">
				<div class="carousel-caption">
					<h3>Quand l'enfant etait encore jeune</h3>
					<p>How will girls not like him???</p>
				</div>			
			</div>
			
			<div class="item">
				<img src="images/SW003" alt="borel" class="megane">
				<div class="carousel-caption">
					<h3>My beloved brother</h3>
					<p>Together we will do great things brother</p>
				</div>			
			</div>
			
			<div class="item">
				<img src="images/SW001" alt="rostanie" class="megane">
				<div class="carousel-caption">
					<h3>A beautiful couple</h3>
					<p>Even if she isn't that much beautiful, she is smartly dressed</p>
				</div>			
			</div>

-->	<!--		</div>
	<!Left and right controls 
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="" aria-hidden="true"></span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="" aria-hidden="true"></span>
		</a>
	</div>-->

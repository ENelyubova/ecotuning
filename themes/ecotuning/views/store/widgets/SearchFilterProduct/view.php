<?php if(model) : ?>
	<form action="">
		<div class="slider__select fl">
			<div class="wrapper-dropdown js-wrapper js-wrapper-brand">
			    <div class="wrapper-dropdown__header js-wrapper-open">
			    	<?php if(!$ajax): ?>
			    		<?php if($category): ?>
			    			<span><?= $model->name_short; ?></span>
			    		<?php else: ?>
		      				<span>Выберите марку техники</span>
	    				<?php endif; ?>
		      		<?php else: ?>
		      			<span>Выберите марку техники</span>
		      		<?php endif; ?>
			      <?= file_get_contents('.'. Yii::app()->getTheme()->getAssetsUrl() .'/images/icon/down.svg'); ?>
			    </div>
			    <div class="wrapper-dropdown__body js-wrapper-content">
					<div class="wrapper-dropdown__content">
						<ul class="select-options">
							<li><a class="<?= $ajax ? 'js-no-select': '' ?>" href="<?= Yii::app()->createUrl('store/product/index'); ?>">Выберите марку техники</a></li>
							<?php foreach(StoreCategory::getRootCategory() as $key=>$rootCategory): ?>
								<li>
									<a class="<?= $ajax ? 'js-loading-data': '' ?>" 
										data-id="<?= $rootCategory->id; ?>" 
										href="<?= $rootCategory->getCategoryUrl(); ?>"><?= $rootCategory->name_short; ?></a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
			    </div>
			</div>

			<div class="wrapper-dropdown js-wrapper js-wrapper-category <?= $ajax ? '' : ''; ?>">
			    <div class="wrapper-dropdown__header js-wrapper-open">
		      		<?php if(!$ajax): ?>
			      		<?php if($level == 2): ?>
			      			<span><?= $category->name_short; ?></span>
			      		<?php elseif($level == 3) : ?>
			      			<span><?= $category->parent->name_short; ?></span>
		      			<?php else: ?>
		      				<span>Выберите категорию</span>
			      		<?php endif; ?>
		      		<?php else: ?>
		      			<span>Выберите категорию</span>
		      		<?php endif; ?>
			      <?= file_get_contents('.'. Yii::app()->getTheme()->getAssetsUrl() .'/images/icon/down.svg'); ?>
			    </div>
			    <div class="wrapper-dropdown__body js-wrapper-content">
					<div class="wrapper-dropdown__content">
						<ul class="select-options">
							<li><a class="<?= $ajax ? 'js-no-select': '' ?>" href="<?= (!$ajax && $level >= 1) ? $model->getCategoryUrl(): '#' ?>">Выберите категорию</a></li>
							<?php if(!$ajax && $level >= 1): ?>
								<?php foreach ($model->children(['condition' => 'status=1']) as $key => $data): ?>
									<li>
										<a href="<?= $data->getCategoryUrl(); ?>"><?= $data->name_short; ?></a>
									</li>
								<?php endforeach; ?>
							<?php endif; ?>
						</ul>
					</div>
			    </div>
			</div>

			<div class="wrapper-dropdown js-wrapper js-wrapper-model <?= $ajax ? '' : ''; ?>">
			    <div class="wrapper-dropdown__header js-wrapper-open">
			    	<span><?= (!$ajax && $level == 3) ? $category->name_short : 'Выберите модель'; ?></span>
			      <?= file_get_contents('.'. Yii::app()->getTheme()->getAssetsUrl() .'/images/icon/down.svg'); ?>
			    </div>
			    <div class="wrapper-dropdown__body js-wrapper-content">
					<div class="wrapper-dropdown__content">
						<ul class="select-options">
							<li><a class="<?= $ajax ? 'js-no-select': '' ?>" href="<?= (!$ajax && $level >= 2) ? $category->parent->getCategoryUrl(): '#' ?>">Выберите модель</a></li>
							<?php if(!$ajax): ?>
					      		<?php if($level == 2): ?>
					      			<?php foreach ($category->children as $key => $data): ?>
										<li>
											<a href="<?= $data->getCategoryUrl(); ?>"><?= $data->name_short; ?></a>
										</li>
									<?php endforeach; ?>
					      		<?php elseif($level == 3) : ?>
					      			<?php foreach ($category->parent->children(['condition' => 'status=1']) as $key => $data): ?>
										<li>
											<a href="<?= $data->getCategoryUrl(); ?>"><?= $data->name_short; ?></a>
										</li>
									<?php endforeach; ?>
					      		<?php endif; ?>
				      		<?php endif; ?>
						</ul>
					</div>
			    </div>
			</div>

	        <a href="<?= Yii::app()->createUrl('store/product/index'); ?>" class="btn btn-green select-btn <?= $ajax ? 'js-search-select': 'js-reload-page' ?>">Искать</a>
	    </div>
    </form>
<?php endif ; ?>
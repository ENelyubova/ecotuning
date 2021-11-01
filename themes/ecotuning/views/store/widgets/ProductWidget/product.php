<?php if($products): ?>
	<div class="product pt pb">
    	<div class="content-site">
			<div class="heading-block fl fl-w fl-ai-fe fl-jc-sb">
				<h2 class="heading">Владельцы этой техники <br>уже зарабатывают больше!</h2>
				<div class="product-arrows">
			    	<div class="arrows fl fl-ai-c"></div>
			    </div>
			</div>
		    <div class="product-slider slick-slider">
				<?php foreach($products as $data): ?>
						<?php $this->render('../../product/_item-home', ['data'=>$data, 'button'=>true]); ?>
				<?php endforeach; ?>
		    </div>

		    <?php foreach($products as $data): ?>
			    <div id="product<?= $data->id; ?>" class="modal product-modal fade" role="dialog">
				    <div class="modal-dialog" role="document">
				        <div class="modal-content">
				            <div class="modal-header box-style">
				                <div data-dismiss="modal" class="modal-close"><i class="fa fa-times" aria-hidden="true"></i><div></div></div>
				            </div>
				            <div class="modal-body">
			                    <?php $attributes = $data->getAttributeGroups(); ?>
			                    <?php if (!empty($attributes)): ?>
			                        <div class="attributes-wrap">
			                            <div class="product-attributes js-product-attributes">
			                                <?php foreach ($data->getAttributeGroups() as $groupName => $items) : ?>
			                                    <?php foreach ($items as $attribute) : ?>
			                                        <?php
			                                        $value = AttributeRender::renderValue($attribute, $data->attribute($attribute));
			                                        if (empty($value)) {
			                                            continue;
			                                        }
			                                        ?>
			                                        <div class="product-attributes__item js-product-attributes-item fl fl-w fl-ai-fs ? 'hidden' : ''; ?>">
			                                            <div class="product-attributes__name"><span><?= CHtml::encode($attribute->title); ?></span></div>
			                                            <div class="product-attributes__val"><?= $value; ?></div>
			                                        </div>
			                                        <?php $count++; ?>
			                                    <?php endforeach; ?>
			                                <?php endforeach; ?>
			                                
			                                    <div class="product-attributes__after"></div>
			                            </div>
			                        </div>
			                    <?php endif; ?>
				            </div>
				        </div>
				    </div>
			    </div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>
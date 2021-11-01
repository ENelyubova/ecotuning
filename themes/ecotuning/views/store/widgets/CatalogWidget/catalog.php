<?php if($category) : ?>
	<?php foreach ($category as $key => $data) : ?>
		<div class="catalog-block__item">
			<div class="catalog-block__title">
				<a href="<?= $data->getCategoryUrl(); ?>" class="catalog-name"><?= $data->name; ?></a>
				<?php $child = $data->children(); ?>
				<?php if($child) : ?>
					<ul class="child-block">
						<?php foreach ($child as $key => $item) : ?>
		                    <li><a href="<?= $item->getCategoryUrl(); ?>" class="subcategory-name"><?= $item->name; ?></a></li>
			            <?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
			<div class="catalog-block__img fl fl-jc-c fl-ai-c">
				<a href="<?= $data->getCategoryUrl(); ?>">
					<?= CHtml::image($data->getImageUrl(245,260,false), '', []); ?>
				</a>
			</div>
		</div> 
	<?php endforeach; ?>
<?php endif; ?>    

<?php if(model) : ?>
	<form action="">
		<div class="slider__select fl">
			<?= CHtml::dropDownList('brand','', StoreCategory::getRootCategory(), [
				'empty' => 'Выберите марку техники'
			]); ?>

	        <select id="category">
	            <option value="hide">Выберите категорию</option>
	            <option value="культиватор">Культиватор</option>
	            <option value="каток">Каток</option>
	            <option value="комбайн">Комбайн</option>
	        </select>

	        <select id="model">
	            <option value="hide">Выберите модель</option>
	            <option value="111">111</option>
	            <option value="222">222</option>
	            <option value="333">333</option>
	        </select>
	        <button type="submit" class="btn btn-green select-btn">Искать</button>
	    </div>
    </form>
<?php endif ; ?>
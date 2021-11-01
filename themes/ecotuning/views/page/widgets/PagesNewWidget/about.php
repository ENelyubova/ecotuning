<?php if($pages) : ?>
    <div class="about pt pb">
        <div class="content-site">
        	<h2 class="heading heading-block"><?= $pages->getAttributeValue('box1')['name']; ?></h2>
            <div class="about-block fl fl-w">
                <?= $pages->getAttributeValue('box1')['value']; ?>
            </div>
            <?php 
                $companyButName = $pages->getAttributeValue('box1')['butName'];
                $companyButLink = $pages->getAttributeValue('box1')['butLink'];
             ?>
            <div class="about-btn fl fl-ai-c fl-jc-sb">
            	<?php if($companyButLink) : ?>
                    <a class="btn btn-green" href="<?= $companyButLink; ?>">
                        <?= ($companyButName) ?: 'О компании'; ?>
                    </a>
        	    <?php endif; ?>
        	    <?php if (Yii::app()->hasModule('contentblock')) : ?>
                    <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'about']); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

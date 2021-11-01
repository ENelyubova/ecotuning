<?php if($category) : ?>
    <ul>
        <?php foreach ($category as $key => $data) : ?>
            <li>
                <a href="#selectionModal" data-toggle="modal">
                    Подобрать <?= $data->name; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>    
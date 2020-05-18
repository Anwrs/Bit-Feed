<?php 
if (count($errors) > 0 ) : ?>
    <div class="errors-box">
    <?php foreach ($errors as $error) : ?>
            <ul>
                <li><?= $error ?></li>
            </ul>
            <?php endforeach; ?>
        </div>
<?php endif; ?>



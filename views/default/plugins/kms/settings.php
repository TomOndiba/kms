<div>
    <label><?php echo elgg_echo("Заголовок на главной"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'params[kms_intro_title]', 'value' => $vars['entity']->kms_intro_title)); ?>
</div>
<div>
    <label><?php echo elgg_echo("Текст на главной"); ?></label><br />
    <?php echo elgg_view('input/longtext',array('name' => 'params[kms_intro_text]', 'value' => $vars['entity']->kms_intro_text)); ?>
</div>
<div>
    <label><?php echo elgg_echo("О сайте"); ?></label><br />
    <?php echo elgg_view('input/longtext',array('name' => 'params[kms_about_text]', 'value' => $vars['entity']->kms_about_text)); ?>
</div>
<div>
    <label><?php echo elgg_echo("Правила коротко на главной"); ?></label><br />
    <?php echo elgg_view('input/longtext',array('name' => 'params[kms_terms_text_short]', 'value' => $vars['entity']->kms_terms_short)); ?>
</div>
<div>
    <label><?php echo elgg_echo("Правила"); ?></label><br />
    <?php echo elgg_view('input/longtext',array('name' => 'params[kms_terms_text]', 'value' => $vars['entity']->kms_terms_text)); ?>
</div>
<div>
    <label><?php echo elgg_echo("Конфиденциальность"); ?></label><br />
    <?php echo elgg_view('input/longtext',array('name' => 'params[kms_privacy_text]', 'value' => $vars['entity']->kms_privacy_text)); ?>
</div>

    


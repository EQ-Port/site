<?php
/**
 * @var Controller $this
 * @var AuthForm $form
 * @var CActiveForm $htmlForm
 */

$fields = $form->getAttributesByScenario();
?>
<h1>Регистрация нового пользователя</h1>
<div class="form">
    <?
    $htmlForm = $this->beginWidget(
        'CActiveForm',
        array(
            'id' => 'register-form',
            'method' => 'post',
            'enableClientValidation' => false,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        )
    );
    ?>
    <?= $htmlForm->errorSummary($form) ?>

    <? foreach ($fields as $field) { ?>
        <div class="row">
            <?= $htmlForm->labelEx($form, $field) ?>
            <?
                switch ($field) {
                    case 'password':
                    case 'repeatPassword':
                        echo $htmlForm->passwordField($form, $field);
                        break;
                    default:
                        echo $htmlForm->textField($form, $field);
                }
            ?>
        </div>
    <? } ?>
    <div class="row buttons">
        <?= CHtml::submitButton('Зарегистрироваться'); ?>
    </div>
    <? $this->endWidget() ?>
</div>

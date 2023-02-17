<?php
$session = $this->request->getSession()->read('Contact');
?>
<div class="page-contact">
    <div class="page-contact__inner">
        <div class="contact">
            <div class="contact__inner">
                <div class="contact__form">
                    <div class="contact__head">
                        <h2 class="contact__title">お問い合わせ内容の確認</h2>
                        <span class="contact__lead">
                            入力内容にお間違えがないか確認の上、「送信」ボタンを押してください。<br />
                            再度ご入力される場合は「戻る」ボタンを押してください。
                        </span>
                    </div>
                    <?= $this->Form->create(null, ['url' => '/pages/inquiry/complete', 'class' => 'parts-form'])?>
                    <div class="parts-form__item">
                        <label for="name" class="parts-form__label">名前<span class="parts-form__tag parts-form__tag--required">必須</span></label>
                        <span class="parts-form__confirmation-text"><?= h($session['name'])?></span>
                    </div>
                    <div class="parts-form__item">
                        <label for="email" class="parts-form__label">メールアドレス<span class="parts-form__tag parts-form__tag--required">必須</span></label>
                        <span class="parts-form__confirmation-text"><?= h($session['email'])?></span>
                    </div>
                    <div class="parts-form__item">
                        <label for="inquiry-details" class="parts-form__label">問い合わせ内容<span class="parts-form__tag parts-form__tag--required">必須</span></label>
                        <span class="parts-form__confirmation-text"><?= h($session['content'])?></span>
                    </div>
                    <div class="parts-form__button-wrap">
                        <?= $this->Form->button('送信する', ['class' => 'parts-form__submit-button'])?>
                        <a href="/pages/inquiry" class="parts-form__cancel-button">戻る</a>
                    </div>
                    <?= $this->Form->end()?>
                </div>
            </div>
        </div>
    </div>
</div>

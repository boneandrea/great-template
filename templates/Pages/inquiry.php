<?php
	$session = $this->request->getSession()->read('Contact');
	?>
<div class="page-contact">
    <div class="page-contact__inner">
        <div class="contact">
            <div class="contact__inner">
                <div class="contact__form">
                    <div class="contact__head">
                        <h2 class="contact__title">お問い合わせ</h2>
                        <span class="contact__lead">
                            お問合せからご返答までに<br />
                            5営業日ほどかかることがありますので<br class="for-sp" />ご了承ください
                        </span>
                    </div>
                    <?= $this->Form->create(null, ['url' => '/pages/inquiry/confirm', 'class' => 'parts-form'])?>
                    <div class="parts-form__item">
                        <label for="name" class="parts-form__label">名前<span class="parts-form__tag parts-form__tag--required">必須</span></label>
                        <?= $this->Form->control('Contact[name]', [
								'id' => 'name',
								'class' => 'parts-form__input parts-form__input--error',
								'required' => true,
								'label' => false,
								'value' => $session['name'] ?? '',
								])?>
                    </div>
                    <span class="parts-form__error-message">エラーメッセージを表示。エラーメッセージを表示。</span>
                    <div class="parts-form__item">
                        <label for="email" class="parts-form__label">メールアドレス<span class="parts-form__tag parts-form__tag--required">必須</span></label>
                        <?= $this->Form->control('Contact[email]', [
								'id' => 'email',
								'class' => 'parts-form__input parts-form__input--error',
								'required' => true,
								'label' => false,
								'value' => $session['email'] ?? '',
								])?>
                    </div>
                    <span class="parts-form__error-message">エラーメッセージを表示。エラーメッセージを表示。</span>
                    <div class="parts-form__item">
                        <label for="inquiry-details" class="parts-form__label">問い合わせ内容<span class="parts-form__tag parts-form__tag--required">必須</span></label>
                        <?= $this->Form->control('Contact[content]', [
								'id' => 'inquiry-details',
								'cols' => 30,
								'rows' => 10,
								'class' => 'parts-form__textarea parts-form__input--error',
								'required' => true,
								'label' => false,
								'value' => $session['content'] ?? '',
								])?>
                    </div>
                    <span class="parts-form__error-message">エラーメッセージを表示。エラーメッセージを表示。</span>
                    <?= $this->Form->submit('送信', ['class' => 'parts-form__submit-button'])?>
                    <?= $this->Form->end()?>
                </div>
            </div>
        </div>
    </div>
</div>

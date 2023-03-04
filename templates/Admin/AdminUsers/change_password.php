<?php
	$this->assign('title', 'パスワード再設定');
	?>
<div class="wrapper">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="container mt-5">
                <?= $this->Flash->render()?>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">管理者パスワード再設定</h3>
                    </div>
                    <?= $this->Form->create($user, ['class' => 'parts-form']) ?>
                    <div class="card-body">
                        <label for="email">パスワード</label>
                        <div class="form-group input-group ">
                            <?= $this->Form->input('password', ['type' => 'password', 'required' => true, 'class' => 'form-control', 'label' => false])?>
                            <?= $this->Form->input('visible-password', ['label' => false, 'type' => 'text', 'class' => 'form-control', 'style' => 'display:none'])?>
                            <?= $this->Form->control('password_confirm', ['label' => false, 'type' => 'text', 'style' => 'display:none'])?>
                            <span class="input-group-text" id="js-toggle-password-icon"><i class="fa fa-eye"></i></span>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">設定</button>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    q("[name=password]").addEventListener("input",e=>{
        q('[name="visible-password"]').value=e.target.value
        q('[name="password_confirm"]').value=e.target.value
    })
    q('[name="visible-password"]').addEventListener("input",e=>{
        q('[name="password"]').value=e.target.value
        q('[name="password_confirm"]').value=e.target.value
    })
    q('[name="visible-password"]').addEventListener("input",e=>{
        q('[name="password"]').value=e.target.value
        q('[name="password_confirm"]').value=e.target.value
    })
    q("#js-toggle-password-icon").addEventListener("click",e=>{
        const span=e.target.closest("span")
        const i=q("i",span)
        if(q("[name=visible-password]").style.display==="none"){
            q("[name=visible-password]").style.display="block"
            q("[name=password]").style.display="none"
            i.className="fa fa-eye-slash"
        }else{
            q("[name=visible-password]").style.display="none"
            q("[name=password]").style.display="block"
            i.className="fa fa-eye"
        }
    })
</script>

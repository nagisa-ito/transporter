<template>
    <div class="column is-6 is-offset-3">

        <div class="field is-horizontal mb-30">
            <div class="field-label is-normal">
                <label class="label">姓</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <p class="control is-expanded has-icons-left">
                        <input class="input" type="text" placeholder="大黒丸">
                        <span class="icon is-small is-left"><i class="fas fa-user"></i></span>
                    </p>
                </div>
            </div>
        </div>

        <div class="field is-horizontal mb-30">
            <div class="field-label is-normal">
                <label class="label">名</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <p class="control is-expanded has-icons-left">
                        <input class="input" type="text" placeholder="こづち">
                        <span class="icon is-small is-left"><i class="fas fa-user"></i></span>
                    </p>
                </div>
            </div>
        </div>

        <div class="field is-horizontal mb-30">
            <div class="field-label is-normal">
                <label class="label">部署</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="select">
                        <!-- Laravel側から変数取り込み -->
                        <select>
                            <option>セールスマーケティング部</option>
                            <option>CRM戦略推進部</option>
                            <option>CRMマネジメントサービス部</option>
                            <option>開発部</option>
                            <option>管理部</option>
                            <option>日本通販CRM協会</option>
                            <option>事業開発室</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

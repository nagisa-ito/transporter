<template>
    <div class="column is-6 is-offset-3">

        <div class="field is-horizontal mb-30">
            <div class="field-label is-normal">
                <label class="label">Eメール</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <p class="control is-expanded has-icons-left">
                        <input class="input" type="email" placeholder="xxx.yyy@e-grant.net">
                        <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                    </p>
                </div>
            </div>
        </div>

        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">パスワード</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <p class="control is-expanded has-icons-left">
                        <input class="input" type="password" placeholder="Enter Password">
                        <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                    </p>
                </div>
            </div>
        </div>

        <div class="field is-horizontal mb-30">
            <div class="field-label is-normal">
                <!-- Left empty for spacing -->
            </div>
            <div class="field-body">
                <div class="field">
                    <p class="control is-expanded has-icons-left">
                        <input class="input" type="password" placeholder="Re-enter Password">
                        <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                    </p>
                </div>
            </div>
        </div>

    </div>
</template>

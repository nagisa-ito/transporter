<template>
    <div class="columns">
        <div class="column is-one-third is-offset-one-third">
            <div class="box">
                <div class="field">
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" type="email" placeholder="Email">
                        <span class="icon is-small is-left">
                            <font-awesome-icon icon="envelope"></font-awesome-icon>
                        </span>
                    </p>
                </div>

                <div class="field">
                    <p class="control has-icons-left">
                        <input class="input" type="password" placeholder="Password">
                        <span class="icon is-small is-left">
                            <font-awesome-icon icon="lock"></font-awesome-icon>
                        </span>
                    </p>
                </div>

                <div class="field">
                    <router-link to="/users" class="button is-fullwidth is-dark">サインイン</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  name: 'Signin'
}
</script>

<style>
.test {
    background: pink;
}
</style>

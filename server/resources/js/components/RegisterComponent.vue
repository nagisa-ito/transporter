<template>
    <div class="container">
        <div class="column is-8 is-offset-2">
            <h2 class="title">Register</h2>
            <progress class="progress is-small is-primary" max="100" value="25">30%</progress>
        </div>

        <!-- <component v-bind:is="currentTabComponent"></component> -->
        <email-pass-component v-show="true"></email-pass-component>
        <user-name-component v-show="false"></user-name-component>
        <sections-component v-show="false"></sections-component>

        <div class="column is-8 is-offset-2">
            <button class="button is-primary pull-right" @click='currentTab="user-name-component"'>
                Next
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return { currentTab: 'sections-component' };
        },
        computed: {
            currentTabComponent: function () {
                return this.currentTab;
            },

        }
    }
</script>

<style>
/* .v-enter-active, .v-leave-active {
  transition: opacity .5s;
}
.v-enter, .v-leave-to {
  opacity: 0;
} */
</style>

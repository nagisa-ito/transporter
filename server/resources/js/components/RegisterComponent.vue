<template>
    <div class="container">
        <div class="column is-8 is-offset-2">
            <h2 class="title">Register</h2>
            <progress class="progress is-small is-primary" max="100" value="25">30%</progress>
        </div>

        <!-- <div v-show="pages.email_pass">
            <email-pass-component></email-pass-component>
            <div class="column is-8 is-offset-2">
                <button class="button is-primary pull-right" @click='slideNextPage("user_name")'>
                    Next
                </button>
            </div>
        </div>

        <div v-show="pages.user_name">
            <user-name-component></user-name-component>
            <div class="column is-8 is-offset-2">
                <button class="button is-primary pull-right" @click='slideNextPage("sections")'>
                    Next
                </button>
            </div>
        </div>

        <div v-show="pages.sections">
            <sections-component></sections-component>
            <div class="column is-8 is-offset-2">
                <button class="button is-primary pull-right" @click='slideNextPage("email_pass")'>
                    Next
                </button>
            </div>
        </div> -->
        <email-pass-component></email-pass-component>
        <user-name-component></user-name-component>
        <sections-component></sections-component>

    </div>
</template>

<script>
    export default {
        data: function () {
            return { 
                pages: true
                //pages : {email_pass : true, user_name : true, sections : false }
            };
        },
        methods: {
            slideNextPage: function(page_name) {
                // for (const key in this.pages) {
                //     this.pages[key] = (page_name == key) ? true : false;
                // }
            }
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

<template>
    <transition name="slide-fade">
        <div class="modal is-active" v-show="showModal">
            <div class="modal-background"></div>
            <div class="modal-card">

                <header class="modal-card-head">
                    <p class="modal-card-title"><small>申請を追加</small></p>
                    <button class="delete" aria-label="close" @click="showModal = false"></button>
                </header>

                <section class="modal-card-body">
                    <div>

                        <b-field label="日付">
                            <b-datepicker
                                placeholder="yyyy-mm-dd"
                                icon="calendar-alt"
                                v-model="form.date">
                            </b-datepicker>
                        </b-field>

                        <div class="columns">
                            <div class="column is-4">
                                <!-- TODO: optionをDBから持ってくる -->
                                <div class="field">
                                    <label class="label">分類</label>
                                    <div class="field-body">
                                        <div class="field">
                                            <div class="select is-fullwidth">
                                                <select v-model="form.type">
                                                    <option>通勤費</option>
                                                    <option>定期代</option>
                                                    <option>営業交通費</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="column is-4">
                                <div class="field">
                                    <label class="label">交通手段</label>
                                    <div class="field-body">
                                        <div class="field">
                                            <div class="select is-fullwidth">
                                                <select v-model="form.transportation_id">
                                                    <option>電車</option>
                                                    <option>バス</option>
                                                    <option>タクシー</option>
                                                    <option>飛行機</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="column is-4">
                                <div class="field">
                                    <label class="label">経路</label>
                                    <div class="field-body">
                                        <div class="field">
                                            <div class="select is-fullwidth">
                                                <select v-model="form.is_oneway">
                                                    <option>往復</option>
                                                    <option>片道</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">訪問先</label>
                            <div class="field-body">
                                <div class="field">
                                    <p class="control is-expanded has-icons-left">
                                        <input v-model="form.name" class="input" type="text" required>
                                        <span class="icon is-small is-left"><i class="fas fa-building"></i></span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <!-- TODO: bulma-datepickerを導入 -->
                            <label class="label">利用区間</label>
                            <div class="field-body">
                                <div class="field">
                                    <p class="control is-expanded has-icons-left">
                                        <input v-model="form.from" class="input" type="txt" required placeholder="乗車駅">
                                        <span class="icon is-small is-left"><i class="fas fa-train"></i></span>
                                    </p>
                                </div>
                                <div class="field">
                                    <p class="control is-expanded has-icons-left">
                                        <input v-model="form.to" class="input" type="txt" required placeholder="降車駅">
                                        <span class="icon is-small is-left"><i class="fas fa-train"></i></span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">費用</label>
                            <div class="field-body">
                                <div class="field">
                                    <p class="control is-expanded has-icons-left">
                                        <input v-model="form.cost" class="input" type="number" required>
                                        <span class="icon is-small is-left"><i class="fas fa-yen-sign"></i></span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">概要</label>
                            <div class="control">
                                <textarea v-model="form.overview" class="textarea"></textarea>
                            </div>
                        </div>
                    </div>
                </section>

                <footer class="modal-card-foot">
                    <button class="button is-success" @click="submitRequestDetails()"><strong>保存する</strong></button>
                    <button class="button" @click="showModal = false">キャンセル</button>
                </footer>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    data () {
        return {
            form: {
                date: new Date(),
                selected: '',
                type: '',
                transportation_id: '',
                is_oneway: '',
                name: '',
                from: '',
                to: '',
                cost: '',
                overview: ''
            },
        }
    },
    props: ['showModal'],
    methods : {
        submitRequestDetail: function () {
            console.log(this.form)
            // Axios.get('api/request_details')
            // .then(res => {
            //     this.request_details = res.data
            // })
        }
    },
    mounted: function () {
        console.log(this.showModal)
    }
}
</script>

<style>
.slide-fade-enter-active {
  transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);;
}
.slide-fade-leave-active {
  transition: all .3s ease;
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateY(-5px);
  opacity: 0;
}
</style>

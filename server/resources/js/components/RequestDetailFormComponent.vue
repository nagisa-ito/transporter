<template>
    <div class="modal is-active">
        <div class="modal-background" @click.self="$parent.closeModal()"></div>
        <div class="modal-card">

            <header class="modal-card-head">
                <p class="modal-card-title"><small>申請を追加</small></p>
                <button class="delete" aria-label="close" @click="$parent.closeModal()"></button>
            </header>

            <section class="modal-card-body">
                <form id="submit-request-detail">

                    <!-- TODO: デフォルトは表示中の年月にする -->
                    <b-field label="日付">
                        <b-datepicker
                            placeholder="yyyy-mm-dd"
                            icon="calendar-alt"
                            :date-formatter="dateFormatter"
                            v-model="datepicker">
                        </b-datepicker>
                    </b-field>

                    <div class="columns">
                        <div class="column is-4">
                            <div class="field">
                                <label class="label">分類</label>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="select is-fullwidth">
                                            <select v-model="form.type">
                                                <option v-for="type in $parent.types" :value="type.id">
                                                    {{ type.name }}
                                                </option>
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
                                                <option v-for="transportation in $parent.transportations" :value="transportation.id">
                                                    {{ transportation.name }}
                                                </option>
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
                                                <option value="0">往復</option>
                                                <option value="1">片道</option>
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
                        <label class="label">利用区間</label>
                        <div class="field-body">
                            <div class="field">
                                <p class="control is-expanded has-icons-left">
                                    <input v-model="form.from" class="input" type="text" required placeholder="乗車駅">
                                    <span class="icon is-small is-left"><i class="fas fa-train"></i></span>
                                </p>
                            </div>
                            <div class="field">
                                <p class="control is-expanded has-icons-left">
                                    <input v-model="form.to" class="input" type="text" required placeholder="降車駅">
                                    <span class="icon is-small is-left"><i class="fas fa-train"></i></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">費用</label>
                        <div class="field-body">
                            <div class="field has-addons">
                                <p class="control is-expanded has-icons-left">
                                    <input v-model="form.cost" class="input" type="number" required>
                                    <span class="icon is-small is-left"><i class="fas fa-yen-sign"></i></span>
                                </p>
                                <p class="control">
                                    <a class="button is-danger"><strong>x2</strong></a>
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
                </form>
            </section>

            <footer class="modal-card-foot">
                <button class="button is-success" @click="submitRequestDetail()" type="submit"><strong>保存する</strong></button>
                <button class="button" @click="$parent.closeModal()">キャンセル</button>
            </footer>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            form: {
                date: '',
                type: 1,
                transportation_id: 1,
                is_oneway: 0,
                name: '',
                from: '',
                to: '',
                cost: '',
                overview: ''
            },
            // buefyのdatepickerではDate型のみ許可され、YYYY-MM-DDの形式をそのまま代入できない。
            // そのため一旦この変数に代入し、POST時にdateFormatter()で変換したものをコピーして代入する
            datepicker: new Date(),
        }
    },
    methods : {
        validateRequestDetail: function () {
            const elem = document.getElementById("submit-request-detail")
            if (!elem.reportValidity()) {
                return false
            }
            return true
        },
        submitRequestDetail: function () {
            if (!this.validateRequestDetail()) {
                return
            }

            this.form.date = this.dateFormatter(this.datepicker)

            Axios.get('api/request_details/store')
            .then(res => {
                this.request_details = res.data
                console.log(res.data)
            })
        },
        dateFormatter: function (date) {
            return moment(date).format('YYYY-MM-DD')
        }
    },
}
</script>


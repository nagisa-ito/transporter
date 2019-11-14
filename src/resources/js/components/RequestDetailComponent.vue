<template>
    <div>
        <article class="message">
            <div class="message-body">
                <small>
                    <strong>【提出期限】翌月3日 (3日が休日の場合、1営業日前)</strong><br><br>
                    【注意】<br>
                    提出期限厳守でお願いいたします。<br>
                    特に年度末(12月分清算)は次月清算ができませんので、その分の交通費がお支払いできなくなる場合があります。<br>
                    その他、提出期限が変わる場合がありますので都度チャットワークをご確認ください。
                </small>
            </div>
        </article>

        <hr>
        <nav class="level">
            <a class="button">
                <span class="icon">
                    <i class="fas fa-angle-left fa-lg"></i>
                </span>
            </a>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">date</p>
                    <p class="title">{{ year_month }}</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">total</p>
                    <p class="title">{{ total_cost }}</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">count</p>
                    <p class="title">12</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">check</p>
                    <p class="title">
                        <span v-if="check" class="icon has-text-success"><i class="fas fa-check"></i></span>
                        <span v-else class="icon has-text-danger"><i class="fas fa-times"></i></span>
                    </p>
                </div>
            </div>
            <a class="button">
                <span class="icon">
                    <i class="fas fa-angle-right fa-lg"></i>
                </span>
            </a>
        </nav>
        <hr>

        <div class="box">
            <div class="buttons is-right">
                <button class="button">
                    <span class="icon"><i class="far fa-file-excel"></i></span>
                    <span>Excel</span>
                </button>
                <button class="button is-success" @click="storeRequestDetail()">
                    <span class="icon"><i class="fas fa-plus"></i></span>
                    <span><strong>追加</strong></span>
                </button>
                <button class="button is-success">
                    <span class="icon"><i class="fas fa-check"></i></span>
                    <span><strong>確定する</strong></span>
                </button>
            </div>

            <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                <thead>
                    <tr>
                        <th class="has-text-centered is-size-7">ID</th>
                        <th class="has-text-centered is-size-7">日付</th>
                        <th class="has-text-centered is-size-7">分類</th>
                        <th class="has-text-centered is-size-7">経路</th>
                        <th class="has-text-centered is-size-7">交通手段</th>
                        <th class="has-text-centered is-size-7">訪問先</th>
                        <th class="has-text-centered is-size-7" colspan="2">利用区間</th>
                        <th class="has-text-centered is-size-7">費用</th>
                        <th class="has-text-centered is-size-7" colspan="3">備考</th>
                        <th class="has-text-centered is-size-7">操作</th>
                    </tr>
                </thead>
                <tbody v-if="request_details.length > 0">
                    <tr v-for="(request_detail, index) in request_details" :key="index">
                        <th class="has-text-centered is-size-7">{{ request_detail.id }}</th>
                        <td class="has-text-centered is-size-7">{{ request_detail.date }}</td>
                        <td class="has-text-centered is-size-7">{{ request_detail.type }}</td>
                        <td class="has-text-centered is-size-7">{{ request_detail.transportation_id }}</td>
                        <td class="has-text-centered is-size-7">{{ request_detail.is_oneway }}</td>
                        <td class="has-text-centered is-size-7">{{ request_detail.name }}</td>
                        <td class="has-text-centered is-size-7">{{ request_detail.from }}</td>
                        <td class="has-text-centered is-size-7">{{ request_detail.to }}</td>
                        <td class="has-text-centered is-size-7">{{ request_detail.cost }}</td>
                        <td class="has-text-centered is-size-7" colspan="3">{{ request_detail.overview }}</td>
                        <td class="has-text-centered is-size-7">
                            <div class="buttons is-centered">
                                <a href="#" @click="updateRequestDetail(request_detail)">
                                    <button class="button is-link is-small">
                                        <span class="icon is-small"><i class="fas fa-edit"></i></span>
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <tbody v-else>
                    <tr>
                        <td colspan="13">
                            <p class="text-center has-text-grey-light"><small>登録済みの区間がありません</small></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- 申請追加モーダル -->
        <transition name="slide-fade">
            <div class="modal is-active" v-show="show_modal">
                <div class="modal-background" @click.self="closeModal()"></div>
                <div class="modal-card">

                    <header class="modal-card-head">
                        <p class="modal-card-title"><small>申請を{{ modal_title }}</small></p>
                        <button class="delete" aria-label="close" @click="closeModal()"></button>
                    </header>

                    <section class="modal-card-body">
                        <form id="submit-request-detail">

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
                                                        <option v-for="type in types" :value="type.id">
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
                                                        <option v-for="transportation in transportations" :value="transportation.id">
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
                        <button class="button" @click="closeModal()">キャンセル</button>
                    </footer>
                </div>
            </div>
        </transition>

    </div>
</template>

<script>
const num_formatter = new Intl.NumberFormat('ja-JP');

export default {
    data: function() {
        return {
            show_modal: false,
            modal_title: '追加',
            year_month: '2019/10',
            total_cost: num_formatter.format(12304),
            count: num_formatter.format(12),
            check: false,
            request_details: {
            },
            form: this.initFormData(),
            datepicker: new Date(), // BuefyのDatepickerがDate型での登録しかできないので別に保管しておく
        }
    },
    props: ['transportations', 'types'],
    created: function() {
        Axios.get('api/request_details')
        .then(res => {
            this.request_details = res.data
        })
    },
    methods: {
        openModal: function () {
            this.show_modal = true;
        },
        closeModal: function () {
            this.show_modal = false;
            this.form = this.initFormData();
            this.datepicker = new Date();
        },
        initFormData: function () {
            return {
                date: '',
                type: 1,
                transportation_id: 1,
                is_oneway: 0,
                name: '',
                from: '',
                to: '',
                cost: '',
                overview: ''
            };
        },
        validateRequestDetail: function () {
            const elem = document.getElementById("submit-request-detail")
            if (!elem.reportValidity()) {
                return false
            }
            return true
        },
        updateRequestDetail: function(request_detail) {
            this.modal_title = '編集';
            this.form = Object.assign({}, request_detail);
            this.datepicker = new Date(request_detail.date);
            this.openModal();
        },
        storeRequestDetail: function () {
            this.modal_title = '追加';
            this.openModal();
        },
        submitRequestDetail: function () {
            this.form.date = this.dateFormatter(this.datepicker);
            if (!this.validateRequestDetail()) {
                return;
            }

            const action_url = (this.form.id) ? 'api/request_details/update' : 'api/request_details/store';
            console.log(action_url);
            Axios.post(action_url, this.form)
                .then(res => {
                    this.request_details = res.data
                    console.log(res.data)
                })
                .catch(err => {
                    console.log(err.response.data)
                })
        },
        dateFormatter: function (date) {
            return moment(date).format('YYYY-MM-DD')
        }
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

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
                <button class="button is-success" @click="show_modal = true">
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
                                <a href="#">
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

        <transition name="slide-fade">
        <div class="modal is-active" v-show="show_modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title"><small>申請を追加</small></p>
                    <button class="delete" aria-label="close" @click="show_modal = false"></button>
                </header>
                <section class="modal-card-body">
                    <request-detail-form-component></request-detail-form-component>
                </section>
                <footer class="modal-card-foot">
                    <button class="button is-success" @click="show_modal = false"><strong>保存する</strong></button>
                    <button class="button" @click="show_modal = false">キャンセル</button>
                </footer>
            </div>
        </div>
        </transition>

    </div>
</template>

<script>
const num_formatter = new Intl.NumberFormat('ja-JP');

import Datepicker from 'vuejs-datepicker';
export default {
    components: {
        Datepicker
    },
    data: function() {
        return {
            show_modal: false,
            year_month: '2019/10',
            total_cost: num_formatter.format(12304),
            count: num_formatter.format(12),
            check: false,
            request_details: {
            }
        }
    },
    created: function() {
        Axios.get('api/request_details')
        .then(res => {
            this.request_details = res.data
        })
    },
    methods: {

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

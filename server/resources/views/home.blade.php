@extends('layouts.app')

@section('title', 'home')

@push('css')
@endpush

@push('scripts')
@endpush

@section('page-title', 'yyyy年mm月分')

@section('content')
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
            <p class="heading">合計</p>
            <p class="title">13,456</p>
        </div>
    </div>
    <div class="level-item has-text-centered">
        <div>
            <p class="heading">件数</p>
            <p class="title">12</p>
        </div>
    </div>
    <div class="level-item has-text-centered">
        <div>
            <p class="heading">確定</p>
            <p class="title">
                <span class="icon has-text-danger"><i class="fas fa-times"></i></span>
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
    <div class="columns">
        <div class="column is-half">
            <h5 class="subtitle is-5">申請一覧</h5>
        </div>
        <div class="column is-half">
            <div class="buttons is-right">
                <button class="button is-right">
                    <span class="icon"><i class="far fa-file-excel"></i></span>
                    <span>Excel</span>
                </button>
                <button class="button is-success">
                    <span class="icon"><i class="fas fa-plus"></i></span>
                    <span><strong>追加</strong></span>
                </button>
                <button class="button is-success">
                    <span class="icon"><i class="fas fa-check"></i></span>
                    <span><strong>確定する</strong></span>
                </button>
            </div>
        </div>
    </div>

<table class="table is-bordered is-striped is-hoverable is-fullwidth">
    <thead>
        <tr>
            <th class="has-text-centered">ID</th>
            <th class="has-text-centered">日付</th>
            <th class="has-text-centered">分類</th>
            <th class="has-text-centered">交通手段</th>
            <th class="has-text-centered">訪問先</th>
            <th class="has-text-centered" colspan="2">利用区間</th>
            <th class="has-text-centered">費用</th>
            <th class="has-text-centered" colspan="3">備考</th>
            <th class="has-text-centered">操作</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th class="has-text-centered">1</th>
            <td class="has-text-centered">2019-10-08</td>
            <td class="has-text-centered">営業交通費</td>
            <td class="has-text-centered">電車</td>
            <td class="has-text-centered">TOC五反田ビル</td>
            <td class="has-text-centered">目黒</td>
            <td class="has-text-centered">五反田</td>
            <td class="has-text-centered">¥157</td>
            <td class="has-text-centered" colspan="3">メモメモメモメモ</td>
            <td class="has-text-centered">
                <div class="buttons is-centered">
                    <a href="#">
                        <button class="button is-link is-small">
                            <span class="icon is-small"><i class="fas fa-edit"></i></span>
                        </button>
                    </a>
                    {{-- 削除 --}}
                    @component('components.delete-link')
                        @slot('table', 'sections')
                        @slot('id', 1)
                        @slot('name', 'name')
                        @slot('class', 'button is-danger is-small')
                        @slot('div', '')
                    @endcomponent
                </div>
            </td>
        </tr>
        <tr>
            <th class="has-text-centered">1</th>
            <td class="has-text-centered">2019-10-08</td>
            <td class="has-text-centered">営業交通費</td>
            <td class="has-text-centered">電車</td>
            <td class="has-text-centered">TOC五反田ビル</td>
            <td class="has-text-centered">目黒</td>
            <td class="has-text-centered">五反田</td>
            <td class="has-text-centered">¥157</td>
            <td class="has-text-centered" colspan="3">メモメモメモメモ</td>
            <td class="has-text-centered">
                <div class="buttons is-centered">
                    <a href="#">
                        <button class="button is-link is-small">
                            <span class="icon is-small"><i class="fas fa-edit"></i></span>
                        </button>
                    </a>
                    {{-- 削除 --}}
                    @component('components.delete-link')
                        @slot('table', 'sections')
                        @slot('id', 1)
                        @slot('name', 'name')
                        @slot('class', 'button is-danger is-small')
                        @slot('div', '')
                    @endcomponent
                </div>
            </td>
        </tr>
        <tr>
            <th class="has-text-centered">1</th>
            <td class="has-text-centered">2019-10-08</td>
            <td class="has-text-centered">営業交通費</td>
            <td class="has-text-centered">電車</td>
            <td class="has-text-centered">TOC五反田ビル</td>
            <td class="has-text-centered">目黒</td>
            <td class="has-text-centered">五反田</td>
            <td class="has-text-centered">¥157</td>
            <td class="has-text-centered" colspan="3">メモメモメモメモ</td>
            <td class="has-text-centered">
                <div class="buttons is-centered">
                    <a href="#">
                        <button class="button is-link is-small">
                            <span class="icon is-small"><i class="fas fa-edit"></i></span>
                        </button>
                    </a>
                    {{-- 削除 --}}
                    @component('components.delete-link')
                        @slot('table', 'sections')
                        @slot('id', 1)
                        @slot('name', 'name')
                        @slot('class', 'button is-danger is-small')
                        @slot('div', '')
                    @endcomponent
                </div>
            </td>
        </tr>
        <!-- <tr>
            <td colspan="12"><p class="text-center has-text-grey-light">登録済みの区間がありません</p></td>
        </tr> -->
    </tbody>
</table>
</div>

@endsection

@extends('layouts.app')

@section('title', 'sections')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/section.css') }}">
@endpush

@push('scripts')
@endpush

@section('page-title', 'お気に入り区間一覧')

@section('content')
<div class="notification is-light">
    お気に入り区間の一覧を確認します。<br><br>

    <a href="#"><strong>お気に入り区間とは？</strong></a><br>
    定期とは別に区間を登録することが出来ます。よく訪問するクライアントや施設の名前を登録することで、登録時の手間を軽減します。<br>
    ここで登録された項目は、交通費の申請ページから呼び出すことが出来ます。
</div>

<div class="column is-10 is-offset-1">
    <table class="table is-center is-fullwidth">
        <thead>
            <tr>
                <th>ID</th>
                <th>タイトル</th>
                <th>乗車駅</th>
                <th>降車駅</th>
                <th>費用</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if ($sections->count())
                @foreach($sections as $section)
                    <tr>
                        <th>{{ $section->id }}</th>
                        <td>{{ $section->name }}</td>
                        <td>{{ $section->from }}</td>
                        <td>{{ $section->to }}</td>
                        <td>¥{{ number_format($section->cost) }}</td>
                        <td>
                            <div class="buttons is-right">
                                <a href="{{ url('sections/' . $section->id . '/edit') }}">
                                    <button class="button is-link is-small">
                                        <span class="icon is-small"><i class="fas fa-edit"></i></span>
                                    </button>
                                </a>
                                {{-- 削除 --}}
                                @component('components.delete-link')
                                    @slot('table', 'sections')
                                    @slot('id', $section->id)
                                    @slot('name', $section->name)
                                    @slot('class', 'button is-danger is-small')
                                    @slot('div', '')
                                @endcomponent
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6"><p class="text-center">登録済みの区間がありません</p></td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

<div class="column text-center">
    <a class="button is-link" href="{{ url('sections/create/0') }}">
        <span class="icon"><i class="fas fa-plus"></i></span>
        <span><strong>お気に入り区間を追加</strong></span>
    </a>
</div>
@endsection

@extends('layouts.app')

@section('title', 'sections')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/section.css') }}">
@endpush

@push('scripts')
@endpush

@section('page-title', '定期一覧')

@section('content')
<div class="notification is-light">
    定期の一覧を確認します。<br>
    <strong>定期券が複数ある場合は複数登録することができます。</strong><br>
    (例: 東急東横線(横浜〜渋谷)→JR(渋谷〜五反田)の場合は、東急とJRの定期を分けて登録します。)<br><br>

    <!-- TODO: 定期自動更新機能 -->
    <strong>自動申請をONにすることで、定期の申請月(1月, 4月, 7月, 10月)に自動的に定期を申請します。</strong>
</div>

<div class="columns is-multiline">
    @foreach($sections as $section)
    <div class="column is-4">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">{{ $section->name }}</p>
            </header>
            <div class="card-content" style="">
                <div id="passport-background">
                    <div id="passport-content">
                        <div class="text-center">
                            <span class="title is-3">{{ $section->from }}</span>
                            <span class="subtitle is-4 ml-5"><i class="fas fa-arrows-alt-h"></i></span>
                            <span class="title is-3 ml-5">{{ $section->to }}</span>
                            <br>
                            <span class="subtitle is-5">¥{{ number_format($section->cost) }}</span>
                        </div>
                    </div>

                    <div class="passport-decor parallelogram" style="top: 0; left:24px;">
                    </div>
                    <div class="passport-decor" style="top: 0; left:0;">
                    </div>
                </div>
            </div>
            <footer class="card-footer">
                <a href="{{ url('sections/' . $section->id . '/edit') }}" class="card-footer-item"><i class="fas fa-edit"></i></a>

                {{-- 削除 --}}
                @component('components.delete-link')
                    @slot('table', 'sections')
                    @slot('id', $section->id)
                    @slot('name', $section->name)
                    @slot('class', 'button is-link is-inverted')
                    @slot('div', 'card-footer-item')
                @endcomponent
            </footer>
        </div>
    </div>
    @endforeach
</div>

<div class="column text-center">
    <a class="button is-link" href="{{ url('sections/create/1') }}">
        <span class="icon"><i class="fas fa-plus"></i></span>
        <span><strong>定期を追加</strong></span>
    </a>
</div>
@endsection

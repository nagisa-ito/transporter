@extends('layouts.app')

@section('title', 'home')

@push('css')
@endpush

@push('scripts')
@endpush

@section('page-title', '申請一覧')

@section('content')
    <request-detail-component
        :types="{{ $types }}"
        :transportations="{{ $transportations }}">
    </request-detail-component>
@endsection

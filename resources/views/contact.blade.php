@extends('layouts.app')
@section('description')
{{ __('main.description') }}
@endsection
@section('title')
WatchMe - {{ __('main.contact') }}
@endsection
@section('content')
<h1 class="beige font-weight-bold text-center">{{ __('main.contact') }}</h1>
<form action="{{ route('contact') }}" method="POST">
    @csrf
    <div class="d-flex flex-column align-items-center text-light">
        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
        <input type="hidden" name="login" value="{{ Auth::user()->login }}">
        <label for="subject" class="beige font-weight-bold  fs-20">{{ __('Subject') }}</label>
        <input type="text" name="subject" id="subject"
            class="responsive-input shadow rounded @error('subject') is-invalid @enderror" value="{{ old('subject') }}"
            required>
        @error('subject')
        <div class="invalid-feedback responsive-input">{{ $message }}</div>
        @enderror
        <label for="content" class="mt-4 beige font-weight-bold  fs-20">{{ __('Content') }}</label>
        <textarea rows="10" name="content" id="content"
            class="responsive-input shadow rounded @error('content') is-invalid @enderror" value="{{ old('content') }}"
            placeholder="{{ __('Content') }}" required></textarea>
        @error('content')
        <div class="invalid-feedback responsive-input">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn bg-beige shadow justify-content-center font-weight-bold my-4 fs-20">
            {{ __('Send') }}
        </button>
    </div>
</form>


@endsection
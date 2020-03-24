@extends('layouts.app')
@section('description')
Regardez des films en ligne sur WatchMe, depuis votre PC, votre tablette ou votre téléphone.
@endsection
@section('title')
WatchMe - Contact
@endsection
@section('content')
<h1 class="beige font-weight-bold text-center">{{ __('Contact') }}</h1>
<form action="{{ route('contact') }}" method="POST">
    @csrf
    <div class="d-flex flex-column align-items-center text-light">
        <label for="object" class="beige font-weight-bold  fs-20">{{ __('Object') }}</label>
        <input type="text" name="object" id="object"
            class="responsive-input shadow rounded @error('object') is-invalid @enderror" value="{{ old('object') }}"
            required>
        @error('object')
        <div class="invalid-feedback responsive-input">{{ $message }}</div>
        @enderror
        <label for="content" class="mt-4 beige font-weight-bold  fs-20">{{ __('Content') }}</label>
        <textarea rows="10" name="content" id="content"
            class="responsive-input shadow rounded @error('content') is-invalid @enderror" value="{{ old('content') }}"
            placeholder="Votre message" required></textarea>
        @error('content')
        <div class="invalid-feedback responsive-input">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn bg-beige shadow justify-content-center font-weight-bold my-4 fs-20">
            {{ __('Send') }}
        </button>
    </div>
</form>
@endsection
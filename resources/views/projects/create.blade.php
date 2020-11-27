@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="heading has-text-weight-bold is-size-4">New Project</h1>

    <form method="POST" action="/projects">
        @csrf
        <div class="field">
            <label class="label" for="name">name</label>

            <div class="control">
                <input class="input @error('name') is-danger @enderror" type="text" name="name" id="" value="{{ old('name') }}">

                @error('name')
                <p class="help is-danger">{{ $errors->first('name') }}</p>
                @enderror
            </div>
        </div>
        <label for="start">Start date:</label>

        <input type="date" id="" name="start_date">

        <label for="start">End date:</label>
        <input type="date" id="" name="end_date">

        <div class="">
            <div class="control">
                <button class="button is-link" type="submit">Submit</button>

            </div>
        </div>
    </form>
</div>
@endsection

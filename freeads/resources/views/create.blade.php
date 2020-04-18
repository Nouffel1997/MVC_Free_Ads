@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add a new ad</h1>
    <hr>
    <form method="POST" action="{{ route('ad.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Ad title</label>
            <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" aria-describedby="title" name="title">
            @if ($errors->has('title'))
            <span class="invalid-feedback">{{ $errors->first('title') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="description">Ad description</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Ad price</label>
            <input type="text" class="form-control" id="price" name="price">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
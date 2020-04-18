@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('ad.search') }}" onsubmit="search(event)">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" id="words">
        </div>
        <button type="submit" class="btn btn-primary">Research</button>
        @foreach ($ads as $ad)
        <div class="card" style="width: 18rem;">
            
            <div class="card-body">
                <h5 class="card-title">Title : {{ $ad->title }}</h5>
                <p class="card-text">Description : {{ $ad->description }}</p>
                <p class="card-text">Price : {{ $ad->price }} $</p>
                <p class="card-text">Published at : {{ $ad->created_at }}</p>
            </div>
        </div>
        @endforeach
        {{ $ads->links() }}
</div>
@endsection

@section('extra-js')

<script>
    function search(event){
        event.preventDefault()
        const words = document.querySelector('#words').value
        const url = document.querySelector('#searchform').getAttribute('action');

        axios.post(`${url}`, {
                words: words,
            })
        .then(function(response) {
            console.log(reponse);
            
        })
        .catch(function(error) {
            console.log(error)
        });

    }
</script>
@endsection

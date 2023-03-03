@extends('index')

@section('menuBar')
    <div class="container-fluid">
        <form id="logupform" action="{{ route('signUp') }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="credentials"></label>
                <input id="inpNum01" class="form-control" type="text" placeholder="credentials" name="credentials">
                <div class="form-text">insert your credentias</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="name"></label>
                <input id="inpNum02" class="form-control" type="text" placeholder="names" name="name">
                <div class="form-text">insert your names</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="lastnames"></label>
                <input id="inpNum03" class="form-control" type="text" placeholder="lastnames" name="lastname">
                <div class="form-text">insert your lastnames</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="password"></label>
                <input id="inpNum04" class="form-control" type="password" placeholder="password" name="password">
                <div class="form-text">insert your password</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="email"></label>
                <input id="inpNum05" class="form-control" type="Addres" placeholder="email" name="password">
                <div class="form-text">insert your email</div>
            </div>
            <button class="btn btn-purple" type="submit">Submit</button>
        </form>
    </div>
@endsection

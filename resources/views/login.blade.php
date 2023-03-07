@extends('index')

@section('menuBar')
    <div id="Response" class="container-fluid">

        @if (session('success'))
            <h5 class="alert alert-success">{{ session('success') }}</h5>
            <hr>
        @elseif (session('fail'))
            <h5 class="alert alert-danger">{{ session('fail') }}</h5>
            <hr>
        @endif

        <div class="container-ms aling-self-center bg-red ">
            @error('email')<p class="from-text text-danger">{{ $message }}</p>@enderror
            @error('password')<p class="from-text text-danger">{{ $message }}</p>@enderror
            @error('lastname')<p class="from-text text-danger">{{ $message }}</p>@enderror
            @error('credentials')<p class="form-text text-danger">{{ $message }}</p>@enderror
            @error('name')<p class="from-text text-danger">{{ $message }}</p>@enderror
        </div>

        <button id="open-logDialog" class="btn btn-primary text-light">Register now</button>
    </div>
    dialog.modal-x/container-x.modal-fullscreen.modal-dialog-scrollable.OptDialog#NameDialog>form.modal-content#nameForm>div.modal-header>h5.modal-title{nameModel}>^div.modal-body
    <dialog id="logDialog" class="container-lg modal-dialog-scrollable">
    <form id="logupform" class="modal-content" action="{{ route('signUp') }}" method="post">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title">Register</h5>
        </div>

        <div class="modal-body d-flex">
            <div class="col mb-3">
                <label class="form-label" for="credentials">ti0x</label>
                <input id="inpNum01" class="form-control" type="text" placeholder="credentials" name="credentials">
                @error('credentials')<p class="form-text text-danger">{{ $message }}</p>@enderror
            </div>
            <div class="col mb-3">
                <label class="form-label" for="name">ti0x</label>
                <input id="inpNum02" class="form-control" type="text" placeholder="names" name="name">
                @error('name')<p class="from-text text-danger">{{ $message }}</p>@enderror
            </div>
            <div class="col mb-3">
                <label class="form-label" for="lastnames">ti0x</label>
                <input id="inpNum03" class="form-control" type="text" placeholder="lastnames" name="lastname">
                @error('lastname')<p class="from-text text-danger">{{ $message }}</p>@enderror
            </div>
            <div class="col mb-3">
                <label class="form-label" for="password">ti0x</label>
                <input id="inpNum04" class="form-control" type="password" placeholder="password" name="password">
                @error('password')<p class="from-text text-danger">{{ $message }}</p>@enderror
            </div>
            <div class="col mb-3">
                <label class="form-label" for="email">ti0x</label>
                <input id="inpNum05" class="form-control" type="Addres" placeholder="email" name="email">
                @error('email')<p class="from-text text-danger">{{ $message }}</p>@enderror
            </div>
            <button id="close-logDialog" class="btn btn-purple" type="submit">Submit</button>
        </div>
    </form>
    </dialog>
    <script type="text/javascript">
document.addEventListener('DOMContentLoaded', ()=>{
    document.querySelector('#open-logDialog').addEventListener('click', ()=>{
        document.querySelector('#logDialog').showModal()
    })
    document.querySelector('#close-logDialog').addEventListener('click', ()=>{
        document.querySelector('#logDialog').close()
    })
})
    </script>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Sections') }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sections.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" value="{{ old('name') }}" name="name" placeholder="Send name">
                                <span>{{ $errors->first('name') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" value="{{ old('description') }}" name="description" placeholder="Send description">
                                <span>{{ $errors->first('description') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <div class="custom-file">
                                    <span>Logo</span>
                                    <input type="file" name="logo" class="custom-file-input" id="logo">
                                    <label class="custom-file-label" for="customFile">Select file</label>
                                    <span>{{ $errors->first('logo') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <h4>Users</h4>
                                @foreach($users as $user)
                                    <div class="form-check">
                                            <input name="user_id[]" class="form-check-input" type="checkbox" id="gridCheck1" value="{{ $user->id }}">
                                        <label class="form-check-label" for="gridCheck1">
                                            {{ $user->name }} (<a href="">{{ $user->email }}</a>)
                                        </label>
                                    </div>
                                @endforeach
                                <span>{{ $errors->first('user_id') }}</span>
                            </div>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

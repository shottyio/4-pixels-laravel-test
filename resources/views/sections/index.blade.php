@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Section') }}
                        <a href="{{ route('sections.create') }}" type="button" class="btn btn-primary btn-sm ">Add</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                            @foreach($sections as $section)
                                <tr>
                                    <td>{{ $section->name }}</td>
                                    <td>
                                        <b>{{ $section->name }}</b><br>
                                        {{ $section->description }}
                                    </td>
                                    <td>{{ $section->created_at }}</td>
                                    <td>
                                        <form method="post" action="{{ route('sections.destroy', $section->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('sections.edit', $section->id) }}" type="button"
                                               class="btn btn-secondary btn-sm">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

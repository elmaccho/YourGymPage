@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-10">
            <h1> {{ __('shop.user.index_title') }}</h1>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('shop.user.fields.name') }}</th>
            <th scope="col">{{ __('shop.user.fields.surname') }}</th>
            <th scope="col">{{ __('shop.user.fields.email') }}</th>
            <th scope="col">{{ __('shop.user.fields.phone_number') }}</th>
            <th scope="col">{{ __('shop.user.fields.pass_type') }}</th>
            <th scope="col">{{ __('shop.user.fields.actions') }}</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->surname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>{{ $user->pass_type }}</td>
                    <td>
                        <button class="btn btn-danger btn-sm delete" data-id="{{ $user->id }}">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
</div>
@endsection
@section('javascript')
    const deleteUrl = "{{ url('users') }}/";
    const confirmDelete = "{{ __('shop.messages.delete_title') }}";
    const moreInfoDelete = "{{ __('shop.messages.delete_more_info') }}";
    const deleteAgree = "{{ __('shop.messages.delete_agree') }}";
    const deleteCancel = "{{ __('shop.messages.delete_cancel') }}";
@endsection
@section('js-files')
    @vite('resources/js/delete.js');
@endsection
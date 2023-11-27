@extends('layouts.app')

@section('content')
<div class="container">
    @include('helpers.flash-messages')
    <div class="row">
        <div class="col-10">
            <h1><i class="fa-solid fa-users"></i> {{ __('shop.user.index_title') }}</h1>
        </div>
    </div>
    <table class="table table-striped">
        {{-- <div class="row">
            <form class="d-flex" id="searchForm" action="{{ route('users.search') }}" method="GET">
                <input id="search_input" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
            </form>
        </div> --}}
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
        <tbody id="item_wrapper">
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->surname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>{{ $user->pass_type }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}">
                            <button class="btn btn-success btn-sm ">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </a>
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
    {{-- @vite('resources/js/search.js'); --}}
@endsection
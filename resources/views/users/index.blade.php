@extends('layouts.app')

@section('content')
<div class="container">
    @include('helpers.flash-messages')
    <div class="row">
        <div class="col-10">
            <h1 class="text-light"><i class="fa-solid fa-users "></i> {{ __('shop.user.index_title') }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="user-dashboard-info-box table-responsive mb-0 p-4 shadow-sm user-list-w">
                {{-- <table class="table manage-candidates-top mb-2">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Dane użytkownika</th>
                        <th class="text-center">Typ karnetu</th>
                        <th class="action text-right">Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="candidates-list">
                                <div class="inner-wrapper">
                                    <td><strong>{{ $user->id }}</strong></td>
                                    <td class="title">
                                        <div class="thumb">
                                            @if (!is_null($user->image_path))
                                                    <img class="img-fluid" src="{{ asset('storage/'. $user->image_path) }}" alt="">
                                                @else
                                                    <img class="img-fluid" src="{{ asset('storage/user/defaultUser.jpg') }}" alt="">
                                            @endif
                                        </div>
                                        <div class="candidate-list-details">
                                            <div class="candidate-list-info">
                                                <div class="candidate-list-title">
                                                    <h5 class="mb-0">{{ $user->name }} {{ $user->surname }}</h5>
                                                </div>
                                                <div class="candidate-list-option">
                                                    <ul class="list-unstyled user-data">
                                                        <li><i class="fa-solid fa-at"></i> {{ $user->email }}</li>
                                                        <li><i class="fa-solid fa-phone"></i> {{ $user->phone_number }}</li>
                                                        <li><i class="fas fa-map-marker-alt pr-1"></i>
                                                            @if ($user->hasAddress())
                                                                    {{ $user?->address?->city }} {{ $user?->address?->home_no }} {{ $user?->address?->zip_code }}    
                                                                @else
                                                                    Brak danych adresowych
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </div>
                                <td class="candidate-list-favourite-time text-center">
                                    @if ($user->hasPassType())
                                            {{ $user?->passType?->name }}
                                        @else
                                            Brak informacji o karnecie
                                    @endif
                                </td>
                                <td>
                                    <ul class="list-unstyled user-action">
                                        <li><a href="{{ route('users.edit', $user->id) }}" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a></li>
                                        <li><a href="#" class="text-danger delete" data-id="{{ $user->id }}" data-toggle="tooltip" title="" data-original-title="Delete"><i class="far fa-trash-alt"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('shop.user.fields.image') }}</th>
                            <th scope="col">{{ __('shop.user.fields.name') }}</th>
                            <th scope="col">{{ __('shop.user.fields.address.') }}</th>
                            <th scope="col">{{ __('shop.user.fields.pass_type') }}</th>
                            <th scope="col">{{ __('shop.user.fields.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)                    
                            <tr>
                                
                                <td data-label="#" class="mob-id">{{ $user->id }}</td>
                                <td data-label="Zdjęcie">
                                    <div class="user-image">
                                        @if (!is_null($user->image_path))
                                                <img class="img-fluid" src="{{ asset('storage/'. $user->image_path) }}" alt="">
                                            @else
                                                <img class="img-fluid" src="{{ asset('storage/user/defaultUser.jpg') }}" alt="">
                                        @endif
                                    </div>
                                </td>
                                <td data-label="Imię i nazwisko">{{ $user->name }} {{ $user->surname }}</td>
                                <td data-label="Adres">
                                    @if ($user->hasAddress())
                                        {{ $user->address->city }}
                                        @else
                                            Brak informacji adresowych
                                    @endif
                                </td>
                                <td data-label="Kategoria">
                                    @if ($user->hasPassType())
                                            {{ $user?->passType?->name }}
                                        @else
                                            Brak informacji o karnecie
                                    @endif
                                </td>
                                <td data-label="Akcje">
                                    <div class="d-flex justify-content-around">
                                        <a href="{{ route('users.edit', $user->id) }}" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="#" class="text-danger delete" data-id="{{ $user->id }}" data-toggle="tooltip" title="" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                {{ $users->links() }}
            </div>
        </div>
    </div>

</div>
@endsection
@vite('resources/css/users.css')
@section('javascript')
    const deleteUrl = "{{ url('users') }}/";
    const confirmDelete = "{{ __('shop.messages.delete_title') }}";
    const moreInfoDelete = "{{ __('shop.messages.delete_more_info') }}";
    const deleteAgree = "{{ __('shop.messages.delete_agree') }}";
    const deleteCancel = "{{ __('shop.messages.delete_cancel') }}";
@endsection
@section('js-files')
    @vite('resources/js/delete.js')
@endsection
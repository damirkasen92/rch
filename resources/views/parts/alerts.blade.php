@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if (session('errors'))
    <div class="alert alert-danger">
        <ul>
            @php
                $all = $errors->updateProfileInformation->getMessages();
            @endphp
            @foreach ($all as $name)
                @foreach ($name as $error)
                    <li>{{ $error }}</li>
                @endforeach
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('status'))
    @if (session('status') == 'profile-information-updated')
        <div class="alert alert-success">
            {{ __('Ваши личные данные были успешно изменены') }}
        </div>
    @endif
@endif

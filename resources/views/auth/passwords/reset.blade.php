@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div style="color: green;">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email }}">

                            <div>
                                <label for="password">Mật khẩu mới:</label>
                                <input id="password" type="password" name="password" required>
                            </div>

                            <div>
                                <label for="password_confirmation">Xác nhận mật khẩu:</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" required>
                            </div>

                            <div>
                                <button type="submit">Đặt lại mật khẩu</button>
                            </div>

                            @if ($errors->any())
                                <div style="color: red;">
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

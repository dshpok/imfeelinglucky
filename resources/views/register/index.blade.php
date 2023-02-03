@extends('layouts.common')
@section('content')
    <div id="register">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="register-form">
                        <div class="register-form__header">
                            <div class="register-form__header__title">
                                <h1>Register</h1>
                            </div>
                        </div>
                        <div class="register-form__body">
                            <form action="{{ route('register.create') }}" method="post" id="register_form">
                                @csrf
                                <div class="register-form__body__input">
                                    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
                                    @error('name')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="register-form__body__input">
                                    <input type="tel" name="phone_number" placeholder="phone number" value="{{ old('phone_number') }}">
                                    @error('phone_number')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="register-form__body__input">
                                    <input type="submit" value="Register" >
                                </div>
                            </form>
                        </div>
                        <div class="register-form__footer">
                            <div class="register-form__footer__text">
                                <p><span id="text_span" hidden="hidden"> You link is:</span> </p>
                                <p><span id="link"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


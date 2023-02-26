<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a  href="{{url('/')}}" class="logo">
                <img src="assets/images/logo.png">
            </a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- <div>
                <x-jet-label for="fname" value="{{ __('First Name') }}" />
                <x-jet-input id="fname" class="block mt-1 w-full" type="text" name="fname" :value="old('fname')"  autofocus autocomplete="fname" />
            </div>  --}}

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>


            <div class="mt-4">
                <x-jet-label for="phone" value="{{ __('Phone number') }}" />
                <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone" max="11" :value="old('phone')" />
            </div> 

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            {{-- <form action="{{route('signup')}}" method="POST">
                @csrf

                <div class="mt-4">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <input type="text" placeholder="name" id="name" name="name" class="form-controll" autofocus>
                    @if($errors->has('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                    @endif
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <input type="email" placeholder="email" id="email" name="email" class="form-controll" autofocus>
                    @if($errors->has('email'))
                    <span class="text-danger">{{$errors->first('email')}}</span>
                    @endif
                </div>

                <div class="mt-4">
                    <x-jet-label for="city" value="{{ __('City') }}" />
                    <input type="text" placeholder="city" id="city" name="city" class="form-controll" autofocus>
                    @if($errors->has('city'))
                    <span class="text-danger">{{$errors->first('city')}}</span>
                    @endif
                </div>

                <div class="mt-4">
                    <x-jet-label for="address" value="{{ __('Address') }}" />
                    <input type="text" placeholder="address" id="sddress" name="sddress" class="form-controll" autofocus>
                    @if($errors->has('address'))
                    <span class="text-danger">{{$errors->first('address')}}</span>
                    @endif
                </div>

                <div class="mt-4">
                    <x-jet-label for="phoneNum" value="{{ __('Phone') }}" />
                    <input type="text" placeholder="01*********" id="phoneNum" name="phoneNum" class="form-controll" autofocus>
                    @if($errors->has('phoneNum'))
                    <span class="text-danger">{{$errors->first('phoneNum')}}</span>
                    @endif
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <input type="password" placeholder="password" id="password" name="password" class="form-controll" autofocus>
                    @if($errors->has('password'))
                    <span class="text-danger">{{$errors->first('password')}}</span>
                    @endif
                </div>

                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div> 


            </form>
            <div>
                <div class="d-grid mx-auto">
                    <button type="submit" class="btn btn-dark btn-block">Register</button>
                </div>
            </div> --}}

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
                
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

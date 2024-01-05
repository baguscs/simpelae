 <!-- Content -->
<x-auth-session-status class="mb-4" />
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <x-auth-logo></x-auth-logo>
                    <!-- /Logo -->
                    <div class="text-welcome">
                        <h4 style="font-size: 20px" class="mb-2 text-body">Selamat Datang di SIMPELAE!</h4>
                        <p class="mb-4">Silahkan masuk ke akun anda</p>
                    </div>

                    <x-splade-form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                        @csrf
                        <x-splade-input id="email" type="email" name="email" :label="__('Email')" required autofocus />
                        <x-splade-input class="mt-3" id="password" autocomplete="off" type="password" name="password" :label="__('Password')" required autocomplete="current-password" />
                        <div class="mt-4">
                            <x-splade-submit class="btn btn-primary d-grid w-100" :label="__('Masuk')" />
                        </div>
                    </x-splade-form>
                </div>
            </div>
        </div>
    </div>
</div>

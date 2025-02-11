<style>
    .css_select_div {
        text-align: center;
    }

    .css_select {
        display: inline-table;
        width: 25%;
        padding: 5px;
        margin: 5px 2%;
        border: solid 1px #686868;
        border-radius: 5px;
    }
</style>
<script>
    $(document).ready(function() {
        $.getJSON('https://esgoo.net/api-tinhthanh/1/0.htm', function(data_tinh) {
            if (data_tinh.error == 0) {
                $.each(data_tinh.data, function(key_tinh, val_tinh) {
                    $("#tinh").append('<option value="' + val_tinh.id + '">' + val_tinh
                        .full_name + '</option>');
                });
                $("#tinh").change(function(e) {
                    var idtinh = $(this).val();
                    //Lấy quận huyện
                    $.getJSON('https://esgoo.net/api-tinhthanh/2/' + idtinh + '.htm', function(
                        data_quan) {
                        if (data_quan.error == 0) {
                            $("#quan").html('<option value="0">Quận Huyện</option>');
                            $("#phuong").html('<option value="0">Phường Xã</option>');
                            $.each(data_quan.data, function(key_quan, val_quan) {
                                $("#quan").append('<option value="' + val_quan
                                    .id + '">' + val_quan.full_name +
                                    '</option>');
                            });
                            //Lấy phường xã  
                            $("#quan").change(function(e) {
                                var idquan = $(this).val();
                                $.getJSON('https://esgoo.net/api-tinhthanh/3/' +
                                    idquan + '.htm',
                                    function(data_phuong) {
                                        if (data_phuong.error == 0) {
                                            $("#phuong").html(
                                                '<option value="0">Phường Xã</option>'
                                            );
                                            $.each(data_phuong.data,
                                                function(key_phuong,
                                                    val_phuong) {
                                                    $("#phuong").append(
                                                        '<option value="' +
                                                        val_phuong
                                                        .id + '">' +
                                                        val_phuong
                                                        .full_name +
                                                        '</option>');
                                                });
                                        }
                                    });
                            });

                        }
                    });
                });

            }
        });
    });
</script>
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="row">
            <div class="col-md-6">
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                        :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                        :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>
                <div class="mb-4">
                    <label for="">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                    @error('phone')
                        <div style="color: red">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="">Education</label>
                    <input type="text" name="education" value="{{ old('education', $user->education) }}"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                    @error('education')
                        <div style="color: red">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="">Degress</label>
                    <input type="text" name="degress" value="{{ old('degress', $user->degress) }}"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                    @error('degress')
                        <div style="color: red">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="">Language</label>
                    <input type="text" name="language" value="{{ old('language', $user->language) }}"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                    @error('language')
                        <div style="color: red">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="">Activitiy</label>
                    <input type="text" name="activities" value="{{ old('activities', $user->activities) }}"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                    @error('activities')
                        <div style="color: red">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-4">
                    <label for="">Specialty</label>
                    <select name="specialty_id" id=""
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                        <option value="General">General</option>
                        <option value="Private">Private</option>
                        <option value="ICU">ICU</option>
                    </select>
                    @error('specialty_id')
                        <div style="color: red">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="">WorkRoom</label>
                    <select name="workroom_id" id=""
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                        <option value="General">General</option>
                        <option value="Private">Private</option>
                        <option value="ICU">ICU</option>
                    </select>
                    @error('workroom_id')
                        <div style="color: red">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="">Province</label>
                    <select
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                        id="tinh" name="province" title="Chọn Tỉnh Thành">
                        <option value="0">Tỉnh Thành</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="">City</label>
                    <select
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                        id="quan" name="city" title="Chọn Quận Huyện">
                        <option value="0">Quận Huyện</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="">Ward</label>
                    <select
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                        id="phuong" name="ward" title="Chọn Phường Xã">
                        <option value="0">Phường Xã</option>
                    </select>
                </div>
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button style="background: #3fbbc0">{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

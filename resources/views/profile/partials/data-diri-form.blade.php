<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Edit Profile') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Update your profile information and photo.') }}
        </p>
    </header>

    <form method="post" action="{{ route('datadiri.store') }}" enctype="multipart/form-data" class="p-6">
        @csrf

        <div class="mb-4">
            <x-input-label for="nidn" value="{{ __('NIDN') }}" />
            <x-text-input
                id="nidn"
                name="nidn"
                type="text"
                class="mt-1 block w-full"
                placeholder="{{ __('Enter your NIDN') }}"
                required
            />
            <x-input-error :messages="$errors->get('nidn')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="nama" value="{{ __('Name') }}" />
            <x-text-input
                id="nama"
                name="nama"
                type="text"
                class="mt-1 block w-full"
                placeholder="{{ __('Enter your name') }}"
                required
            />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="jabatan" value="{{ __('Position') }}" />
            <x-text-input
                id="jabatan"
                name="jabatan"
                type="text"
                class="mt-1 block w-full"
                placeholder="{{ __('Enter your position') }}"
                required
            />
            <x-input-error :messages="$errors->get('jabatan')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="foto" value="{{ __('Photo') }}" />
            <input
                id="foto"
                name="foto"
                type="file"
                class="mt-1 block w-full"
                accept=".jpg, .jpeg, .png"
            />
            <x-input-error :messages="$errors->get('foto')" class="mt-2" />
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button>
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button class="ms-3">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </form>
</section>

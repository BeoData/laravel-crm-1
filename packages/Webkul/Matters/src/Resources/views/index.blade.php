<x-admin::layouts>
    <x-slot:title>
        Package Matters
    </x-slot:title>

    <div class="flex flex-col gap-4">
        <div
            class="flex items-center justify-between px-4 py-2 text-sm bg-white border border-gray-200 rounded-lg dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
            <div class="flex flex-col gap-2">
                <div class="flex items-center cursor-pointer">
                    <!-- Breadcrumbs -->
                    <x-admin::breadcrumbs name="products" />
                </div>

                <div class="text-xl font-bold dark:text-white">

                    @lang('matters::admin.app.matters.index.title')
                </div>
            </div>
            <div class="flex items-center gap-x-2.5">
                {!! view_render_event('admin.matters.index.create_button.before') !!}




            </div>
            @if (bouncer()->hasPermission('matters.create'))
            <div class="flex items-center gap-x-2.5">
                {!! view_render_event('admin.matters.index.create_button.before') !!}
                <a href="{{ route('admin.matters.create') }}" class="btn primary-button">
                    @lang('matters::admin.app.matters.index.create-btn')
                </a>
                {!! view_render_event('admin.matters.index.create_button.after') !!}
                <!-- Mesto za dugme ili akcije -->
                <!-- Možete dodati dugme ili akcije ako su potrebni -->
            </div>
            @endif
        </div>

        <!-- Ovaj deo možete koristiti za prikazivanje sadržaja ili DataGrid -->
        <div class="page-content">
            <x-admin::datagrid :src="route('admin.matters.index')">
                <x-admin::shimmer.datagrid />
            </x-admin::datagrid>
            <!-- Ovde možete dodati DataGrid ili bilo koji sadržaj specifičan za 'Matters' paket -->
        </div>
    </div>
</x-admin::layouts>
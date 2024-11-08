<x-admin::layouts>
    <x-slot:title>
        Create New Matter
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
                    @lang('matters::admin.app.matters.create.title')
                </div>
            </div>
        </div>

        <!-- Forma za kreiranje novog zapisa -->
        <div class="page-content">
            <form action="{{ route('admin.matters.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded-lg shadow dark:bg-gray-900">
                @csrf
                
                <!-- Polje za broj -->
                <div class="form-group">
                    <label for="number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        @lang('matters::admin.app.matters.form.number')
                    </label>
                    <input type="text" name="number" id="number" class="form-control mt-1 block w-full rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-300">
                </div>

                <!-- Polje za naslov -->
                <div class="form-group">
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        @lang('matters::admin.app.matters.form.title')
                    </label>
                    <input type="text" name="title" id="title" class="form-control mt-1 block w-full rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-300">
                </div>

                <!-- Polje za opis -->
                <div class="form-group">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        @lang('matters::admin.app.matters.form.description')
                    </label>
                    <textarea name="description" id="description" rows="4" class="form-control mt-1 block w-full rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-300"></textarea>
                </div>

                <!-- Polje za status -->
                <div class="form-group">
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        @lang('matters::admin.app.matters.form.status')
                    </label>
                    <select name="status" id="status" class="form-control mt-1 block w-full rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-300">
                        <option value="open">@lang('matters::admin.app.matters.status.open')</option>
                        <option value="pending">@lang('matters::admin.app.matters.status.pending')</option>
                        <option value="closed">@lang('matters::admin.app.matters.status.closed')</option>
                    </select>
                </div>

                <!-- Polja za ID-ove povezane osobe, organizacije i dodijeljeno osoblje -->
                <div class="form-group">
                    <label for="person_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        @lang('matters::admin.app.matters.form.person')
                    </label>
                    <input type="number" name="person_id" id="person_id" class="form-control mt-1 block w-full rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-300">
                </div>

                <div class="form-group">
                    <label for="organisation_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        @lang('matters::admin.app.matters.form.organisation')
                    </label>
                    <input type="number" name="organisation_id" id="organisation_id" class="form-control mt-1 block w-full rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-300">
                </div>

                <div class="form-group">
                    <label for="assigned_to" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        @lang('matters::admin.app.matters.form.assigned_to')
                    </label>
                    <input type="number" name="assigned_to" id="assigned_to" class="form-control mt-1 block w-full rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-300">
                </div>

                <!-- Polje za datum početka -->
                <div class="form-group">
                    <label for="start_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        @lang('matters::admin.app.matters.form.start_date')
                    </label>
                    <input type="date" name="start_date" id="start_date" class="form-control mt-1 block w-full rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-300">
                </div>

                <!-- Polje za datum zatvaranja -->
                <div class="form-group">
                    <label for="close_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        @lang('matters::admin.app.matters.form.close_date')
                    </label>
                    <input type="date" name="close_date" id="close_date" class="form-control mt-1 block w-full rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-300">
                </div>

                <!-- Dugme za potvrdu -->
                <div class="flex items-center gap-x-2.5">
                    <button type="submit" class="btn primary-button">
                        @lang('matters::admin.app.matters.create.submit')
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin::layouts>

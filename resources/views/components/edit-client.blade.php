<form class="max-w-5xl mx-auto" action="/clients/{{ $client->id }}" method="POST">
    @csrf
    @method('patch')
    <div class="w-full grid md:grid-cols-3 md:gap-16">
        <div class="">
            <div class="relative z-0 w-full mb-8 group">
                <input type="text" name="client_name" id="client_name" value="{{ $client->user->name }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder="" required />
                <label for="client_name"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Client
                    Name</label>
            </div>
            <div class="relative z-0 w-full mb-8 group">
                <input type="email" name="client_email" id="client_email" value="{{ $client->user->email }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder="" />
                <label for="client_email"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
            </div>


            <div class="relative z-0 w-full mb-8 group">
                <input type="text" name="client_job" id="client_job" value="{{ $client->job }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder="" />
                <label for="client_job"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Job</label>
            </div>
            <div class="relative z-0 w-full mb-8 group">
                <input type="text" name="client_job_description" id="client_job_description"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder="" value="{{ $client->job_description }}" />
                <label for="client_job_description"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Job
                    Description</label>
            </div>
            <div class="relative z-0 w-full mb-8 group">
                <input type="text" id="client_CF" name="client_CF" maxlength="16"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    oninput="validateCodiceFiscale(this)" placeholder="" value="{{ $client->CF }}">
                <label for="client_CF" id="client_CF"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    CF</label>
                <script>
                    function validateCodiceFiscale(input) {
                        // Pattern per il codice fiscale italiano
                        var cfPattern = /^[A-Za-z0-9]{16}$/;
                        if (cfPattern.test(input.value)) {
                            input.classList.remove('invalid');
                            input.classList.add('valid');
                        } else {
                            input.classList.remove('valid');
                            input.classList.add('invalid');
                        }
                    }
                </script>
            </div>
            <div class="relative z-0 w-full mb-8 group">
                <label for="client_regime"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Regime</label>
                <select id="client_regime" name="client_regime" value="{{ $client->regime_id }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value=1>Forfettario</option>
                    <option value=2>Ordinario</option>
                    <option value=3>Speciale</option>
                </select>
            </div>
        </div>
        <div>
            <div class="relative z-0 w-full mb-8 group">
                <input type="date" name="client_acquisition_date" value="{{ $client->acquisition_date }}"
                    id="client_acquisition_date" value="{{ now()->toDateString() }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="client_acquisition_date"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Acquisition
                    Date</label>
            </div>


            <div class="relative z-0 w-full mb-8 group">
                <input type="number" name="client_annual_turnover" id="client_annual_turnover"
                    value="{{ $client->annual_turnover }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder="" />
                <label for="client_annual_turnover"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    {{ 'Annual Turnover (' . date('Y') . ')' }}</label>
            </div>
            <div class="relative z-0 w-full mb-8 group">
                <input type="number" name="client_annual_turnover_last_year" id="client_annual_turnover_last_year"
                    value="{{ $client->last_year_turnover }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder="" />
                <label for="client_annual_turnover_last_year"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    {{ 'Last Year Turnover ' . '(' . date('Y', strtotime('-1 year')) . ')' }}</label>
            </div>
            <div class="relative z-0 w-full mb-8 group">
                <input type="number" name="client_annual_turnover_two_years_ago"
                    id="client_annual_turnover_two_years_ago" value="{{ $client->two_years_ago_turnover }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder="" />
                <label for="client_annual_turnover_two_years_ago"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    {{ 'Turnover ' . '(' . date('Y', strtotime('-2 year')) . ')' }}</label>
            </div>
            <div class="relative z-0 w-full mb-8 group">
                <input type="text" name="client_clinic_address" id="client_clinic_address"
                    value="{{ $client->clinic_address }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder="" />
                <label for="client_clinic_address"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Clinic Address (empty if not)</label>
            </div>
            <div class="flex items-center mb-8">
                <input id="client_has_employees" name="client_has_employees" type="checkbox"
                    @if ($client->has_employees) checked @endif
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="client_has_employees"
                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Has
                    Employees</label>
            </div>
            <div class="flex items-center mb-8">
                <input id="client_has_properties" name="client_has_properties" type="checkbox"
                    @if ($client->properties) checked @endif
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="client_has_properties" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Has Properties</label>
            </div>



            <div class="relative z-0 w-full mb-8 group">
                <label for="client_employee"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employee</label>
                <select id="client_employee" name="client_employee"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($employees as $employee)
                        <option @if ($employee->user_id === $client->employee_id) selected @endif value="{{ $employee->user_id }}">
                            {{ $employee->user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="border-t border-b border-blue-600 p-5 pb-0 mb-4">
            <h3 class="mb-2 text-sm text-blue-600">Valid for categories</h3>

            {{-- {{dd($deadline->clientTypes)}} --}}
            @foreach (App\Models\ClientTypes::all() as $type)
                <div class="flex items-center mb-4">
                    <input id="{{ 'type_' . $type->id }}"
                        {{ $client->clientTypes->contains($type->id) ? 'checked' : '' }} name="client_types[]"
                        type="checkbox" value="{{ $type->id }}" selected="selected"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="{{ 'type_' . $type->id }}"
                        class="ms-2 text-sm font-medium text-gray-400 dark:text-gray-500">{{ $type->name }}</label>
                </div>
            @endforeach
        </div>
    </div>


    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
</form>

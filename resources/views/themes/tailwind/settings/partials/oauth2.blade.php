<div class="flex flex-col px-10 py-8">
    <form id="aouth2-clients-form">
        <div>
            <label for="key_name" class="block text-sm font-medium leading-5 text-gray-700">Create a new Client</label>
            <div class="mt-1 rounded-md shadow-sm">
                <input id="name" type="text" name="name" placeholder="Name" class="w-full form-input" required>
            </div>
            <div class="mt-1 rounded-md shadow-sm">
                <input id="redirect" type="text" name="redirect" placeholder="Redirect" class="w-full form-input" required>
            </div>
        </div>

        <div class="flex justify-end w-full mt-2">
            <button class="flex self-end justify-center w-auto px-4 py-2 mt-5 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-wave-600 hover:bg-wave-500 focus:outline-none focus:border-wave-700 focus:shadow-outline-wave active:bg-wave-700" dusk="update-profile-button" type="submit">Create New Client</button>
        </div>
    </form>

    <hr class="my-12 border-gray-200">

    <p class="block text-sm font-medium leading-5 text-gray-700 dark:text-white">AOAuth2 clients</p>
    <div class="mt-2 overflow-hidden border border-gray-150 sm:rounded">
        <table class="min-w-full divide-y divide-gray-200 table-auto" id="aouth2-clients">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100">
                        Name
                    </th>
                    <!-- <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100">
							Created
						</th> -->
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100">
                        Id
                    </th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100">
                        Secrect
                    </th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100">
                        Redirect
                    </th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>


@section('javascript')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/exif-js/2.3.0/exif.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.js"></script>

<script type="text/javascript">
    axios.get('/oauth/clients')
        .then(response => {
            const table = document.getElementById('aouth2-clients');
            const tbody = table.getElementsByTagName('tbody')[0];
            response.data.forEach((item, index) => {
                // Create a new row (tr) element
                const newRow = document.createElement('tr');
                if (index % 2 == 0) {
                    newRow.classList.add('bg-white');
                } else {
                    newRow.classList.add('bg-gray-50');
                }


                // Create new cells (td) and set their content
                const nameCell = document.createElement('td');
                nameCell.textContent = item.name;
                nameCell.classList.add('px-6', 'py-4', 'text-sm', 'leading-5', 'text-gray-500', 'whitespace-no-wrap');

                // const created_atCell = document.createElement('td');
                // created_atCell.textContent = item.created_at;
                // created_atCell.classList.add('px-6','py-4','text-sm','leading-5','text-gray-500','whitespace-no-wrap');

                const idCell = document.createElement('td');
                idCell.textContent = item.id;
                idCell.classList.add('px-6', 'py-4', 'text-sm', 'leading-5', 'text-gray-500', 'whitespace-no-wrap');

                const secretCell = document.createElement('td');
                secretCell.textContent = item.secret;
                secretCell.classList.add('px-6', 'py-4', 'text-sm', 'leading-5', 'text-gray-500', 'whitespace-no-wrap');

                const redirectell = document.createElement('td');
                redirectell.textContent = item.redirect;
                redirectell.classList.add('px-6', 'py-4', 'text-sm', 'leading-5', 'text-gray-500', 'whitespace-no-wrap');

                // Append the new cells to the new row
                newRow.appendChild(nameCell);
                //newRow.appendChild(created_atCell);
                newRow.appendChild(idCell);
                newRow.appendChild(secretCell);
                newRow.appendChild(redirectell);

                // Append the new row to the table's tbody
                tbody.appendChild(newRow);

                console.log(index, item)
            })
        });
</script>

<script>
    document.getElementById('aouth2-clients-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Get the form data
        const formData = new FormData(event.target);

        // Convert the form data to a JSON object
        const data = {};
        formData.forEach((value, key) => {
            data[key] = value;
        });
        axios.post('/oauth/clients', data)
            .then(response => {
                window.location.reload();
            })
            .catch(error => {
                console.log(error.response.data.message);
                setTimeout(function() {
                    popToast('danger', error.response.data.message);
                }, 10);
            });

    });
</script>

@endsection
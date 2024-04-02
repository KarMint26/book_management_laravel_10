<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Management</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="https://carls-notes-app-v2.netlify.app/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('build.css') }}">
</head>

<body>
    @if (session()->has('success'))
        <div id="toast-success"
            class="fixed top-0 right-0 z-[99] flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('book.index') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://carls-notes-app-v2.netlify.app/icon.png" class="h-8" alt="App Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Book
                    Management</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{ route('book.index') }}"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-sky-700 md:p-0 dark:text-white md:dark:hover:text-sky-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('book.create') }}"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-sky-700 md:p-0 dark:text-white md:dark:hover:text-sky-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Add
                            Book</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="flex justify-center items-center flex-col pb-5 mt-8">
        <h1 class="text-sky-600 text-2xl sm:text-3xl lg:text-4xl font-semibold">Books List</h1>
        <div class="relative overflow-x-auto sm:rounded-lg mt-8 flex justify-center items-center flex-col gap-6">
            <table class="sm:w-[700px] lg:w-[900px] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="w-[150px] px-6 py-3 text-center">
                            Book Name
                        </th>
                        <th scope="col" class="w-[150px] px-6 py-3 text-center">
                            Book Price
                        </th>
                        <th scope="col" class="w-[150px] px-6 py-3 text-center">
                            Book Year
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 text-center">
                                {{ $book->name }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $book->price }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $book->year }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $book->description }}
                            </td>
                            <td class="px-6 py-4 flex justify-center items-center gap-3">
                                <a href="{{ route('book.edit', ['book' => $book]) }}"
                                    class="px-3 py-2 text-white font-semibold bg-amber-500 rounded-lg">Edit</a>
                                <form action="{{ route('book.destroy', ['book' => $book]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="px-3 py-2 text-white font-semibold bg-rose-500 rounded-lg">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('book.create') }}"
                class="self-end text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">
                Add Book
            </a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toastSuccess = document.getElementById('toast-success');
            if (toastSuccess) {
                setTimeout(function() {
                    toastSuccess.style.display = 'none';
                }, 3000);
            }
        });
    </script>

</body>

</html>

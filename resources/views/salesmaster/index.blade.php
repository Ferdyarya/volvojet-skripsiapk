<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sales Master Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mb-3">
                    <a href="{{ route('salesmaster.create') }}"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Save Sales Master Data</a>
                    <div class="flex justify-start mt-7">
                        <div class=" xl:w-96 ">
                            <form action="salesmaster" method="GET">
                                <input type="search" name="search" class="
                                  form-control
                                  block
                                  w-full
                                  px-3
                                  py-1.5
                                  text-base
                                  font-normal
                                  text-gray-700
                                  bg-white bg-clip-padding
                                  border border-solid border-gray-300
                                  rounded
                                  transition
                                  ease-in-out
                                  m-0
                                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                                " id="search" placeholder="Search" />
                            </form>
                        </div>
                    </div>
                </div>
                <div class="bg-white">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="border px-6 py-4">Number</th>
                                <th class="border px-6 py-4">Name</th>
                                <th class="border px-6 py-4">Kode Karyawan</th>
                                <th class="border px-6 py-4">Email</th>
                                <th class="border px-6 py-4">No Telepon</th>
                                <th class="border px-6 py-4">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($salesmaster as $item)
                            <tr>
                                <td class="border px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="border px-6 py-4">{{ $item->name }}</td>
                                <td class="border px-6 py-4">{{ $item->kode }}</td>
                                <td class="border px-6 py-4">{{ $item->email }}</td>
                                <td class="border px-6 py-4">{{ $item->no_telp }}</td>

                                <td class="border px-6 py-4 text-center">
                                    <a href="{{ route('salesmaster.edit', $item->id) }}"
                                        class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">Edit
                                    </a>

                                    <form action="{{ route('salesmaster.destroy', $item->id) }}" method="POST"
                                        class="inline-block">
                                        {!! method_field('delete') . csrf_field() !!}
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded">Delete</button>
                                    </form>

                                </td>
                            </tr>
                            @empty

                            <tr>
                                <td colspan="2" class="border text-center p-5">
                                    Data Tidak Di Temukan
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- untuk paginate --}}
            <div class="text-center mt-5">
                {{ $salesmaster->links() }}
            </div>

        </div>
    </div>

    {{-- script --}}
    @include('sweetalert::alert')
</x-app-layout>


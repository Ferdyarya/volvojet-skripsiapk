<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rekap Penjualan Sales Perbulan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mb-3">
                    {{-- <a href="{{ route('sales.create') }}"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create Penjualan
                        Sales</a> --}}
                    @if (!empty($filter))
                    <a href="{{ route('perbulanpdf', $filter) }}"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Export PDF</a>
                    <div class="flex justify-end mt-7">
                        @else
                        <a href="{{ route('perbulanpdf','all') }}"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Export PDF</a>
                        <div class="flex justify-end mt-7">
                            @endif
                            {{-- <div class=" xl:w-96 ">
                                <form action="pernama" method="GET">
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
                            </div> --}}


                            <div class=" xl:w-96 ">
                                <div class="float-right row">
                                    <form action="{{ url()->current() }}">
                                        <input type="month" name="filter" class="form-control input-sm rounded-xl"
                                            value="{{ $filter}}" />
                                            @if (!empty($filter))

                                                
                                            @endif


                                            {{-- Submit --}}
                                        <div class="input-group-append mt-2">
                                            <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300
                                                    font-medium rounded-lg text-sm px-4 py-2.5 mr-2 mb-2 dark:bg-green-600
                                                    dark:hover:bg-green-700 dark:focus:ring-green-800">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="border px-6 py-4">No</th>
                                <th class="border px-6 py-4">Nama Sales</th>
                                <th class="border px-6 py-4">Customer Yang Beli</th>
                                <th class="border px-6 py-4">Unit Dijual</th>
                                <th class="border px-6 py-4">Harga Unit</th>
                                <th class="border px-6 py-4">Qty</th>
                                <th class="border px-6 py-4">Tanggal</th>
                                <th class="border px-6 py-4">Total Harga</th>
                                {{-- <th class="border px-6 py-4">Status</th> --}}
                                @if (Auth::user()->hakAkses('adminsales'))
                                <th class="border px-6 py-4">Action</th>
                                @else
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sales as $item)
                            <tr>
                                <td class="border px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="border px-6 py-4">{{ $item->salesmaster->name }}</td>
                                <td class="border px-6 py-4">{{ $item->customermaster->name }}</td>
                                <td class="border px-6 py-4">{{ $item->unit->name }}</td>
                                {{-- <td class="border px-6 py-4">{{ $item->gambar }}</td> --}}
                                <td class="border px-6 py-4">Rp. {{ number_format($item->harga )}}</td>
                                <td class="border px-6 py-4">{{ $item->qty }}</td>
                                <td class="border px-6 py-4">{{ $item->tanggal }}</td>
                                <td class="border px-6 py-4">Rp. {{ number_format($item->harga * $item->qty )}}</td>
                                {{-- <td class="border px-6 py-4">
                                    @if ($item->status == 0)
                                    @if (Auth::user()->hakAkses('superadmin'))
                                    <form action="{{ route('validasisales', $item->id) }}" method="POST">
                                        @csrf
                                        @method('patch')
                                        <select name="validasi"
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            id="grid-last-name">
                                            <option value="">
                                                Keterangan :
                                            </option>
                                            <option value="Pengiriman Tertunda">Pengiriman Tertunda</option>
                                            <option value="Unit Segera dikirim">Unit Segera dikirim</option>
                                        </select>
                                        <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">OK</button>
                                    </form>
                                    @else
                                    <span class="badge badge-warning">Tunggu Verifikasi</span>
                                    @endif
                                    @else
                                    <div class="text-center">
                                        {!! $item->status == 'Pengiriman Tertunda'
                                        ? '<span class="">Pengiriman Tertunda</span>'
                                        : '<span class="">Unit Segera dikirim</span>' !!}
                                    </div>
                                    @endif

                                </td> --}}

                                @if (Auth::user()->hakAkses('adminsales'))
                                @if ($item->status == 0)
                                <td class="border px-6 py-4 text-center">
                                    <a href="{{ route('sales.edit', $item->id) }}"
                                        class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">Edit
                                    </a>

                                    <form action="{{ route('sales.destroy', $item->id) }}" method="POST"
                                        class="inline-block">
                                        {!! method_field('delete') . csrf_field() !!}
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded">Delete</button>
                                    </form>
                                </td>
                                @else
                                <td class="border px-6 py-4 text-center">
                                    <p>Done</p>
                                </td>
                                @endif
                            </tr>
                            @else
                            @endif
                            @empty

                            <tr>
                                <td colspan="10" class="border text-center p-5">
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
                {{ $sales->links() }}
            </div>

        </div>
    </div>



</x-app-layout>

<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Repositorios
        </h2>
    </x-slot> --}}
    <div class="py-4">
        <div class="max-w-[100%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="container mx-auto px-4 sm:px-8 max-w-[100%]">
                    <div class="py-8">
                        <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                            <h2 class="text-2xl leading-tight">Repositorios</h2>
                            <div class="text-end">
                                <form class="flex flex-col md:flex-row w-3/4 md:w-full max-w-sm md:space-x-3 space-y-3 md:space-y-0 justify-center">
                                    <div class="relative">
                                        <input type="text" id='"form-subscribe-Filter'
                                            class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                            placeholder="Buscar" />
                                    </div>
                                    <button
                                        class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200"
                                        type="submit">
                                        Buscar
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-5 py-3 bg-white border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-normal">
                                                ID
                                            </th>
                                            <th scope="col" class="px-5 py-3 bg-white border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-normal">
                                                url
                                            </th>
                                            <th scope="col" class="px-5 py-3 bg-white border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-normal">
                                                Descripción
                                            </th>
                                            <th scope="col" class="px-5 py-3 bg-white border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-normal">
                                                Estado
                                            </th>
                                            <th scope="col" class="px-5 py-3 bg-white border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-normal">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($repositories as $repository)
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $repository->id }}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $repository->url }}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $repository->description }}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                    <span aria-hidden="true" class="absolute inset-0 bg-green-200 opacity-50 rounded-full">
                                                    </span>
                                                    <span class="relative">
                                                        Activo
                                                    </span>
                                                </span>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">
                                                    Editar|Eliminar
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm" colspan="5">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    No tienes registros creados
                                                </p>
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="px-5 bg-white py-5 flex flex-col xs:flex-row items-center xs:justify-between">
                                    <div class="flex items-center">
                                        <button type="button" class="w-full p-4 border text-base rounded-l-xl text-gray-600 bg-white hover:bg-gray-100">
                                            <svg width="9" fill="currentColor" height="8" class="" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1427 301l-531 531 531 531q19 19 19 45t-19 45l-166 166q-19 19-45 19t-45-19l-742-742q-19-19-19-45t19-45l742-742q19-19 45-19t45 19l166 166q19 19 19 45t-19 45z">
                                                </path>
                                            </svg>
                                        </button>
                                        <button type="button" class="w-full px-4 py-2 border-t border-b text-base text-indigo-500 bg-white hover:bg-gray-100">
                                            1
                                        </button>
                                        <button type="button" class="w-full px-4 py-2 border text-base text-gray-600 bg-white hover:bg-gray-100">
                                            2
                                        </button>
                                        <button type="button" class="w-full px-4 py-2 border-t border-b text-base text-gray-600 bg-white hover:bg-gray-100">
                                            3
                                        </button>
                                        <button type="button" class="w-full px-4 py-2 border text-base text-gray-600 bg-white hover:bg-gray-100">
                                            4
                                        </button>
                                        <button type="button" class="w-full p-4 border-t border-b border-r text-base rounded-r-xl text-gray-600 bg-white hover:bg-gray-100">
                                            <svg width="9" fill="currentColor" height="8" class="" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1363 877l-742 742q-19 19-45 19t-45-19l-166-166q-19-19-19-45t19-45l531-531-531-531q-19-19-19-45t19-45l166-166q19-19 45-19t45 19l742 742q19 19 19 45t-19 45z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

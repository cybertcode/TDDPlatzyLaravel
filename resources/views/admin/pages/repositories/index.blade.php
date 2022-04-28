<x-app-layout>
    {{--
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Repositorios
        </h2>
    </x-slot>
    --}}
    <div class="py-4">
        <div class="max-w-[100%] mx-auto sm:px-6 lg:px-8">
            <div class="p-4 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="container mx-auto px-4 sm:px-8 max-w-[100%]">
                    <div class="py-8">
                        <div class="flex flex-row justify-between w-full mb-1 sm:mb-0">
                            <h2 class="text-2xl leading-tight">Repositorios</h2>
                            <div class="text-end">
                                <form class="flex flex-col justify-center w-3/4 max-w-sm space-y-3 md:flex-row md:w-full md:space-x-3 md:space-y-0">
                                    <div class="relative">
                                        <input type="text" id='"form-subscribe-Filter'
                                            class="flex-1 w-full px-4 py-2 text-base text-gray-700 placeholder-gray-400 bg-white border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                            placeholder="Buscar" />
                                    </div>
                                    <a href="{{
                                            route('repositories.create')
                                        }}"
                                        class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200"
                                        type="submit">
                                        Nuevo
                                    </a>
                                </form>
                            </div>
                        </div>
                        <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                            <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                                ID
                                            </th>
                                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                                url
                                            </th>
                                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                                Descripción
                                            </th>
                                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                                Estado
                                            </th>
                                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($repositories as $repository)
                                        <tr>
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $repository->id }}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $repository->url }}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $repository->description }}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                                    <span aria-hidden="true" class="absolute inset-0 bg-green-200 rounded-full opacity-50">
                                                    </span>
                                                    <span class="relative">
                                                        Activo
                                                    </span>
                                                </span>
                                            </td>
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <a href="{{
                                                        route(
                                                            'repositories.show',
                                                            $repository
                                                        )
                                                    }}" class="mx-2 text-indigo-600 hover:text-indigo-900">
                                                    Ver
                                                </a>
                                                <a href="{{
                                                        route(
                                                            'repositories.edit',
                                                            $repository
                                                        )
                                                    }}" class="mx-2 text-indigo-600 hover:text-indigo-900">
                                                    Editar
                                                </a>
                                                <form method="POST" action="{{ route('repositories.destroy',$repository)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="mx-2 text-indigo-600 bg-red-500 hover:text-indigo-900" value="Eliminar">
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200" colspan="5">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    No tienes registros creados
                                                </p>
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="flex flex-col items-center px-5 py-5 bg-white xs:flex-row xs:justify-between">
                                    <div class="flex items-center">
                                        <button type="button" class="w-full p-4 text-base text-gray-600 bg-white border rounded-l-xl hover:bg-gray-100">
                                            <svg width="9" fill="currentColor" height="8" class="" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1427 301l-531 531 531 531q19 19 19 45t-19 45l-166 166q-19 19-45 19t-45-19l-742-742q-19-19-19-45t19-45l742-742q19-19 45-19t45 19l166 166q19 19 19 45t-19 45z">
                                                </path>
                                            </svg>
                                        </button>
                                        <button type="button" class="w-full px-4 py-2 text-base text-indigo-500 bg-white border-t border-b hover:bg-gray-100">
                                            1
                                        </button>
                                        <button type="button" class="w-full px-4 py-2 text-base text-gray-600 bg-white border hover:bg-gray-100">
                                            2
                                        </button>
                                        <button type="button" class="w-full px-4 py-2 text-base text-gray-600 bg-white border-t border-b hover:bg-gray-100">
                                            3
                                        </button>
                                        <button type="button" class="w-full px-4 py-2 text-base text-gray-600 bg-white border hover:bg-gray-100">
                                            4
                                        </button>
                                        <button type="button" class="w-full p-4 text-base text-gray-600 bg-white border-t border-b border-r rounded-r-xl hover:bg-gray-100">
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

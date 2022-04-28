<x-app-layout>
    {{--
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Repositorios
        </h2>
    </x-slot>
    --}}
    <div class="py-4">
        <div class="max-w-[100%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="container mx-auto px-4 sm:px-8 max-w-[100%]">
                    <div class="py-8">
                        <div
                            class="flex flex-row mb-1 sm:mb-0 justify-between w-full"
                        >
                            <h2 class="text-2xl leading-tight">
                                Usuario: {{ auth()->user()->name }}
                            </h2>
                            <div class="text-end">
                                <form
                                    class="flex flex-col md:flex-row w-3/4 md:w-full max-w-sm md:space-x-3 space-y-3 md:space-y-0 justify-center"
                                >
                                    <a
                                        href="{{ route('repositories.index') }}"
                                        class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200"
                                        type="submit"
                                    >
                                        Volver
                                    </a>
                                    <a
                                        href="{{
                                            route('repositories.create')
                                        }}"
                                        class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200"
                                        type="submit"
                                    >
                                        Nuevo
                                    </a>
                                </form>
                            </div>
                        </div>
                        <div
                            class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto"
                        >
                            <div
                                class="inline-block min-w-full shadow rounded-lg overflow-hidden"
                            >
                                <div
                                    class="bg-white rounded-lg shadow sm:max-w-md sm:w-full sm:mx-auto sm:overflow-hidden"
                                >
                                    <div class="px-4 py-8 sm:px-10">
                                        <div class="relative mt-6">
                                            <div
                                                class="absolute inset-0 flex items-center"
                                            >
                                                <div
                                                    class="w-full border-t border-gray-300"
                                                ></div>
                                            </div>
                                            <div
                                                class="relative flex justify-center text-sm leading-5"
                                            >
                                                <span
                                                    class="px-2 text-gray-500 bg-white"
                                                >
                                                    Registrando
                                                </span>
                                            </div>
                                        </div>
                                        <form
                                            method="POST"
                                            action="{{
                                                route('repositories.store')
                                            }}"
                                        >
                                            @csrf
                                            <div class="mt-2">
                                                <div class="w-full space-y-6">
                                                    <div class="w-full">
                                                        <div class="relative">
                                                            <label
                                                                for="url"
                                                                class="block font-medium text-sm text-gray-700"
                                                                >URL *</label
                                                            >
                                                            <input
                                                                type="text"
                                                                id="url"
                                                                class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                                                placeholder="url del repositorio"
                                                                value=""
                                                                name="url"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="w-full">
                                                        <div class="relative">
                                                            <label
                                                                for="description"
                                                                class="block font-medium text-sm text-gray-700"
                                                                >Descripción</label
                                                            >
                                                            <input
                                                                type="text"
                                                                id="description"
                                                                class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                                                placeholder="Descripción breve"
                                                                value=""
                                                                name="description"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <span
                                                            class="block w-full rounded-md shadow-sm"
                                                        >
                                                            <button
                                                                type="submit"
                                                                class="py-2 px-4 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg"
                                                            >
                                                                Guardar
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div
                                        class="px-4 py-6 border-t-2 border-gray-200 bg-gray-50 sm:px-10"
                                    >
                                        <p
                                            class="text-xs leading-5 text-gray-500"
                                        >
                                            Información del repositorio
                                        </p>
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

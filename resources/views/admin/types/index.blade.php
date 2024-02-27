@extends('layouts.admin')

@section('content')
    <div class="rightMain px-3 overflow-y-scroll ">
        <div class="d-flex justify-content-between align-items-center ">
            <h2 class="fs-4 my-4 px-3 ">
                {{ __('Types') }}
            </h2>

            <a class="btn btn-sm btn-primary mx-3" href="{{ route('admin.types.create') }}">
                <i class="fa-solid fa-folder-plus px-1"></i>
                Add Types
            </a>

        </div>

        <table class="table text-center ">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">project</th>
                    <th scope="col">command</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <th scope="row">{{ $type->id }}</th>
                        <td>{{ $type->name }}</td>
                        <td>{{ count($type->projects) }}</td>
                        <td class="d-flex justify-content-center ">
                            <a href="{{ route('admin.types.show', ['type' => $type->slug]) }}"
                                class="btn btn-sm btn-primary">
                                <i class="fa-solid fa-eye fa-xs"></i>
                            </a>
                            <a href="{{route('admin.types.edit', $type->slug) }}" class="btn btn-sm btn-warning mx-2 ">
                                <i class="fa-solid fa-pen-to-square fa-xs"></i>
                            </a>

                            <button class="btn btn-sm btn-danger delete-button" data-bs-toggle="modal" data-bs-target="#modal_type_delete" data-typeslug="{{ $type->slug }}">
                                <i class="fa-solid fa-trash-can fa-xs"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- @include('admin.types.partials.modal_delete') --}}
@endsection
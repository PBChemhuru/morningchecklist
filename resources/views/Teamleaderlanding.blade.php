<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Sunrise Checklist') }}</h2>
        @if (session()->has('message'))
            <div class="mx-auto w-4/5 pb-10">
                <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
                    Message
                </div>
                <div class="border border-t-1 border-red-400 rounded-b bg-green-100 px-4 py-3 text-green-70">
                    {{ session()->get('message') }}
                </div>
            </div>
        @endif
    </x-slot>
    <div class='container mt-10'>
        <div class="row">
            @php

                $lists = DB::table('checklists')
                    ->select(['*'])
                    ->where('signoff', '=', '1')
                    ->get();
                $checklist_items = App\Models\checklist_items::all();
            @endphp
            <div class="w-full">
                @if ($lists->isNotEmpty())
                    <table class="table table-striped "
                        style="width: 100%;height:fit-content;border-color:black;border:2px solid;padding:10px;">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Date</th>
                                <th scope="col">Analyst</th>
                                <th scope="col">view</th>
                                <th scope="col">Sign off</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lists as $list)
                                <tr>
                                    <th scope="row">{{ $list->id }}</th>
                                    <th>{{ $list->created_at }}</th>
                                    <th>{{ $list->analyst }}</th>
                                    <th>
                                        <div class="container">
                                            <button type="button" class="btn btn-primary"
                                                data-toggle="modal"
                                                data-target="#exampleModal{{ $list->id }}">
                                                view
                                            </button>
                                    </th>
                                    <th>
                                        <form method="GET" action="/Teamleaderlanding/{{ $list->id }}">
                                            @csrf
                                            <button>Sign off</button>

                                        </form>
                                    </th>
                                </tr>
                                <div class="modal fade" id="exampleModal{{ $list->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                @php
                                                    $reps = App\Models\Checklist::where(
                                                        'id',
                                                        'LIKE',
                                                        $list->id,
                                                    )->first();
                                                @endphp
                                                <h5 class="modal-title" id="exampleModalLabel{{ $list->id }}">
                                                    {{ $list->id }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p hidden>{{ $count = 1 }}</p>
                                                @foreach ($checklist_items as $checklist_item)
                                                    <p hidden>{{ $comment = 'comment' . $count }}</p>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            {{ $checklist_item->id }}.{{ $checklist_item->item }}
                                                        </div>
                                                        <div class="col-sm-4">{{ $checklist_item->frequency }}</div>
                                                        <div class="col-sm-4">{{ $reps->$comment }}</div>
                                                        <p hidden>{{ $count++ }}</p>
                                                    </div>
                                                @endforeach

                                            </div>

                                        </div>

                                    </div>
                                </div>
            </div>
            @endforeach
            </tbody>
            </table>
        @else
            <h1>No checklists to signoff</h1>
            @endif
        </div>
    </div>
    </div>


    {{-- pop model end here  --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</x-app-layout>

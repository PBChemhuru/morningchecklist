<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sunrise Checklist') }}
        </h2>
        <div class="container">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Create
            </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModals">
                Edit
            </button>
            @if(session()->has('message'))
            <div class="mx-auto w-4/5 pb-10">
                <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
                    Message
                </div>
                <div class="border border-t-1 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-70">
                    {{session()->get('message')}}
                </div>
            </div>
            @endif
        </div>
    </x-slot>
<div>
    <style>
    table, th, td {
        border: 2pt solid;
        padding: 15pt;
      }

      ul.a {
list-style-type: circle;
}

ol.c {
list-style-type: upper-roman;
}


      </style>
    <center>
    <table style="width: 80%" >
        <tr>
        <th>Item</th>
        <th>Action</th>
        <th>Frequency</th>
        </tr>

        @php
        $checklist_items = App\Models\checklist_items::all();
        $checklist_reps
        
        @endphp
        <p hidden>{{$count=1}}</p>
        @foreach($checklist_items as $checklist_item)
        <tr>
        <td>{{$checklist_item->id}}.{{$checklist_item->item}}</td>
        <td>{{$checklist_item->action}}</td>
        <td>{{$checklist_item->frequency}}</td>
        <td>
            <form method="POST" action={{ route('destroy',$checklist_item->id)}}>
            @csrf
            @method('DELETE')
             <button type="submit" class="btn btn-danger btn-sm">Delete</button>

            </form>
        </td>
        </tr>
        <p hidden>{{$count++}}</p>
        @endforeach               
    </table><br>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Item to Checklist or update exist</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="/checklistitems">
        @csrf
        <div class="modal-body">
            
                <div class="form-group">
                    <label>Item</label>
                    <input type="text" name="item" class="form-control" placeholder="Enter Item">
                  </div>

                  <div class="form-group">
                    <label>Item Action</label>
                    <input type="text" name="action" class="form-control" placeholder="Enter action">
                  </div>

                  <div class="form-group">
                    <label>Frequency</label>
                    <input type="text" name="frequency" class="form-control" placeholder="Enter Frequency">
                  </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              
        </div>
    </form>
    </div>
    </div>
</div>

<div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabels" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabels">Add Item to Checklist or update exist</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="/checklistitems/edit">
        @csrf
        <div class="modal-body">
            
                <div class="form-group">
                  <label>Item Id</label>
                  <input type="text" name="id" class="form-control" placeholder="Enter item">
                </div>

                <div class="form-group">
                    <label>Item</label>
                    <input type="text" name="item" class="form-control" placeholder="Enter Item">
                  </div>

                  <div class="form-group">
                    <label>Item Action</label>
                    <input type="text" name="action" class="form-control" placeholder="Enter action">
                  </div>

                  <div class="form-group">
                    <label>Frequency</label>
                    <input type="text" name="frequency" class="form-control" placeholder="Enter Frequency">
                  </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              
        </div>
    </form>
    </div>
    </div>
</div>

{{-- pop model end here  --}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</x-app-layout>

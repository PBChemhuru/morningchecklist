<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sunrise Checklist') }}
        </h2>
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
    </x-slot>
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

    <div>
        <form method="POST" action="/dashboard">
            @csrf
            <center>
            <table style="width: 80%" >
                <tr>
                <th>Item</th>
                <th>Action</th>
                <th>Frequency</th>
                <th>Comment</th>
                <th><input type="checkbox" id="master-checkbox" /></th>
                </tr>

                @php
                $checklist_items = App\Models\checklist_items::all();
                
                @endphp
                <p hidden>{{$count=1}}</p>
                @foreach($checklist_items as $checklist_item)
                <tr>
                <td>{{$checklist_item->id}}. {{$checklist_item->item}}</td>
                <td>{{$checklist_item->action}}</td>
                <td>{{$checklist_item->frequency}}</td>
                <td><select name="{{$comment="comment".$count}}">
                    <option>Select Comment</option>
                    <option value="Done">Done</option>
                    <option value="N/A">N/A</option>
                    <option value="Pending">Pending</option>
                    </select>
                </td>
                <td><input type="checkbox" name="{{$check="check".$count}}"></td>
                </tr>
                <p hidden>{{$count++}}</p>
                @endforeach               
            </table><br>
            <button class="btn btn-primary"style="width: 30%; height:30pt;padding:5pt;font-size:15pt">Submit</button>
            </center>
         
        </form>
    </div>
    <script>
        let checkboxes = document.querySelectorAll('input[type="checkbox"]'); let masterCheckbox = document.querySelector('#master-checkbox'); masterCheckbox.addEventListener('click', function() { 	for (var i = 0; i < checkboxes.length; i++) { 		checkboxes[i].checked = this.checked; 	} }); 
    </script>
</x-app-layout>

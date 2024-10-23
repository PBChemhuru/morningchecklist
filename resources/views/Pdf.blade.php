<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .format {
            "border-color: black;
 border-style: solid;
            border: 2pt"

        }
    </style>


</head>

<body>
    @php
        $checklist_items = App\Models\checklist_items::all();
        $reps = App\Models\Checklist::where('id', 'LIKE', $id)->first();
    @endphp
    <h1>Sunrise Checklist {{$reps->created_at}}</h1>
    <p>Analyst:{{$reps->analyst}}  Team leader:{{$reps->signoff}}</p>
    <div class="format">
        @php
            $count = 1;
        @endphp
        <table style="width: 100%;height:fit-content;border-color:black;border:2px solid;">
            <thead class="thead-dark">
                <tr>
                    <th>Item</th>
                    <th>Frequency</th>
                    <th>Comment</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($checklist_items as $checklist_item)
                    @php
                        $comment = 'comment' . $count;
                        $comment;
                    @endphp
                    <tr>
                        <th>{{ $checklist_item->id }}.{{ $checklist_item->item }}</th>
                        <th>{{ $checklist_item->frequency }}</th>
                        <th>{{ $reps->$comment }}</th>
                    </tr>
                    @php
                        $count++;
                    @endphp
                @endforeach
            </tbody>
        </table>



    </div>
</body>

</html>

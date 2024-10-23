<x-app-layout>
    
    <div class='container mt-10'>
        <div class="row">
                @php
    
                $lists= DB::table('checklists')->select(['*'])->where('signoff','!=','1')->get();
                $analysts= DB::table('users')->select(['*'])->where('Role','=','Analyst')->get();
                $teamleads= DB::table('users')->select(['*'])->where('Role','=','Teamlead')->get();
    
                @endphp
        <div class="col-10 ">
            <table class="table table-striped" style="width: 100%;height:fit-content;border-color:black;border:2px solid;padding:10px;">
                <thead class="thead-dark">
                    <tr >
                    <th scope="col" >Id</th>
                    <th scope="col">Date</th>
                    <th scope="col">Analyst</th>
                    <th scope="col">Sign off</th>
                    <th scopr="col">Download</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $list)
                    <tr>
                        <th scope="row">{{$list->id}}</th>
                        <th >{{$list->created_at}}</th>
                        <th>{{$list->analyst}}</th>
                        <th>{{$list->signoff}}</th>
                        <th><a href="/download/{{$list->id}}">Download</a></th>
                    </tr>
                    @endforeach
                </tbody>   
            </table>
        </div>
       <div class="col-2">
            <table class="table" style="width: 60%;height:fit-content;border-color:black;border:2px solid;padding:10px;">
                <thead class="thead-dark">
                    <tr >
                    <th scope="col" >Search by:</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="/archivesearch">
                    <tr>
                        <th scope="row">Analyst:
                            <input type="text" name="asearch">
                        </th>    
                    </tr>
                    <tr>
                        <th scope="row">TeamLeader:
                            <input type="text" name="tsearch">
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">Date:<br>
                            <input type="Date" name="dsearch">
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">
                            <center><input class="btn btn-primary" type="submit" value="Submit"></center>
                        </th>
                    </tr>
                </tbody>
            </form>   
            </table>
        </div>
    </div>
    </div>
    </x-app-layout>
@include('component.header')
<h1>Your id is {{$employee->id}}</h1>
<h1>Your name is {{$employee->name}}</h1>
<h1>Your email is {{$employee->email}}</h1>

<p><a href="/dashboard/delete/{{$employee->id}}">Delete this data</a></p>
@include('component.footer')
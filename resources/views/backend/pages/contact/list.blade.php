@extends('backend.master')

@section('content')

<h1>Contacts List</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Subject</th>
      <th scope="col">Message</th>
      <th scope="col">Action</th>

    </tr>
  </thead>

  @foreach($contacts as $contact)

  <tbody>
    <tr>
      <td scope="row">{{$loop->iteration}}</td>
      <td>{{$contact->name}}</td>
      <td>0{{$contact->phone_number}}</td>
      <td>{{$contact->subject}}</td>
      <td>{{$contact->message}}</td>
      <td>
        <a class="btn btn-danger" href="{{route('contacts.delete', $contact->id)}}">Delete</a>
      </td>
    </tr>
  </tbody>


  @endforeach

</table>

@endsection
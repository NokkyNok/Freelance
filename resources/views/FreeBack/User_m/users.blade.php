<html>
<head>
<title></title>
<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">USER</th>
      <th scope="col">EMAIL</th>
      <th scope="col">DEL</th>
      <th scope="col">EDIT</th>
    </tr>
  </thead>
  <tbody>
    @foreach($user as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->email}}</td>
      <td></td>
      <td></td>
    </tr>
   @endforeach
  </tbody>
</table>
</body>
</head>
</html>
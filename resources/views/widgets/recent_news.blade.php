<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <table class="table">
                    <thead>
                      <tr>
                      <th>Name</th>
                     <!-- <th>Email</th>-->
                      <th>Mobile</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($clients as $client)
                    <tr>
                    <td>{{$client->name}}</td>
                    {{--<td>{{$client->email}}</td>--}}
                    <td>{{$client->mobile1}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
</body>
</html>
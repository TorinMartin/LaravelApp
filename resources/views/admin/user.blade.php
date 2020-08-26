<tr>
    <td>{{$user->id}}</td>
    <td>
        <a href="#">{{ $user->name  }}</a>
    </td>
    <td>{{$user->email}}</td>
    <td><a href="edituser/{{$user->id}}" class="btn btn-success" style="margin-right: 3px;">Edit</a></td>
    <td><a href="deleteuser/{{$user->id}}" class="btn btn-danger" style="margin-right: 3px;">Delete</a></td>
</tr>
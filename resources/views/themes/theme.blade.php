<tr>
    <td>{{$theme->id}}</td>
    <td>
        <a href="#">{{$theme->name}}</a>
    </td>
    <td><a href="themes/edit/{{$theme->id}}" class="btn btn-success" style="margin-right: 3px;">Edit</a></td>
    <td>@if($theme->id != 1)<a href="themes/delete/{{$theme->id}}" class="btn btn-danger" style="margin-right: 3px;">Delete</a>@endif</td>
</tr>
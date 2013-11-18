<tr>
    <td><a href="{{ URL::to('/opportunities/'.$opportunity->id) }}">{{ $opportunity->title }}</a></td>
    <td>{{ $opportunity->company->name }}</td>
    <td>{{ $opportunity->description }}</td>
    <td><button>Pitch</button></td>
</tr>
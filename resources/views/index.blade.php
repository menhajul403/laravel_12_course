<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="GET">
        <input type="text" name="roll" placeholder="Search by Roll" value="{{ request('roll') }}">
        <input type="text" name="name" placeholder="Search by Name" value="{{ request('name') }}">

        <select name="class">
            <option value="">Select Class</option>
            <option value="One" {{ request('class') == 'One' ? 'selected' : '' }}>One</option>
            <option value="Two" {{ request('class') == 'Two' ? 'selected' : '' }}>Two</option>
            <option value="Three" {{ request('class') == 'Three' ? 'selected' : '' }}>Three</option>
        </select>

        <input type="number" name="fee" placeholder="Search by Fee" value="{{ request('fee') }}">

        <button type="submit">Search</button>
    </form>

    @if($classCount !== null)
        <p><b>Total Students in this class:</b> {{ $classCount }}</p>
    @endif

    <table border="1" cellpadding="5">
        <tr>
            <th>Roll</th>
            <th>Name</th>
            <th>Class</th>
            <th>Fee</th>
        </tr>

        @forelse($students as $student)
            <tr>
                <td>{{ $student['roll'] }}</td>
                <td>{{ $student['name'] }}</td>
                <td>{{ $student['class'] }}</td>
                <td>{{ $student['fee'] }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No student found</td>
            </tr>
        @endforelse
    </table>

</body>

</html>

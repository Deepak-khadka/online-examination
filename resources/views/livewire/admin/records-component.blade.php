<div>
    <center><h4>The Record Of The Student.</h4></center>

    <table class="table" border="1px solid black">
    <thead>
    <tr>
        <th>SN </th>
        <th>NAME</th>
        <th>EMAIL </th>
        <th>ADDRESS</th>
        <th>PHONE</th>
        <th>Action</th>
    </tr>
    </thead>

        <tbody>
        @foreach($this->userList as $index => $user)
            <tr>
                <td>{{ ++$index }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->mobile }}</td>
                <td>{{ $user->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

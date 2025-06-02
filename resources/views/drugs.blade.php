
    <table>

        <th>Name</th>
        <th>Count</th>
        <th>Disease</th>
        <th>Price</th>
        <th>Pharmacy</th>
        @foreach ($drugs as $drug)
            <tr>
                <td>
                        {{ $drug ->name}}
                </td>
                <td>{{ $drug->count }}</td>
                <td>{{ $drug->disease }}</td>
                <td>{{ $drug->price }}</td>
                <td>
                        {{ $drug->pharmacy_id}}
                   </td>

            </tr>


        @endforeach
    </table>






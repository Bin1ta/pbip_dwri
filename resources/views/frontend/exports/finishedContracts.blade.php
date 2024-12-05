<table>
    <thead>
        <tr>
            <th>Name of project</th>
            <th>Name of work</th>
            <th>Contract identification number</th>
            <th>Name and address of contractor</th>
            <th>Date of agreement</th>
            <th>Amount of Agreement (Inc VAT/VO)</th>
            <th>Date of completion</th>
            <th>Actual Expenditure (inc VAT, price escalation)</th>
            <th>Contractors liability status</th>
            <th>Current status</th>
            <th>Major works completed</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($finishedContracts as $finishedContract)
            <tr>
                <td>{{ $finishedContract->name }}</td>
                <td>{{ $finishedContract->work }}</td>
                <td>{{ $finishedContract->identification_no ?? '' }}</td>
                <td>{{ $finishedContract->contractor_detail }}</td>
                <td>{{ $finishedContract->agreement_date }}</td>
                <td>{{ $finishedContract->agreement_amount }}</td>
                <td>{{ $finishedContract->completion_date }}</td>
                <td>{{ $finishedContract->actual_expenditure }}</td>
                <td>{{ $finishedContract->contractors_liability_status }}</td>
                <td>{{ $finishedContract->current_status }}</td>
                <td>{{ $finishedContract->work_completed }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

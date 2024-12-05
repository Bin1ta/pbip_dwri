<table>
    <thead>

        <tr>
            <th >S.N</th>
            <th >Name of work </th>
            <th >Contract ID</th>
            <th >Name of Contractor</th>
            <th >Contract Amount</th>
            <th >Date of Agreement</th>
            <th >Date of completion as per Agreement</th>
            <th >Due Date of Completion</th>
            <th >Time Extended based on Original schedule</th>
            <th >Time Elapsed based on revised schedule</th>
            <th >Financial Progress</th>
            <th>Physical Progress</th>
            <th >Progress Status</th>
            <th >Remarks</th>
        </tr>
        <tr >
            <th>Amount</th>
            <th>Percent</th>
            <th>Date</th>
            <th>Percent</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>


        @foreach ($contractProgresses as $contractProgress)
            <tr>

                <td>{{ $loop->iteration }}</td>
                <td>{{ $contractProgress->work_name ??'' }}</td>
                <td>{{ $contractProgress->contract_id ??'' }}</td>
                <td>{{ $contractProgress->contractor_name }}</td>
                <td>{{ $contractProgress->contractor_amount ??'' }}</td>
                <td>{{ $contractProgress->agreement_date ??'' }}</td>
                <td>{{ $contractProgress->completion_date ??'' }}</td>
                <td>{{ $contractProgress->completion_date_due ??'' }}</td>
                <td>{{ $contractProgress->times_extended ??'' }}</td>
                <td>{{ $contractProgress->times_extended_reversed ??'' }}</td>
                <td>{{ $contractProgress->financial_progress_amount ??'' }}</td>
                <td>{{ $contractProgress->financial_progress_percent ??'' }}</td>
                <td>{{ $contractProgress->financial_progress_date ??'' }}</td>
                <td>{{ $contractProgress->physical_progress_date ??'' }}</td>
                <td>{{ $contractProgress->physical_progress_percent ??'' }}</td>
                <td>{{ $contractProgress->progress_status ??'' }}</td>
                <td>{{ $contractProgress->remarks ??'' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

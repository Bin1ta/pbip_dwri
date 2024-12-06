<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        /* General table styling */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            text-align: center;
            padding: 8px;
        }

        /* Handle page breaks */
        table {
            page-break-inside: auto;
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        thead {
            display: table-header-group;
        }

        tfoot {
            display: table-footer-group;
        }

        /* Prevent overflow */
        body {
            font-size: 10px;
            /* Adjust font size for fitting data */
        }
    </style>
</head>

<body>
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

</body>

</html>

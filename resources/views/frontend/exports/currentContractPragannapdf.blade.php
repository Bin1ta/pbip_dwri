<!DOCTYPE html>
<html>
<head>
    <style>
        /* General table styling */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
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
            font-size: 10px; /* Adjust font size for fitting data */
        }
    </style>
</head>
<body>
    <h2>Current Contracts Praganna</h2>
    <table>
        <thead>
            <tr>
                <th>Name of project</th>
                <th>Name of work</th>
                <th>Contract identification number</th>
                <th>Contractor's Name &amp; address</th>
                <th>Agreement Date</th>
                <th>Amount of Agreement (Inc VAT/VO)</th>
                <th>Date of completion as per agreement</th>
                <th>Number of extension</th>
                <th>Total duration of time extension (months)</th>
                <th>Date of completion (revised)</th>
                <th>Current status</th>
                <th>Updated Progress</th>
                <th>Responsible person</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($currentContracts as $currentContract)
                <tr>
                    <td>{{ $currentContract->name ?? '' }}</td>
                    <td>{{ $currentContract->work ?? '' }}</td>
                    <td>{{ $currentContract->identification_no ?? '' }}</td>
                    <td>{{ $currentContract->contractor_detail ?? '' }}</td>
                    <td>{{ $currentContract->agreement_date ?? '' }}</td>
                    <td>{{ $currentContract->agreement_amount ?? '' }}</td>
                    <td>{{ $currentContract->completion_date ?? '' }}</td>
                    <td>{{ $currentContract->number_of_extensions ?? '' }}</td>
                    <td>{{ $currentContract->extension_duration ?? '' }}</td>
                    <td>{{ $currentContract->completion_date_revised ?? '' }}</td>
                    <td>{{ $currentContract->current_status ?? '' }}</td>
                    <td>{{ $currentContract->updated_progress ?? '' }}</td>
                    <td>{{ $currentContract->authorised_person ?? '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

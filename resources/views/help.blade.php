<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Documents</title>
    <link rel="stylesheet" href="{{ asset('css/home/help.css') }}">

</head>

<body>
    <h2>Help Documents</h2>
    <table class="docs">
        <tr>
            <th>Academics</th>
            <th>Schloarship</th>
            <th>Extra</th>
        </tr>
        <tr>
            <td>
                <li>
                    <ul><a href="https://examform.unipune.ac.in/" target="_blank">1. Exam Form</a></ul>
                    <ul><a href="https://piexamresult.unipune.ac.in/" target="_blank">2. Exam Result</a></ul>
                    <ul><a href="{{ URL::asset('docs/Bonofide.pdf') }}" target="_blank">3. Term Grant Sheet</a></ul>
                </li>
            </td>
            <td> <a href="#"></a>
                <li>
                    <ul><a href="{{ URL::asset('docs/pratidnya.pdf') }}" target="_blank">1. Pratidnya Patra</a></ul>
                    <ul><a href="{{ URL::asset('docs/sample.pdf') }}" target="_blank">2. Sample</a></ul>
                    <ul><a href="{{ URL::asset('docs/sample.pdf') }}" target="_blank">3. Sample</a></ul>
                </li>
            </td>
            <td> <a href="#"></a>
                <li>
                    <ul><a href="{{ URL::asset('docs/Bonofide.pdf') }}" target="_blank">1. Bonofide</a></ul>
                    <ul><a href="{{ URL::asset('docs/FeesStru.pdf') }}" target="_blank">2. Fees Structure</a></ul>
                    <ul><a href=" {{ URL::asset('docs/nodues.pdf') }}" target="_blank">3. No Fees Dues</a></ul>
                </li>
            </td>
        </tr>


    </table>
</body>

</html>
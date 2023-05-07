<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <table id=customers>
        <tr>
            <td>
                <h2>Easy Learning</h2>
            </td>
            <td>
                <h2>Easy School ERB</h2>
                <P>School Address</P>
                <P>School Phone:0796445090</P>
                <P>School Email:support@easyleaninig.com</P>
            </td>
        </tr>
    </table>

    <table id=customers>
        <tr>
            <th width="10%">S1</th>
            <th width="45%">Student Details</th>
            <th width="45%">Student Data</th>
        </tr>
        <tr>
            <td>1</td>
            <td><b>ID Number</b></td>
            <td>{{$details['student_name']['id_no']}}</td>
        </tr>
        <tr>
            <td>2</td>
            <td><b>Student Name</b></td>
            <td>{{$details['student_name']['name']}}</td>
        </tr>
        <tr>
            <td>3</td>
            <td><b>Student Roll</b></td>
            <td>{{$details['student_name']['usertype']}}</td>
        </tr>
        <tr>
            <td>4</td>
            <td><b>Father's Name</b></td>
            <td>{{$details['student_name']['fname']}}</td>
        </tr>
        <tr>
            <td>5</td>
            <td><b>Mother's Name</b></td>
            <td>{{$details['student_name']['mname']}}</td>
        </tr>
        <tr>
            <td>6</td>
            <td><b>Address</b></td>
            <td>{{$details['student_name']['address']}}</td>
        </tr>
        <tr>
            <td>7</td>
            <td><b>Mobile</b></td>
            <td>{{$details['student_name']['mobile']}}</td>
        </tr>
        <tr>
            <td>8</td>
            <td><b>Gender</b></td>
            <td>{{$details['student_name']['gender']}}</td>
        </tr>
        <tr>
            <td>9</td>
            <td><b>Religion </b></td>
            <td>{{$details['student_name']['religion']}}</td>
        </tr>
        <tr>
            <td>10</td>
            <td><b>Date Of Birth </b></td>
            <td>{{$details['student_name']['dob']}}</td>
        </tr>
        <tr>
            <td>11</td>
            <td><b>Discount </b></td>
            <td>{{$details['discount']['discount']}}%</td>
        </tr>
        <tr>
            <td>12</td>
            <td><b>Year </b></td>
            <td>{{$details['student_year']['name']}}</td>
        </tr>
        <tr>
            <td>13</td>
            <td><b>Class</b></td>
            <td>{{$details['student_class']['name']}}</td>
        </tr>
        <tr>
            <td>14</td>
            <td><b>Group </b></td>
            <td>{{$details['group']['name']}}</td>
        </tr>
        <tr>
            <td>15</td>
            <td><b>Group </b></td>
            <td>{{$details['shift']['name']}}</td>
        </tr>
    </table>
    <br><br>
    <i style="font-size: 10px; float:right;">Print Date : {{date('d M Y')}}</i>
</body>

</html>
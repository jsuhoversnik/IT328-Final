<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hardware List</title>

    <!--Bootstrap Styles-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

</head>
<body>

<table class="table">
    <thead>
    <tr><!--
        <th scope="col">Type</th>
        -->
        <th scope="col">Part Name</th>
        <th scope="col">Price</th>
        <th scope="col">Performance</th>
        <!--
        <th scope="col">Part Set</th>
        -->
    </tr>
    </thead>
    <tbody>
    <repeat group="{{ @hardware }}" value="{{ @part }}">
        <tr>
            <!--
            <th scope="row">
                <a href="{{ @BASE }}/{{ @part['type'] }}List">
                {{ @part['type'] }}
                </a>
            </th>
            -->
            <td>
                <a href="{{ @BASE }}/hardwareList/{{ @part['partName'] }}">
                    {{ @part['partName'] }}
                </a>
            </td>

            <td>{{ @part['price'] }}</td>
            <td>{{ @part['performance'] }}</td>
<!--            <td>-->
<!--                <div class="progress ">-->
<!--                    $percentage={{ @part['performance']/30641 }};-->
<!--                    <div class="progress-bar" role="progressbar" style='width:-->
<!--                    --><?php
//                    echo "{{ @part['performance']/30641 }}";
//                    ?>/*%'*/
/*                         aria-valuenow="{{ @part['performance'] }}" aria-valuemin="0" aria-valuemax="100"></div>*/
/*                    {{ @part['performance']/30641 }}%*/
/*                </div>*/
/*            </td>*/
            <!--
            <td>{{ @part['partSet'] }}</td>
            -->
        </tr>
    </repeat>
    </tbody>
</table>

<!--Bootstrap scripts-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>
</html>
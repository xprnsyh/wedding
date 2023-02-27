<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Book {{$event->nama_panggilan_mempelai_pria}} & {{$event->nama_panggilan_mempelai_wanita}}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">                
</head>
<body>
    <div class="container-fluid">
        <h3>The Wedding of {{$event->nama_panggilan_mempelai_pria}} & {{$event->nama_panggilan_mempelai_wanita}}</h3>
        <h5>{{ \Carbon\Carbon::parse($event->tanggal_ijab)->dayName}}, {{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('d M Y')}}</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                @foreach($event->guests as $key => $guest)
                <tr>
                    <td>
                        {{++$key}}
                    </td>
                    <td>
                        {{$guest->name}}
                    </td>
                    <td>
                        {{$guest->pivot->text}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
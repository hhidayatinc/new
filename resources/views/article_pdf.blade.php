<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
  
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
            
		}
        body{
            margin: 40px;
        }
        h5{
            padding-bottom:20px;
            text-align: center;
        }
	</style>
	
		<h5 >Membuat Laporan PDF Dengan DOMPDF Laravel</h4>
	
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Judul</th>
				<th>Isi</th>
	
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($article as $a)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$a->title1}}</td>
				<td>{{$a->content1}}</td>
				
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>
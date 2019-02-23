<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table {
			width :100%;
			margin:0 auto;
			border: 1px solid blue;
           
		}
		h4{
			height: 5%;
			color: red;

		}
		td {
  text-align:center;

       }
         th{
  text-align:center;

            }
	</style>
</head>
<body>
<h4><center>Blinds Info</center></h4>
<table>
<thead >
<tr>

<th>Photo</th>
<th>LastName</th>
<th>FirstName</th>
<th>Country</th>
 <th>City</th>
<th>Mobile</th>
<th>Other Number</th>
                                     
                                   
</tr>
</thead>
<tbody >
 @if($aveugle->isEmpty())
<tr>
<td colspan="5" align="center"> No Blind Was Found ! </td>
</tr>
@else
 @foreach($aveugle as $item)
<tr>
@if(empty($item->photo))  
<td><img  src="uploads/no-image.jpg" style="height: 30px;""> </img> </td>    
 @else    
<td><img  src="uploads/{{ $item->photo }}" style="height: 30px;""> </img></td>
@endif
<td>{{ $item->nom }}</td>
<td>{{ $item->prenom }}</td>
<td>{{ $item->ville }}</td>
<td>{{ $item->region }}</td>
<td>{{ $item->telephone }}</td>
<td>{{ $item->tele_famille }}</td>
                                        
</tr>
 @endforeach
@endif
</a>
</td>
</tr>
</tbody>
</table>
</body>
</html>
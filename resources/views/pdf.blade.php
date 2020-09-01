<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title>{{$report->name}}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
          <div style="text-align: center;">
            <img src="{{ URL('/') }}/images/divisor.png" alt="CapitólioCamping">
            <hr>
            <h3>{{$report->name}}</h3>
          </div>
        </div>
        
	
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Quantidade</th>
					<th scope="col">Descrição</th>
					<th scope="col">Observação</th>
					<th scope="col">Criado em</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">{{$report->id}}</th>
					<td>{{$report->size}}</td>
					<td>{{$report->description}}</td>
					<td>{{$report->query}}</td>
					<td>{{$report->created_at}}</td>
				</tr>
			</tbody>
		</table>


    </body>
</html>

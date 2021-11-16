@extends('header.main')

@section('container')

    <h1>Category</h1><br>

    <table class="table align-center">
        <tr>
            <td style="font-weight: bold; text-align: center;"><h3>Pie Chart</h3></td>
        </tr>
        <tr>
            <td><div id="piechart" style="width: 1200px; height: 500px;"></div></td>
        </tr>
    </table>

    <table class="table align-center">
        <tr>
            <td style="font-weight: bold; text-align: center;"><h3>Column Chart</h3></td>
        </tr>
        <tr>
            <td><div id="columnchart" style="width: 1200px; height: 500px;"></div></td>
        </tr>
    </table>

    <script>
        $(document).ready(function() {
            google.charts.load('current', {'packages' : ['corechart']});
            google.charts.setOnLoadCallback(function() {drawChart()});
        })

        function drawChart()
        {
            data = <?php echo $data; ?>;

            var datas = new google.visualization.DataTable();

            datas.addColumn('string', 'Kategori');
            datas.addColumn('number', 'Jumlah');

            var array = [];

            $.each(data, function(i,obj) {
                array.push([obj[0], obj[1]]);
            })

            datas.addRows(array);

            console.log(datas);
            
            var pie_options =
    			{
    				title : 'Pie Chart of Kategori',
                    is3D: true
    			};

    		var pie = new google.visualization.PieChart(document.getElementById('piechart'));

        	pie.draw(datas, pie_options);

            var column_options =
		        {
		          title: 'Column Chart of Kategori',
		          legend: 'none'
		        };

		    var column = new google.visualization.ColumnChart(document.getElementById('columnchart'));

		    column.draw(datas, column_options);
        }
    </script>

@endsection
@extends('header.main')

@section('container')

    <h1>Title</h1>
    <h3>1000 titles and their stocks from Books to Scrape</h3><br>

    <div id="table"></div>

    <script>
        $(document).ready(function() {
            google.charts.load('current', {'packages' : ['table']});
            google.charts.setOnLoadCallback(function() {drawChart()});
        })

        function drawChart()
        {
            data = <?php echo $data; ?>;

            var datas = new google.visualization.DataTable();

            datas.addColumn('string', 'Judul');
            datas.addColumn('number', 'Stok');
            datas.addColumn('string', 'Harga (£)');

            var array = [];

            $.each(data, function(i,obj) {
                array.push([obj[0], obj[1], obj[2]]);
            })

            datas.addRows(array);

            console.log(datas);
            
            var table = new google.visualization.Table(document.getElementById('table'));
            table.draw(datas, {showRowNumber: true, width: '100%', height: '100%'});
        }
    </script>

@endsection
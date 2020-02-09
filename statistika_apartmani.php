<?php require 'header.php'; ?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    
    google.load('visualization', '1.0', {'packages': ['corechart']});

    google.setOnLoadCallback(crtajGrafik);

    function crtajGrafik() {
        
        var sve = $.ajax({
            url: "http://enyro.localhost.com/API/statistika_apartmani",
            dataType: "json",
            async: false
        }).responseText;
        
        var sve = new google.visualization.DataTable(sve);

        var options = {'title': '',
            'is3D': true,
            'height': 350,
            'vAxis': {title: ""},
            'hAxis': {title: "Naziv apartmana"},
            'seriesType': "bars",
            /*'series': {5: {type: "line"}},*/
            'colors': ['#3399FF', '#33FF66']
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));

        function klik() {
            var selectedItem = chart.getSelection()[0];

            console.log(selectedItem)

            if (selectedItem) {
                var apartman = sve.getValue(selectedItem.row, 0);
                var Rezervisano = sve.getValue(selectedItem.row, 1);
                alert('apartmana ' + apartman + " je Rezervisano jos " + Rezervisano + " komada.");
            }
        }

        google.visualization.events.addListener(chart, 'select', klik);
        chart.draw(sve, options);

        $('select').on('change', function() {
            
            var urlZaPodatke = "http://enyro.localhost.com/API/statistika_apartmani"
            
            if(this.value >= 0 ) url = url + "?grad="+this.value;
            
            var data = $.ajax({
                url: urlZaPodatke,
                dataType: "json",
                async: false
            }).responseText;
            var data = new google.visualization.DataTable(data);
            chart.draw(data, options);


        });

    }

</script>


<div class="container">
    <div class="page-header text-center">
        <h1>eNyro - Stanje rezervacija</h1>
        <form name="forma" style="display:inline-block;">
            <select name="grad" id="grad" style="width:300px;">
                <option value="%" selected>Svi apartmani</option>
                <?php
                $gradovi = grad::dajGradove();
                while ($grad = $gradovi->fetch_object()) {
                    ?>
                    <option value="<?php echo $grad->id; ?>"><?php echo $grad->naziv; ?></option>
                <?php } ?>

            </select>            
        </form>
    </div>


    <div id="chart_div" style="min-height: 300px"></div>




</div>

<?php require 'footer.php'; ?>
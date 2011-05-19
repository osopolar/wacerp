<div id="mainContent">

    <script>
        $(function() {
            $("#myselectable").selectable();

            $("#myselectable").bind( "selectableselected", function(e, ui) {
                Wac.log(e);
//                Wac.log(e.currentTarget + " : " + e.target + " : " + $(e).attr("innerhtml") + " : " + $(e).val());
            });
        });
    </script>


    <div class="demo">

        <ol id="myselectable" class="selectable">
            <li class="ui-state-default">1</li>
            <li class="ui-state-default">2</li>
            <li class="ui-state-default">3</li>
            <li class="ui-state-default">4</li>
            <li class="ui-state-default">5</li>
            <li class="ui-state-default">6</li>
            <li class="ui-state-default">7</li>
            <li class="ui-state-default">8</li>
            <li class="ui-state-default">9</li>
            <li class="ui-state-default">10</li>
            <li class="ui-state-default">11</li>
            <li class="ui-state-default">12</li>
        </ol>

    </div><!-- End demo -->



    <div class="demo-description">
        <p>To arrange selectable items as a grid, give them identical dimensions and float them using CSS.</p>
    </div><!-- End demo-description -->

</div>
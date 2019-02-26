

<!-- Menu -->

<div id="truc" class="ui secondary vertical pointing menu">
    <!-- <a href="?lien=1" class="item" onclick="getElementById('demo').innerHTML = '<p>connard</p>' ">What is the time?</a> -->
    <a href="?lien=1" class="item">Voir mes CV</a>
    <a href="?lien=2" class="item">Lien 2</a>
    <a href="?lien=3" class="item">Lien 3</a>
</div>

<!--
<div>
    <p id="demo">demo</p>
</div>
-->

<div>

    <?php
    if(isset($_GET['lien'])){
        $link=$_GET['lien'];
        if ($link == '1'){
            echo '
            
            <h1>MES CV</h1>
            
            
            
            ';
        }
        if ($link == '2'){
            echo '

            

            ';
        }
        if ($link == '3'){
            echo '

            

            ';
        }
    }  ?>

</div>

<!-- Mes CV -->
<script>
    var header = document.getElementById("truc");
    var btns = header.getElementsByClassName("item");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>
<!-- Menu -->
<div id="truc" class="ui secondary vertical pointing menu">
    <a href="#Nouveau_CV" class="item">
        Créer mon CV
    </a>
    <a href="#CV" class="item">
        Voir mes CV
    </a>
    <a href="#Chipo" class="item active">
        Chipo ?
    </a>
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
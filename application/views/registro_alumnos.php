
<style>
.page-box{
    max-width:600px;
    margin:auto;
    background:#fff;
    padding:25px;
    border-radius:10px;
    box-shadow:0 0 15px rgba(0,0,0,.1);
}
.page-box h3{
    text-align:center;
    margin-bottom:20px;
    color:#2c3e50;
}
.page-box input,
.page-box select{
    border-radius:6px;
}
.page-box button{
    width:100%;
    font-weight:bold;
}
</style>

<div class="container mt-4">
    <div class="page-box">

        <h3>Registrar Alumno</h3>

        <input id="nombre" class="form-control mb-2" placeholder="Nombre">
        <input id="ap" class="form-control mb-2" placeholder="Apellido Paterno">
        <input id="am" class="form-control mb-3" placeholder="Apellido Materno">

        <select id="grupo" class="form-control mb-3">
            <option value="">Seleccione grupo</option>
        </select>

        <button class="btn btn-primary" onclick="guardar()">Guardar Alumno</button>

    </div>
</div>


<script>
fetch('<?= base_url("api/grupos") ?>')
.then(r=>r.json())
.then(j=>{
    j.data.forEach(g=>{
        grupo.innerHTML += `<option value="${g.id_grupo}">${g.grupo}</option>`;
    });
});

function guardar(){
    fetch('<?= base_url("api/alumno") ?>',{
        method:'POST',
        headers:{'Content-Type':'application/json'},
        body:JSON.stringify({
            nombre:nombre.value,
            apellido_paterno:ap.value,
            apellido_materno:am.value,
            id_grupo:grupo.value
        })
    })
    .then(r=>r.json())
    .then(j=>{
        alert(j.message);
        location.reload();
    });
}
</script>


<?php $this->load->view('layout/footer'); ?>


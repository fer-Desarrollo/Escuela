

<div class="container mt-4">
    <h3>Registrar Alumno</h3>

    <input id="nombre" class="form-control mb-2" placeholder="Nombre">
    <input id="ap" class="form-control mb-2" placeholder="Apellido Paterno">
    <input id="am" class="form-control mb-2" placeholder="Apellido Materno">

    <select id="grupo" class="form-control mb-2"></select>

    <button class="btn btn-primary" onclick="guardar()">Guardar</button>
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
    }).then(r=>r.json())
      .then(j=>alert(j.message));
}
</script>

<?php $this->load->view('layout/footer'); ?>


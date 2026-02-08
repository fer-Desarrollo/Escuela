<div class="container mt-4">
<h3>Registrar Grupo</h3>

<select id="carrera" class="form-control mb-2">
    <option value="">Seleccione carrera</option>
</select>

<select id="turno" class="form-control mb-2">
    <option value="">Seleccione turno</option>
</select>

<select id="grado" class="form-control mb-2">
    <option value="">Seleccione grado</option>
</select>

<input id="grupo" class="form-control mb-2" placeholder="Grupo">

<button class="btn btn-success" onclick="guardar()">Guardar</button>
</div>

<script>
const carrera = document.getElementById('carrera');
const turno   = document.getElementById('turno');
const grado   = document.getElementById('grado');
const grupo   = document.getElementById('grupo');

// 🔹 CARRERAS
fetch('<?= base_url("api/carreras") ?>')
.then(r => r.json())
.then(j => {
    j.data.forEach(c => {
        carrera.innerHTML += `<option value="${c.id_carrera}">
            ${c.nombre_carrera}
        </option>`;
    });
});

// 🔹 TURNOS
fetch('<?= base_url("api/turnos") ?>')
.then(r => r.json())
.then(j => {
    j.data.forEach(t => {
        turno.innerHTML += `<option value="${t.id_turno}">
            ${t.nombre_turno}
        </option>`;
    });
});

// 🔹 GRADOS
fetch('<?= base_url("api/grados") ?>')
.then(r => r.json())
.then(j => {
    j.data.forEach(g => {
        grado.innerHTML += `<option value="${g.id_grado}">
            ${g.numero_grado}
        </option>`;
    });
});

function guardar() {

    if(!carrera.value || !turno.value || !grado.value || !grupo.value){
        alert('Todos los campos son obligatorios');
        return;
    }

    fetch('<?= base_url("api/grupo") ?>', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({
            id_carrera: carrera.value,
            id_turno: turno.value,
            id_grado: grado.value,
            grupo: grupo.value
        })
    })
    .then(r => r.json())
    .then(j => {
        alert(j.message);
        grupo.value = '';
    });
}
</script>

<?php $this->load->view('layout/footer'); ?>

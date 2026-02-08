<style>
.page-box{
    max-width:900px;
    margin:auto;
    background:#ffffff;
    padding:25px;
    border-radius:10px;
    box-shadow:0 0 15px rgba(0,0,0,.1);
}
.page-box h3{
    text-align:center;
    margin-bottom:20px;
    color:#2c3e50;
}
.table thead{
    background:#2c3e50;
    color:white;
}
tr.activo{
    background:#e9f7ef;
}
tr.inactivo{
    background:#fdecea;
}
.estado-activo{
    color:#1e8449;
    font-weight:bold;
}
.estado-inactivo{
    color:#c0392b;
    font-weight:bold;
}
</style>

<div class="container mt-4">
    <div class="page-box">

        <h3>Alumnos</h3>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Grupo</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="tabla"></tbody>
        </table>

    </div>
</div>

<script>
fetch('<?= base_url("api/alumnos") ?>')
.then(r=>r.json())
.then(j=>{
 j.data.forEach(a=>{
  const claseFila = a.activo==1 ? 'activo' : 'inactivo';
  const textoEstado = a.activo==1 ? 'Activo' : 'Inactivo';
  const claseEstado = a.activo==1 ? 'estado-activo' : 'estado-inactivo';

  tabla.innerHTML+=`
  <tr class="${claseFila}">
   <td>${a.nombre} ${a.apellido_paterno}</td>
   <td>${a.grupo}</td>
   <td class="${claseEstado}">${textoEstado}</td>
   <td>
    <button onclick="toggle(${a.id_alumno})"
        class="btn btn-warning btn-sm">
        Cambiar
    </button>
   </td>
  </tr>`;
 });
});

function toggle(id){
 fetch(`<?= base_url("api/alumno") ?>/${id}`,{method:'PUT'})
 .then(r=>r.json())
 .then(()=>location.reload());
}
</script>

<?php $this->load->view('layout/footer'); ?>

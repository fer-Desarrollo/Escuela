<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container mt-4">
<h3>Alumnos</h3>

<table class="table table-bordered">
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

<script>
fetch('<?= base_url("api/alumnos") ?>')
.then(r=>r.json())
.then(j=>{
 j.data.forEach(a=>{
  tabla.innerHTML+=`
  <tr>
   <td>${a.nombre} ${a.apellido_paterno}</td>
   <td>${a.grupo}</td>
   <td>${a.activo==1?'Activo':'Inactivo'}</td>
   <td>
    <button onclick="toggle(${a.id_alumno})" class="btn btn-warning btn-sm">Cambiar</button>
   </td>
  </tr>`;
 });
});

function toggle(id){
 fetch(`<?= base_url("api/alumno") ?>/${id}`,{method:'PUT'})
 .then(r=>r.json()).then(()=>location.reload());
}
</script>

<?php $this->load->view('layout/footer'); ?>
<?php $this->load->view('layout/scripts'); ?>
 
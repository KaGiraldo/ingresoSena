<div class="container">
    <h5 class="modal-title" id="ingresoModalLabel">POR FAVOR DILIGENCIE LOS CAMPOS PARA REGISTRAR INGRESO</h5>
    <form action="">
        <div class="mb-3">
            <label for="idDocumento" class="form-label">No. de documento</label>
            <input type="text" class="form-control" id="idDocumento" readonly>
        </div>

        <div class="mb-3">
            <label for="dispositivo" class="form-label">¿Qué dispositivo va a registrar?</label>
            <select class="form-select" aria-label="Default select example" id="dispositivo">
                <option selected value="ninguno">Ninguno</option>
                <option value="portatil">Portátil</option>
                <option value="celular">Celular</option>
                <option value="tablet">Tablet</option>
            </select>
        </div>
            
        <div class="form-group" id="dispositivoDiv">
            <div class="mb-3">
                <label for="marca" class="form-label">Marca del dispositivo</label>
                <input type="text" class="form-control" id="marca" placeholder="Digite el código del artículo">
            </div>

            <div class="mb-3">
                <label for="serial" class="form-label">Serial o placa</label>
                <input type="text" class="form-control" id="serial" placeholder="Digite el código del artículo">
            </div>
    </form>
</div>
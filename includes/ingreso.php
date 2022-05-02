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

            <div class="mb-3">
                <label for="propietario" class="form-label">Propietario</label>
                <select class="form-select" aria-label="Default select example" id="propietario">
                    <option selected value="sena">SENA</option>
                    <option value="personal">Personal</option>
                </select>
            </div>
        </div>    

        <div class="mb-3" id="propietario+">
            <label for="autoriza" class="form-label">Autorizado por</label>
            <select class="form-select" aria-label="Default select example" id="autoriza">
                <option selected value="giovanni">Giovanni Zarco</option>
                <option value="manuel">Manuel Hormechea</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">¿Trajo vehículo?</label>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio2" id="btnradio3" autocomplete="off" checked>
                <label class="btn btn-outline-primary" for="btnradio3">SI</label>
                
                <input type="radio" class="btn-check" name="btnradio2" id="btnradio4" autocomplete="off">
                <label class="btn btn-outline-primary" for="btnradio4">NO</label>
            </div>
        </div>

        <div class="mb-3" id="placa">
            <label for="placaVehiculo" class="form-label">Placa del vehículo</label>
            <input type="text" class="form-control" id="placaVehiculo" placeholder="Digite el código del artículo">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary">Generar QR</button>
        </div>
    </form>
</div>
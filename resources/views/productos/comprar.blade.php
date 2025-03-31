<x-adminlte-modal id="modalComprar" title="Nuevo Compra de Producto" size="md" theme="info" icon="fas fa-plus" v-centered static-backdrop scrollable>
    <div class="container-fluid row">
        <div class="col-lg-12 border-bottom p-1">
            <small class="text-danger"><i class="fas fa-info-circle"></i> Todos los campos con * son obligatorios</small>
        </div>
        <div class="col-lg-12 p-1">
            <form class="form-group">
                <x-adminlte-input type="text" id="nombreComprar" name="nombreComprar" readonly="true">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-box"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" id="precioComprar" name="precioComprar" readonly="true">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="number" id="cantidad" name="cantidad">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-hashtag">*</i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <input type="hidden" name="idProductoComprar" id="idProductoComprar">
            </form>
        </div>
        <x-slot name="footerSlot">
            <button class="btn btn-primary shadow" id="comprar"><i class="fas fa-shopping-cart" title="Comprar producto"></i> </button>
            <button class="btn btn-outline-danger shadow" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
        </x-slot>
    </div>
</x-adminlte-modal>
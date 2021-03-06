<div class="row pt-2 mt-5 centrado">
  <div class="col-8  ">
    <h2 class="text-align-center sin-fondo">Gasto gasoil</h2>
  </div>
</div>

<?php if(isset($_SESSION['errorFormato'])) : ?>
    <div class="row centrado">
      <div class="alert alert-danger text-align-center" role="alert">
        <?php echo $_SESSION['errorFormato'] ?>
      </div>
    </div>
<?php Utils::deleteSession('errorFormato'); endif; ?>

<div class="row centrado">
  <div class="col col-md-10  col-lg-6   pt-2">
    <form action="#" onsubmit="return modal1()" method="post">

      <div class="form-group col-12 col-md-6 col-lg-6">
        <label for="">Importe</label>
        <input type="number" step="0.01" class="form-control" maxlength="10" placeholder="" name="gasoil" id="gasoil" required="required" autofocus="autofocus">
      </div>

      <div class="form-row col-lg-12">
        <div class="col  pb-5 pt-5 centrado">
          <button type="submit" class="btn btn-blue col-lg-5 mr-lg-4"    >Añadir ticket gasoil</button>
        </div>
      </div>

    </form>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCenterTitle">Es correcto el importe: </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="<?=base_url?>index.php?controller=hojaDiaria&action=addGasoil"  method="post">
        <div class="modal-body centrado">
          <input type="text" class="text-align-center" name="" id="codigo" value="" size="8"  readonly><span class="ml-2"> €</span>
          <input type="hidden" name="gasoil" value="" id="codigo1">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary">Sí, enviar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /Modal -->



      <script type="text/javascript">
      function modal1() {

        // Verificamos el formato  -->
        var importe = document.getElementById("gasoil").value;
        var htmlspecialchars = false;
        var cont = 0;

        while (!htmlspecialchars && (cont < importe.length)) {
          if ((importe.charAt(cont) == " ") || (importe.charAt(cont) == "/") || (importe.charAt(cont) == "\\")
            || (importe.charAt(cont) == "{") || (importe.charAt(cont) == "}")  || (importe.charAt(cont) == "(")
            || (importe.charAt(cont) == ")") || (importe.charAt(cont) == "<") || (importe.charAt(cont) == ">")
            || (importe.charAt(cont) == "'")  || (importe.charAt(cont) == '"') || (importe.charAt(cont) == '[')
            || (importe.charAt(cont) == ']') || (importe.charAt(cont) == ',') || (importe.charAt(cont) == '-')
            || (importe.charAt(cont) == '_'))
            htmlspecialchars = true;
          cont++;
        }

        if (htmlspecialchars) {
          swal('', 'Los decimales deben estar separados con punto (.)', 'error');
          return false;
        }


//Modal con el importe para poder verificar antes de enviar
        $('#modal1').modal('show');
        var valor = document.getElementById("gasoil").value;
        document.getElementById("codigo").value=valor;
        document.getElementById("codigo1").value=valor;
        return false;
      }
      </script>


<div class="mdl-layout__tab-panel is-active" id="overview">
    <section class="section--center mdl-grid ">
        <div class="mdl-card mdl-cell mdl-cell--12-col">
            <div class="mdl-card__supporting-text mdl-grid mdl-grid--no-spacing">
                <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                      <form enctype="multipart/form-data" class="dataForm">
                        <div class=" mdl-textfield mdl-js-textfield mdl-textfield--file">
                          <input type="file" name="photo" accept="image/*">
                          <input type="submit" class="ajouterUnePhoto">
                        </div>
                        <input type="hidden" value="<?php echo $_GET["id_bouteille_cellier"]; ?>" name="idBouteilleCellier">
                        <input type="hidden" value="<?php echo $_GET["id_Cellier"]; ?>" name="idCellier">
                      </form>
                </div>
      
            </div>
        </div>
      </section>
</div>
<!--
    <form>
  <div class=" mdl-textfield mdl-js-textfield mdl-textfield--file">
    <input class="mdl-textfield__input" placeholder="File" type="text" id="uploadFile" readonly/>
    <div class="mdl-button mdl-button--primary mdl-button--icon mdl-button--file">
      <i class="material-icons">attach_file</i><input type="file" id="uploadBtn">
    </div>
</form>
-->
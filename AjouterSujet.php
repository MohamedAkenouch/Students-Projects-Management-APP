<link rel="stylesheet" href="Fiche.css">
<div id="hide-ajouter" style="top:1%;display:none;position:fixed; left:97%" onclick="hideAjouter()">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
            <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
        </svg>
        </div>
    <div id="ajouter" style="margin-top: 5%;margin-left: 10%;margin-right: 15%; display: none;top: 0px;position: fixed;left: 0px;background-color: white;width: 80%;height: auto;right: 0px;">
        <div style="background-color: white;position: absolute; top: 20%;width: 100%">
            <form style="margin-left: 15%;">
                <input style="margin-bottom:7%;margin-left:22%;text-align:center" class="input" type="text" placeholder="NOM DU SUJET">
                <br>
                <input  class="input" type="text" placeholder="DOMAINE">
                <select class="input" name="Filiere" id="Filiere">
                    <option value="ASEDS">ASEDS</option>
                    <option value="SMART">SMART</option>
                    <option value="DATA">DATA</option>
                    <option value="SYSNUM">SYSNUM</option>
                </select>
                <br>
                <input   class="input" type="text" placeholder="Nombre d'offres">
                <select class="input" name="Niveau" id="Niveau">
                    <option value="INE1">INE1</option>
                    <option value="INE2">INE2</option>
                    <option value="INE3">INE3</option>
                </select>
                <br>
               
                <textarea rows="8" cols="50" style="width: 82%;"   placeholder="Motivation..."></textarea>
                <br>
                <div class="submitblock">
                    <input class="submit" type="submit" value="Enregistrer ">
                </div>
            </form>
        </div>
    </div>